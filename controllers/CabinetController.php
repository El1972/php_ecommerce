<?php

require_once ROOT . '/models/User.php';

class CabinetController
{

    public function actionIndex()
    {

        // it gives an answer whether the user is logged in or not
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once ROOT . '/views/cabinet/cabinet_view.php';

        return true;

    }

    public function actionEdit()
    {

        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user['name'];
        $email = $user['email'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Name can\'t be shorter than 2 symbols';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Name can\'t be shorter than 2 symbols';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Password can\'t be shorter than 6 symbols';
            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $email, $password);
            }
        }
        require_once ROOT . '/views/cabinet/edit.php';

        return true;
    }

}
