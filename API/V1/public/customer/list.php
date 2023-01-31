<?php
    global $database;

    //Read all entries from the database.
    $result = $database->query("SELECT * FROM customer");

    $customers = array();

    //Put all the entries into an array.
    while ($row = $result->fetch_assoc()) {
        $customers[] = $row;
    }

    echo json_encode($customers);
?>