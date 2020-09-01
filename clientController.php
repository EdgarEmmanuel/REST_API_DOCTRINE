<?php 
require "bootstrap.php";
require "src/entities/Client.php";
require "src/entities/Compte.php";
require "src/entities/TypeClient.php";
require "src/entities/TypeCompte.php";
require "src/entities/Operation.php";

if(isset($_POST["btn"])){
    $data = $entityManager->getRepository("Client")->findBy([
        "login"=>$_POST["login"],
        "password"=>$_POST["password"]
    ]);
    if($data!=null){
        foreach($data as $client){
            $idClient=$client->getId();
            $client_data["id"]=$idClient;
            $client_data["nom"]=$client->getNom();
            $client_data["prenom"]=$client->getPrenom();
            $client_data["matricule"]=$client->getMatricule();
            $client_data["login"]=$client->getLogin();
            $client_data["password"]=$client->getPassword();

            //put the client in the array 
            $allData["data"]["clients"]=$client_data;
        }

        //fetch where the account.client_id equals $idClient the id of the
        $comptes = $entityManager->getRepository("Compte")->findBy([
            "client"=>$idClient
        ]);

        if($comptes!=null){
            $i=0;
            foreach($comptes as $compte){
                $idCompte = $compte->getId();
                $compte_data["compte"]=$compte->getNumero();
                $compte_data["cleRib"]=$compte->getCleRip();
                $compte_data["solde"] = $compte->getSolde();
                $compte_data["etat"] = $compte->getEtat();
                $compte_data["date_creation"] = $compte->getDateCreation();
                $compte_data["date_fermeture"] = $compte->getDateFermeture();
                $compte_data["TypeCompte"] = $compte->getTypeCompte()->getLibelle();
                $allCompte[$i++]=$compte_data;
            }

            //put all the account in th array 
            $allData["data"]["comptes"]=$allCompte;
            

            $operations = $entityManager->getRepository("Operation")->findBy([
                "compte"=>$idCompte
            ]);

            $k=0;
            foreach($operations as $op){
                $operation_data["id"]=$op->getId();
                $operation_data["montant"]=$op->getMontant();
                $operation_data["typeOperation"]=$op->getnomOperation();
                $operation_data["dateOperation"]=$op->getDate();
                $operation_data["numeroCompte"]=$op->getCompte()->getNumero();
                $allOperations[$k++]=$operation_data;
            } 
            $allData["data"]["operation"]=$allOperations;
            
            ?>

<!DOCTYPE html>
<html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" 
rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
type="text/css" rel="stylesheet">
<link rel="stylesheet" href="assets/dash.css"/>
</head>
<body>
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Dashboard</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="#"><i class="fa fa-user-secret"></i> My Profile</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">

    <ul class="nav nav-pills nav-stacked" style="border-right:1px solid black">
        <!--<li class="nav-header"></li>-->
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ul>
</div><!-- /span-3 -->
<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
    <!-- Right -->
    <strong><span class="fa fa-dashboard"></span> Mes Donnees</strong>
<hr>
<h1>INFORMATIONS CLIENT</h1>
<?php
$dataClients = json_encode($allData["data"]["clients"]);
echo $dataClients;
?>

<h1>INFORMATION COMPTE(S)</h1>
<?php
$dataComptes = json_encode($allData["data"]["comptes"]);
echo $dataComptes;
?>

<h1>TOUTES LES OPERATIONS COMPTE(S)</h1>
<?php
$dataOperations = json_encode($allData["data"]["operation"]);
echo $dataOperations;
?>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</body>
</html>


      <?php  }else{
            echo '<meta http-equiv="refresh" content="0;URL=index.php>';
        }
       
    }else{
        echo '<meta http-equiv="refresh" content="0;URL=index.php>';
    }
}else{
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

?>