<?php

include './business/utentiBusiness.php';
include './database/dbUtils.php';

if(isset($_POST["id"])){
    deleteUtentiByKey(apriConnessione(),$_POST["id"]);
    header('location: index.php');
}
