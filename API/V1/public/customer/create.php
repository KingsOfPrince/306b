<?php
    global $database;

    $data = json_decode(file_get_contents("php://input"), true);

    if (!$data) {
        http_response_code(400);
        die("error");
    }

    if (!isset($data["anrede"]) || !isset($data["vorname"]) || !isset($data["name"]) || !isset($data["geburtsdatum"]) || !isset($data["strasse"]) || !isset($data["haus_nr"]) || !isset($data["stadt"]) || !isset($data["plz"]) || !isset($data["tele_privat"]) || !isset($data["email"])) {
        http_response_code(400);
        die("Sie müssen mindestens die Attribute \"anrede\", \"vorname\", \"name\", \"geburtsdatum\", \"strasse\", \"HausNr.\", \"stadt\", \"plz\", \"Private Telefonnummer\" oder \"Email-Adresse\"."); 
    }

    $result = $database->query("INSERT INTO customer(anrede, vorname, name, geburtsdatum, strasse, haus_nr, stadt, plz, tele_privat, email) VALUES ('" . $data["anrede"] . "', '" . $data["vorname"] . "', '" . $data["name"] . "', '" . $data["geburtsdatum"] . "', '" . $data["strasse"] . "', '" . $data["haus_nr"] . "', '" . $data["stadt"] . "', '" . $data["plz"] . "', '" . $data["tele_privat"] . "', '" . $data["email"] . "')");

    if (!$result) {
        http_response_code(500);
        die("Error.");
    }

    http_response_code(200);
    die();

?>
