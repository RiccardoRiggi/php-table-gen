<?php 

    include './CONFIG.php';
    include './modules/utils.php';
    include './modules/select.php';
    include './modules/update.php';
    include './modules/insert.php';
    include './modules/delete.php';

    
    
    
    
    
    
    
    
    if(!function_exists("generaDAO")){
        function generaDAO(){
            generaBloccoIniziale();

            generaBloccoSelect();

            generaBloccoUpdate();

            generaBloccoInsert();

            generaBloccoDelete();

            generaBloccoFinale();
        }
    }

?>