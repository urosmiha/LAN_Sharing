<?php
    session_start();
    // Reset our session
    session_unset();
    session_destroy();

    // Back to front page
    header("Location: ../index.php")

?>