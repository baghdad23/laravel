<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>TROC</title>

    <style>


body{
    margin: 0;
    padding: 0;
    -webkit-background-size: cover;
    background-size: cover;
    width: 20%;
    font-family: Arial, Helvetica, sans-serif;
    background-color: #D5B772;
}

input{
    width: 100%;
    display: block;
    margin: 1px auto;
    padding: 15px;
    background-color: #546A79; 

input[type=submit]{
    font-size:16px;
    background-color: width;
    border-radius: 5px;
    }  

.input[type=submit]{
    font-size:16px;
    color: #fff;
    background-color: #546A79;
    border-radius: 5px;

}

}
.bg-modal {
    width: 100%;
    height: 100%;
    background-color: rgbo(0, 0, 0, 0, 0.7);
    position: absolute;
    top: 0; 
    display: flex;
    justify-content: center;
    align-items: center;
}
.modal-content{
    width: 500px;
    height: 300px;
    background-color: #DSB772;
    border-radius: 100px;
}

    </style>

</head>
<body>
<h3>CONNEXION</h3>
    
   
<main>
<div class="bg-modal">
    <div class="modal-content">
    
   
<form>

    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="mdp" placeholder="Mot de passe"><br>
    <input type="submit" value="Se connecter">
    @csrf

</form>
    </div>
    </div>
</main>

</body>
</body>
</html>