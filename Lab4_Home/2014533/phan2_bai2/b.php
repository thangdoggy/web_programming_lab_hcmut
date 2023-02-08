<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once './database.php';
  
// instantiate product object
include_once './product.php';
  
$database = new Database();
$db = $database->getConnection();
  
$product = new Product($db);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get posted data
    $data = json_decode(file_get_contents("php://input"));

    // make sure data is not empty
    if (
        !empty($data->name) &&
        !empty($data->price) &&
        !empty($data->description) &&
        !empty($data->image)
    ) {
        if (strlen($data->name) < 5 || strlen($data->name) > 40) {
            // set response code - 400 bad request
            http_response_code(400);

            // tell the user
            echo json_encode(array("message" => 'Name must be between 5 and 40 characters long!'));
            exit;
        }

        if (strlen($data->description) > 5000) {
            // set response code - 400 bad request
            http_response_code(400);

            // tell the user
            echo json_encode(array("message" => 'Description is too long!'));
            exit;
        }

        if (!is_numeric($data->price)) {
            // set response code - 400 bad request
            http_response_code(400);

            // tell the user
            echo json_encode(array("message" => 'Price is not a number'));
            exit;
        }

        if (strlen($data->image) > 255) {
            // set response code - 400 bad request
            http_response_code(400);

            // tell the user
            echo json_encode(array("message" => 'Image link is too long!'));
            exit;
        }

        // set product property values
        $product->name = $data->name;
        $product->price = $data->price;
        $product->description = $data->description;
        $product->image = $data->image;

        // create the product
        if ($product->create()) {
            // set response code - 201 created
            http_response_code(201);

            // tell the user
            echo json_encode(array("message" => "Product was created."));
        }

        // if unable to create the product, tell the user
        else {
            // set response code - 503 service unavailable
            http_response_code(503);

            // tell the user
            echo json_encode(array("message" => "Unable to create product."));
        }
    }

    // tell the user data is incomplete
    else {
        // set response code - 400 bad request
        http_response_code(400);

        // tell the user
        echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
    }
}
?>

