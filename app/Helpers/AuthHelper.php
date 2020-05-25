<?php


namespace App\Helpers; 

use App\Entities\User;
use App\Models\UserModel;

class AuthHelper
{
    private $session;
    const LOGGED_IN_INDEX_NAME = 'loggedIn';
    const USER_INDEX_NAME = 'user';

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function authenticate(string $login, string $password)
    {
        $userModel = new UserModel();
        /** @var User $user */
        $user = $userModel->where('login', $login)->where('password', md5($password))->first();

        if( !$user ){
            return false;
        }

        $this->session->set([self::LOGGED_IN_INDEX_NAME => true]);
        $this->session->set([self::USER_INDEX_NAME => $user]);
        return true;
    }

    public function isLoggedIn()
    {
        return $this->session->has(self::LOGGED_IN_INDEX_NAME);
    }

    public static function currentUser()
    {
        $session = \Config\Services::session();
        return $session->get(self::USER_INDEX_NAME);
    }
}