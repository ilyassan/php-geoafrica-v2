<?php

class SignupPage extends BasePage
{
    public function index()
    {
        $this->render("signup");
    }

    public function register()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'username' => trim($_POST['firstname']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'confirm_password' => trim($_POST['confirm-password'])
        ];
        
    }
}
