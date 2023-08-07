<?php
class Database {
    public $servername = "localhost";
    public  $username = "root";
    public $password = "";
    public $dbname = "krishibajar";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        
    }
public function getConnection(){
    $connection =new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    return $connection;

}
    public function searchItems($searchQuery) {
        $sql = "SELECT * FROM items WHERE item_name LIKE ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $searchTerm = "%" . $searchQuery . "%";
            $stmt->bind_param("s", $searchTerm);
            $stmt->execute();
            $result = $stmt->get_result();

            $items = array();
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }

            $stmt->close();
            return $items;
        } else {
            return false;
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>
