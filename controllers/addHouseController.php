<?php

    if($petitionAjax){
        require_once "../models/addHouseModel.php";
    }
    else {
        require_once "./models/addHouseModel.php";
    }

    class addHouseController extends addHouseModel {

        /** Controller to add a House */
        public function add_house_Controller(){
            $name=mainModel::clean_chain($_POST['house_name_reg']);
            $description=mainModel::clean_chain($_POST['house_des_reg']);
            $rooms=mainModel::clean_chain($_POST['house_rooms_reg']);
            $bath=mainModel::clean_chain($_POST['house_bath_reg']);
            $parking=mainModel::clean_chain($_POST['house_parking_reg']);
            $internet=mainModel::clean_chain($_POST['house_internet_reg']);
            $services=mainModel::clean_chain($_POST['house_services_reg']);
            $location=mainModel::clean_chain($_POST['house_location_reg']);
            $price=mainModel::clean_chain($_POST['house_price_reg']);
            $capacity=mainModel::clean_chain($_POST['house_capacity_reg']);
            $userId=mainModel::clean_chain($_POST['house_user_reg']);
            $imgmain=$_FILES['house_img_reg'];


            /** checking that we do not have any empty requiered field */
            if($name=="" || $description=="" || $rooms=="" || $bath=="" || $parking=="" || $internet=="" || $services=="" || $location=="" || $price=="" || $capacity=="" || $userId=="" || $imgmain==""){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error",
                    "Texto"=>"No has llenado todos los campos que son obligatorios",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            /** checking all the info about the file is working correctly */

            $imgmainName = $_FILES['house_img_reg']['name'];
            // temporal location of our file 
            $imgmainTmpName = $_FILES['house_img_reg']['tmp_name'];
            $imgmainError = $_FILES['house_img_reg']['error'];
            // getting the extension of our file
            $imgmainExt = explode('.',$imgmainName);
            $imgmainActualExt = strtolower(end($imgmainExt));
            $allowed = array('jpg', 'jpeg', 'png', 'pdf');
            $imgmainNameComplete = $imgmainName.$imgmainActualExt;
            $fileDestination = "";
            // checking if the type of file is allowed
            if(in_array($imgmainActualExt, $allowed)) {
                // checking if we have any kind of errors
                if($imgmainError===0) { 
                    
                    $fileDestination = "../views/assets/db_img/".$imgmainNameComplete;
                    move_uploaded_file($imgmainTmpName, $fileDestination);
                }
                else {
                    $alerta = [
                        "Alerta"=>"simple",
                        "Titulo"=>"Ocurrio un error",
                        "Texto"=>"Por favor intenta subir de nuevo el archivo",
                        "Tipo"=>"error"
                    ];
                    echo json_encode($alerta); 
                    exit();
                }
            }
            else {
                $alerta = [
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error",
                    "Texto"=>"Ese tipo de archivo no esta permitido",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta); 
                exit();
            }

            /** Passing the data that we are goint to send to the model */
            $data_house_reg = [
                "Name"=>$name,
                "Description"=>$description,
                "Rooms"=>$rooms,
                "Bath"=>$bath,
                "Parking"=>$parking,
                "Internet"=>$internet,
                "Services"=>$services,
                "Location"=>$location,
                "Price"=>$price,
                "Capacity"=>$capacity,
                "User_id"=>$userId,
                "Img_main"=>$fileDestination
            ];

            $add_house= addHouseModel::add_house_model($data_house_reg);

            /** confirm that the data was sent correctly to the database */
            if($add_house->rowCount()==1) {
                /** when the alert is "limpiar" it will clean all the form */
                $alerta=[
                    "Alerta"=>"limpiar",
                    "Titulo"=>"Casa registrada",
                    "Texto"=>"Casa registrada con exito",
                    "Tipo"=>"success"
                ];
                echo json_encode($alerta); 
            }   else {
                $alerta = [
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error",
                    "Texto"=>"No hemos podido registrar la casa",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta); 
            }
            
        }
    }