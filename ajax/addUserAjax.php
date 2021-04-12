<?php 
    $petitionAjax=true;
    require_once "../config/generalConfig.php";

    /** checking if we are sending any form */
    if(isset($_POST['user_name_reg'])) {
        /** Instancia al controlador */
        require_once "../controllers/addUserController.php";
        $ins_user = new addUserController();  

        /** condition to confirm that the required fields are being send correctly */
        if(isset($_POST['user_name_reg']) && isset($_POST['user_email_reg'])){
            echo $ins_user->add_user_controller(); 
        }
    }
    else {
        /** Rent houses system => */
        session_start(['name'=>'RHS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."home/");
        exit();
    }