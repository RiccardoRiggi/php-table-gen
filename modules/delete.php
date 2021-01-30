<?php

if (!function_exists("generaBloccoDeleteByKey")) {
    function generaBloccoDeleteByKey()
    {
        echo 'function delete' . ucfirst(NOME_TAVOLA) . 'ByKey($conn,';
        echo generaElencoParametriChiave();
        echo '){';
        echo mandaACapo() . mandaACapo() . identa() . identa();
        echo '$sql = " DELETE FROM ' . NOME_TAVOLA . ' ";';

        echo mandaACapo() . mandaACapo() . identa() . identa();
        echo '$sql = $sql. " WHERE 1 = 1 ";';
        echo mandaACapo() . mandaACapo() . identa() . identa();
        $result = elencoCampiChiave();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                generaIfWhere($row);
            }
        }

        echo mandaACapo() . mandaACapo() . identa() . identa();
        echo 'generaLog($sql);';
        echo mandaACapo() . mandaACapo() . identa() . identa();
        echo '$result = $conn->query($sql);';
        echo mandaACapo() . identa() . identa();
        echo 'chiudiConnessione($conn);';
        echo mandaACapo() . mandaACapo() . identa() . identa();
        echo 'return $result;';
        echo mandaACapo() . mandaACapo() . identa() . '}';
    }
}

if (!function_exists("generaBloccDeleteByWhere")) {
    function generaBloccDeleteByWhere()
    {
        echo 'function delete' . ucfirst(NOME_TAVOLA) . 'ByWhere($conn,';
        echo generaElencoParametri();
        echo '){';
        echo mandaACapo() . mandaACapo() . identa() . identa();
        echo '$sql = " DELETE FROM ' . NOME_TAVOLA . ' ";';

        echo mandaACapo() . mandaACapo() . identa() . identa();
        echo '$sql = $sql. " WHERE 1 = 1 ";';
        echo mandaACapo() . mandaACapo() . identa() . identa();
        $result = elencoCampi();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                generaIfWhere($row);
            }
        }

        echo mandaACapo() . mandaACapo() . identa() . identa();
        echo 'generaLog($sql);';
        echo mandaACapo() . mandaACapo() . identa() . identa();
        echo '$result = $conn->query($sql);';
        echo mandaACapo() . identa() . identa();
        echo 'chiudiConnessione($conn);';
        echo mandaACapo() . mandaACapo() . identa() . identa();
        echo 'return $result;';
        echo mandaACapo() . mandaACapo() . identa() . '}';
    }
}

if (!function_exists("generaBloccoDelete")) {
    function generaBloccoDelete()
    {
        identa();
        generaBloccDeleteByWhere();
        separatoreDiCodice();
        identa();
        generaBloccoDeleteByKey();
        separatoreDiCodice();
    }
}
