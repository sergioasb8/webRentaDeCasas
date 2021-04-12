<?php

    require_once "mainModel.php";

    class addUserModel extends mainModel {
        /** Model to register a new user */
        protected static function add_user_model($dataArray) {

            $sql = mainModel::connect()->prepare("INSERT INTO users(name, email, password, city, role) VALUES(:Name, :Email, :Password, :City,:Role)");

            $sql->bindParam(":Name",$dataArray['Name']);
            $sql->bindParam(":Email",$dataArray['Email']);
            $sql->bindParam(":Password",$dataArray['Password']);
            $sql->bindParam(":City",$dataArray['City']);
            $sql->bindParam(":Role",$dataArray['Role']);

            $sql->execute();

            return $sql;
        }
    }