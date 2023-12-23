<?php
namespace Data;

require_once __DIR__ . "/Connection.php";
use Data\ConnectionMySql;
use mysqli;

class RoleData
{

    public mysqli $RoleContext;
    public function __construct()
    {
        $ConnectSQL = new ConnectionMySql();
        $this->RoleContext = $ConnectSQL->Context;
        //$ConnectSQL->disposeConnect();

    }
    //DONE
    public function getAllRoles()
    {
        $result = $this->RoleContext->query(" SELECT * FROM roles");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    //DONE
    public function getRoleById($RoleId)
    {
        $RoleId = $this->RoleContext->real_escape_string($RoleId);
        $result = $this->RoleContext->query(" SELECT * FROM roles WHERE id = $RoleId ");

        return $result->fetch_assoc();
    }

    // DONE
    // roleid = 1 is Role Admin,
    // roleid = 2 is Role normal,
    public function createRole($Rolename, $Description)
    {

        $Rolename = $this->RoleContext->real_escape_string($Rolename);
        $Description = $this->RoleContext->real_escape_string($Description);
        return $this->RoleContext->query("INSERT INTO Role (name, description) VALUES ('$Rolename', '$Description')");
    }
    //DONE
    public function updateRole($RoleId, $Rolename, $Description)
    {
        $Rolename = $this->RoleContext->real_escape_string($Rolename);
        $Description = $this->RoleContext->real_escape_string($Description);

        return $this->RoleContext->query("UPDATE roles SET name='$Rolename', description ='$Description' WHERE id=$RoleId");
    }
    //DONE
    public function deleteRole($RoleId)
    {
        $RoleId = $this->RoleContext->real_escape_string($RoleId);
        $this->RoleContext->query("DELETE FROM roles WHERE id=$RoleId");
    }
}

?>