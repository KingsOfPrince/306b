<?php
	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;

    $app->get("/Customers", function ($request, Response $response, $args)  {
		require "util/authentication.php";
		require "customer/list.php";
		return $response;
	});

    $app->get("/Customer/{customer_id}", function (Request $request, Response $response, $args) {
		require "util/authentication.php";
		require "customer/read.php";
		return $response;
	});

	$app->post("/Register", function (Request $request, Response $response, $args) {
		require "customer/register.php";
		return $response;		
	});

	$app->post("/Customer", function (Request $request, Response $response, $args) {
		require "util/authentication.php";
		require "customer/create.php";
		return $response;
	});

    $app->put("/Customer/{customer_id}", function (Request $request, Response $response, $args) {
		require "util/authentication.php";
		require "customer/update.php";
		return $response;
	});

    $app->delete("/Customer/{customer_id}", function (Request $request, Response $response, $args) {
		require "util/authentication.php";
		require "customer/delete.php";
		return $response;
	});
?>