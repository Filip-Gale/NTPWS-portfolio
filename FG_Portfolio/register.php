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

        if (isset($_POST['send'])){
            $email= $_POST['email'];
            $username = $_POST['username'];
            $lozinka= $_POST['password'];
            $hashed_password= password_hash($lozinka, CRYPT_BLOWFISH);
            $razina= 0;
            $registriranKorisnik= false;

            //Provjera postoji li u bazi već korisnik s tim korisničkim imenom
            $sql= "SELECT username FROM users WHERE username = ?";
            $stmt= mysqli_stmt_init($dbc);
            if
            (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 's', $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }
            if(mysqli_stmt_num_rows($stmt) > 0){
                $msg = "User already exists!";
            } else {
                // Ako ne postoji korisnik s tim korisničkim imenom -Registracija korisnika u bazi pazeći na SQL injection
                $sql = "INSERT INTO users (username, email, password, userRole) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($dbc);
                if(mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 'sssd', $username, $email, $hashed_password, $razina);
                    mysqli_stmt_execute($stmt);
                    $registriranKorisnik = true;
                }
            }
            
            mysqli_close($dbc);
            
            // Display the message below the form inputs
            if(!$registriranKorisnik) {
                $msg = "User already exists!";
            } elseif($registriranKorisnik) {
                echo "<script> window.location.assign('login.php'); </script>";
            }
        }
    ?> 

    <section>
    <article id="forma">
    <h1 id="title">Register</h1>
        <!-- https://formsubmit.co/ -->
        <form action="" method="POST">
            <input type="text" name="username"  placeholder="Username" required id="username">
            <input id="email" type="email" name="email" placeholder=" Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="password" name="passRep" id="passRep" placeholder="Repeat password" required>
            <input type="submit" value ="Send" id="send" name="send">
        </form>
        <span id="msg"> <?php echo($msg) ?></span>
        <span id="poruka"></span>
        <a href="login.php">Already have an account?</a>
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
                var poljePassRep= document.getElementById("passRep");
                var passRep= document.getElementById("passRep").value;
                if(pass.length== 0 || passRep.length== 0|| pass!= passRep) {
                    slanjeForme= false;
                    poljePass.style.border="1px dashed red";
                    poljePassRep.style.border="1px dashed red";
                    document.getElementById("poruka").innerHTML="Passwords aren't entered or don't match!";
                } 
                else{
                    if(slanjeForme){
                        poljePass.style.border="1px solid green";
                        poljePassRep.style.border="1px solid green";
                        document.getElementById("poruka").innerHTML="";
                    }
                }

                // mail korisnika mora biti uneseno
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

                // Korisničko ime mora biti uneseno
                var poljeUsername= document.getElementById("username");
                var username= document.getElementById("username").value;
                if(username.length== 0) {
                    slanjeForme= false;
                    poljeUsername.style.border="1px dashed red";
                    document.getElementById("poruka").innerHTML="Enter Username!";
                } else{
                    if(slanjeForme){
                        poljeUsername.style.border="1px solid green";
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