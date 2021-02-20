<?php

include './business/utentiBusiness.php';
include './database/dbUtils.php';

if(isset($_POST["inserimento"])){
    insertUtentiWithAutoIncrement(apriConnessione(),$_POST["nome"],$_POST["cognome"],$_POST["data_nascita"],$_POST["comune_nascita"],$_POST["isDiplomato"],$_POST["isLaureato"]);
    //insertUtentiWithKey(apriConnessione(),$_POST["id"],$_POST["nome"],$_POST["cognome"],$_POST["data_nascita"],$_POST["comune_nascita"],$_POST["isDiplomato"],$_POST["isLaureato"]);

}else if(isset($_POST["id"],$_POST["nome"],$_POST["cognome"],$_POST["data_nascita"],$_POST["comune_nascita"],$_POST["isDiplomato"],$_POST["isLaureato"])){
    updateUtentiByKey(apriConnessione(),$_POST["id"],$_POST["nome"],$_POST["cognome"],$_POST["data_nascita"],$_POST["comune_nascita"],$_POST["isDiplomato"],$_POST["isLaureato"]);
}

$result = selectUtentiByWhere(apriConnessione(),null,'R','R',null,null,null,null);

print_r($result);

    echo '<h1>Elenco Utenti</h1>';
    echo '<table>';
    for ($i = 0; $i < count($result); $i++)  {
        $row=$result[$i];
        echo '<tr><form action="index.php" method="POST"><td><input type="text" name="id" value="'.$row["id"].'" /></td><td><input type="text" name="nome" value="'.$row["nome"].'" /></td><td><input type="text" name="cognome" value="'.$row["cognome"].'" /></td><td><input type="text" name="data_nascita" value="'.$row["data_nascita"].'" /></td><td><input type="text" name="comune_nascita" value="'.$row["comune_nascita"].'" /></td><td><input type="text" name="isDiplomato" value="'.$row["isDiplomato"].'" /></td><td><input type="text" name="isLaureato" value="'.$row["isLaureato"].'" /></td><td><input type="submit" value="Salva"/></td></form><form action="delete.php" method="POST"><td><input type="hidden" name="id" value="'.$row["id"].'"/><input type="submit" value="Elimina"/></td></form></tr>';
    }
    echo '</table>';

?>

<h1>Inserisci utente</h1>
<table>
<tr><form action="index.php" method="POST"><td><input type="hidden" name="inserimento" value="true"/><input type="text" name="id" value="" /></td><td><input type="text" name="nome" value="" /></td><td><input type="text" name="cognome" value="" /></td><td><input type="date" name="data_nascita" value="" /></td><td><input type="text" name="comune_nascita" value="" /></td><td><input type="text" name="isDiplomato" value="" /></td><td><input type="text" name="isLaureato" value="" /></td><td><input type="submit" value="Aggiungi"></td></form></tr>
</table>

