<?php

if (!function_exists("generaBloccoUpdateByKey")) {
    function generaBloccoUpdateByKey()
    {
        echo 'function update'.ucfirst(NOME_TAVOLA).'ByKey($conn,';
        echo generaElencoParametri();
        echo '){';
        echo mandaACapo().mandaACapo().identa().identa();    
        echo '$sql = " UPDATE '.NOME_TAVOLA.' SET ";';
        echo mandaACapo();
        $result = elencoCampiNonChiave();
        if ($result->num_rows > 0) {
            $c=2;
            while ($row = $result->fetch_assoc()) {
                generaIfUpdate($row);
                if($result->num_rows >= $c ){
                    echo ',";';
                }else{
                    echo '";';
                }
                $c++;
            }
        }
        echo mandaACapo().mandaACapo().identa().identa();
        echo '$sql = $sql . " WHERE 1 = 1 ";';
        echo mandaACapo().mandaACapo().identa().identa();
        $result = elencoCampiChiave();
        if ($result->num_rows > 0) {
            $c=2;
            while ($row = $result->fetch_assoc()) {
                generaIfWhere($row);
                if($result->num_rows >= $c ){
                    echo ',";';
                }else{
                    echo ';';
                }
                $c++;
            }
        }
        echo mandaACapo();
        echo mandaACapo();
        echo identa().identa().'$query = $conn->prepare($sql);';
        echo mandaACapo();
        $result = elencoCampiNonChiave();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                generaIfWhereWithSt($row);
            }
        }
        echo mandaACapo();
        echo mandaACapo();
        $result = elencoCampiChiave();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                generaIfWhereWithSt($row);
            }
        }
        
        echo mandaACapo().mandaACapo().identa().identa();
        echo 'generaLog($sql);';
        echo mandaACapo().mandaACapo().identa().identa();
        echo '$query->execute();';
        echo mandaACapo().mandaACapo().identa().identa();
        echo '$result = $query->fetchAll(PDO::FETCH_ASSOC);';
        echo mandaACapo().identa().identa();
        echo 'chiudiConnessione($conn);';
        echo mandaACapo().mandaACapo().identa().identa();
        echo 'return $result;';
        echo mandaACapo().mandaACapo().identa().'}';           
    }
}

if (!function_exists("generaBloccoUpdate")) {
    function generaBloccoUpdate()
    {
        identa();
        generaBloccoUpdateByKey();
        separatoreDiCodice();
    }
}

?>