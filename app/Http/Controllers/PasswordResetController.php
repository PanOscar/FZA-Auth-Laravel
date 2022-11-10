<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    /**
     * @throws \Exception
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
        $expires = date("U") . 1800;

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
}
