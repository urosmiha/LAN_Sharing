<?php
    require "header.php";
?>

    <main>
        <?php
            if (isset($_SESSION['userId'])) {
                echo "<p>'You are logged in.</p>";
            }
            else {
                header("Location: login.php");
                exit();
            }
        ?>
    </main>

<?php
    require "footer.php";
?>