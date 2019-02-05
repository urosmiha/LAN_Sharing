<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="This is an example. This usually shows in search results.">
        <meta name-viewport content="width=device-width, initial-scale=1">
        <title></title>
    </head>
    <body>
        <header>
            <nav>
                <a href="#">
                    <img src="img/duckling.png" alt="logo">
                </a>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">Portfolio</a></li>
                    <li><a href="index.php">About me</a></li>
                    <li><a href="index.php">Contact</a></li>
                </ul>
                <div>
                    <form action="includes/login.php" method="post">
                        <input type="text" name="mailuid" placeholder="Username/E-mail...">
                        <input type="password" name="pwd" placeholder="Password...">
                        <button type="submit" name="login-submit">Login</button>
                    </form>
                    <a href="signup.php">Signup</a>
                    <form action="includes/logout.php" method="post">
                        <button type="submit" name="logout-submit">Logout</button>
                    </form>
                </div>
            </nav>
        </header>