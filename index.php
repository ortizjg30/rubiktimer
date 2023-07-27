<?php
header("Content-Type: application/json");
require('control/scrambler.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the data sent in the POST request
    $data = json_decode(file_get_contents("php://input"), true);
    $response;
    // Check if 'cubeType' key exists in the data
    if (isset($data['cubeType'])) {
        $cubeType = $data['cubeType'];
        switch ($cubeType) {
            case '222':
                http_response_code(200);
                $scrambler = new Scrambler($cubeType);
                $s = $scrambler->gen_scramble();
                $response = array(
                    "status" => "success",
                    "message" => "Scramble made successfully",
                    "scramble" => $s
                );
                break;
            
            case '333':
                http_response_code(200);
                $scrambler = new Scrambler($cubeType);
                $s = $scrambler->gen_scramble();
                $response = array(
                    "status" => "success",
                    "message" => "Scramble made successfully",
                    "scramble" => $s
                );
                break;
            
            case '444':
                http_response_code(200);
                $scrambler = new Scrambler($cubeType);
                $s = $scrambler->gen_scramble();
                $response = array(
                    "status" => "success",
                    "message" => "Scramble made successfully",
                    "scramble" => $s
                );
                break;
            
            case '555':
                http_response_code(200);
                $scrambler = new Scrambler($cubeType);
                $s = $scrambler->gen_scramble();
                $response = array(
                    "status" => "success",
                    "message" => "Scramble made successfully",
                    "scramble" => $s
                );
                break;
            
            case '666':
                http_response_code(200);
                $scrambler = new Scrambler($cubeType);
                $s = $scrambler->gen_scramble();
                $response = array(
                    "status" => "success",
                    "message" => "Scramble made successfully",
                    "scramble" => $s
                );
                break;
            
            case '777':
                http_response_code(200);
                $scrambler = new Scrambler($cubeType);
                $s = $scrambler->gen_scramble();
                $response = array(
                    "status" => "success",
                    "message" => "Scramble made successfully",
                    "scramble" => $s
                );
                break;
            
            default:
                $response = array(
                    "status" => "error",
                    "message" => "must be a valid value."
                );
                // Set the HTTP response code to 400 (Bad Request)
                http_response_code(400);
                // Send the error response back to the client
                break;
        }
        echo json_encode($response);
    } else {
        // If 'cubeType' key is missing, return an error message
        $response = array(
            "status" => "error",
            "message" => "missing in the request data."
        );

        // Set the HTTP response code to 400 (Bad Request)
        http_response_code(400);

        // Send the error response back to the client
        echo json_encode($response);
    }
} else {
    // If the request method is not POST, return an error message
    $response = array(
        "status" => "error",
        "message" => "Invalid request method. Only POST requests are allowed."
    );

    // Set the HTTP response code to 405 (Method Not Allowed)
    http_response_code(405);

    // Send the error response back to the client
    echo json_encode($response);
}
?>