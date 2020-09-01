<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANQUE PEUPLE</title>
    <!-- link for stylesheet -->
    <link rel="stylesheet" href="assets/index.css"/> 
</head>
<body>
<header>
    <div class="brand">Sign In</div>
</header>
    <div class="div_form">
            <form action="clientController.php" method="post">
                <input class="input" type="text" name="login" id="login" autocomplete="off" placeholder="entrer votre login"/><br>
                <input class="input" type="password" name="password" id="pwd" placeholder="entrer votre mot de passe"/><br>
                <button type="submit" name="btn" value="connex" >CONNEXION</button> <button type="reset" id="annuler">ANNULER</button>
            </form>
    </div>    

<script src="assets/login.js" type="text/javascript"></script>
</body>
</html>