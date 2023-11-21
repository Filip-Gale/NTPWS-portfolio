<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="games.css">
    <title>FG</title>
</head>

<body>
    <?php
    include 'nav.php';
    ?>
    <h1 id="title">This site is a work in progress... as you can see</h1>
    
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