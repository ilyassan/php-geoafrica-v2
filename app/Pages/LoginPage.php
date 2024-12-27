<?php

class LoginPage extends BasePage
{
    public function __construct(){}

    public function index()
    {
        if (isLoggedIn()) {
            redirect("");
        }

        $this->render("login");
    }
    public function login()
    {
        if (isLoggedIn()) {
            redirect("");
        }

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
        ];
        $errors = [
            'email_err' => '',
            'password_err' => '',
        ];


        // Validate Email
        if (empty($data['email'])) {
            $errors['email_err'] = 'Please enter email.';
        } elseif (!User::findUserByEmail($data['email'])) {
            $errors['email_err'] = 'Password or email is incorrect.';
        }
        // validate password
        if (empty($data['password'])) {
            $errors['password_err'] = 'Please enter password.';
        }

        // Make sure errors are empty (There's no errors)
        if( empty($errors['email_err']) && empty($errors['password_err']) ){

            $user  = User::findUserByEmail($data['email']);
            
            $pwdIsValid = password_verify($data["password"],$user->getPassword());
            
            if(!$pwdIsValid){
                flash('error', 'Email or password incorrect!');
                redirect("login");
            }
            $user->createSession();
            flash("success", "Logged in successfully :)");
            redirect("");
        }
        else{
            // Load view with errors
            flash("error", array_first_not_null_value($errors));
            redirect('login');
        }

    }
}
