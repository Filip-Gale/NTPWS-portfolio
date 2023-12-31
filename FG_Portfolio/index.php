<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="home.css">
    <title>FG</title>
</head>
<body>
<?php
include 'nav.php';
?>
    <h1 id="title">WELCOME :D</h1>
    <section>
        <article class="mobile-columnize">
            <div class="text-container">
                <h2>Your journey starts here</h2>
                <p>So, you want to use my site. I've left you a couple of guidelines below so you know what to look for.</p>
            </div>
            <img src="img/home-first.png" alt="logo">
        </article>
        <article class="mobile-columnize-r">
            <img src="img/home-projects.png" alt="logo">
            <div class="text-container">
                <h2>Projects</h2>
                <p>Projects I made for college and a few <b>websites</b> along the way.</p>
            </div>
        </article>
    </section>

    <div class="picture-Space" id="web-example"></div>

    <section>
        <article class="mobile-columnize">
            <div class="text-container">
                <h2 >Games</h2>
                <p>Mainly the demos I've made in <b>Unity</b>. You can find a list of everything I've learned with each project.</p>
            </div>
            <img src="img/home-games.png" alt="logo">
        </article>
    </section>

    <div class="picture-Space" id="home-games-image"></div>

    <section>
        <article class="mobile-columnize-r">
            <img src="img/home-gallery.png" alt="logo">
            <div class="text-container">
                <h2 >Gallery</h2>
                <p>An assortment of art I've made through the years. You can find anything from <b>digital art</b> and <b>3D</b> to traditional acrylic painting.</p>
            </div>
        </article>
    </section>

    <div class="picture-Space" id="terr"></div>

    <section id="yellow-section">
        <article class="mobile-columnize-r">
            <img src="img/home-about.png" alt="logo">
            <div class="text-container">
                <h2 >About</h2>
                <p>A description of my current <b>skills</b> and frequently asked questions.</p>
            </div>
        </article>
        <article class="mobile-columnize">
            <div class="text-container">
                <h2 >Login</h2>
                <p>Make an <b>account</b> and rate my work... don't be too harsh.</p>
            </div>
            <img src="img/home-login.png" alt="logo">
        </article>
        <article class="mobile-columnize-r">
            <img src="img/home-contact.png" alt="logo">
            <div class="text-container">
                <h2 >Contact</h2>
                <p>A form through which you can send <b>feedback</b>, <b>requests</b> and other <b>questions</b>. </p>
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
    var pictureHeightOffset
    if(screen.width>1200){
        pictureHeightOffset = 400;
    }else{
        pictureHeightOffset = 700;
    }
    console.log(pictureHeightOffset);
    // Get the offset position of the navbar
    var sticky = 1;
    var picture = document.getElementById("web-example");
    var changeBg1 = picture.offsetTop- 400 - picture.offsetHeight;
    picture = document.getElementById("home-games-image");
    var changeBg2 = picture.offsetTop- 400 - picture.offsetHeight;
    picture = document.getElementById("terr");
    var changeBg3 = picture.offsetTop- 400 - picture.offsetHeight;

    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset >= sticky) {
            title.classList.add("titleScroll");
            navbar.classList.add("navBack");

        } else {
            title.classList.remove("titleScroll");
            navbar.classList.remove("navBack");
        }
        if(window.pageYOffset <= changeBg1){
            body.style.backgroundImage = 'url("img/backgroundMain.jpg")';
        }
        if(window.pageYOffset >= changeBg1 && window.pageYOffset <= changeBg2){
            body.style.backgroundImage = 'url("img/backgroundMain2.jpg")';
        }
        if(window.pageYOffset >= changeBg2 && window.pageYOffset <= changeBg3){
            body.style.backgroundImage = 'url("img/backgroundMain3.jpg")';
        }
        if(window.pageYOffset >= changeBg3){
            body.style.backgroundImage = 'url("img/backgroundMain4.jpg")';
        }
    } 

</script>
</html>