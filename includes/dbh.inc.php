<?php
    // Give information to connect to database

    // IP address of the machine we are running server on
    $servername = "localhost";

    // Credential for login in for server
    $dBUsername = "root";
    $dBPassword = "";

    // Name of the database
    $dBName = "muddHome";

    // make connection
    $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

    if (!$conn) {
        die("Connection to database failed. Reason: ".mysqli_connect_error());
    }