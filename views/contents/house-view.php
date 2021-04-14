<div class="houses-content">
    <div class="imgAddHouseContainer">
        <h2 class="titleImg"> <?php echo $_SESSION['name_rhs'];?> Registra aquí tu hogar</h2>
        <img class="imgHouse" src="<?php echo SERVERURL; ?>views/assets/img/houses2.jpg" alt="Houses">
    </div>
    <form class="FormAjax addHouseForm" action="<?php echo SERVERURL; ?>ajax/addHouseAjax.php"  method="POST" data-form="save" autocomplete="off">
        <div class="input-div-houses one-houses">
            <div class="i">
                <i class="fas fa-home"></i>
            </div>
            <div>
                <h5 class="hAddHouses">Nombre del lugar</h5>
                <input type="text" name="house_name_reg" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,150}" maxlength="150" class="inputAddHouses">
            </div>
        </div>

        <div class="input-div-houses pass-houses">
            <div class="i">
                <i class="fas fa-file-alt"></i>
            </div>
            <div>
                <h5 class="hAddHouses">Descripción</h5>
                <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,150}" name="house_des_reg" maxlength="150" class="inputAddHouses">
            </div>
        </div>
        <div class="input-div-houses pass-houses">
            <div class="i">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <div>
                <h5 class="hAddHouses">Ubicación</h5>
                <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,150}" name="house_location_reg" maxlength="150" class="inputAddHouses">
            </div>
        </div>

        <div class="input-div-houses pass-houses">
            <div class="i">
                <i class="fas fa-bed"></i>
            </div>
            <div>
                <h5 class="hAddHouses">Cantidad de habitaciones</h5>
                <input type="text" pattern="[0-9-]{1,3}" name="house_rooms_reg" maxlength="3" class="inputAddHouses">
            </div>
        </div>
        <div class="input-div-houses pass-houses">
            <div class="i">
                <i class="fas fa-bath"></i>
            </div>
            <div>
                <h5 class="hAddHouses">Número de baños</h5>
                <input type="text" pattern="[0-9-]{1,3}" name="house_bath_reg" maxlength="3" class="inputAddHouses">
            </div>
        </div>
        <div class="select-div-houses pass-houses">
            <div class="i">
                <i class="fas fa-parking"></i>
            </div>
            <select class="select-houses" name="house_parking_reg" required="">
                <option value="" selected="" disabled="">Parqueadero</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="select-div-houses pass-houses">
            <div class="i">
                <i class="fas fa-wifi"></i>
            </div>
            <select class="select-houses" name="house_internet_reg" required="">
                <option value="" selected="" disabled="">Internet</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="input-div-houses pass-houses">
            <div class="i">
                <i class="fas fa-tint"></i>
            </div>
            <div>
                <h5 class="hAddHouses">Servicios</h5>
                <input type="text"  pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,300}" name="house_services_reg" maxlength="300" class="inputAddHouses">
            </div>
        </div>
        <div class="input-div-houses pass-houses">
            <div class="i">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <h5 class="hAddHouses">Capacidad</h5>
                <input type="text" pattern="[0-9-]{1,11}" name="house_capacity_reg" maxlength="20" class="inputAddHouses">
            </div>
        </div>
        <div class="input-div-houses pass-houses">
            <div class="i">
                <i class="fas fa-photo-video"></i>
            </div>
            <div>
                <h5 class="hAddHouses">Foto principal</h5>
                <input type="text" name="house_img_reg" class="inputAddHouses">
            </div>
        </div>
        <div class="input-div-houses pass-houses">
            <div class="i">
                <i class="fas fa-money-bill-wave-alt"></i>
            </div>
            <div>
                <h5 class="hAddHouses">Precio</h5>
                <input type="text" pattern="[0-9-]{1,11}" name="house_price_reg" maxlength="11" class="inputAddHouses">
            </div>
        </div>
        <input type="submit" class="btn-houses" value="PUBLICAR">
    </form>
</div>
