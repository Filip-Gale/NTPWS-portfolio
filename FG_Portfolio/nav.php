<?php
session_start();
if (isset($_SESSION['userRole'])) {
    $option = "Logout";
    $site = "logout.php";
}
else{
    $option = "Login";
    $site="register.php";
}

echo '
<nav id="nav">
    <div id="nav-left-side">
        <ul>
            <a href="games.php"><li>Games</li></a>
            <a href="gallery.php"><li>Gallery</li></a>
            <a href="projects.php"><li>Projects</li></a>
        </ul>
    </div>
    <a href="index.php">
        <img src="img/logo.png" alt="menu" class="navImg" id="logo">
    </a>
    <div id="nav-right-side">
        <ul>
            <a href="contact.php"><li>Contact</li></a>
            <a href="about.php"><li>About</li></a>
            <a href="'.$site.'"><li>'. $option .'</li></a>
        </ul>
    </div>
</nav>';
?>
