<?php
namespace Data;

require_once __DIR__ . "/Connection.php";
use Data\ConnectionMySql;
use mysqli;

class UserData
{

    public mysqli $UserContext;
    public function __construct()
    {
        $ConnectSQL = new ConnectionMySql();
        $this->UserContext = $ConnectSQL->Context;
        //$ConnectSQL->disposeConnect();

    }
    //DONE
    public function getAllUsers()
    {
        $result = $this->UserContext->query("SELECT * FROM user");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    //DONE
    public function getUserById($userId)
    {
        $userId = $this->UserContext->real_escape_string($userId);
        $result = $this->UserContext->query("SELECT * FROM user WHERE id = $userId");

        return $result->fetch_assoc();
    }

    public function getUserByUsername($username)
    {
        $userId = $this->UserContext->real_escape_string($username);
        $result = $this->UserContext->query("SELECT * FROM user WHERE username = '$username'");

        return $result->fetch_assoc();
    }
    // DONE
    // roleid = 1 is user Admin,
    // roleid = 2 is user normal,
    public function createUser($username, $password, $name, $roleId = 2)
    {

        $username = $this->UserContext->real_escape_string($username);
        $password = $this->UserContext->real_escape_string($password);
        $name = $this->UserContext->real_escape_string($name);
        $roleId = $this->UserContext->real_escape_string($roleId);
        return $this->UserContext->query("INSERT INTO user (userName, passWord, name, roleId) VALUES ('$username', '$password', '$name', $roleId)");
    }
    //DONE
    public function updateUser($userId, $username, $password, $phoneNumber)
    {
        $userId = $this->UserContext->real_escape_string($userId);
        $username = $this->UserContext->real_escape_string($username);
        $password = $this->UserContext->real_escape_string($password);
        $email = $this->UserContext->real_escape_string($phoneNumber);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        return $this->UserContext->query("UPDATE user SET userName='$username', passWord='$hashedPassword', phoneNumber='$phoneNumber' WHERE id=$userId");
    }
    //DONE
    public function deleteUser($userId)
    {
        $userId = $this->UserContext->real_escape_string($userId);
        $this->UserContext->query("DELETE FROM user WHERE id=$userId");
    }
}

?>