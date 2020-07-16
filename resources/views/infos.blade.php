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
            <img src="assets/svg/icon-menu.svg" alt="icône menu" id="btn-menu">
            <div class="menuDepliant">
                <img src="assets/svg/icon-fermer.svg" alt="icône fermer" id="btn-fermer">
                <ul>
                    <li><a href="<?php echo url('/about') ?>">À propos</a></li>
                    <li><a href="<?php echo url('/infos') ?>">Infos</a></li>
                    <li><a href="<?php echo url('/projets') ?>">Projets</a></li>
                    <li><a href="<?php echo url('/contact') ?>">Contact</a></li>
                </ul>
            </div>
        </div>
        <h3>+ Infos</h3>
        <section class="savoirs">
            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="assets/svg/icon_engranage.svg" alt="icône diplôme">
                        <h3>Savoirs-faire</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Front End
                            <br>Illustration
                            <br>Graphisme
                            <br>Back End
                            <br>Admin système</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="assets/svg/icon_diplome.svg" alt="icône diplôme">
                        <h3>Formations</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Bac + 3 Arts Plastiques
                            <br>Diplôme Formatrice pour adultes
                            <br>Bac + 2 Développeuse web et web mobile</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="assets/svg/icon_outils.svg" alt="icône outils">
                        <h3>Éxperiences pro</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Cheffe Dep. Graphique
                            <br>Graphiste freelance
                            <br>Formatrice pour adultes
                    </div>
                </div>
            </div>
        </section>
        <section class="logosDev">
            <div class="mesLogos">
                <img src="assets/svg/logo_html.svg" alt="logo html"/>
                <img src="assets/svg/logo_css.svg" alt="logo css"/>
                <img src="assets/svg/logo_js.svg" alt="logo js"/>
                <img src="assets/svg/logo_php.svg" alt="logo php"/>
                <img src="assets/svg/logo_sql.svg" alt="logo sql"/>
                <img src="assets/svg/logo_wp.svg" alt="logo wordpress"/>
                <img src="assets/svg/logo_vue.svg" alt="logo vue js"/>
                <img src="assets/svg/logo_laravel.svg" alt="logo laravel"/>
                <img src="assets/svg/logo_opquast.svg" alt="logo opquast"/>
            </div>
            <!-- <div class="textureCode2">
                <img src="assets/svg/code_verticale.svg" alt="dessin code">
            </div> -->
        </section>
    </body>
</html>