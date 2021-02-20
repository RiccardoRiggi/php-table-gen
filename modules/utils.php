<?php

if (!function_exists("generaBloccoIniziale")) {
    function generaBloccoIniziale()
    {
        echo '<?php
        
        //DAO della tavola "' . NOME_TAVOLA . '" generato con PHP-TABLE-GEN di Riccardo Riggi versione ' . VERSIONE_APPLICAZIONE;
    }
}

if (!function_exists("generaBloccoFinale")) {
    function generaBloccoFinale()
    {
        echo '?>';
    }
}

if (!function_exists("generaElencoParametriNonChiave")) {
    function generaElencoParametriNonChiave()
    {
        $conn = apriConnessione();
        $sql = "select COLUMN_NAME from information_schema.columns where table_schema = '" . NOME_ISTANZA_DATABASE . "' and TABLE_NAME = '" . NOME_TAVOLA . "' and COLUMN_KEY not in ('PRI','MUL','UNI')  order by table_name,ordinal_position";
        $result = $conn->query($sql);
        $c = 2;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "$" . $row["COLUMN_NAME"];
                if ($result->num_rows >= $c) {
                    echo ',';
                }
                $c++;
            }
        }
        chiudiConnessione($conn);
    }
}

if (!function_exists("generaElencoParametriChiave")) {
    function generaElencoParametriChiave()
    {
        $conn = apriConnessione();
        $sql = "select COLUMN_NAME from information_schema.columns where table_schema = '" . NOME_ISTANZA_DATABASE . "' and TABLE_NAME = '" . NOME_TAVOLA . "' and COLUMN_KEY in ('PRI','MUL','UNI')  order by table_name,ordinal_position";
        $result = $conn->query($sql);
        $c = 2;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "$" . $row["COLUMN_NAME"];
                if ($result->num_rows >= $c) {
                    echo ',';
                }
                $c++;
            }
        }
        chiudiConnessione($conn);
    }
}

if (!function_exists("generaElencoParametri")) {
    function generaElencoParametri()
    {
        $conn = apriConnessione();
        $sql = "select COLUMN_NAME from information_schema.columns where table_schema = '" . NOME_ISTANZA_DATABASE . "' and TABLE_NAME = '" . NOME_TAVOLA . "'  order by table_name,ordinal_position";
        $result = $conn->query($sql);
        $c = 2;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "$" . $row["COLUMN_NAME"];
                if ($result->num_rows >= $c) {
                    echo ',';
                }
                $c++;
            }
        }
        chiudiConnessione($conn);
    }
}

if (!function_exists("elencoCampiInRiga")) {
    function elencoCampiInRiga()
    {
        $conn = apriConnessione();
        $sql = "select COLUMN_NAME from information_schema.columns where table_schema = '" . NOME_ISTANZA_DATABASE . "' and TABLE_NAME = '" . NOME_TAVOLA . "' order by table_name,ordinal_position";
        $result = $conn->query($sql);
        $c = 2;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row["COLUMN_NAME"];
                if ($result->num_rows >= $c) {
                    echo ',';
                }
                $c++;
            }
        }
        chiudiConnessione($conn);
    }
}

if (!function_exists("elencoCampiInRigaSenzaChiave")) {
    function elencoCampiInRigaSenzaChiave()
    {
        $conn = apriConnessione();
        $sql = "select COLUMN_NAME from information_schema.columns where table_schema = '" . NOME_ISTANZA_DATABASE . "' and TABLE_NAME = '" . NOME_TAVOLA . "' and COLUMN_KEY not in ('PRI','MUL','UNI') order by table_name,ordinal_position";
        $result = $conn->query($sql);
        $c = 2;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row["COLUMN_NAME"];
                if ($result->num_rows >= $c) {
                    echo ',';
                }
                $c++;
            }
        }
        chiudiConnessione($conn);
    }
}

if (!function_exists("elencoCampi")) {
    function elencoCampi()
    {
        $conn = apriConnessione();
        $sql = "select * from information_schema.columns where table_schema = '" . NOME_ISTANZA_DATABASE . "' and TABLE_NAME = '" . NOME_TAVOLA . "' order by table_name,ordinal_position";
        $result = $conn->query($sql);
        chiudiConnessione($conn);
        return $result;
    }
}

if (!function_exists("elencoCampiChiave")) {
    function elencoCampiChiave()
    {
        $conn = apriConnessione();
        $sql = "select * from information_schema.columns where table_schema = '" . NOME_ISTANZA_DATABASE . "' and TABLE_NAME = '" . NOME_TAVOLA . "' and COLUMN_KEY in ('PRI','MUL','UNI') order by table_name,ordinal_position";
        $result = $conn->query($sql);
        chiudiConnessione($conn);
        return $result;
    }
}

if (!function_exists("elencoCampiNonChiave")) {
    function elencoCampiNonChiave()
    {
        $conn = apriConnessione();
        $sql = "select * from information_schema.columns where table_schema = '" . NOME_ISTANZA_DATABASE . "' and TABLE_NAME = '" . NOME_TAVOLA . "' and COLUMN_KEY not in ('PRI','MUL','UNI') order by table_name,ordinal_position";
        $result = $conn->query($sql);
        chiudiConnessione($conn);
        return $result;
    }
}

if (!function_exists("elencoCampiNonChiavePrimaria")) {
    function elencoCampiNonChiavePrimaria()
    {
        $conn = apriConnessione();
        $sql = "select * from information_schema.columns where table_schema = '" . NOME_ISTANZA_DATABASE . "' and TABLE_NAME = '" . NOME_TAVOLA . "' and COLUMN_KEY not in ('PRI') order by table_name,ordinal_position";
        $result = $conn->query($sql);
        chiudiConnessione($conn);
        return $result;
    }
}

if (!function_exists('generaIfUpdate')) {
    function generaIfUpdate($row)
    {
        echo mandaACapo() . identa() . identa();
        echo 'if($' . $row["COLUMN_NAME"] . '!=null)';
        echo mandaACapo() . identa() . identa() . identa();
        if ($row["DATA_TYPE"] == "varchar" || $row["DATA_TYPE"] == "date"){
            $apice = "'";
            echo '$sql = $sql . "' . $row["COLUMN_NAME"] . ' = '.$apice.'".mysqli_real_escape_string($conn,$' . $row["COLUMN_NAME"] . ')."'.$apice.'';
        }else
            echo '$sql = $sql . "' . $row["COLUMN_NAME"] . ' = ".mysqli_real_escape_string($conn,$' . $row["COLUMN_NAME"] . ')."';
    }
}

if (!function_exists('generaMysqli_real_escape_stringConDataType')) {
    function generaMysqli_real_escape_stringConDataType($columnName, $dataType)
    {
        if ($dataType == 'varchar') {
            return "' mysqli_real_escape_string(\$conn,$" . $columnName . ")'";
        }
    }
}

if (!function_exists('generaIfWhere')) {
    function generaIfWhere($row)
    {
        echo mandaACapo() . identa() . identa();
        echo 'if($' . $row["COLUMN_NAME"] . '!=null)';
        echo mandaACapo() . identa() . identa() . identa();
        echo '$sql = $sql . "AND ' . $row["COLUMN_NAME"] . ' = :'.$row["COLUMN_NAME"].' ";';
    }
}

if (!function_exists('generaIfWhereWithSt')) {
    function generaIfWhereWithSt($row)
    {
        echo mandaACapo() . identa() . identa();
        echo 'if($' . $row["COLUMN_NAME"] . '!=null)';
        echo mandaACapo() . identa() . identa() . identa();
        echo '$query -> bindParam(\':';
        echo $row["COLUMN_NAME"].'\',$' . $row["COLUMN_NAME"] . ');';
    }
}

if (!function_exists('getBindDataType')) {
    function getBindDataType($row)
    {
        if($row["DATA_TYPE"]=='char' || $row["DATA_TYPE"]=='varchar' || $row["DATA_TYPE"]=='binary' || $row["DATA_TYPE"]=='varbinary' || $row["DATA_TYPE"]=='text' || $row["DATA_TYPE"]=='enum' || $row["DATA_TYPE"]=='set' || $row["DATA_TYPE"]=='date' || $row["DATA_TYPE"]=='time' || $row["DATA_TYPE"]=='datetime'){
            echo 's';
        }else if($row["DATA_TYPE"]=='integer' || $row["DATA_TYPE"]=='int' || $row["DATA_TYPE"]=='smallint' || $row["DATA_TYPE"]=='tinyint' || $row["DATA_TYPE"]=='mediumint' || $row["DATA_TYPE"]=='bigint' || $row["DATA_TYPE"]=='timestamp' || $row["DATA_TYPE"]=='year'){
            echo 'i';
        }else if($row["DATA_TYPE"]=='float' || $row["DATA_TYPE"]=='double' ){
            echo 'd';
        }else if($row["DATA_TYPE"]=='blob' ){
            echo 'b';
        }
    }
}

if (!function_exists('generaIfInsertValore')) {
    function generaIfInsertValore($row)
    {
        echo mandaACapo() . identa() . identa();
        echo 'if($' . $row["COLUMN_NAME"] . '!=null)';
        echo mandaACapo() . identa() . identa() . identa();
        if ($row["DATA_TYPE"] == "varchar" || $row["DATA_TYPE"] == "date") {
            $apice = "'";
            echo '$sql = $sql ."' . $apice . '".mysqli_real_escape_string($conn,$' . $row["COLUMN_NAME"] . ')."' . $apice . '"';
        } else {
            echo '$sql = $sql .mysqli_real_escape_string($conn,$' . $row["COLUMN_NAME"] . ')';
        }
    }
}

if (!function_exists('generaIfInsert')) {
    function generaIfInsert($row)
    {
        echo mandaACapo() . identa() . identa();
        echo 'if($' . $row["COLUMN_NAME"] . '!=null)';
        echo mandaACapo() . identa() . identa() . identa();
        echo '$sql = $sql . "' . $row["COLUMN_NAME"];
    }
}

if (!function_exists('apriConnessione')) {
    function apriConnessione()
    {
        return $conn = new mysqli(INDIRIZZO_SERVER_DATABASE, USERNAME_DATABASE, PASSWORD_DATABASE, NOME_ISTANZA_DATABASE);
    }
}
if (!function_exists('chiudiConnessione')) {
    function chiudiConnessione($conn)
    {
        $conn->close();
    }
}
if (!function_exists('mandaACapo')) {
    function mandaACapo()
    {
        echo PHP_EOL;
    }
}
if (!function_exists('separatoreDiCodice')) {
    function separatoreDiCodice()
    {
        echo PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL;
    }
}
if (!function_exists('identa')) {
    function identa()
    {
        echo chr(9);
    }
}
