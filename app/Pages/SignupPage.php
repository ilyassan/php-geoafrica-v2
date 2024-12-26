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
            'username' => trim($_POST['username']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'confirm_password' => trim($_POST['confirm-password'])
        ];

        $errors = [
            'username_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
        ];

        // Validate the username
        if(empty($data['username'])){
            $errors['username_err'] = 'Please enter your username.';
        }
        
        // Validate Email
        if(empty($data['email'])){
            $errors['email_err'] = 'Please enter email.';
        }elseif(User::findUserByEmail($data['email'])){
            $errors['email_err'] = 'Email is already used.';
        }

        // Validate Password
        if(empty($data['password'])){
            $errors['password_err'] = 'Please enter password.';
        }elseif(strlen($data['password']) < 6){
            $errors['password_err'] = 'Password must be at least 6 characters.';
        }

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
            $errors['confirm_password_err'] = 'Please confirm password';
        }elseif($data['password'] != $data['confirm_password']){
            $errors['confirm_password_err'] = 'Passwords do not match.';
        }
        
    }
}
