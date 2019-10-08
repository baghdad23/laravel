<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TROC</title>
</head>
<body>
<head>
    <h1>PROJET MARKETPLACE</h1>
    <a href="#"><img src="" id="logo"></a>
    <nav>
        <ul>
            <li><a href="<?php echo url("/") ?>">accueil</a></li>
            <li><a href="<?php echo url("/infos") ?>">Comment ça marche?</a></li>
            <li><a href="<?php echo url("/contact") ?>">contact</a></li>
        </ul>
    </nav>
    <button type="submit" id="inscription">S'INSCRIRE</button>
    <button type="submit" id="connexion">SE CONNECTER</button>
</head>
<main>
    <h3>SECTION ESPACE MEMBRE</h3>
    <div>
        <img src="../public/assets/images/sansPhoto.png">
        <div>  
            <h4>Michel</h4>
            <p>Inscrit depuis le 13 October 2017</p>
            <p>Description du service : Je peux aider pour tout type de réparation, menuiserie, electricité, etc</p>
            <p>Disponible: de lundi à jeudi à partir de 17h</p>
            <p>Nombre de services rendus = 0</p>
            <p>Nombre de services reçus = 0</p>
            <p>Commentaires = 0</p>
            <p>Nombre de crédits = 3</p>
        </div>
        <button type="submit">COMMENTER</button>
        <button type="submit">CONTACTER</button>
    </div>

</main>
<footer>
    <p>XXX est une initiative de la Maison du quartier. Elle est soutenue par la ville de Marseille.</p>
    <p>Vous pouvez nous soumettre des idées d’améliorations, suggérer des services manquants ou signaler un abus : contact@labanquedetemps.com</p>
    <a href="#">Mentions légales</a>
    <a href="#">Conditions Générales d'Utilisation</a>
    <ul>
        <li><a href="<?php echo url("/espace-membre") ?>">membre</a></li>
        <li><a href="<?php echo url("/espace-admin") ?>">admin</a></li>
    </ul>
</footer>
    
</body>
</html>
</body>
</html>