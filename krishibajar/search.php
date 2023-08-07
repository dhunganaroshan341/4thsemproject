<?php
require_once "database.php";

if (isset($_GET['search_query'])) {
    $searchQuery = $_GET['search_query'];
    
    $db = new Database();
    $items = $db->searchItems($searchQuery);

    if ($items !== false) {
        foreach ($items as $item) {
            echo "Item: " . $item['item_name'] . "<br>";
        }
    } else {
        echo "Error in the SQL statement.";
    }

    $db->closeConnection();
}
?>
