<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use League\Flysystem\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Repositories\UserRepository;
use Validator;
use Response;
use Illuminate\Foundation\Auth\ResetsPasswords;
class AuthenticateController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $userRepository;

    use ResetsPasswords;


    public function __construct(UserRepository $userRepo)
    {
//        $this->middleware('auth');
        $this->userRepository = $userRepo;
    }

    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }

    public function signup(Request $request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'] ? $request['username'] : $request['email'],
            'phone' => $request['phone'],
            'gender' => $request['gender'],
            'address' => $request['address'],
            'dob' => $request['dob'],
            'password' => $request['password']
        ];
        $validator = Validator::make($request->all(), User::$rules);
        if ($validator->fails()) {
            $errors = $validator->messages();
            return response()->json(compact('errors'), 400);
        } else {
//process the request
        }
        try {
            $user = User::create($data);
        } catch (Exception $e) {
            return response::json(['error' => 'User already exists.'], response::HTTP_CONFLICT);
        }
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));

    }

    public function getUserDetail($id)
    {
        $user = User::whereId($id)->first();

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        return $this->sendResponse($user, 'User retrieved successfully');
    }

    public function saveUserDetail($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        if ($user = $this->userRepository->update($request->all(), $id)) {

            return $this->sendResponse($user, 'User updated successfully');
        } else {
            return response::json(['error' => 'Could not update user.'], response::HTTP_CONFLICT);
        }
    }

    public function send_verification_code($phone)
    {
        $code = str_random(4);
        app('App\Http\Controllers\API\SMSController')->send($phone, 'Your MyMAoni Validation code is ' . $code);

        return response::json(compact('code'));
    }

    public function password_reset(Request $request)
    {

    }
}