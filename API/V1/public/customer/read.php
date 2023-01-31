<?php
    global $database;

    //Read the entry from the database.
	$result = $database->query("SELECT * FROM customer WHERE user_id = '" . $args["customer_id"] . "'");

	//Return a 404 response if no entry was found by the query.
	if (!$result || $result === true || $result->num_rows == 0) {
		http_response_code(404);
		die("Kein solche Kunde.");
	}

	//Fetch and output the entry.
	$product = $result->fetch_assoc();

	echo json_encode($product);
?>