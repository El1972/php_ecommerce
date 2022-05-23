<?php

class User
{

    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true; // vse horosho dannie pravilniye
        }
        return false; // znachit dannie nepravilniye. Nujno ih
        // perezaprosit
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true; // esli $email pravilniy, checkEmail
            // vozvrashaet true, inache false
        }
        return false;
    }

    public static function checkEmailExists($email)
    {
        $db = Db::getDbConnection();

        $sql = "SELECT COUNT(*) FROM user WHERE email = :email";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return true; // esli email est, vernem true
        }
        return false; // esli emaila netu v baze dannih vernem false
    }

    public static function register($name, $email, $password)
    {
        $db = Db::getDbConnection();

        $sql = "INSERT INTO user (name, email, password) VALUES (:name, :email, :password)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

// ------------------ End Of Registration Section -----------------

    public static function checkUserData($email, $password)
    {
        $db = Db::getDbConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email);
        $result->bindParam(':password', $password);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        // If session exists, then it returns session id. If it does then it
        // means the user logged in earlier and got remembered in session
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        // if he's not logged in then he'll be redirected to the login page
        header("Location: /user/login");
    }

    public static function isGuest()
    {
        // Here we are checking:
        // If session doesn't exists (first half), then it's a guest.
        // It means, if supposed set session 'user' returns false, meaning
        // (doesn't exists), then it's a guest.
        // Otherwise, (second half) if a session exists, then it's not a
        // guest
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getDbConnection();
            $sql = "SELECT * FROM user WHERE id = :id";

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_STR);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            $result = $result->fetch();

            return $result;
        }
    }

    public static function edit($id, $name, $email, $password)
    {
        $db = Db::getDbConnection();

        $sql = "UPDATE user SET name = :name, email = :email, password = :password WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

}
