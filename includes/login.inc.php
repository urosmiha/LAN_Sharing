<?php
    if (isset($_POST['login-submit'])) {
        require 'dbh.inc.php';

        $mailuid = $_POST['username'];
        $password = $_POST['pswd'];

        if (empty($mailuid) || empty($password)) {
            header("Location: ../login.php?error=emptyfields");
            exit();
        }
        else {
            // Get all the records for users which match provided username and email
            $sql = "SELECT * FROM musers WHERE userName=? OR userEmail=?;";
            $stmt = mysqli_stmt_init($conn);

            // Check if all-good
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../login.php?error=sqlfailed");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($row = mysqli_fetch_assoc($result)) {
                    if (!password_verify($password, $row['pwdUsers'])) {
                        header("Location: ../login.php?error=wrongpassword&username=".$mailuid);
                        exit();
                    }
                    else if (password_verify($password, $row['pwdUsers'])) {
                        // Start the session to keep user logged in
                        session_start();
                        // Store user ID and username
                        $_SESSION['userId'] = $row['userName'];
                        $_SESSION['userUid'] = $row['idUsers'];
                        
                        // SUCCESS! Go to main page
                        header("Location: ../index.php?error=success");
                        exit();
                    }
                    else {
                        header("Location: ../login.php?error=unknownerror");
                        exit();
                    }

                }
                else {
                    header("Location: ../login.php?error=invaliduser");
                    exit();
                }
            }
        }

    }
    else {
        header("Location: ../login.php");
        exit();
    }