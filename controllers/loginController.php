<?php   
    if($petitionAjax){
        require_once "../models/loginModel.php";
    }
    else {
        require_once "./models/loginModel.php";
    }

    class loginController extends loginModel {
        /** Controller to start session */
        public function start_session_controller() {
            $userEmail=mainModel::clean_chain($_POST['user_email_login']);         
            $password=mainModel::clean_chain($_POST['user_password_log']);   
            
            /** Checking if we have empy inputs */
            if($userEmail=="" || $password=="") {
                /** we are not using ajax so we will need to write JavaScript pure here */
                echo '
                <script>
                    Swal.fire({
                        title: "Ocurrió un error",
                        text: "No has llenado todos los campos solicitados",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>
                ';
                exit();
            }

            /** Checking the integrity of the data */
            if(mainModel::verify_data("[a-zA-Z0-9$@.-]{7,50}",$password)) {
                echo '
                <script>
                    Swal.fire({
                        title: "Ocurrió un error",
                        text: "La contraseña no coincide con el formato solicitado",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>
                ';
                exit();
            }

            $password=mainModel::encryption($password);

            $login_data=[
                "Email"=>$userEmail,
                "Password"=>$password
            ];

            $account_data=loginModel::start_session_model($login_data);

            if($account_data->rowCount()==1) {
                /** With fetch we will save all the data from account data */
                $row=$account_data->fetch();

                session_start(['name'=>'RHS']);
                /** Creating the var for our session */
                $_SESSION['id_rhs']=$row['id'];
                $_SESSION['name_rhs']=$row['name'];
                $_SESSION['email_rhs']=$row['email'];
                $_SESSION['password_rhs']=$row['password'];
                $_SESSION['city_rhs']=$row['city'];
                $_SESSION['role_rhs']=$row['role'];
                /** making a random id with encryption to make more secure our session and do not let outside users/people to close the session */
                $_SESSION['token_rhs']=md5(uniqid(mt_rand(),true));

                // Una vez agreguemos la nueva vista, esto se va a redireccionar a la vista de booking para que el usuario de una tenga la pantalla de reservar una casa 
                
                //    UWAGA         UWAGA          UWAGA           UWAGA           UWAGA 
                
                return header("Location: ".SERVERURL."home/");
            }
            else {
                echo '
                <script>
                    Swal.fire({
                        title: "Ocurrió un error",
                        text: "No se ha podido iniciar sesión, usuario o clave incorrectas",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>
                ';
            }
        }
    }