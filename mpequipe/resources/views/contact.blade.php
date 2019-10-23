<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/assets/css/style-commun.css">
    <link rel="stylesheet" href="../public/assets/css/style-contact.css">
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
        <h3>FORMULAIRE DE CONTACT</h3>
        <form method="POST" action="contact/store">
            <input type="text" placeholder="entrez votre nom" name="nom" required>
            <input type="email" placeholder="entrez votre email" name="email" required>
            <textarea name="message" placeholder="entrez votre message" required></textarea>
            <button type="submit">ENVOYER</button>
            @csrf
        </form>
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