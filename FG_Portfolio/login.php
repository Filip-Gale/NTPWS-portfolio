<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="contact.css">
    <title>FG</title>
</head>

<body>
<?php 
include 'nav.php';
$msg = "";
include 'connect.php';

if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $lozinka = $_POST['password'];
    $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
    $logiranKorisnik = false;

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        if(mysqli_stmt_num_rows($stmt) == 0) {
            $msg = "Incorrect email or password";
        } else {
            // Bind columns to variables
            mysqli_stmt_bind_result($stmt, $id, $username, $fetched_email, $password, $userRole);
            mysqli_stmt_fetch($stmt);

            // Check if the hashed password matches the input password
            if (password_verify($lozinka, $password)) {
                // Passwords match - proceed with login
                session_start();
                $_SESSION['username'] = $username; // Store username
                $_SESSION['userRole'] = $userRole;
                $logiranKorisnik = true;
            } else {
                // Passwords don't match
                $msg = "Incorrect email or password";
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($dbc);

    // Redirect if logged in successfully
    if ($logiranKorisnik) {
        echo "<script> window.location.assign('gallery.php'); </script>";
    }
}
?>

    <section>
    <article id="forma">
    <h1 id="title">Login</h1>
        <!-- https://formsubmit.co/ -->
        <form action="" method="POST">
            <input id="email" type="email" name="email" placeholder=" Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="submit" value ="Send" id="send" name="send">
        </form>
        <span id="msg"> <?php echo($msg) ?></span>
        <span id="poruka"></span>
    </article>
    </section>
    <footer>
        @honkulus_
    </footer>
    
</body>

<script type="text/javascript">
            document.getElementById("send").onclick= function(event) {
                var slanjeForme= true;

                // Provjera podudaranja lozinki
                var poljePass= document.getElementById("password");
                var pass= document.getElementById("password").value;
                if(pass.length== 0 ) {
                    slanjeForme= false;
                    poljePass.style.border="1px dashed red";
                    document.getElementById("poruka").innerHTML="Enter password!";
                } 
                else{
                    if(slanjeForme){
                        poljePass.style.border="1px solid green";
                        document.getElementById("poruka").innerHTML="";
                    }
                }

                // mail korisnika mora biti unesen
                var poljeIme= document.getElementById("email");
                var ime= document.getElementById("email").value;

                if(ime.length== 0) {
                    slanjeForme= false;
                    poljeIme.style.border="1px dashed red";
                    document.getElementById("poruka").innerHTML="Enter Email!";
                } 
                else{
                    if(slanjeForme){
                        poljeIme.style.border="1px solid green";
                        document.getElementById("poruka").innerHTML="";
                    }
                }

                if(!slanjeForme) {
                    event.preventDefault();
                }
            };
        </script>


<script>
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {myFunction()};

    var body = document.body;

    // Get the navbar
    var title = document.getElementById("title");
    var navbar = document.getElementById("nav");
    // Get the offset position of the navbar
    var sticky = 1;

    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("navBack");

        } else {
            navbar.classList.remove("navBack");
        }
    } 

</script>

</html>