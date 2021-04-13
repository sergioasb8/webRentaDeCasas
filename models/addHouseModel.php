<?php 

    require_once "mainModel.php";

    class addHouseModel extends mainModel {

        /** Model to add a House */
        protected static function add_house_model($data){
            
            $sql = mainModel::connect()->prepare("INSERT INTO houses(name,description,rooms,bath,parking,internet,services,location,price,capacity,user_id,img_main) VALUES(:Name,:Description,:Rooms,:Bath,:Parking,:Internet,:Services,:Location,:Price,:Capacity,:User_id,:Img_main)");

            $sql->bindParam(":Name",$data['Name']);
            $sql->bindParam(":Description",$data['Description']);
            $sql->bindParam(":Rooms",$data['Rooms']);
            $sql->bindParam(":Bath",$data['Bath']);
            $sql->bindParam(":Parking",$data['Parking']);
            $sql->bindParam(":Internet",$data['Internet']);
            $sql->bindParam(":Services",$data['Services']);
            $sql->bindParam(":Location",$data['Location']);
            $sql->bindParam(":Price",$data['Price']);
            $sql->bindParam(":Capacity",$data['Capacity']);
            $sql->bindParam(":User_id",$data['User_id']);
            $sql->bindParam(":Img_main",$data['Img_main']);

            $sql->execute();

            /** send the output of this model so the controller can use it */
            return $sql;
        }
    }