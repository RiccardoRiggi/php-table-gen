<?php

if (!function_exists("generaBloccoInsertWithAutoIncrement")) {
    function generaBloccoInsertWithAutoIncrement()
    {
        echo 'function insert'.ucfirst(NOME_TAVOLA).'WithAutoIncrement($conn,';
        echo generaElencoParametriNonChiave();
        echo '){';
        echo mandaACapo().mandaACapo().identa().identa();    
        echo '$sql = " INSERT INTO '.NOME_TAVOLA.'( ";';
        echo mandaACapo();
        $result = elencoCampiNonChiavePrimaria();
        if ($result->num_rows > 0) {
            $c=2;
            while ($row = $result->fetch_assoc()) {
                generaIfInsert($row);
                if($result->num_rows >= $c ){
                    echo ',";';
                }else{
                    echo '";';
                }
                $c++;
            }
        }
        echo mandaACapo().mandaACapo().identa().identa();    
        echo '$sql = $sql . " ) VALUES ( ";';
        $resultDue = elencoCampiNonChiave();
        if ($resultDue->num_rows > 0) {
            $cc=2;
            while ($row = $resultDue->fetch_assoc()) {
                generaIfInsertValore($row);
                if($resultDue->num_rows >= $cc ){
                    echo '.",";';
                }else{
                    echo ';';
                }
                $cc++;
            }
        }
        echo mandaACapo().mandaACapo().identa().identa();    
        echo '$sql = $sql . " ) ";';        
        echo mandaACapo().mandaACapo().identa().identa();
        echo 'generaLog($sql);';
        echo mandaACapo().mandaACapo().identa().identa();
        echo '$result = $conn->query($sql);';
        echo mandaACapo().identa().identa();
        echo 'chiudiConnessione($conn);';
        echo mandaACapo().mandaACapo().identa().identa();
        echo 'return $result;';
        echo mandaACapo().mandaACapo().identa().'}';           
    }
}

if (!function_exists("generaBloccoInsertWithKey")) {
    function generaBloccoInsertWithKey()
    {
        echo 'function insert'.ucfirst(NOME_TAVOLA).'WithKey($conn,';
        echo generaElencoParametri();
        echo '){';
        echo mandaACapo().mandaACapo().identa().identa();    
        echo '$sql = " INSERT INTO '.NOME_TAVOLA.'( ";';
        echo mandaACapo();
        $result = elencoCampi();
        if ($result->num_rows > 0) {
            $c=2;
            while ($row = $result->fetch_assoc()) {
                generaIfInsert($row);
                if($result->num_rows >= $c ){
                    echo ',";';
                }else{
                    echo '";';
                }
                $c++;
            }
        }
        echo mandaACapo().mandaACapo().identa().identa();    
        echo '$sql = $sql . " ) VALUES ( ";';
        $result = elencoCampi();
        if ($result->num_rows > 0) {
            $c=2;
            while ($row = $result->fetch_assoc()) {
                generaIfInsertValore($row);
                if($result->num_rows >= $c ){
                    echo '.",";';
                }else{
                    echo ';';
                }
                $c++;
            }
        }
        echo mandaACapo().mandaACapo().identa().identa();    
        echo '$sql = $sql . " ) ";';        
        echo mandaACapo().mandaACapo().identa().identa();
        echo 'generaLog($sql);';
        echo mandaACapo().mandaACapo().identa().identa();
        echo '$result = $conn->query($sql);';
        echo mandaACapo().identa().identa();
        echo 'chiudiConnessione($conn);';
        echo mandaACapo().mandaACapo().identa().identa();
        echo 'return $result;';
        echo mandaACapo().mandaACapo().identa().'}';           
    }
}


if (!function_exists("generaBloccoInsert")) {
    function generaBloccoInsert()
    {
        identa();
        generaBloccoInsertWithAutoIncrement();
        separatoreDiCodice();
        identa();
        generaBloccoInsertWithKey();
        separatoreDiCodice();
    }
}

?>