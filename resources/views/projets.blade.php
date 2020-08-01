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
        <div class="headerGeneric">
            <img src="assets/svg/icon-menu.svg" alt="icône menu" id="btnMenu">
            <div class="menuDepliant">
                <img src="assets/svg/icon-fermer.svg" alt="icône fermer" id="btnFermer">
                <ul>
                    <li><a href="<?php echo url('/') ?>">Accueil</a></li>
                    <li><a href="<?php echo url('/about') ?>">À propos</a></li>
                    <li><a href="<?php echo url('/infos') ?>">Infos</a></li>
                    <li><a href="<?php echo url('/projets') ?>">Projets</a></li>
                    <li><a href="<?php echo url('/contact') ?>">Contact</a></li>
                </ul>
            </div>
        </div>
        <section id="realisations" class="container">
            <h2>Mes réalisations</h2>
            <div id="mesprojets">
                <div class="projets">
                    <img src="assets/images/hellocolis.jpg" alt="hellocolis"/>
                    <div class="mesBoutons">
                        <a href="" class="bouton">Voir projet</a>
                    </div>
                </div>
                <div class="projets">
                    <img src="assets/images/martseille.jpg" alt="martseille" class="monImage"/>
                    <div class="mesBoutons">
                        <a href="" class="bouton">Voir projet</a>
                    </div>
                </div>
                <div class="projets">
                    <img src="assets/images/grossnounours.jpg" alt="grossnounours"/>
                    <div class="mesBoutons">
                        <a href="" class="bouton">Voir projet</a>
                    </div>
                </div>
                <div class="projets">
                    <img src="assets/images/snack.jpg" alt="snack"/>
                    <div class="mesBoutons">
                        <a href="" class="bouton">Voir projet</a>
                    </div>
                </div>
                <div class="projets">
                    <img src="assets/images/treize.jpg" alt="treize espace coworking"/>
                    <div class="mesBoutons">
                        <a href="" class="bouton">Voir projet</a>
                    </div>
                </div>
                <div class="projets">
                    <img src="assets/images/garage.jpg" alt="garage casablanca"/>
                    <div class="mesBoutons">
                        <a href="" class="bouton">Voir projet</a>
                    </div>
                </div>
                <div class="projets">
                    <img src="assets/images/traces.jpg" alt="traces d'animal"/>
                    <div class="mesBoutons">
                        <a href="" class="bouton">Voir projet</a>
                    </div>
                </div>
                <div class="projets">
                    <img src="assets/images/agenda.jpg" alt="agenda scolaire"/>
                    <div class="mesBoutons">
                        <a href="" class="bouton">Voir projet</a>
                    </div>
                </div>
            </div>
        </section>
        <script src="<?php echo url('/assets/js/main.js') ?>"></script>
    </body>
</html>