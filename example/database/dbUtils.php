<?php

if (!function_exists('apriConnessione')) {
    function apriConnessione()
    {
        return $conn = new mysqli("localhost", "root", "", "php_table_gen");
    }
}
if (!function_exists('chiudiConnessione')) {
    function chiudiConnessione($conn)
    {
        $conn->close();
    }
}

if (!function_exists('generaLog')) {
    function generaLog($contenuto)
    {
            file_put_contents("php-table-gen.log", date("h:i:s d/m/Y") . " - " . $contenuto . "\n", FILE_APPEND);
    }
}



?>