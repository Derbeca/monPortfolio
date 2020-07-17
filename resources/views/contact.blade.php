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
                    <li><a href="<?php echo url('/about') ?>">À propos</a></li>
                    <li><a href="<?php echo url('/infos') ?>">Infos</a></li>
                    <li><a href="<?php echo url('/projets') ?>">Projets</a></li>
                    <li><a href="<?php echo url('/contact') ?>">Contact</a></li>
                </ul>
            </div>
        </div>
        <section class="contact">
            <form method="POST" action="contact/store">
                <h2>Me contacter</h2>
                <input type="text" name="nom" placeholder="entrez votre nom">
                <input type="mail" name="email" placeholder="entrez votre adresse email">
                <textarea name="message" placeholder="entrez votre message"></textarea>
                <button type="submit">Envoyer</button>
                @csrf
            </form>
        </section>
        <script src="<?php echo url('/assets/js/main.js') ?>"></script>
    </body>
</html>