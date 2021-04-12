<img class="loginWave" src="<?php echo SERVERURL; ?>views/assets/img/wave.png">
<div class="containerSignUp">
	<div class="divImgBack">
		<img src="<?php echo SERVERURL; ?>views/assets/img/login.svg" class="imgBack">
	</div>
	<div>
		<form class="sign-up-form FormAjax" action="<?php echo SERVERURL; ?>ajax/addUserAjax.php" method="POST" data-form="save" autocomplete="off">

			<h2 class="formTitleH">Crear cuenta</h2>
			<div class="inputContainer one">
				<div class="i">
					<i class="fas fa-user"></i>
				</div>
				<div class="divInput">
					<h5 class="InputTitle">Nombre y Apellido</h5>
					<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="inputUserReg" name="user_name_reg" id="usuario_nombre" maxlength="50" required=""> 
				</div>
			</div>

			<div class="inputContainer pass">
				<div class="i">
					<i class="fas fa-user"></i>
				</div>
				<div class="divInput">
					<h5 class="InputTitle">Correo</h5>
					<input type="email" class="inputUserReg" name="user_email_reg" id="usuario_email" maxlength="50" required="">
				</div>
			</div>

			<div class="inputContainer pass">
				<div class="i">
					<i class="fas fa-user"></i>
				</div>
				<div class="divInput">
					<h5 class="InputTitle">Ciudad</h5>
					<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="inputUserReg" name="user_city_reg" id="user_city_rega" maxlength="50" >
				</div>
			</div>
			<div class="inputContainer pass">
				<div class="i">
					<i class="fas fa-user"></i>
				</div>
				<div class="divInput">
					<h5 class="InputTitle">Rol</h5>
					<select class="selectInput" name="user_role_reg" required="">
						<option value="" selected="" disabled="">Seleccione una opción</option>
						<option value="1">Inquilino</option>
						<option value="2">Propietario</option>
					</select>
				</div>
			</div>

			<div class="inputContainer pass">
				<div class="i">
					<i class="fas fa-lock"></i>
				</div>
				<div class="divInput">
					<h5 class="InputTitle">Contraseña</h5>
					<input type="password" class="inputUserReg" name="user_password_one_reg" id="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,50}" maxlength="50" required="">
				</div>
			</div>
			<div class="inputContainer pass">
				<div class="i">
					<i class="fas fa-lock"></i>
				</div>
				<div class="divInput">
					<h5 class="InputTitle">Confirma tu contraseña</h5>
					<input type="password" class="inputUserReg" name="user_password_two_reg" id="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,50}" maxlength="50" required="">
				</div>
			</div>
			
			<input type="submit" class="btnToSubmit" value="ENTRAR">
		</form>
	</div>
</div>



