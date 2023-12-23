<?php
namespace Service;

require_once __DIR__ . "/../Datas/RoleData.php";
use Data\RoleData;

class RoleService
{
    public $RoleData;
    public function __construct()
    {
        $this->RoleData = new RoleData();
    }
    public function Create($Rolename, $Description)
    {
        //$username, $password, $name, $roleId = 2)
        $Role = $this->RoleData->createRole($Rolename, $Description);
        return $Role;
    }
    public function GetAll()
    {
        //$username, $password, $name, $roleId = 2)
        $Roles = $this->RoleData->getAllRoles();
        return $Roles;
    }
    public function GetRoleById($id)
    {
        //$username, $password, $name, $roleId = 2)
        $Role = $this->RoleData->getRoleById($id);
        return $Role;
    }
    public function Update($RoleId, $Rolename, $Description)
    {
        //$username, $password, $name, $roleId = 2)
        $Roles = $this->RoleData->updateRole($RoleId, $Rolename, $Description);
        return $Roles;
    }
    public function Delete($RoleId)
    {
        $this->RoleData->deleteRole($RoleId);
    }


}
?>