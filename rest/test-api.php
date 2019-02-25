<?php
    // get the HTTP method, path and body of the request
    $method = $_SERVER['REQUEST_METHOD'];
    
    // create SQL based on HTTP method
    switch ($method) {
        case 'GET':
            echo "GET"; break;
        case 'PUT':
            echo "GET"; break;
        case 'POST':
            echo "GET"; break;
        case 'DELETE':
            echo "GET"; break;
        default:
            break;
    }

    $url = 'test-data.json'; // path to your JSON file
    $data = file_get_contents($url); // put the contents of the file into a variable
    $characters = json_decode($data); // decode the JSON feed

    echo $characters[1]->name;

    if(!empty($_GET["id"])) {
        $id=intval($_GET["id"]);
        echo $id;
    }
    else {
        echo "No id";
    }
?>