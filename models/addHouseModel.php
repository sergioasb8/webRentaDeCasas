<?php 

    require_once "mainModel.php";

    class addHouseModel extends mainModel {

        /** Model to add a House */
        protected static function add_house_model($data){
            
            $sql = mainModel::connect()->prepare("INSERT INTO houses(descrip,rooms,bath,parking,internet,services,locat,price,capacity,owner_id) VALUES(:Descrip,:Rooms,:Bath,:Parking,:Internet,:Services,:Locat,:Price,:Capacity,:Owner_id)");

            $sql->bindParam(":Descrip",$data['Descrip']);
            $sql->bindParam(":Rooms",$data['Rooms']);
            $sql->bindParam(":Bath",$data['Bath']);
            $sql->bindParam(":Parking",$data['Parking']);
            $sql->bindParam(":Internet",$data['Internet']);
            $sql->bindParam(":Services",$data['Services']);
            $sql->bindParam(":Locat",$data['Locat']);
            $sql->bindParam(":Price",$data['Price']);
            $sql->bindParam(":Capacity",$data['Capacity']);
            $sql->bindParam(":Owner_id",$data['Owner_id']);

            $sql->execute();

            /** send the output of this model so the controller can use it */
            return $sql;
        }
    }