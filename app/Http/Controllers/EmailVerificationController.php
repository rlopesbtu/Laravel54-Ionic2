<?php

namespace CodeFlix\Http\Controllers;

use CodeFlix\Repositories\UserRepository;
use Jrean\UserVerification\Traits\VerifiesUsers;

class EmailVerificationController extends Controller
{
    use VerifiesUsers;
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function redirectAfterVerification()
    {
        $this->loginUser();
        return url('/admin/dashboard');
    }

    protected function loginUser(){
        $email =\Request::get('email');
        $user = $this->repository->findByField('email',$email)->first();
            \Auth::login($user);

    }
}
