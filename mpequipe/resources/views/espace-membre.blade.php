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
<header>
    <!--<h1>PROJET MARKETPLACE</h1>-->
    <a href="#"  id="logo"><img src="../public/assets/images/logo.png"></a>
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
</header>
<main>
    <!--<h3>SECTION ESPACE MEMBRE</h3>-->
    <section id="espaceMembre">
        <div>
            <img src="../public/assets/images/sansPhoto.png">
            <div id="espaceMembreBouton">
                <button type="submit">MODIFIER DONNÉES</button>
                <button type="submit">NOUVEAU SERVICE</button>
            </div>
        </div>
        <div class="espaceMembreForm">
            <h4>MODIFIER DONNÉES</h4>
            <form method="POST" action="">  
                <input type="texte" name="nom" placeholder="entrez votre nom" required>
                <input type="date" name="dateInscription">
                <input type="texte" name="pseudo" placeholder="entrez votre pseudo" required>
                <input type="password" name="pasword" placeholder="entrez votre mot de passe" required>
                <input type="file" name="photo">
                <button type="submit">CHANGER DONNÉES</button>
            </form>
        </div>
        <div class="espaceMembreForm">
            <h4>CREATE</h4>
            <form method="POST" action="">  
                <input type="texte" name="service" placeholder="entrez le service" required>
                <textarea name="description" placeholder="entrez description du service"></textarea>
                <input type="texte" name="disponibilite" placeholder="entrez la disponibilité" required>
                <button type="submit">PUBLIER SERVICE</button>
            </form>
        </div>
        <div class="espaceMembreForm">
            <h4>UPDATE</h4>
            <form method="POST" action="">  
                <input type="texte" name="service" placeholder="entrez le service" required>
                <textarea name="description" placeholder="entrez description du service"></textarea>
                <input type="texte" name="disponibilite" placeholder="entrez la disponibilité" required>
                <button type="submit">MODIFIER SERVICE</button>
            </form>
        </div>
        <div id="espaceMembreListe">
            <h4>LISTE SERVICES</h4>
            <div class="service">
                <p>SERVICE 1</p>
                <div class="boutonService">
                    <button type="submit">MODIFIER</button>
                    <button type="submit">SUPRIMMER</button>
                </div>
            </div>
            <div class="service">
                <p>SERVICE 2</p>
                <div class="boutonService">
                    <button type="submit">MODIFIER</button>
                    <button type="submit">SUPRIMMER</button>
                </div>
            </div>
            <div class="service">
                <p>SERVICE 3</p>
                <div class="boutonService">
                    <button type="submit">MODIFIER</button>
                    <button type="submit">SUPRIMMER</button>
                </div>
            </div>
        </div>
    </section>
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