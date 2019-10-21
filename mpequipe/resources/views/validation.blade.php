<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/assets/css/style-validation.css">
    <title>Document</title>
   
</head>
<body>

    <h3>Validation</h3>

<form method="post" action="url-traitement.php">

<div class="rating">
   <a href="#5" title="Donner 5 étoiles">☆</a>
   <a href="#4" title="Donner 4 étoiles">☆</a>
   <a href="#3" title="Donner 3 étoiles">☆</a>
   <a href="#2" title="Donner 2 étoiles">☆</a>
   <a href="#1" title="Donner 1 étoile">☆</a>

</div>
        <input type="text" name="pseudo" id="pseudo" required placeholder="Pseudo"/>
        <textarea name="contact-message" id="contact-message" placeholder="Entrez votre message" cols="80" rows="6" required></textarea>
        <button type="submit">VALIDATION</button>
        @csrf

    </form>
</body>
</html>