<img class="loginWave" src="<?php echo SERVERURL; ?>views/assets/img/wave.png">
<div class="containerSignUp">
    <div class="divImgBack">
        <img src="<?php echo SERVERURL; ?>views/assets/img/coming.svg" class="imgBack imgBackMargin">
    </div>
    <div>
        <form class="FormMargin FormMarginTwo" action="" method="POST" autocomplete="off">

            <h2 class="formTitleH">Iniciar sesión</h2>
            <div class="inputContainer one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="divInput">
                    <h5 class="InputTitle">Correo</h5>
                    <input type="email" class="inputUserReg" name="user_email_login" id="usuario_email" maxlength="50" required="">
                </div>
            </div>
            <div class="inputContainer pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="divInput">
                    <h5 class="InputTitle">Password</h5>
                    <input type="password" class="inputUserReg" name="user_password_log" id="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,50}" maxlength="50" required="">
                </div>
            </div>
            <button type="submit" class="btnToSubmit">LOGIN</button>
        </form>
    </div>
</div>

<?php
    /** the action of this form does not sent the form to ajax, it send the form here again, that's why we will confirm here that we are sending the form correctly */
    if(isset($_POST['user_email_login']) && isset($_POST['user_password_log'])){
        require_once "./controllers/loginController.php";

        $ins_login = new loginController();

        echo $ins_login->start_session_controller();
    }
?>
