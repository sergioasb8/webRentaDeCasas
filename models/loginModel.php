<?php
    require_once "mainModel.php";

    class loginModel extends mainModel {
        /** Model to start session */
        protected static function start_session_model($dataArray) {
            $sql = mainModel::connect()->prepare("SELECT * FROM users WHERE email=:Email AND password=:Password");

            $sql->bindParam(":Email",$dataArray['Email']);
            $sql->bindParam(":Password",$dataArray['Password']);

            $sql->execute();
            return $sql;
        }
    }