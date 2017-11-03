<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Data\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller {
    /**
     * @var $user
     */
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function login(Request $request) {
        $token = app('auth')->attempt($request->only('email', 'password'));
        if($token) {
            return response()->json(compact('token'));
        }
        return $this->responseError("Invalid email or password");
    }

    public function register(Request $request) {
        $validateValidate = $this->validateRequest($request->all(),[
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'name' => 'required'
        ]);
        if($validateValidate === true) {
            $this->user->createUser($request->all());
            return $this->responseSuccess();
        }
        return $this->responseError($validateValidate, 400);
    }

    public function getUsers() {
        return $this->responseSuccess($this->user->findAll());
    }

}
