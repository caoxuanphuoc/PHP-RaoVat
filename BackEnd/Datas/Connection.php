<?php
namespace Data;

use mysqli;

class ConnectionMySql
{
    public mysqli $Context;
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "123qwe";
        $dbname = "raovatdb";

        // Create connection
        $this->Context = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if (!$this->Context) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            echo "Connected successfully";
        }
    }
    
    public function disposeConnect(){
        if (!$this->Context) {
            die("Connection not open ");
        } else {
            $this->Context->close();
            echo "Close Connected successfully";
        }
    }
    
}
?>