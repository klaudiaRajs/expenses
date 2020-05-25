<?php


namespace App\Controllers;


class Migrate extends BaseController
{

    public function Run($password = "")
    {
        if( $password !== getenv('PASS') ){
            return $this->getErrorResponse("Not authorized", self::PATH_AUTH, "Dashboard");
        }

        $migrate = \Config\Services::migrations();

        try
        {
            $migrate->latest();
        }
        catch (\Exception $e)
        {
            echo $e->getMessage();
        }
    }
}