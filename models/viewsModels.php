<?php
	
	class viewsModel{

		/*--------- Model to get all the views ---------*/
		protected static function get_views_model($views){
            /* pages list will be a var to save all the accepted names to call the different pages */
			$pagesList=["login","house","booking","signup"];
            /* if we find the view inside the pagesList then */ 
			if(in_array($views, $pagesList)){
                /* if the file exist then we will save the direction inside content*/
				if(is_file("./views/contents/".$views."-view.php")){
					$content="./views/contents/".$views."-view.php";
				}
                /** if we do not find the direction, then go to the 404 error page */
                else {
					$content="home";
				}
			}elseif($views=="home" || $views=="index"){
				$content="home";
			}else{
				$content="404";
			}
			return $content;
		}
	}