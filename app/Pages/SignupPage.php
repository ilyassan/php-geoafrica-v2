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

        // Make sure errors are empty (There's no errors)
        if(empty($errors['username_err']) && empty($errors['email_err']) && empty($errors['password_err']) && empty($errors['confirm_password_err'])){
            // Hash Password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            $user = new User(null, $data['username'], $data['email'], $data['password'],User::$visitorRoleId);

            // Register user
            if($user->save()){
                // Register success
                flash('success', 'You are registered and can log in.');
                redirect('login');
            }else{
                die('Something went wrong');
            }
        }
        else{
            // Load view with errors
            flash("error", array_first_not_null_value($errors));
            redirect('signup');
        }
        
    }
}
