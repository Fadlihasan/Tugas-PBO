<?php
class DbConfig
{
    private $_host = 'localhost';
    private $_username = 'usr';
    private $_password = '';
    private $_database = 'db_pkch';
    
    protected $connection;

    public function __construct()
    {
        if (!isset($this->connection)){
            $this->connection = new mysqli($this->_host, $this-> _username, $this-> _password, $this-> _database);

            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }
        }
        return $this->connection;
    }
}
$conn = mysqli_connect('localhost','usr','','db_pkch');

function query($query) {
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

?>