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
    <h3>SECTION CONTAC</h3>
    <form method="GET" action="url-traitement.php">
                <label for="contact-nom">nom</label>
                <input type="text" placeholder="entrez votre nom" name="nom" required id="contact-nom">
                <label for="contact-email">email</label>
                <input type="email" placeholder="entrez votre email" name="email" required id="contact-email">
                <label for="contact-message">message</label>
                <textarea name="contact-message" id="contact-message" placeholder="entrez votre message" cols="80" rows="6" required></textarea>
                <button type="submit">envoyer le message</button>
            </form>
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