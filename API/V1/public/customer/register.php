<?php
  global $database;

	$data = json_decode(file_get_contents("php://input"), true);

	//Return a 400 response if no category information was provided in the request body.
	if (!$data) {
		http_response_code(400);
		die("Please provide the username and passwort information as a correct JSON object in the request body.");
	}

	//Make sure the required fields are provided.
	if (!isset($data["username"]) || !isset($data["passwort"]) || !isset($data["user_id"])) {
		http_response_code(400);
		die("You must provide the attributes \"username\", \"passwort\" and \"User_ID\".");
	}

	//Insert the data into the database.
  $result = $database->query("INSERT INTO register(user_id, username, passwort) VALUES ('" . $data["user_id"] . "','" . $data["username"] . "', '" . $data["passwort"] . "')");
  
	//Return a 500 response if there was an error with the query.
	if (!$result) {
		http_response_code(500);
		die("Error.");
	}

	//Return a 201 response if the entry was successfully created.
	http_response_code(201);
	die();
?>
