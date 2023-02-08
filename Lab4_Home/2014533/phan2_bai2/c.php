<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, origin");
  
// include database and object files
include_once './database.php';
include_once './product.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$product = new Product($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get id of product to be edited
    $data = json_decode(file_get_contents("php://input"));

    if (!is_numeric($data->id)) {
        // set response code - 400 bad request
        http_response_code(400);

        // tell the user
        echo json_encode(array("message" => 'Id is not a number'));
        exit;
    }

    // set ID property of product to be edited
    $product->id = $data->id;

    // set product property values
    $product->name = $data->name;
    $product->price = $data->price;
    $product->description = $data->description;
    $product->image = $data->image;

    // update the product
    if ($product->update()) {
        // set response code - 200 ok
        http_response_code(200);

        // tell the user
        echo json_encode(array("message" => "Product was updated."));
    }

    // if unable to update the product, tell the user
    else {
        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to update product."));
    }
}
?>