<?php

if (!function_exists('apriConnessione')) {
    function apriConnessione()
    {
        $conn = new PDO("mysql:host=localhost;dbname=php_table_gen","root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}
if (!function_exists('chiudiConnessione')) {
    function chiudiConnessione($conn)
    {
        $conn=null;
    }
}

if (!function_exists('generaLog')) {
    function generaLog($contenuto)
    {
            file_put_contents("php-table-gen.log", date("h:i:s d/m/Y") . " - " . $contenuto . "\n", FILE_APPEND);
    }
}



?>