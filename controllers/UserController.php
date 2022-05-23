<?php

require_once ROOT . '/models/User.php';

class UserController
{

    public function actionRegister()
    {

        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            // first form of verification

            // zdes mi proveryaem pravilnost napisaniya

            // if (User::checkName($name)) { // zdes mi proverjayem
            // pravilnoe li imya
            //     echo '<br> $name ok';         <----- returns true
            // } else {
            //     $errors[] = 'Wrong name';     <----- returns false
            // }

            // if (User::checkEmail($email)) { // zdes mi proverjayem
            // pravilniy li email
            //     echo '<br> $email ok';
            // } else {
            //     $errors[] = 'Wrong email';
            // }

            // if (User::checkPassword($password)) { // zdes mi
            // proverjayem pravilniy li parol
            //     echo '<br> $password ok';
            // } else {
            //     $errors[] = 'Password can\'t be shorter than 6 characters';
            // }

            // second form of verification

            // means: if !User::checkName($name) is not
            // true. If name entered wrong, then it'll
            // display error
            if (!User::checkName($name)) {
                $errors[] = 'Name can\'t be shorter than 2 symbols';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Incorrect form of email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Password can\'t be shorter than 6 characters';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'This email already exists';
            }

            if ($errors == false) { // <--- esli oshibok het !!!, to
                // zdes mi mojem obrabativat formu dalshe

                $result = User::register($name, $email, $password);
            }

        }
        require_once ROOT . '/views/register/view.php';

        return true;

    }

    public function actionLogin()
    {
        $name = '';
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Wrong name';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Wrong email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Password can\'t be shorter than 6 characters';
            }

            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = 'Wrong info to enter the site';
            } else {
                User::auth($userId);

                header("Location: /cabinet/");
            }
        }

        require_once ROOT . '/views/login/view.php';

        return true;

    }

    public function actionLogout()
    {
        // here we're deleting the session
        unset($_SESSION['user']);
        header("Location: /");
    }

}
