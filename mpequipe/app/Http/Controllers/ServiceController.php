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

    public function supprimer (Request $request)
    {
        // ICI ON DOIT TRAITER LE FORMULAIRE DE CREATE
        // ...
        // ON VA RENVOYER DU FORMAT JSON
        // EN PHP, ON VA UTILISER UN TABLEAU ASSOCIATIF
        $tabAssoJson = [];
        $tabAssoJson["test"] = date("Y-m-d H:i:s");
        // ON DOIT VERIFIER SI L'UTILISATEUR CONNECTE 
        // A LE DROIT DE CREER DES ANNONCES
        // https://laravel.com/docs/5.8/authentication#retrieving-the-authenticated-user
        $utilisateurConnecte = Auth::user();
        if ($utilisateurConnecte != null && $utilisateurConnecte->level >= 1)
        {
            $validator = Validator::make($request->all(), [
                'id'      => 'required|numeric',
            ]);
            if ($validator->fails()) 
            {
                // CAS OU IL Y A DES ERREURS
                $tabAssoJson["erreur"] = "IL Y A DES ERREURS";
                $tabAssoJson["confirmation"] = "IL Y A DES ERREURS";
            }
            else
            {
                // IL FAUT RECUPERER L'ID
                // A PARTIR DE L'ID, JE VAIS RETROUVER L'ANNONCE (READ)
                // IL FAUT VERIFIER SI L'ANNONCE APPARTIENT BIEN AU MEMBRE CONNECTE
                $id = $request->input("id");
                // AVEC LARAVEL, ON A UNE METHODE find QUI PERMET DE CHERCHER AVEC id
                // https://laravel.com/docs/6.x/queries#retrieving-results
                $service = Service::find($id);
                if ($service) 
                {
                    // ON A TROUVE UNE ANNONCE AVEC CET id
                    if ($service->user_id == $utilisateurConnecte->id)
                    {
                        // OK L'ANNONCE A ETE CREE PAR LE MEMEBRE CONNECTE
                        // https://laravel.com/docs/6.x/eloquent#deleting-models
                        $service->delete();
                        // RENVOYER UNE CONFIRMATION
                        $tabAssoJson["confirmation"] = "LE SERVICE A ETE SUPPRIME"; 
                    }
                    else
                    {
                        // KO UN MEMBRE ESSAIE D'EFFACER UNE ANNONCE QUI NE LUI APPARTIENT PAS
                        // RENVOYER UNE CONFIRMATION
                        $tabAssoJson["confirmation"] = "CE SERVICE NE VOUS APPARTIENT PAS"; 
                    }
                }
                // ASTUCE: MEME SI id EST MAUVAIS
                // ON VA QUAND MEME RENVOYER LA LISTE
                // JE VAIS RENVOYER LA LISTE DES ANNONCES DE CET UTILISATEUR
                // IL FAUT FAIRE UNE REQUETE READ AVEC UN FILTRE
                // https://laravel.com/docs/6.x/queries#where-clauses
                $tabService = \App\Service
                        // ON FILTRE SUR user_id POUR OBTENIR 
                        // SEULEMENT LES ANNONCES DE L'UTILSATEUR CONNECTE
                        ::where("user_id", "=", $utilisateurConnecte->id)
                        ->latest("updated_at")   // CONSTRUCTION DE LA REQUETE
                        ->get();                 // JE VEUX OBTENIR LES RESULTATS
                $tabAssoJson["services"] = $tabService; 
            }
        }
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
        // ON DOIT VERIFIER SI L'UTILISATEUR CONNECTE 
        // A LE DROIT DE CREER DES ANNONCES
        // https://laravel.com/docs/5.8/authentication#retrieving-the-authenticated-user
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
                'id'        => 'required|numeric|min:1',
                'categorie'   => 'required|max:160',
                'description'   => 'required',
                'disponible'   => 'required|max:160',
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
                // JE DOIS TRAITER L'UPLOAD A PART
                // https://laravel.com/docs/5.8/filesystem#file-uploads
                $photoQuarantaine = $request->file("photo");
                if ($photoQuarantaine) {
                    // SI IL Y A UNE PHOTO (OPTIONNELLE)
                    $photo = $photoQuarantaine->store("public/photos");
                    // JE NE CHANGE LA PHOTO QUE SI ON EN A UPLOADE UNE NOUVELLE
                    $tabInput["photo"] = str_replace("public/", "storage/", $photo);
                }
                // ON A BESOIN DE id POUR SAVOIR QUELLE LIGNE IL FAUT MODIFIER
                // ON VA AJOUTER L'INFO DU user_id
                $tabInput["user_id"] = $utilisateurConnecte->id;
                // IL FAUT VERIFIER SI L'ANNONCE APPARTIENT BIEN AU MEMBRE CONNECTE
                $id = $request->input("id");
                // AVEC LARAVEL, ON A UNE METHODE find QUI PERMET DE CHERCHER AVEC id
                // https://laravel.com/docs/6.x/queries#retrieving-results
                $service = Service::find($id);
                if ($service) 
                {
                    // ON A TROUVE UNE ANNONCE AVEC CET id
                    if ($service->user_id == $utilisateurConnecte->id)
                    {
                        // OK L'ANNONCE A ETE CREE PAR LE MEMBRE CONNECTE
                        // https://laravel.com/docs/6.x/eloquent#updates
                        // UN PEU COMME POUR create, 
                        // ON DONNE LES NOUVELLES VALEURS DANS UN TABLEAU ASSOCIATIF
                        $service->fill($tabInput);
                        // POUR ENREGISTRER DANS LA TABLE SQL
                        $service->save();
                        // RENVOYER UNE CONFIRMATION
                        $tabAssoJson["confirmation"] = "LE SERVICE A ETE MODIFIE"; 
                    }
                    else
                    {
                        // KO UN MEMBRE ESSAIE D'EFFACER UNE ANNONCE QUI NE LUI APPARTIENT PAS
                        // RENVOYER UNE CONFIRMATION
                        $tabAssoJson["confirmation"] = "CE SERVICE NE VOUS APPARTIENT PAS"; 
                    }
                }
            }
            // JE VAIS RENVOYER LA LISTE DES ANNONCES DE CET UTILISATEUR
            // IL FAUT FAIRE UNE REQUETE READ AVEC UN FILTRE
            // https://laravel.com/docs/6.x/queries#where-clauses
            $tabAnnonce = \App\Service
                    // ON FILTRE SUR user_id POUR OBTENIR 
                    // SEULEMENT LES ANNONCES DE L'UTILSATEUR CONNECTE
                    ::where("user_id", "=", $utilisateurConnecte->id)
                    ->latest("updated_at")   // CONSTRUCTION DE LA REQUETE
                    ->get();                 // JE VEUX OBTENIR LES RESULTATS
            $tabAssoJson["services"] = $tabService; 
        }
        else
        {
            // ERREUR
            // IL FAUT ETRE CONNECTE POUR PUBLIER UNE SERVICE
            $tabAssoJson["erreur"] = "IL FAUT ETRE CONNECTE POUR PUBLIER UN SERVICE";
            $tabAssoJson["confirmation"] = "IL FAUT ETRE CONNECTE POUR PUBLIER UN SERVICE";
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
                $tabAssoJson["confirmation"] = "VOTRE SERVICE EST PUBLIÉ";
            }
            
            $tabService = \App\Service
                ::where('user_id', '=', $utilisateurConnecte->id)
                ->latest('updated_at')
                ->get();
            $tabAssoJason['services'] = $tabService;
        }
        else
        {
            // ERREUR
            // IL FAUT ETRE CONNECTE POUR PUBLIER UNE ANNONCE
            $tabAssoJson["erreur"] = "IL FAUT ETRE CONNECTE POUR PUBLIER UN SERVICE";
            $tabAssoJson["confirmation"] = "IL FAUT ETRE CONNECTE POUR PUBLIER UN SERVICE";
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
