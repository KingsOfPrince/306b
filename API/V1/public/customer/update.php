<?php
global $database;

$data = json_decode(file_get_contents("php://input"), true);

//Return a 400 response if no product information was provided in the request body.
if (!$data) {
    http_response_code(400);
    die("Bitte geben Sie die Kundeninformationen als korrektes JSON-Objekt im Anfragetext an.");
}

//First try to read the existing product information.
$result = $database->query("SELECT * FROM customer WHERE user_id = " . $args["customer_id"] . "");

//If the product does not exist, create it. Otherwise just update the information.
if (!$result || $result === true || $result->num_rows == 0) {
        http_response_code(404);
        die("Keine solche Kunden.");
}

else {
		//Generate the update query.
		$query = "";

		foreach ($data as $key => $value) {
			if ($query != "") {
				    $query .= ", ";
			}
			$query .= $key . " = " . ($value !== null ? "'" . $value . "'" : "NULL");
		}

		//Update the entry in the database.
		$result = $database->query("UPDATE customer SET " . $query . " WHERE user_id = '" . $args["customer_id"] . "'");

		//Return a 500 response if the entry could not be updated in the database.
		if (!$result) {
			http_response_code(500);
			die("Error.");
		}
	}
?>