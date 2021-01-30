<?php

if (!function_exists("generaBloccoSelectByWhere")) {
    function generaBloccoSelectByWhere()
    {
        echo 'function select'.ucfirst(NOME_TAVOLA).'ByWhere($conn,';
        echo generaElencoParametri();
        echo '){';
        echo mandaACapo().mandaACapo().identa().identa();    
        echo '$sql = " SELECT ';
        echo elencoCampiInRiga().' FROM '.NOME_TAVOLA.' WHERE 1 = 1 ";';
        echo mandaACapo();
        $result = elencoCampi();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                generaIfWhere($row);
            }
        }
        
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

if (!function_exists("generaBloccoSelectByKey")) {
    function generaBloccoSelectByKey()
    {
        echo 'function select'.ucfirst(NOME_TAVOLA).'ByKey($conn,';
        echo generaElencoParametriChiave();
        echo '){';
        echo mandaACapo().mandaACapo().identa().identa();    
        echo '$sql = " SELECT ';
        echo elencoCampiInRiga().' FROM '.NOME_TAVOLA.' WHERE 1 = 1 ";';
        echo mandaACapo();
        $result = elencoCampiChiave();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                generaIfWhere($row);
            }
        }
        
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

if (!function_exists("generaBloccoSelect")) {
    function generaBloccoSelect()
    {
        separatoreDiCodice();
        identa();
        generaBloccoSelectByWhere();
        separatoreDiCodice();
        identa();
        generaBloccoSelectByKey();
        separatoreDiCodice();
    }
}

?>