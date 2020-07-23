<?php

namespace App\Http\Controllers;

use App\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Auth;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    public function supprimer (Request $request)
    {
        // ICI ON DOIT TRAITER LE FORMULAIRE DE CREATE
        // ...
        // ON VA RENVOYER DU FORMAT JSON
        // EN PHP, ON VA UTILISER UN TABLEAU ASSOCIATIF
        $tabAssoJson = [];
        $tabAssoJson["test"] = date("Y-m-d H:i:s");


                $id = $request->input("id");

                // AVEC LARAVEL, ON A UNE METHODE find QUI PERMET DE CHERCHER AVEC id
                // https://laravel.com/docs/6.x/queries#retrieving-results
                $annonce = Projet::find($id);
                if ($annonce) 
                {

                        $annonce->delete;

                        // RENVOYER UNE CONFIRMATION
                        $tabAssoJson["confirmation"] = "Le projet a été supprimé"; 
                    }


                // ASTUCE: MEME SI id EST MAUVAIS
                // ON VA QUAND MEME RENVOYER LA LISTE

                // JE VAIS RENVOYER LA LISTE DES ANNONCES DE CET UTILISATEUR
                // IL FAUT FAIRE UNE REQUETE READ AVEC UN FILTRE
                // https://laravel.com/docs/6.x/queries#where-clauses
                $tabAnnonce = \App\Projet
                        // ON FILTRE SUR user_id POUR OBTENIR 
                        // SEULEMENT LES ANNONCES DE L'UTILSATEUR CONNECTE
                        ::select("titre", "contenu", "photo1", "photo2", "photo3", "photo4", "id")  // CONSTRUCTION DE LA REQUETE
                        ->get();                 // JE VEUX OBTENIR LES RESULTATS
                $tabAssoJson["annonces"] = $tabAnnonce; 


        return $tabAssoJson;
        // NOTE: CE SERA LARAVEL QUI VA TRANSFORMER 
        // LE TABLEAU ASSOCIATIF EN JSON
    }
    public function modifier(Request $request)
    {
        // ICI ON DOIT TRAITER LE FORMULAIRE DE CREATE
        // ...
        // ON VA RENVOYER DU FORMAT JSON
        // EN PHP, ON VA UTILISER UN TABLEAU ASSOCIATIF
        $tabAssoJson = [];
        $tabAssoJson["test"] = date("Y-m-d H:i:s");

            $validator = Validator::make($request->all(), [
                'id'        => 'required|numeric|min:1',
                'titre'     => 'max:160',
                'contenu'   => '',
                'photo1'     => '',         // OPTIONNEL
                'photo2'     => '', 
                'photo3'     => '', 
                'photo4'     => '', 
            ]);

            if ($validator->fails()) 
            {
                // CAS OU IL Y A DES ERREURS
                $tabAssoJson["erreur"] = "IL Y A DES ERREURS";
                $tabAssoJson["confirmation"] = "IL Y A DES ERREURS";
            }
            else
            {
                // CAS OU TOUTES LES INFOS SONT CORRECTES
                // ON PEUT LES STOCKER DANS LA TABLE SQL annonces
                // https://laravel.com/docs/5.8/eloquent#mass-assignment
                // ATTENTION: NE PAS OUBLIER LE PARAMETRAGE OBLIGATOIRE AVANT DE FAIRE CE CODE
                // sinon erreur: Add [titre] to fillable property to allow mass assignment on [App\Annonce].
                // IL FAUT AJOUTER DU CODE DANS
                // app/Annonce.php
                $tabInput = $request->only([
                    "titre", "contenu"
                ]);

                $photoQuarantaine1 = $request->file("photo1");
                if ($photoQuarantaine1) {
                    // SI IL Y A UNE PHOTO (OPTIONNELLE)
                    $photo1 = $photoQuarantaine1->store("public/photos");
                    // JE NE CHANGE LA PHOTO QUE SI ON EN A UPLOADE UNE NOUVELLE
                    $tabInput["photo1"] = str_replace("public/", "storage/", $photo1);
                }
                $photoQuarantaine2 = $request->file("photo2");
                if ($photoQuarantaine2) {
                    // SI IL Y A UNE PHOTO (OPTIONNELLE)
                    $photo2 = $photoQuarantaine2->store("public/photos");
                    // JE NE CHANGE LA PHOTO QUE SI ON EN A UPLOADE UNE NOUVELLE
                    $tabInput["photo2"] = str_replace("public/", "storage/", $photo2);
                }
                $photoQuarantaine3 = $request->file("photo3");
                if ($photoQuarantaine3) {
                    // SI IL Y A UNE PHOTO (OPTIONNELLE)
                    $photo3 = $photoQuarantaine3->store("public/photos");
                    // JE NE CHANGE LA PHOTO QUE SI ON EN A UPLOADE UNE NOUVELLE
                    $tabInput["photo3"] = str_replace("public/", "storage/", $photo3);
                }
                $photoQuarantaine4 = $request->file("photo4");
                if ($photoQuarantaine4) {
                    // SI IL Y A UNE PHOTO (OPTIONNELLE)
                    $photo4 = $photoQuarantaine4->store("public/photos");
                    // JE NE CHANGE LA PHOTO QUE SI ON EN A UPLOADE UNE NOUVELLE
                    $tabInput["photo4"] = str_replace("public/", "storage/", $photo4);
                }


                $id = $request->input("id");
                // AVEC LARAVEL, ON A UNE METHODE find QUI PERMET DE CHERCHER AVEC id
                // https://laravel.com/docs/6.x/queries#retrieving-results
                $annonce = Projet::find($id);
                if ($annonce) 
                {

                        $annonce->fill($tabInput);

                        // POUR ENREGISTRER DANS LA TABLE SQL
                        $annonce->save();

                        // RENVOYER UNE CONFIRMATION
                        $tabAssoJson["confirmation"] = "L'ANNONCE A ETE MODIFIEE"; 
                    }
                    else
                    {
                        // KO UN MEMBRE ESSAIE D'EFFACER UNE ANNONCE QUI NE LUI APPARTIENT PAS
                        // RENVOYER UNE CONFIRMATION
                        $tabAssoJson["confirmation"] = "CETTE ANNONCE NE VOUS APPARTIENT PAS"; 
                    }


            // JE VAIS RENVOYER LA LISTE DES ANNONCES DE CET UTILISATEUR
            // IL FAUT FAIRE UNE REQUETE READ AVEC UN FILTRE
            // https://laravel.com/docs/6.x/queries#where-clauses
            $tabAnnonce = \App\Projet
            // ON FILTRE SUR user_id POUR OBTENIR 
            // SEULEMENT LES ANNONCES DE L'UTILSATEUR CONNECTE
            ::all("titre", "contenu", "photo1", "photo2", "photo3", "photo4")  // CONSTRUCTION DE LA REQUETE
            ->get();                 // JE VEUX OBTENIR LES RESULTATS

            $tabAssoJson["annonces"] = $tabAnnonce; 
        }



        return $tabAssoJson;
        // NOTE: CE SERA LARAVEL QUI VA TRANSFORMER 
        // LE TABLEAU ASSOCIATIF EN JSON
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tabInput = $request->only([
            "titre", "contenu"
        ]);
        
        // JE DOIS TRAITER L'UPLOAD A PART
        // https://laravel.com/docs/5.8/filesystem#file-uploads
        $photo1 = $request->file("photo1")->store("public/photos");
        $photo2 = $request->file("photo2")->store("public/photos");
        $photo3 = $request->file("photo3")->store("public/photos");
        $photo4 = $request->file("photo4")->store("public/photos");
        // LARAVEL VA CREER LE DOSSIER storage/app/public/photos/
        // ET LARAVEL VA CREER UN NOM DE FICHIER ALEATOIRE
        // IL FAUT LANCER LA LIGNE DE COMMANDE
        // php artisan storage:link
        // CETTE COMMANDE VA CREER UN RACCOURCI (lien symbolique)
        // ENTRE storage/app/public/
        // ET public/storage/
        $tabInput["photo1"] = str_replace("public/", "storage/", $photo1);
        $tabInput["photo2"] = str_replace("public/", "storage/", $photo2);
        $tabInput["photo3"] = str_replace("public/", "storage/", $photo3);
        $tabInput["photo4"] = str_replace("public/", "storage/", $photo4);
        
        Projet::create($tabInput);
        // RENVOYER UNE CONFIRMATION
        $tabAssoJson["confirmation"] = "VOTRE ANNONCE EST PUBLIEE"; 
            
        // JE VAIS RENVOYER LA LISTE DES ANNONCES DE CET UTILISATEUR
        // IL FAUT FAIRE UNE REQUETE READ
        // https://laravel.com/docs/6.x/queries#where-clauses
        $tabAnnonce = DB::table('projets')->get();               // JE VEUX OBTENIR LES RESULTATS
        $tabAssoJson["projets"] = $tabAnnonce; 

        return $tabAssoJson;
        // NOTE: CE SERA LARAVEL QUI VA TRANSFORMER 
        // LE TABLEAU ASSOCIATIF EN JSON
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        $projet = Projet::find($id);
        $projet->delete();

        return redirect('/espace-admin')->with('success', 'Projet deleted!');
    }
}
