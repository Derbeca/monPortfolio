<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Rebeca Gruber</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo url('/assets/css/style.css') ?>">
    </head>
    <body>
        <div id="app">
            <!-- CREER UN PROJET-->
            <section class="formulaire">
                <form @submit.prevent="envoyerFormAjax" method="POST" action="projet/store" enctype="multipart/form-data">
                    <h2>Publier un projet</h2>
                    <input type="text" name="titre" placeholder="entrez le titre">
                    <textarea name="contenu" placeholder="entrez le contenu"></textarea>
                    <input type="file" name="photo1" placeholder="choisissez votre photo1">
                    <input type="file" name="photo2" placeholder="choisissez votre photo2">
                    <input type="file" name="photo3" placeholder="choisissez votre photo3">
                    <input type="file" name="photo4" placeholder="choisissez votre photo4">
                    <button type="submit">Publier</button>
                    <div class="confirmation">
                        @{{ confirmation }}
                    </div>
                    @csrf
                </form>
            </section>
            <section class="lightbox" v-if="annonceUpdate">
                <div @click="annonceUpdate = null"><img src="../public/assets/svg/icon-fermer.svg" class="logoFermer"></div>
                <h3>MODIFIER UNE PHOTO</h3>
                <!-- CONVENTION LARAVEL POUR LE CREATE action="annonce/store" -->
                <!-- https://fr.vuejs.org/v2/guide/forms.html -->
                <form @submit.prevent="envoyerFormAjax" method="POST" action="projet/modifier" enctype="multipart/form-data">
                    <input type="text" v-model="annonceUpdate.titre" name="titre" placeholder="entrez le titre">
                    <textarea name="contenu" v-model="annonceUpdate.contenu" placeholder="entrez le contenu"></textarea>
                    <input type="file" name="photo1" placeholder="choisissez votre photo1">
                    <img :src="annonceUpdate.photo1">
                    <input type="file" name="photo2" placeholder="choisissez votre photo2">
                    <img :src="annonceUpdate.photo2">
                    <input type="file" name="photo3" placeholder="choisissez votre photo3">
                    <img :src="annonceUpdate.photo3">
                    <input type="file" name="photo4" placeholder="choisissez votre photo4">
                    <img :src="annonceUpdate.photo4">
                   
                    </select>
                    <button type="submit">MODIFIER</button>
                    <!-- ON UTILISE id POUR SELECTIONNER LA BONNE LIGNE SQL -->
                    <input type="text" name="id"  v-model="annonceUpdate.id">
                    <div class="confirmation">
                    @{{ confirmation }}
                    </div>
                    <!-- RACCOURCI BLADE POUR AJOUTER UN CHAMP HIDDEN -->
                    @csrf
                </form>
            </section>
            <!-- AFFICHER LA LISTE D'ANNONCES-->
            <section>
                <h2>Liste de mes projets</h2>
                <div class="listeAnnonce">
                    <article v-for="annonce in annonces">
                        <div id="contenu">
                            <h4>@{{ annonce.titre }}</h4>
                            <p>@{{ annonce.contenu }}</p>
                            <p>@{{ annonce.id }}</p>
                        </div>
                        <img :src="annonce.photo1">
                        <div id="btns">
                            <button @click.prevent="modifierAnnonce(annonce)">modifier</button>
                            <!-- COOL: AVEC VUEJS JE PEUX PASSER annonce COMME SI C'ETAIT UNE VARIABLE JS-->
                            <button @click.prevent="supprimerAnnonce(annonce)">supprimer</button>
                        </div>
                    </article>
                </div>
            </section>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

        <script>
// ON PEUT ENSUITE COMMENCER A UTILISER VUEJS
var app = new Vue({
  el: '#app',
  // https://fr.vuejs.org/v2/guide/instance.html#Hooks-de-cycle-de-vie-d%E2%80%99une-instance
  mounted: function () {
      // SIMULE UNE FAUSSE SUPPRESSION
      // BRICOLAGE POUR OBTENIR L'AFFICHAGE
      this.supprimerAnnonce({ id: -1});
  },
  methods: {
      modifierAnnonce: function(annonce) {
        // debug
        console.log(annonce);
        // JE MEMORISE L'ANNONCE A MODIFIER DANS UNE VARIABLE VUEJS
        this.annonceUpdate = annonce;
      },
      supprimerAnnonce: function (annonce) {
        // debug
        console.log(annonce);
        // JE PEUX RECUPERER id A SUPPRIMER
        var formData = new FormData();
        // JE SIMULE EN JS LES INFOS DU FORMULAIRE
        formData.append('id', annonce.id);
        // sécurité laravel
        // https://laravel.com/docs/5.8/csrf#csrf-x-csrf-token
        formData.append('_token', '{{ csrf_token() }}');
        fetch('projet/supprimer', {
            method: 'POST',
            body: formData
        })
        .then(function(reponse) {
              // ON CONVERTIT LE MESSAGE DE REPONSE EN OBJET JSON
              return reponse.json();
          })
        .then(function(reponseObjetJSON) {
            if (reponseObjetJSON.confirmation)
            {
                // ON VA STOCKER LA CONFORMATION DANS UNE VARIABLE VUEJS
                app.confirmation = reponseObjetJSON.confirmation;
            }
            if (reponseObjetJSON.annonces)
            {
                // ON VA STOCKER LA CONFORMATION DANS UNE VARIABLE VUEJS
                app.annonces = reponseObjetJSON.annonces;
            }
        });
      },
      envoyerFormAjax: function (event) {
          // debug
          console.log(event.target);
          // JE VEUX RECUPERER LES INFORMATIONS REMPLIES PAR LE MEMBRE
          var formData = new FormData(event.target);
          // JE REPRENDS L'URL DANS LE HTML
          var urlAction = event.target.getAttribute('action');
          // ET ON ENVOIE LES INFOS VERS LA MEME URL
          fetch(urlAction, {
              method: 'POST',
              body: formData
          })
          .then(function(reponse) {
              // ON CONVERTIT LE MESSAGE DE REPONSE EN OBJET JSON
              return reponse.json();
          })
          .then(function(reponseObjetJSON) {
                if (reponseObjetJSON.confirmation)
                {
                    // ON VA STOCKER LA CONFORMATION DANS UNE VARIABLE VUEJS
                    app.confirmation = reponseObjetJSON.confirmation;
                }
                if (reponseObjetJSON.annonces)
                {
                    // ON VA STOCKER LA CONFORMATION DANS UNE VARIABLE VUEJS
                    app.annonces = reponseObjetJSON.annonces;
                }
          });
      }
  },
  data: {
      // ICI JE RAJOUTE LES VARIABLES GEREES PAR VUEJS
    annonceUpdate: null,  
    annonces: [],
    confirmation: 'ici on verra le message de confirmation',  
    message: 'Hello Vue !'
  }
});
    </script>
    </body>
</html>