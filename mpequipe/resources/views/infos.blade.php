<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/assets/css/style-commun.css">
    <link rel="stylesheet" href="../public/assets/css/style-infos.css">

    <title>TROC HOUR</title>
</head>
<body>
<header>
    <!--<h1>PROJET MARKETPLACE</h1>-->
    <a href="#"  id="logo"><img src="../public/assets/images/logo.png"></a>
    <div>
        <div id="boutonsConnexion">
            <a href="<?php echo url("/inscription") ?>">S'INSCRIRE</a>
            <a href="<?php echo url("/connexion") ?>">SE CONNECTER</a>
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
    <h3>Comment ça marche ?</h3>
    <div id="conteneur">
        <div class="personnage"> 
            <img id="sophie" src="../public/assets/images/sophie.png">            
            <p class="contenu"id="sophiecontenu">Sophie, 30 ans, Atsem dans l’école maternelle du quartier. Elle s’inscrit gratuitement à troc'hour. Elle communique les types de services qu‘elle offre aux autres et ceux dont elle a besoin.</p>
        </div>
        <div class="personnage"> 
            <img id="sophie2" src="../public/assets/images/sophie2.png">
            <p class="contenu">Elle reçoit 3 crédits (3 heures). Chaque crédit équivaut à une heure de service échangé. Elle consulte les services proposés... </p>
        </div>
        <div class="personnage"> 
            <img id="sophiePaul" src="../public/assets/images/sophiePaul.png">
            <p class="contenu"  id="sophiePaulcontenu">et elle contacte Paul pour qu’il l’aide à jardiner. Elle dépense un crédit pour 1h de service.</p>
        </div>
        <div class="personnage"> 
            <img src="../public/assets/images/paulHayat.png">
            <p class="contenu">Paul utilise son crédit pour recevoir 1h de cours de peinture proposé par Hayat.</p>
        </div>
        <div class="personnage"> 
            <img id="hayatMario" src="../public/assets/images/hayatMario.png">
            <p class="contenu" id="hayatMariocontenu">Hayat à son tour choisit de dépenser son crédit pour une heure de cuisine faite par Mario.</p>
        </div>
        <div class="personnage"> 
            <img  id="MarioAbdel" src="../public/assets/images/MarioAbdel.png">
            <p class="contenu" id="MarioAbdelcontenu">Mario choisit Abdel pour la garde de ses enfants.. </p>
        </div>
    </div>
</main>
<footer>
    <p>Troc Hour est une initiative de la Maison du quartier. Elle est soutenue par la ville de Marseille.</p>
    <p>Vous pouvez nous soumettre des idées d’améliorations, suggérer des services manquants ou signaler un abus : contact@troc-hour.com</p>
    <a href="<?php echo url("/mentions-legales") ?>">Mentions légales</a>
    <a href="<?php echo url("/conditions-generales") ?>">Conditions Générales d'Utilisation</a>
    <ul>
        <li><a href="<?php echo url("/espace-membre") ?>">membre</a></li>
        <li><a href="<?php echo url("/espace-admin") ?>">admin</a></li>
    </ul>
</footer>
    
</body>
</html>
