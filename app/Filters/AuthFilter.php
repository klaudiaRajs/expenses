<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(\CodeIgniter\HTTP\RequestInterface $request)
    {
        $session = \Config\Services::session();
        if( !$session->has('loggedIn')){
            return redirect()->to('/Auth');
        }

        return $request;
    }

    public function after(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response){}
}