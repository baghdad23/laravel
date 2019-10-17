<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/assets/css/style-commun.css">
    <link rel="stylesheet" href="../public/assets/css/style-liste-services.css">
        <!-- Import Leaflet CSS Style Sheet -->
<link rel="stylesheet" href="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.css" />
<!-- Import Leaflet JS Library -->
<script src="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.js"></script>
    <title>TROC HOUR</title>
</head>
<body>
<header>
    <!--<h1>PROJET MARKETPLACE</h1>-->
    <a href="#"  id="logo"><img src="../public/assets/images/logo.png"></a>
    <div>
        <div id="boutonsConnexion">
            <button type="submit" id="inscription">S'INSCRIRE</button>
            <button type="submit" id="connexion">SE CONNECTER</button>
        </div>
        <nav>
            <ul id="menu">
                <li><a href="<?php echo url("/") ?>">ACCUEIL</a></li>
                <li><a href="<?php echo url("/infos") ?>">COMMENT ÇA MARCHE?</a></li>
                <li><a href="<?php echo url("/contact") ?>">CONTACT</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
    <div id="container">
        <section id="listeServices">
            <div id="liste">
                <h3>LISTE DE SERVICES</h3>
                <!-- <button type="submit">VOIR CARTE</button> -->
            </div>
            <div class="carteService">
                <div class="carteImage">
                    <img src="../public/assets/images/sansPhoto.png" title="">
                    <button type="submit">VOIR PROFIL</button>
                </div>
                <div class="carteTexte">
                    <h4>Michel</h4>
                    <p>Description du service :</p>
                    <p> Je peux aider pour tout type de réparation, menuiserie, electricité, etc.</p>
                </div>
            </div>
            <div class="carteService">
                <div class="carteImage">
                    <img src="../public/assets/images/sansPhoto.png" title="">
                    <button type="submit">VOIR PROFIL</button>
                </div>
                <div class="carteTexte">
                    <h4>Michel</h4>
                    <p>Description du service :</p>
                    <p> Je peux aider pour tout type de réparation, menuiserie, electricité, etc.</p>
                </div>
            </div>
            <div class="carteService">
                <div class="carteImage">
                    <img src="../public/assets/images/sansPhoto.png" title="">
                    <button type="submit">VOIR PROFIL</button>
                </div>
                <div class="carteTexte">
                    <h4>Michel</h4>
                    <p>Description du service :</p>
                    <p> Je peux aider pour tout type de réparation, menuiserie, electricité, etc.</p>
                </div>
            </div>
        </section>
        <section id="map">
            <div id="my_osm_widget_map" class="map"></div>
        </section>
    </div>
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
<script src="../public/assets/js/appMap.js"></script>
    
</body>
</html>
</body>
</html>