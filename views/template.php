<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php echo COMPANY; ?></title>
    <?php include "./views/inc/Link.php"; ?>
</head>
<body>
    <?php 
        $petitionAjax=false;
        require_once "./controllers/viewsController.php";
        $IV = new viewsController();

        $viewsRoute=$IV->get_views_controller();

        require_once "./views/inc/Header.php";
        /** Como el login no contiene header ni footer entonces si desde el controlleer estamos trayendo el login no vamos a mostrar el header ni el footer, por eso el condicional */
        if($viewsRoute=="home" || $viewsRoute=="404") {
            require_once "./views/contents/".$viewsRoute."-view.php";
        }
        else {
            session_start(['name'=>'RHS']);
            require_once "./controllers/loginController.php";
            $lc = new loginController();

            /** checking if we started session verifying if the session vars have been created */
            // if(!isset($_SESSION['token_rhs']) || !isset($_SESSION['name_rhs']) || !isset($_SESSION['role_rhs'])) {
            //     echo $lc->force_logout_controller();
            //     exit();
            // }

            include $viewsRoute;
        } 
        require_once "./views/inc/Footer.php";
        include "./views/inc/Script.php"; 
    ?>
</body>
</html>