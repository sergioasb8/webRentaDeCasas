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
            $descrip=mainModel::clean_chain($_POST['house_des_reg']);
            $rooms=mainModel::clean_chain($_POST['house_rooms_reg']);
            $bath=mainModel::clean_chain($_POST['house_bath_reg']);
            $parking=mainModel::clean_chain($_POST['house_parking_reg']);
            $internet=mainModel::clean_chain($_POST['house_internet_reg']);
            $services=mainModel::clean_chain($_POST['house_services_reg']);
            $locat=mainModel::clean_chain($_POST['house_location_reg']);
            $price=mainModel::clean_chain($_POST['house_price_reg']);
            $capacity=mainModel::clean_chain($_POST['house_capacity_reg']);
            $owner=mainModel::clean_chain($_POST['house_owner_reg']);
            $imgmain=mainModel::clean_chain($_POST['Img_main']);


            /** checking that we do not have any empty requiered field */
            if($name=="" || $descrip=="" || $rooms=="" || $bath=="" || $parking=="" || $internet=="" || $services=="" || $locat=="" || $price=="" || $capacity=="" || $owner==""){
                $alerta=[
                    "Alert"=>"simple",
                    "Title"=>"Ocurrio un error",
                    "Text"=>"No has llenado todos los campos que son obligatorios",
                    "Type"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            /** Passing the data that we are goint to send to the model */
            $data_house_reg = [
                "Descrip"=>$descrip,
                "Rooms"=>$rooms,
                "Bath"=>$bath,
                "Parking"=>$parking,
                "Internet"=>$internet,
                "Services"=>$services,
                "Locat"=>$locat,
                "Price"=>$price,
                "Capacity"=>$capacity,
                "Owner_id"=>$owner
            ];

            $add_house= addHouseModel::add_house_model($data_house_reg);

            /** confirm that the data was sent correctly to the database */
            if($add_house->rowCount()==1) {
                /** when the alert is "limpiar" it will clean all the form */
                $alerta=[
                    "Alert"=>"limpiar",
                    "Title"=>"Casa registrada",
                    "Text"=>"Casa registrada con exito",
                    "Type"=>"success"
                ];
                echo json_encode($alerta); 
            }   else {
                $alerta = [
                    "Alert"=>"simple",
                    "Title"=>"Ocurrio un error",
                    "Text"=>"No hemos podido registrar la casa",
                    "Type"=>"error"
                ];
                echo json_encode($alerta); 
            }
            
        }
    }