<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

body{
    -webkit-background-size: cover;
    background-size: cover;
    font-family: Arial, Helvetica, sans-serif;
    background-color: #D5B772;
}

form{
    padding:10px;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
}

#rating{
    width: 0;
    height: 0;

}

#rating, #contact-message, #pseudo,{
    margin: 40px;
    display: inline;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    height: 30px;
    width: 50%;
    flex-direction: column-reverse;

   /* .rating a {
   color: #aaa;
   text-decoration: none;
   font-size: 3em;
   transition: color .4s;*/
}
.rating a:hover,
.rating a:focus {
   color: #546A79;
   cursor: pointer;
}

.rating a:hover ~ a,
.rating a:focus ~ a {
   color: #546A79;
}

.rating a {
   float: right;
   color: #aaa;
   text-decoration: none;
   font-size: 3em;
   transition: color .4s;

}

.rating a {
   float: right;
   color: #aaa;
   text-decoration: none;
   font-size: 3em;
   transition: color .4s;
}
.rating a:hover,
.rating a:focus,
.rating a:hover ~ a,
.rating a:focus ~ a {
   color: #546A79;
   cursor: pointer;
}
input[type=submit]{
    font-size:16px;
    color: #fff;
    background-color: #546A79;
    border-radius: 5px;
    }
    </style>
</head>
<body>

    <h3>Validation</h3>

<form method="GET" action="url-traitement.php">

<div class="rating">
   <a href="#5" title="Donner 5 étoiles">☆</a>
   <a href="#4" title="Donner 4 étoiles">☆</a>
   <a href="#3" title="Donner 3 étoiles">☆</a>
   <a href="#2" title="Donner 2 étoiles">☆</a>
   <a href="#1" title="Donner 1 étoile">☆</a>

</div>
        <input type="text" name="pseudo" id="pseudo" required placeholder="Pseudo"/>
        <textarea name="contact-message" id="contact-message" placeholder="entrez votre message" cols="80" rows="6" required></textarea>
        <button type="submit">VALIDATION</button>
        @csrf

    </form>
</body>
</html>