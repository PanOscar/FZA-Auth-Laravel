<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    /**
     * @throws Exception
     */
    public function forgot($email): JsonResponse
    {
        if (!UserController::checkUsernameOrEmailExists($email)) {
            return response()->json(UserController::USER_DONT_EXIST);
        }

        $options = array();

        $options['selector'] = bin2hex(random_bytes(8));
        $options['token'] = random_bytes(32);
        $options['binToken'] = bin2hex($options['token']);
        $options['url'] = "https://fza-auth.heroku.com/new_password?selector="
            . $options['selector'] . "&validator=" . $options['binToken'];
        /*$template = file_get_contents(__DIR__ . '/../../../bootstrap/mail.balde.html');

        foreach ($options as $key => $value) {
            $template = str_replace('{{ ' . $key . ' }}', $value, $template);
        }*/
        $expires = round(microtime(true) * 1000) + 86400000;

        $passwordReset = PasswordReset::where('email', "=", $email);
        if ($passwordReset->exists()) {
            $passwordReset->delete();
        }
        $passwordReset = new PasswordReset();
        $passwordReset->email = $email;
        $passwordReset->token = password_hash($options['token'], PASSWORD_DEFAULT);
        $passwordReset->selector = $options['selector'];
        $passwordReset->expires = $expires;
        $passwordReset->save();
        Mail::send('view.mail', $options, static function (Message $message) use ($passwordReset) {
            return $message->to([$passwordReset->email])->replyTo([$passwordReset->email])
                ->subject('Zapomniałeś hasła?')
                ->getHeaders()
                ->addTextHeader('MIME-Version', '1.0')
                ->addTextHeader('Content-Type', 'text/html')
                ->addTextHeader('charset', 'ISO-8859-1');
        });
        return response()->json(['status' => 'success']);
    }

    public function reset(Request $request): JsonResponse
    {
        $this->validate($request, [
            'selector' => 'required',
            'validator' => 'required',
            'new_pass' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'new_pass_c' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'
        ]);

        $selector = $request->input('selector');
        $validator = $request->input('validator');
        $newPass = $request->input('new_pass');
        $newPassC = $request->input('new_pass_c');

        if ($newPass !== $newPassC) {
            return response()->json("Passwords are not the same");
        }

        $currentDate = round(microtime(true) * 1000);


        $passwordReset = PasswordReset::where('email', '=', 'osi23.78@gmail.com');
        $passwordResetData = $passwordReset->get();

        if ((int)$passwordResetData->jsonSerialize()[0]['expires'] < $currentDate) {
            return response()->json("Link wygasł, stwórz nowe zapytanie o reset hasła");
        }

        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin, $passwordResetData->jsonSerialize()[0]['token']);
        if ($tokenCheck === false) {
            return response()->json("Wprowadzono zły token, bądź twój link wygasł");

        }
        $tokenEmail = $passwordResetData->jsonSerialize()[0]['email'];

        $user = User::where('email', '=', $tokenEmail)->first();

        if (!$user->exists()) {
            return response()->json("Nie można pobrać danych z bazy danych.");
        }
        $options = [
            'cost' => 11
        ];
        $passwordDb = password_hash($newPass, PASSWORD_BCRYPT, $options);

        $user->password = $passwordDb;
        $user->save();

        if ($passwordReset->exists()) {
            $passwordReset->delete();
        }
        return response()->json(['status' => 'success', 'description' => 'Reset password']);

    }
}
