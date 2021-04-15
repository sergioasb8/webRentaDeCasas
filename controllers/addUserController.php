<?php

    if($petitionAjax) {
        require_once "../models/addUserModel.php";
    }
    else {
        require_once "./models/addUserModel.php";
    }

    class addUserController extends addUserModel {
        /** Controller to add an user */
        public function add_user_controller() {
            $name=mainModel::clean_chain($_POST['user_name_reg']);
            $mail=mainModel::clean_chain($_POST['user_email_reg']);
            $passwordOne=mainModel::clean_chain($_POST['user_password_one_reg']);
            $passwordTwo=mainModel::clean_chain($_POST['user_password_two_reg']);
            $city=mainModel::clean_chain($_POST['user_city_reg']);
            $role=mainModel::clean_chain($_POST['user_role_reg']);

            /** checking that we do not have any empty requiered field */
            if($name=="" || $mail=="" || $passwordOne=="" || $passwordTwo=="" || $city=="" || $role==""){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error",
                    "Texto"=>"No has llenado todos los campos que son obligatorios",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            /** checking that the email is not registered in the database */
            if($mail!="") {
                /** if the email is a valid email */
                if(filter_var($mail,FILTER_VALIDATE_EMAIL)) {
                    $check_mail=mainModel::run_simple_query("SELECT mail FROM users WHERE mail='$mail'");
                    if($check_mail->rowCount()>0) {
                        $alerta = [
                            "Alerta"=>"simple",
                            "Titulo"=>"Ocurrio un error",
                            "Texto"=>"Ese email ya se encuentra registrado, por favor intenta con uno nuevo",
                            "Tipo"=>"error"
                        ];
                        echo json_encode($alerta);
                        exit();
                    }
                /** si el email ingresado no es un email valido */
                }   else {
                    $alerta = [
                        "Alerta"=>"simple",
                        "Titulo"=>"Ocurrio un error",
                        "Texto"=>"El email no contiene un formato valido",
                        "Tipo"=>"error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }

            /** checking that the user wrote the same password twice */
            if($passwordOne != $passwordTwo) {
                $alerta = [
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error",
                    "Texto"=>"Las contraseñas no coinciden",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }   else {
                /** if the passwords are the same lets encrypt the password */
                $password=mainModel::encryption($passwordOne);
            }

            /** Passing the data that we are goint to send to the model */
            $data_user_reg = [
                "Name"=>$name,
                "Mail"=>$mail,
                "Password"=>$password,
                "City"=>$city,
                "Role"=>$role
            ];

            $add_user= addUserModel::add_user_model($data_user_reg);

            /** confirm that the data was sent correctly to the database */
            if($add_user->rowCount()==1) {
                /** when the alert is "limpiar" it will clean all the form */
                $alerta=[
                    "Alerta"=>"limpiar",
                    "Titulo"=>"Usuario registrado",
                    "Texto"=>"Usuario registrado con exito",
                    "Tipo"=>"success"
                ];
                echo json_encode($alerta); 
            }   else {
                $alerta = [
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error",
                    "Texto"=>"No hemos podido registrar el usuario",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta); 
            }
        }

         /** Controller to update an user */
        public function update_user_controller() {
            $name=mainModel::clean_chain($_POST['user_name_reg']);
            $mail=mainModel::clean_chain($_POST['user_email_reg']);
            $passwordOne=mainModel::clean_chain($_POST['user_password_one_reg']);
            $passwordTwo=mainModel::clean_chain($_POST['user_password_two_reg']);
            $city=mainModel::clean_chain($_POST['user_city_reg']);
            $role=mainModel::clean_chain($_POST['user_role_reg']);

            /** checking that we do not have any empty requiered field */
            if($name=="" || $mail=="" || $passwordOne=="" || $passwordTwo=="" || $city=="" || $role==""){
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error",
                    "Texto"=>"No has llenado todos los campos que son obligatorios",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            /** checking that the email is not registered in the database */
            if($mail!="") {
                /** if the email is a valid email */
                if(filter_var($mail,FILTER_VALIDATE_EMAIL)) {
                    $check_mail=mainModel::run_simple_query("SELECT mail FROM users WHERE mail='$mail'");
                    if($check_mail->rowCount()>1) {
                        $alerta = [
                            "Alerta"=>"simple",
                            "Titulo"=>"Ocurrio un error",
                            "Texto"=>"Ese email ya se encuentra registrado, por favor intenta con uno nuevo",
                            "Tipo"=>"error"
                        ];
                        echo json_encode($alerta);
                        exit();
                    }
                /** si el email ingresado no es un email valido */
                }   else {
                    $alerta = [
                        "Alerta"=>"simple",
                        "Titulo"=>"Ocurrio un error",
                        "Texto"=>"El email no contiene un formato valido",
                        "Tipo"=>"error"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
            }

            /** checking that the user wrote the same password twice */
            if($passwordOne != $passwordTwo) {
                $alerta = [
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error",
                    "Texto"=>"Las contraseñas no coinciden",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }   else {
                /** if the passwords are the same lets encrypt the password */
                $password=mainModel::encryption($passwordOne);
            }

            /** Passing the data that we are goint to send to the model */
            $data_user_reg = [
                "Name"=>$name,
                "Mail"=>$mail,
                "Password"=>$password,
                "City"=>$city,
                "Role"=>$role
            ];

            $add_user= addUserModel::add_user_model($data_user_reg);

            /** confirm that the data was sent correctly to the database */
            if($add_user->rowCount()==1) {
                /** when the alert is "limpiar" it will clean all the form */
                $alerta=[
                    "Alerta"=>"limpiar",
                    "Titulo"=>"Usuario registrado",
                    "Texto"=>"Usuario registrado con exito",
                    "Tipo"=>"success"
                ];
                echo json_encode($alerta); 
            }   else {
                $alerta = [
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error",
                    "Texto"=>"No hemos podido registrar el usuario",
                    "Tipo"=>"error"
                ];
                echo json_encode($alerta); 
            }
        }

        
    }
 
        

        
