<!-- Header -->
<header class="header full-box bg-white">
    <div class="header-brand full-box">
        <a href="./home">
            <img src="<?php echo SERVERURL; ?>views/assets/img/logo.svg" alt="A donde quieres llegar" class="img-fluid">
        </a>
    </div>

    <div class="header-options full-box">
        <nav class="header-navbar full-box poppins-regular scroll" onclick="show_menu_mobile();" >
            <ul class="list-unstyled full-box" >
                <li>
                    <a href="<?php echo SERVERURL; ?>home/" >Inicio</a>
                </li>
                <li>
                    <a href="<?php echo SERVERURL; ?>booking" >Alquiler de casas</a>
                </li>
                <li>
                    <a href="<?php echo SERVERURL; ?>signup" >Registro</a>
                </li>
                <li>
                    <a href="<?php echo SERVERURL; ?>login" >Iniciar sesión</a>
                </li>
            </ul>
        </nav>

        <div class="header-button full-box text-center" id="userMenu" data-mdb-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Nombre de usuario" >
            <i class="fas fa-user-circle"></i>
        </div>
        <div class="dropdown-menu div-bordered popup-login" aria-labelledby="userMenu">
            <p class="text-center" style="padding-top: 10px;">
                <i class="fas fa-user-circle fa-3x"></i><br>
                <small>Nombre de usuario</small>
            </p>
            <a class="dropdown-item" href="javascript:void(0);">
                <i class="fab fa-dashcube fa-fw"></i> &nbsp; Dashboard
            </a>
            <a class="dropdown-item" href="javascript:void(0);">
                <i class="fas fa-sign-out-alt"></i> &nbsp; Cerrar sesión
            </a>
        </div>

        <a href="javascript:void(0);" class="header-button full-box text-center d-lg-none" title="Menú" onclick="show_menu_mobile()" >
            <i class="fas fa-bars"></i>
        </a>
    </div>
</header>