<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Rebeca Gruber</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo url('/assets/css/style.css') ?>">
    </head>
    <body>
        <nav>
            <div class="logos">
                <a href=""><img src="assets/svg/icon_linkedin.svg" alt="logo linkedin"></a>
                <a href=""><img src="assets/svg/icon_git.svg" alt="logo github"></a>
            </div>
        </nav>
        <header>
            <h1>Rebeca<br>
                <span>GRUBER</span>
            </h1>
            <p>développeuse web
                <br>graphiste
            </p>
            <a href="">
                <img src="assets/svg/icon_fleche_bleu.svg" alt="icône flèche" id="fleche">
            </a>
        </header>
<!--         <div class="textureCode">
            <div class="code">
                <img src="assets/svg/code.svg" alt="dessin code">
            </div>
        </div> -->
        <section class="menu">
            <a href="<?php echo url('/about') ?>">
                <p>About me</p>
                <img src="assets/svg/icon_fleche_bleu.svg" alt="icône flèche">
            </a>
            <a href="<?php echo url('/infos') ?>">
                <p>Infos</p>
                <img src="assets/svg/icon_fleche_bleu.svg" alt="icône flèche">
            </a>
            <a href="<?php echo url('/projets') ?>">
                <p>Projets</p>
                <img src="assets/svg/icon_fleche_bleu.svg" alt="icône flèche">
            </a>
            <a href="<?php echo url('/contact') ?>">
                <p>Contact</p>
                <img src="assets/svg/icon_fleche_bleu.svg" alt="icône flèche">
            </a>

        </section>
    </body>
</html>