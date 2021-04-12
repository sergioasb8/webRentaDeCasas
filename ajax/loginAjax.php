<?php 
    $petitionAjax=true;
    require_once "../config/generalConfig.php";

    /** checking if we are sending any form */
    if() {
        
    }
    else {
        /** Rent houses system => */
        session_start(['name'=>'RHS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."home/");
        exit();
    }