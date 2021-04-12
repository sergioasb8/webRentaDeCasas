<?php 

    require_once "./models/viewsModels.php";
    
    class viewsController extends viewsModel{

        /** with this function we will get the template for all the files */
        public function get_template_controller(){
            return require_once "./views/template.php";
        }

        /** with this function we will choose the correct view to complement the template */
        public function get_views_controller(){
            if(isset($_GET['views'])) {
                $route=explode("/",$_GET['views']);
                $result=viewsModel::get_views_model($route[0]);
            }
            else {
                $result="home";
            }

            return $result;
        }
    }