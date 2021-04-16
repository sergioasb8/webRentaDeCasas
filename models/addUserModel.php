<?php

    require_once "mainModel.php";

    class addUserModel extends mainModel {
        /** Model to register a new user */
        protected static function add_user_model($dataArray) {
            $sql = mainModel::connect()->prepare("INSERT INTO users (name, mail, password, city, role, gdpr) VALUES (:Name, :mail, :Password, :City, :Role, 1)");

            $sql->bindParam(":Name",$dataArray['Name']);
            $sql->bindParam(":mail",$dataArray['Mail']);
            $sql->bindParam(":Password",$dataArray['Password']);
            $sql->bindParam(":City",$dataArray['City']);
            $sql->bindParam(":Role",$dataArray['Role']);

            $sql->execute();

            return $sql;
        } 

        /** Controlller to update user */ 
        public function update_user_model($dataArray) {
            $sql=mainModel::connect()->prepare("UPDATE users SET name=:Name, mail=:Mail, password=:Password, city=:City, role=:Role WHERE id=:Id");
            $sql->bindParam(":Name",$dataArray['Name']);
            $sql->bindParam(":Mail",$dataArray['Mail']);
            $sql->bindParam(":Password",$dataArray['Password']);
            $sql->bindParam(":City",$dataArray['City']);
            $sql->bindParam(":Role",$dataArray['Role']);
            $sql->bindParam(":Id",$dataArray['Id']);
            
            $sql->execute();

            return $sql;
        }

        /** Model to get all user */ 
        protected static function get_users_model() {
            $sql= mainModel::connect()->prepare("SELECT SQL_CALC_FOUND_ROWS id, name, mail, password, city, role FROM users");
            $sql->execute();

            return $sql->fetchAll();
        }
         
         /** Model delete user */ 
        protected function delete_user($id) {
            $sql=self::connect()->prepare("DELETE FROM users WHERE id=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();

            return $sql;
        }
    }