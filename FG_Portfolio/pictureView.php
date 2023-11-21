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
    <link rel="stylesheet" href="pictureView.css">
    <title>FG</title>
</head>

<body>
<?php
include 'nav.php';
?>
    
<h1 id="title"></h1>
    <section>
        <?php
        if (isset($_SESSION['userRole'])) {
            $userRole = $_SESSION['userRole'];
            if ($userRole == 1) {
                echo '
                <div id="admin-actions">
                    <article>
                        <input type="text" id="name-change-container" placeholder="new name">
                        <button id="UpdateName" onclick="editImageName()">Change image name</button>
                    </article>
                    <article>
                        <button id="delete" onclick="deleteImage()">Delete image</button>
                    </article>
                </div>
                ';
            }
        }
        ?>
        
        <img src="" alt="Selected Picture" id="theImage">
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

<script>
        const imageId = localStorage.getItem('imageId');
        const name = localStorage.getItem('name');
        const url = localStorage.getItem('url');
        const oN = localStorage.getItem('originalName');
        if (imageId) {
            console.log('Image ID:', imageId);
            console.log('Image name:', name);
            console.log('Image URL:', url);
            console.log('Image Original Name:', oN);

            const title = document.getElementById("title");
            title.textContent = name;
            const mainImage = document.getElementById("theImage");
            mainImage.src = url;
        }
    </script>
    <script src="pictureView.js"></script>

</html>