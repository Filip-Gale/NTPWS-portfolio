<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="about.css">
    <title>FG</title>
</head>

<body>
    <?php
        include 'nav.php';
    ?>
    <h1 id="title">ABOUT ME</h1>
    <section>

    <article>
        <h2>Filip Gale</h2>
        <div id="images">
            <img src="img/faca.jpg" alt="ja">
            <img src="img/me_2024.jpg" alt="ja">
        </div>
        <p>An Artist, a Programmer, and an aspiring Game Developer passionately bridging the gap between creativity and technology.</p>
        <h2 id = "cv"><a href="CV.pdf" target="_blank" title="Read PDF">My CV (HR)</a></h2>
    </article>
    

    


    <article>
        <h2>Art in Pixels, Code in Lines</h2>
        <p>While pursuing a Master's Degree, I'm passionately focused on mastering the craft of game development.
            From designing engaging gameplay to creating immersive environments, I am driven by the endless possibilities 
            to create experiences that captivate and inspire.</p>
            <br>
             <p> Whether you're here for the art, the tech, or the world-building within games,
             I invite you to reach out and contact me.</p>

             <h2 id = "contact"><a href="contact.php">Contact</a></h2>
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
            title.classList.add("titleScroll");
            navbar.classList.add("navBack");

        } else {
            title.classList.remove("titleScroll");
            navbar.classList.remove("navBack");
        }
    } 

</script>

</html>