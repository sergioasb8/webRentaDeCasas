<?php 
    $petitionAjax=true;
    require_once "../config/generalConfig.php";

    /** checking if we are sending any form */
    if(isset($_POST['house_des_reg'])) {
        /** Instancia al controlador */
        require_once "../controllers/addHouseController.php";
        $ins_house = new addHouseController();

        /** condition to confirm that the required fields are being send correctly */
        if(isset($_POST['house_des_reg']) && isset($_POST['house_rooms_reg'])){
            echo $ins_house->add_house_Controller();
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