<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function deconnexion ()
    {
        // https://laravel.com/docs/5.8/authentication#included-authenticating
        Auth::logout();
        // https://laravel.com/docs/6.x/redirects
        return redirect('/');
    }
    // CETTE METHODE SERT A PROTEGER L'ACCES A L'ESPACE MEMBRE
    public function afficherEspaceMembre ()
    {
        // ICI ON VA VERIFIER SI LE VISITEUR EST CONNECTE
        // SI IL EST CONNECTE ET QU'IL A LE level >= 10
        // DANS CE CAS IL PEUT ACCEDER A LA PAGE D'ESPACE MEMBRE
        // SINON ON VA LE REDIRIGER VERS LA PAGE DE /login
        // https://laravel.com/docs/5.8/authentication#retrieving-the-authenticated-user
        $utilisateurConnecte = Auth::user();
        if ($utilisateurConnecte != null && $utilisateurConnecte->level >= 1)
        {
            return view('espace-membre');
        }
        else
        {
            // https://laravel.com/docs/6.x/redirects
            return redirect('/connexion');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tabAssoJson = [];
        $tabAssoJson["test"] = date("Y-m-d H:i:s");

        $utilisateurConnecte = Auth::user();

        if ($utilisateurConnecte != null && $utilisateurConnecte->level >= 1)
        {
            // IL FAUDRA RAJOUTER UN TEST SUPPLEMENTAIRE SUR LE level
            // level >= 10
            
            // debug
            $tabAssoJson["utilisateurConnecte"] = $utilisateurConnecte;
            

            // SECURITE: ICI ON DOIT VERIFIER QUE LES INFOS SONT CORRECTES
            // ON DOIT RECUPERER LES INFOS ENVOYEES PAR LE NAVIGATEUR        
            // ON VA STOCKER LES INFOS DANS LA TABLE SQL annonces
            // https://laravel.com/docs/5.7/validation#manually-creating-validators
            // https://laravel.com/docs/5.7/validation#available-validation-rules

            $validator = Validator::make($request->all(), [
                'categorie'     => 'required|max:160',
                'description'   => 'required',
                'disponible'     => 'required|max:160',
                'perimetre'   => 'required|max:160',
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
                    "categorie", "description", "disponible", "perimetre"
                ]);
                // ON VA AJOUTER L'INFO DU user_id
                $tabInput["user_id"] = $utilisateurConnecte->id;

                Service::create($tabInput);
                $tabAssoJson['confirmation'] = 'votre service est publié';
            }

        }
        else
        {
            // ERREUR
            // IL FAUT ETRE CONNECTE POUR PUBLIER UNE ANNONCE
            $tabAssoJson["erreur"] = "IL FAUT ETRE CONNECTE POUR PUBLIER UNE ANNONCE";
            $tabAssoJson['confirmation'] = 'IL FAUT ETRE CONNECTE POUR PUBLIER UNE ANNONCE';
        }
        return $tabAssoJson;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
