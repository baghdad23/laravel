<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/assets/css/style-commun.css">
    <link rel="stylesheet" href="../public/assets/css/style-profil.css">
    <title>TROC HOUR</title>
</head>
<body>
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
                <li><a href="<?php echo url("/contact") ?>">CONTACT</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
    <!--<h3>SECTION PROFIL</h3>-->
    <section id="profil">
        <div id="profilImage">
            <img src="../public/assets/images/sansPhoto.png">
        </div>
        <div id="profilTexte"> 
            <h4>Michel</h4> 
            <p>Inscrit depuis le 13 October 2017</p>
            <p>Description du service :</p>
            <p>Je peux aider pour tout type de réparation, menuiserie, electricité, etc</p>
            <p>Disponible:</p>
            <p>de lundi à jeudi à partir de 17h</p>
            <p>Nombre de services rendus = 0</p>
            <p>Nombre de services reçus = 0</p>
            <p>Commentaires = 0</p>
            <p>Nombre de crédits = 3</p>
        </div>
        <div id="profilBouton">
            <button type="submit">COMMENTER</button>
            <button type="submit">CONTACTER</button>
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
    
</body>
</html>
</body>
</html>