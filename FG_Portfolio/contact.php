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
    ?>
    
    <section>
    <article id="forma">
    <h1 id="title">GET IN TOUCH</h1>
        <h2>Through this form</h2>
        <!-- https://formsubmit.co/ -->
        <form action="https://formsubmit.co/filipgale6@gmail.com" method="POST">
            <input type="hidden" name="_template" value="table">
            <input type="hidden" name="_subject" value="Nova rezervacija!">
            <input type="hidden" name="_next" value="http://localhost/FG_Portfolio/potvrda.php">
            <input type="hidden" name="_captcha" value="false">
            <input type="text" name="name" class="form-control" placeholder="Personal or Company name" required id="name">
            <input type="email" name="email" class="form-control" placeholder=" Email" required>
            <textarea placeholder="Your Message" class="form-control" name="message" rows="0" cols="0" required></textarea>
            <input type="submit" value ="Send" id="button">
        </form>
        <div id="alt">
            <h2>or other:</h2>
            <p>Tel: +385 91 3606 988</p>
            <p>Email: filipgale6@gmail.com</p>
            <a href="https://www.instagram.com/honkulus_/" target="_blank"><p>Instagram</p></a>
        </div>
    </article>
    </section>
    <footer>
        @honkulus_
    </footer>
</body>
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