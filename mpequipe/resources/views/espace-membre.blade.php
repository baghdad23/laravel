<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/assets/css/style-commun.css">
    <link rel="stylesheet" href="../public/assets/css/style-espace-membre.css">
    <title>TROC HOUR</title>
</head>
<body>
    <div id="app">
        <header>
            <!--<h1>PROJET MARKETPLACE</h1>-->
            <a href="<?php echo url("/") ?>"  id="logo"><img src="../public/assets/images/logo.png"></a>
            <div>
                <div id="boutonsConnexion">
                    <a href="<?php echo url("/inscription") ?>">S'INSCRIRE</a>
                    <a href="<?php echo url("/connexion") ?>">SE CONNECTER</a>
                </div>
                <nav>
                    <ul id="menu">
                        <li><a href="<?php echo url("/") ?>">ACCUEIL</a></li>
                        <li><a href="<?php echo url("/infos") ?>">COMMENT ÇA MARCHE?</a></li>
                        <li><a href="<?php echo url('/espace-membre') ?>">ESPACE MEMBRE</a></li>
                        <li><a href="<?php echo url("/contact") ?>">CONTACT</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <!--<h3>SECTION ESPACE MEMBRE</h3>-->
            <section id="espaceMembre">
                <div>
                    <img src="../public/assets/images/sansPhoto.png">
                    <div id="espaceMembreBouton">
                        <button type="submit">MODIFIER DONNÉES</button>
                        <button type="submit">NOUVEAU SERVICE</button>
                        
                        <!-- BOUTON LOGOUT-->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            SE DÉCONNECTER
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="espaceMembreForm">
                    <h4>MODIFIER DONNÉES</h4>
                    <form method="POST" action="" enctype="multipart/form-data">  
                        <input type="texte" name="name" placeholder="entrez votre nom" required>
                        <input type="email" name="email" placeholder="entrez votre email" required>
                        <input type="password" name="pasword" placeholder="entrez votre mot de passe" required>
                        <input type="file" name="photo">
                        <button type="submit">CHANGER DONNÉES</button>
                        @csrf
                    </form>
                </div>

        <!-- PUBLIER UN SERVICE -->
                <div class="espaceMembreForm">
                    <h4>CREATE</h4>
                    <form @submit.prevent="envoyerFormAjax" method="POST" action="service/store">  
                        <select name="categorie" required>
                        <option value="" selected="selected">Type de service</option>
                        <optgroup label="ADMINISTRATION">
                            <option>Aide à la rédaction, lettres, CV, corrections</option>
                            <option>Aide administrative, impôts, question juridiques</option>
                            <option>Comptabilité du foyer</option>
                            <option>Traduction de documents</option>
                        </optgroup>
                        <optgroup label="AIDE A LA PERSONNE">
                            <option>Accompagnement – Aide aux personnes âgées</option>
                            <option>Aide – Bras pour déménagement</option>
                            <option>Aide aux personnes à mobilité réduite</option>
                            <option>Courses à votre place – Aide aux courses</option>
                            <option>Transport de personnes ou de matériel</option>
                        </optgroup>
                        <optgroup label="ANIMAUX DE COMPAGNIE">
                            <option>Visite</option>
                            <option>Garde</option>
                            <option>Promenade</option>
                        </optgroup>
                        <optgroup label="AUTRES">
                            <option>Précisez</option>
                        </optgroup>
                        <optgroup label="BRICOLAGE">
                            <option>Électricité</option>
                            <option>Maçonnerie</option>
                            <option>Mécanique (réparation, voiture, vélo, etc)</option>
                            <option>Montage de meubles, étagères, etc.</option>
                            <option>Peinture</option>
                            <option>Plomberie</option>
                            <option>Réparation petit matériel (précisez)</option>
                            <option>Restauration</option>
                        </optgroup>
                        <optgroup label="COURS">
                            <option>Art et artisanat</option>
                            <option>Musique, danse, chant</option>
                            <option>Langues</option>
                        </optgroup>
                        <optgroup label="ENFANCE">
                            <option>Garde d'enfants</option>
                            <option>Sortie d'école</option>
                            <option>Aide au devoirs</option>
                        </optgroup>
                        <optgroup label="MAISON">
                            <option>Aide au rangement</option>
                            <option>Couture (reprises, broderie, machine, etc)</option>
                            <option>Cuisine</option>
                            <option>Jardinage – Arrosage – Conseils (précisez)</option>
                            <option>Ménage – Repassage – Vitres</option>
                        </optgroup>
                        <optgroup label="NUMÉRIQUE">
                            <option>Graphisme (précisez)</option>
                            <option>Informatique (word, excel, logiciels divers)</option>
                            <option>Petit dépannage informatique (précisez)</option>
                            <option>Photographie, retouches (précisez)</option>
                        </optgroup>
                        <optgroup label="SANTÉ /BEAUTÉ">
                            <option>Conseil nutrition – Diététique</option>
                            <option>Maquillage</option>
                            <option>Coupe – Soins cheveux – Coiffure</option>
                            <option>Techniques relaxation</option>
                            <option>Manucure - Ongles</option>
                        </optgroup>
                    </select>
                        <textarea name="description" placeholder="entrez description du service"></textarea>
                        <input type="texte" name="disponible" placeholder="entrez la disponibilité" required>
                        <input type="texte" name="perimetre" placeholder="entrez le code postal" required>
                        <button type="submit">PUBLIER SERVICE</button>
                        <div class="confirmation">
                            @{{ confirmation }}
                        </div>
                        @csrf
                    </form>
                </div>

        <!-- MODIFIER UN SERVICE -->
                <div v-if="serviceUpdate" class="espaceMembreForm">
                    <h4>UPDATE</h4>
                    <form @submit.prevent="envoyerFormAjax" method="POST" action="service/modifier">  
                        <select name="categorie" v-model="serviceUpdate.categorie" required>
                        <option value="" selected="selected">Type de service</option>
                        <optgroup label="ADMINISTRATION">
                            <option>Aide à la rédaction, lettres, CV, corrections</option>
                            <option>Aide administrative, impôts, question juridiques</option>
                            <option>Comptabilité du foyer</option>
                            <option>Traduction de documents</option>
                        </optgroup>
                        <optgroup label="AIDE A LA PERSONNE">
                            <option>Accompagnement – Aide aux personnes âgées</option>
                            <option>Aide – Bras pour déménagement</option>
                            <option>Aide aux personnes à mobilité réduite</option>
                            <option>Courses à votre place – Aide aux courses</option>
                            <option>Transport de personnes ou de matériel</option>
                        </optgroup>
                        <optgroup label="ANIMAUX DE COMPAGNIE">
                            <option>Visite</option>
                            <option>Garde</option>
                            <option>Promenade</option>
                        </optgroup>
                        <optgroup label="AUTRES">
                            <option>Précisez</option>
                        </optgroup>
                        <optgroup label="BRICOLAGE">
                            <option>Électricité</option>
                            <option>Maçonnerie</option>
                            <option>Mécanique (réparation, voiture, vélo, etc)</option>
                            <option>Montage de meubles, étagères, etc.</option>
                            <option>Peinture</option>
                            <option>Plomberie</option>
                            <option>Réparation petit matériel (précisez)</option>
                            <option>Restauration</option>
                        </optgroup>
                        <optgroup label="COURS">
                            <option>Art et artisanat</option>
                            <option>Musique, danse, chant</option>
                            <option>Langues</option>
                        </optgroup>
                        <optgroup label="ENFANCE">
                            <option>Garde d'enfants</option>
                            <option>Sortie d'école</option>
                            <option>Aide au devoirs</option>
                        </optgroup>
                        <optgroup label="MAISON">
                            <option>Aide au rangement</option>
                            <option>Couture (reprises, broderie, machine, etc)</option>
                            <option>Cuisine</option>
                            <option>Jardinage – Arrosage – Conseils (précisez)</option>
                            <option>Ménage – Repassage – Vitres</option>
                        </optgroup>
                        <optgroup label="NUMÉRIQUE">
                            <option>Graphisme (précisez)</option>
                            <option>Informatique (word, excel, logiciels divers)</option>
                            <option>Petit dépannage informatique (précisez)</option>
                            <option>Photographie, retouches (précisez)</option>
                        </optgroup>
                        <optgroup label="SANTÉ /BEAUTÉ">
                            <option>Conseil nutrition – Diététique</option>
                            <option>Maquillage</option>
                            <option>Coupe – Soins cheveux – Coiffure</option>
                            <option>Techniques relaxation</option>
                            <option>Manucure - Ongles</option>
                        </optgroup>
                    </select>
                        <textarea name="description" v-model="serviceUpdate.description" placeholder="entrez description du service"></textarea>
                        <input type="texte" name="disponible" v-model="serviceUpdate.disponible" placeholder="entrez la disponibilité" required>
                        <input type="texte" name="perimetre" v-model="serviceUpdate.perimetre" placeholder="entrez le code postal" required>
                        <button type="submit">MODIFIER SERVICE</button>
                        <input type="hidden" name="id"  v-model="serviceUpdate.id">
                        <div class="confirmation">
                             @{{ confirmation }}
                        </div>
                        @csrf
                    </form>
                </div>
                <h4>LISTE SERVICES @{{ services.length }}</h4>
                <div id="espaceMembreListe">
                    <div class="service" v-for="service in services">
                        <h3>@{{ service.categorie }}</h3>
                        <p>@{{ service.description }}</p>
                        <div class="boutonService">
                            <button type="submit" @click.prevent="modifierService(service)">MODIFIER</button>
                            <button type="submit" @click.prevent="supprimerService(service)">SUPRIMMER</button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <p>Troc Hour est une initiative de la Maison du quartier. Elle est soutenue par la ville de Marseille.</p>
            <p>Vous pouvez nous soumettre des idées d’améliorations, suggérer des services manquants ou signaler un abus : contact@labanquedetemps.com</p>
            <a href="<?php echo url("/mentions-legales") ?>">Mentions légales</a>
            <a href="<?php echo url("/conditions-generales") ?>">Conditions Générales d'Utilisation</a>
            <ul>
                <li><a href="<?php echo url("/espace-membre") ?>">membre</a></li>
                <li><a href="<?php echo url("/espace-admin") ?>">admin</a></li>
            </ul>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            mounted: function () {
                // SIMULE UNE FAUSSE SUPPRESSION
                // BRICOLAGE POUR OBTENIR L'AFFICHAGE
                this.supprimerService({ id: -1});
            },
            methods: {
                modifierService: function(service) {
                    // debug
                    console.log(service);
                    // JE MEMORISE L'ANNONCE A MODIFIER DANS UNE VARIABLE VUEJS
                    this.serviceUpdate = service;
                },
                supprimerService: function(service) {
                    console.log(service);
                    var formData = new FormData();
                    formData.append('id', service.id);
                    formData.append('_token', '{{ csrf_token() }}');

                    fetch('service/supprimer', {
                        method: 'POST',
                        body: formData
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(responseObjetJSON) {
                        if (responseObjetJSON.confirmation)
                        {
                // ON VA STOCKER LA CONFORMATION DANS UNE VARIABLE VUEJS
                            app.confirmation = responseObjetJSON.confirmation;
                        }
                        if (responseObjetJSON.services)
                        {
                // ON VA STOCKER LA CONFORMATION DANS UNE VARIABLE VUEJS
                console.log(responseObjetJSON.services);
                            app.services = responseObjetJSON.services;
                        }
                    });
                },
                envoyerFormAjax: function (event){
                    console.log(event.target);
                    var formData = new FormData(event.target);
                    var urlAction = event.target.getAttribute('action');
                    fetch(urlAction, {
                        method: 'POST',
                        body: formData
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(responseObjetJSON) {
                        if(responseObjetJSON.confirmation){
                            app.confirmation = responseObjetJSON.confirmation;
                        }
                        if(responseObjetJSON.services) {
                            app.services = responseObjetJSON.services;
                        }
                    });
                }
            },
            data: {
                serviceUpdate: null,  
                services: [],
                confirmation: '',
                message: 'Hello Vue!'
            }
        });
    </script>     
</body>
</html>
</body>
</html>