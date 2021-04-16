<?php 
    $petitionAjax=true;
    require_once "../config/generalConfig.php";

    /** checking if we are sending any form */
    if(isset($_POST['user_delete_id'])) {
        /** Instancia al controlador */
        require_once "../controllers/addUserController.php";
        $ins_user = new addUserController();

        echo $ins_user->delete_user_controller(); 
    }
    else {
        /** Rent houses system => */
        session_start(['name'=>'RHS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."home/");
        exit();
    }