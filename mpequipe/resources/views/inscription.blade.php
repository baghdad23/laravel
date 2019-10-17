<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <title>Formulaire d'inscription</title>
<style>
body{
    -webkit-background-size: cover;
    background-size: cover;
    font-family: Arial, Helvetica, sans-serif;
    background-color: #D5B772;
}

/* Le bouton de validation*/
.Inscription{
    display: block;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    height: 30px;
    width: 15%;
}

input[type=submit]{
    font-size:16px;
    color: #fff;
    background-color: #546A79;
    border-radius: 5px;
    }


/* La disposition des boutons hommes & femmes*/
.milieu {
    padding:10px;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
}

/* La disposition, la longueur, largeur des boutons à remplir*/
#nom, #prenom, #pseudo, #phone, #codepostal, #adress, #mdp{
    margin: 10px;
    display: block;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    height: 30px;
    width: 25%;

}

/* La taille du H3*/
h3 {font-size: 46px;
    text-align: center;
}

</style>
    
</head>

<body>

<h3>Inscription</h3>

    <form action method="post" action="">



<div class="milieu">
    <label for="homme">Homme</label><input type="radio" name="sexe" id="homme" value="homme" id="homme"/>
    <label for="femme">Femme</label><input type="radio" name="sexe"id="femme" value="femme" id="femme"/>
</div>

    <input type="text" name="nom" id="nom" required placeholder="Nom"/>
    <input type="text" name="prenom" id="prenom" required placeholder="Prenom"/>
    <input type="text" name="pseudo" id="pseudo" required placeholder="Pseudo"/>
    <input type="tel"  name="phone" id="phone" required placeholder="Télephone"/>
    <input type="text"  name="adress" id="adress" required placeholder="Adress"/>
    <input type="text"  name="codepostal" id="codepostal" required placeholder="Code postal"/>
    <input type="password" name="mdp" id="mdp" placeholder="Mot de passe"/>

  <input type="submit" value="inscription" class="Inscription"/>
  @csrf



    </form>

</body>
</html>
