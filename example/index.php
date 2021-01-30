<?php

include './business/utentiBusiness.php';
include './database/dbUtils.php';

if(isset($_POST["inserimento"])){
    insertUtentiWithAutoIncrement(apriConnessione(),$_POST["nome"],$_POST["cognome"],$_POST["data_nascita"],$_POST["comune_nascita"],$_POST["isDiplomato"],$_POST["isLaureato"]);
}

$result = selectUtentiByKey(apriConnessione(),null);

if ($result->num_rows > 0) {
    echo '<h1>Elenco Utenti</h1>';
    echo '<table>';
    while ($row = $result->fetch_assoc()) {

        echo '<tr><td><input type="text" name="id" value="'.$row["id"].'" /></td><td><input type="text" name="nome" value="'.$row["nome"].'" /></td><td><input type="text" name="cognome" value="'.$row["cognome"].'" /></td><td><input type="text" name="data_nascita" value="'.$row["data_nascita"].'" /></td><td><input type="text" name="comune_nascita" value="'.$row["comune_nascita"].'" /></td><td><input type="text" name="isDiplomato" value="'.$row["isDiplomato"].'" /></td><td><input type="text" name="isLaureato" value="'.$row["isLaureato"].'" /></td></tr>';
    }
    echo '</table>';
}

?>

<h1>Inserisci utente</h1>
<table>
<tr><form action="index.php" method="POST"><td><input type="hidden" name="inserimento" value="true"/><input type="text" name="id" value="" /></td><td><input type="text" name="nome" value="" /></td><td><input type="text" name="cognome" value="" /></td><td><input type="date" name="data_nascita" value="" /></td><td><input type="text" name="comune_nascita" value="" /></td><td><input type="text" name="isDiplomato" value="" /></td><td><input type="text" name="isLaureato" value="" /></td><td><input type="submit" value="Aggiungi"></td></form></tr>
</table>

