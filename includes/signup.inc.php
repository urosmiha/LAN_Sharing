<?php
    if (isset($_POST['signup-submit'])) {
        
        // Connect to database
        require 'dbh.inc.php';

        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $email = $_POST['email'];
        $username = $_POST['uname'];
        $psw = $_POST['psw'];
        $pswRepeat = $_POST['repsw'];

        // Check if any of the fields is empty
        if (empty($firstName) || empty($lastName) || empty($username) || empty($email) || empty($psw) || empty($pswRepeat)) {
            // Do not delete remove correctly inserted fields. Expecption for passwords.
            header("Location: ../signup.php?error=emptyfields&fname=".$firstName."&lname=".$lastName."&email=".$email."&uname=".$username);
            exit();
        } // Check if email is valid
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=invalidemail&fname".$firstName."&lname=".$lastName."&email=&uname=".$username);
            exit();
        } // Check if username is valid
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../signup.php?error=invalidusername&fname".$firstName."&lname=".$lastName."&email=".$email);
            exit();
        } // Check if repeat password and password match
        else if ($psw !== $pswRepeat) {
            header("Location: ../signup.php?error=nopswmatch&fname".$firstName."&lname=".$lastName."&email=".$email."&uname=".$username);
            exit();
        }
        else {
            // Check if username is taken. Make sure to use placeholder (?)
            $sql = "SELECT userName FROM users WHERE userName=?";
            $statement = mysqli_stmt_init($conn);

            // Check if it's safe to execute the sql command.
            if (!mysqli_stmt_prepare($statement, $sql)) {
                header("Location: ../signup.php?error=sqlerror&fname=".$firstName."&lname=".$lastName."&email=".$email."&uname=".$username);
                exit();
            }
            else {
                mysqli_stmt_bind_param($statement, "s", $username);
                mysqli_stmt_execute($statement);
                mysqli_stmt_store_result($statement);
                // Check if username already exists
                $resultCheck = mysqli_stmt_num_rows($statement);
                if ($resultCheck > 0) {
                    header("Location: ../signup.php?error=usertaken&fname".$firstName."&lname=".$lastName."&email=".$email);
                    exit();
                }
                else {
                    $sql = "INSERT INTO users (userName, firstName, lastName, userEmail, pwdUsers, userPrivelage) VALUES (?, ?, ?, ?, ?, ?)";
                    $statement = mysqli_stmt_init($conn);
                    // Check if it's safe to execute the sql command.
                    if (!mysqli_stmt_prepare($statement, $sql)) {
                        header("Location: ../signup.php?error=sqlerror&fname=".$firstName."&lname=".$lastName."&email=".$email."&uname=".$username);
                        exit();
                    }
                    else {

                        $hashedPwd = password_hash($psw, PASSWORD_DEFAULT);
                        $userPrivelage = "User";

                        mysqli_stmt_bind_param($statement, "ssssss", $username, $firstName, $lastName, $email, $hashedPwd, $userPrivelage);
                        mysqli_stmt_execute($statement);
                        header("Location: ../signup.php?error=success");
                        exit();
                    }
                }
            }
        }
        // Close connections.
        mysqli_stmt_close($statement);
        mysqli_close($conn);
    }
    else {
        header("Location: ../signup.php");
        exit();
    }
