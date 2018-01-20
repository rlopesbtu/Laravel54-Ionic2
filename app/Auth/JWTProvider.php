<?php
namespace CodeFlix\Auth;
use Dingo\Api\Auth\Provider\Authorization;
use Dingo\Api\Routing\Route;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWT;


class JwtProvider extends Authorization
{
    /**
     * @var JWT
     *
     * @return string
     */
    public function getAuthorizationMethod()
    {
        return 'bearer';
    }

    public function __construct()
    {
        $this->jwt = $jwt;
    }


    /**
     * Authenticate the request and return the authenticated user instance.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Dingo\Api\Routing\Route $route
     *
     * @return mixed
     */
    public function authenticate(Request $request, Route $route)
    {
        try {
            return \Auth::guard('api')->authenticate();
        }catch (AuthenticationException $exception){
            $this->refreshToken();
            return \Auth::guard('api')->user();
        }

    }

    protected function refreshToken(){
        $token = $this->jwt->parseToken()->refresh();
        $this->jwt->setToken($token);

    }

}