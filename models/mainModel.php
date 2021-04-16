<?php 

    if($petitionAjax) {
        require_once "../config/configApp.php";
    }
    else {
        require_once "./config/configApp.php";
    }

    class mainModel{

        /** function to connect with the database */
        protected static function connect() {
            $link = new PDO(SGBD,USER,PASS);
            /** to be sure it recieves ñÑ without problems */
            $link->exec("SET CHARACTER SET utf8");
            return $link;
        }

        /** function to execute a query */
        protected static function run_simple_query($query){
            $sql=self::connect()->prepare($query);
            $sql->execute();
            return $sql;
        }

        protected static function get_last_results_count() {
            $conexion= mainModel::connect();
            $total=$conexion->query("SELECT found_rows()");

            return (int) $total->fetchColumn();
        }

        /** function to encrypt a string */
        public function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}

        /** function to decrypt a string */
		protected static function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}

        /** function to generate random codes */
        protected static function generate_random_code($letter,$length,$number) {
            for($i=1; $i<=$length; $i++){
                $aleatorio= rand(0,9);
                $letter.=$aleatorio;
            }
            return $letter."-".$number;
        }

        /** function to clean string chains */
        protected static function clean_chain($chain) {
            /** usando funciones para ir eliminando las cosas que no vamos a admitir */
            $chain= trim($chain);
            $chain= stripslashes($chain);
            $chain= str_ireplace("<script>", "", $chain);
            $chain= str_ireplace("</script>", "", $chain);
            $chain= str_ireplace("<script src", "", $chain);
            $chain= str_ireplace("<script type=", "", $chain);
            $chain= str_ireplace("SELECT * FROM", "", $chain);
            $chain= str_ireplace("DELETE FROM", "", $chain);
            $chain= str_ireplace("INSERT INTO", "", $chain);
            $chain= str_ireplace("DROP TABLE", "", $chain);
            $chain= str_ireplace("DROP DATABASE", "", $chain);
            $chain= str_ireplace("TRUNCATE TABLE", "", $chain);
            $chain= str_ireplace("SHOW TABLES", "", $chain);
            $chain= str_ireplace("SHOW DATABASE", "", $chain);
            $chain= str_ireplace("<?php", "", $chain);
            $chain= str_ireplace("?>", "", $chain);
            $chain= str_ireplace("--", "", $chain);
            $chain= str_ireplace(">", "", $chain);
            $chain= str_ireplace("<", "", $chain);
            $chain= str_ireplace("[", "", $chain);
            $chain= str_ireplace("]", "", $chain);
            $chain= str_ireplace("^", "", $chain);
            $chain= str_ireplace("==", "", $chain);
            $chain= str_ireplace(";", "", $chain);
            $chain= str_ireplace("::", "", $chain);
            $chain= stripslashes($chain);
            $chain= trim($chain);
            return $chain;
        }

        /** function to verify data */
        protected static function verify_data($filter, $chain) {
            /** if the chain fullfill the conditions it will return false */
            if(preg_match("/^".$filter."$/", $chain)){
                return false;
            }   else {
                return true;
            }
        }

        /** function to verify dates */
        protected static function verify_dates($date) {
            $values=explode('-',$date);
            if(count($values) == 3 && checkdate($values[1],$values[2],$values[0])) {
                return false;
            } else {
                return true;
            }
        }

    }