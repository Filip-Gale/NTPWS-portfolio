<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="gallery.css">
    <title>FG</title>
</head>

<body>
   
    <?php
        include 'nav.php';
    ?>
    
    <h1 id="title">Gallery</h1>
    <section id="category-selector">
        <div class="img-category" onclick="digitalneSlike(`digital`);">Digital painting</div>
        <div class="img-category" onclick="digitalneSlike(`3D`);">3D</div>
        <div class="img-category" onclick="digitalneSlike(`logo`);">logo</div>
    </section>
    <?php
        include 'connect.php';
        if (isset($_SESSION['userRole'])) {
            $userRole = $_SESSION['userRole'];
            if ($userRole == 1) {
                echo '
                <section id="upload-section">
                    <input type="file" id="uploadImage" accept="image/*">
                    <button onclick="uploadImage(document.getElementById(\'targetElement\').textContent)">Upload Image to <span id="targetElement"></span></button>
                </section>';

                // Adding JavaScript code within PHP to set the text content for targetElement if it exists
                echo '
                <script>
                    var targetSpan = document.getElementById(\'targetElement\');
                    if (targetSpan) {
                        targetSpan.textContent = "Digital";
                    } else {
                        console.log(\'targetSpan element not found.\');
                    }
                </script>';
            }
        }
    ?>


    <section id="imageSection">
    </section>
    <footer>
        @honkulus_
    </footer>
    <script src="gallery.js"></script>
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