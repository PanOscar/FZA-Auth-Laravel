<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public const WRONG_PASS = 'Wrong password or username';
    public const USER_DONT_EXIST = 'User don\'t exist';

    /**
     * @throws Exception
     */
    public function login(Request $request, string $identifier): JsonResponse
    {
        $this->validate($request, [
            'password' => 'required'
        ]);
        if (!self::checkUsernameOrEmailExists($identifier)) {
            return response()->json(self::WRONG_PASS, 401);
        }
        $userPassword = User::select('password')->where('username', '=', $identifier)
            ->orWhere('email', '=', $identifier)->get();
        if (!password_verify($request->input('password'), $userPassword->jsonSerialize()[0]['password'])) {
            return response()->json(self::WRONG_PASS, 401);
        }
        $apiKey = base64_encode(Str::random(40));
        $user = User::where('username', '=', $identifier)
            ->orWhere('email', "=", $identifier)->first();
        $user->api_key = $apiKey;
        $user->save();

        $username = User::where('username', '=', $identifier)
            ->orWhere('email', "=", $identifier)->get()->jsonSerialize()[0]['username'];
        return response()->json([
            'status' => 'success',
            'api_key' => $apiKey,
            'username' => $username
        ], 201);
    }

    public function registerUser(Request $request): JsonResponse
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'
        ]);
        if (self::checkUsernameOrEmailExists($request->input('email'))) {
            return response()->json('Email is taken', 401);
        }
        if (self::checkUsernameOrEmailExists($request->input('username'))) {
            return response()->json('Username is taken', 401);
        }
        $options = [
            'cost' => 11
        ];

        $passwordEncrypted = password_hash($request->input('password'), PASSWORD_BCRYPT, $options);

        $user = new User;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $passwordEncrypted;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->birthday = $request->input('birthday');
        $user->gender_reveal = $request->input('gender_reveal');
        $user->gender = $request->input('gender');
        $user->gender_interest = $request->input('gender_interest');
        $user->photo = $request->input('photo');
        $user->about = $request->input('about');


        $user->save();

        return response()->json($user);
    }

    public function updateUser(Request $request, $identifier): JsonResponse
    {
        $this->validate($request, [
            'username' => 'unique:users',
            'email' => 'email|unique:users',
            'first_name' => '',
            'last_name' => '',
            'oldPassword' => 'required',
            'newPassword' => 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'
        ]);
        if (!self::checkUsernameOrEmailExists($identifier)) {
            return response()->json(self::USER_DONT_EXIST, 401);
        }
        $oldPassword = User::select('password')->where('username', '=', $identifier)->get();
        if (!password_verify($request->input('oldPassword'), $oldPassword->jsonSerialize()[0]['password'])) {
            return response()->json('Wrong password or username', 401);
        }

        $user = User::where('username', '=', $identifier)
            ->orWhere('email', "=", $identifier)->first();
        if ($request->has('username')) {
            $user->username = $request->input('username');
        }
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }
        if ($request->has('newPassword')) {
            $user->password = $request->input('newPassword');
        }
        if ($request->has('first_name')) {
            $user->first_name = $request->input('first_name');
        }
        if ($request->has('last_name')) {
            $user->last_name = $request->input('last_name');
        }
        if ($request->has('birthday')) {
            $user->birthday = $request->input('birthday');
        }
        if ($request->has('gender_reveal')) {
            $user->gender_reveal = $request->input('gender_reveal');
        }
        if ($request->has('gender')) {
            $user->gender = $request->input('gender');
        }
        if ($request->has('gender_interest')) {
            $user->gender_interest = $request->input('gender_interest');
        }
        if ($request->has('photo')) {
            $user->photo = $request->input('photo');
        }
        if ($request->has('about')) {
            $user->about = $request->input('about');
        }

        $user->save();

        return response()->json($user->username . ' - user data successfully updated');
    }

    public function deleteUser($identifier): JsonResponse
    {
        if (!self::checkUsernameOrEmailExists($identifier)) {
            return response()->json(self::USER_DONT_EXIST, 404);
        }
        $user = User::where('username', '=', $identifier)
            ->orWhere('email', "=", $identifier)->first();
        $user->delete();

        return response()->json('Removed successfully.');
    }

    public function index(): JsonResponse
    {
        $users = User::select(['id', 'username', 'email', 'first_name', 'last_name', 'birthday', 'gender'
            , 'gender_reveal', 'gender_interest', 'photo', 'about', 'users_id_match'])->get();

        return response()->json($users);

    }

    public function getUser(string $identifier): JsonResponse
    {
        if (!self::checkUsernameOrEmailExists($identifier)) {
            return response()->json(self::USER_DONT_EXIST, 404);
        }
        $user = User::select(['id', 'username', 'email', 'first_name', 'last_name', 'birthday', 'gender'
            , 'gender_reveal', 'gender_interest', 'photo', 'about', 'users_id_match'])
            ->where('username', '=', $identifier)
            ->orWhere('email', "=", $identifier)->get();

        return response()->json($user);
    }

    public static function checkUsernameOrEmailExists(string $identifier): bool
    {
        $userExist = User::where('username', '=', $identifier)
            ->orWhere('email', "=", $identifier)->exists();
        if ($userExist) {
            return true;
        }
        return false;
    }
}
