<?php
namespace Service;

require_once __DIR__ . "/../Datas/UserData.php";
require_once __DIR__ . "/RoleService.php";
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
    public function GetUserById($id)
    {
        //$username, $password, $name, $roleId = 2)
        $user = $this->UserData->getUserById($id);
        return $user;
    }
    public function GetAll($page, $pageSize)
    {
        //$username, $password, $name, $roleId = 2)
        $roleSer = new RoleService();
        $users = $this->UserData->getAllUsers();
        foreach ($users as &$user) {
            $role = $roleSer->GetRoleById($user['roleId']);
            $user['RoleName'] = $role['name'];
        }
        $UsersPage = [];
        for ($i = ($page - 1) * $pageSize; $i < $page * $pageSize && $i < count($users); $i++) {
            $UsersPage[] = $users[$i];
        }
        return $UsersPage;
    }
    public function GetRecord()
    {
        return $this->UserData->GetRecord();
    }
    public function UpdateUser($id, $un, $name, $roleId, $password = null)
    {
        $userCur = $this->GetUserById($id);
        $userCur['userName'] = $un;
        $userCur['name'] = $name;
        $userCur['roleId'] = $roleId;
        if ($password != null)
            $userCur['passWord'] = $password;
        $user = $this->UserData->updateUser($userCur["id"], $userCur["roleId"], $userCur["userName"], $userCur["passWord"], $userCur["name"], $userCur["phoneNumber"]);
        return $user;
    }
    public function Delete($id)
    {
        $this->UserData->deleteUser($id);
    }
}
?>