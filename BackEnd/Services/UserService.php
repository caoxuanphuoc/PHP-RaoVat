<?php
namespace Service;

require_once __DIR__ . "/../Datas/UserData.php";
use Data\UserData;

class UserService
{
    public $UserData;
    public function __construct()
    {
        $this->UserData = new UserData();
    }
    // return Object in MySQL
    public function Register($username, $password, $name, $roleId)
    {
        //$username, $password, $name, $roleId = 2)
        $users = $this->UserData->getAllUsers();
        foreach ($users as $user) {
            if ($user['userName'] == $username)
                return null;
        }
        echo $name;
        return $this->UserData->createUser($username, $password, $name, $roleId);
    }
    public function Login($username, $password)
    {
        //$username, $password, $name, $roleId = 2)
        $users = $this->UserData->getAllUsers();
        foreach ($users as $user) {
            if ($user['userName'] == $username && $user["passWord"] == $password) {
                return $user;
            }
        }
        return null;
    }
    //retrun true /false
    public function ChangePass($userId, $oldPass, $newPass)
    {
        $user = $this->UserData->getUserById($userId);
        if ($user != null && $user["passWord"] == $oldPass) {
            return $this->UserData->updateUser($userId, $user["userName"], $user["passWord"], $user["phoneNumber"]);
        } else {
            return false;
        }
    }
    public function GetUserById($id)
    {
        //$username, $password, $name, $roleId = 2)
        $user = $this->UserData->getUserById($id);
        return $user;
    }

}
?>