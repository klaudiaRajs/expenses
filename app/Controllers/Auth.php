<?php


namespace App\Controllers;


use App\Helpers\AuthHelper;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        return $this->view('logIn');
    }

    public function RegisterForm()
    {
        return $this->view('register');
    }

    public function Register()
    {
        $userData = [
            'login' => $this->request->getPost('login'),
            'password' => md5($this->request->getPost('password')),
            'email' => $this->request->getPost('email'),
            'period_start_day' => $this->request->getPost('period_start_day'),
            'income' => intval($this->request->getPost('income'))
        ];

        /** @var UserModel $this ->userModel */
        $this->userModel->save($userData);

        $this->authService->authenticate($this->request->getPost('login'), $this->request->getPost('password'));

        return redirect()->to(self::PATH_DASHBOARD);
    }

    public function LogIn()
    {
        $isLoggedIn = $this->authService->authenticate(
            $this->request->getPost('login'),
            $this->request->getPost('password')
        );

        if ($isLoggedIn) {
            return redirect()->to(self::PATH_DASHBOARD);
        }

        return redirect()->to(self::PATH_AUTH);
    }

    public function LogOut()
    {
        $this->session->remove(self::LOGGED_IN_SESSION_INDEX_KEY);
        $this->session->remove(self::USER_INDEX_NAME);
        return redirect()->to(self::PATH_AUTH);
    }
}