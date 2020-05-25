<?php


namespace App\Controllers;


class Ups extends BaseController
{
    public function index()
    {
        $error = $this->session->get('error');

        $this->view('error', [
            'message' => $error['message'],
            'destinationPath' => $error['destinationPath'],
            'destinationName' => $error['destinationName']
        ]);
    }
}