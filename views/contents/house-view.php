<form class="FormAjax" action="<?php echo SERVERURL; ?>ajax/addHouseAjax.php"  method="POST" data-form="save" autocomplete="off">
    <div class="form-group">
        <label>Descripción</label>
        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,200}" class="form-control" name="house_des_reg" maxlength="200" >
    </div>
    <div class="form-group">
        <label># de habitaciones</label>
        <input type="text" pattern="[0-9-]{1,3}" class="form-control" name="house_rooms_reg" maxlength="3" >
    </div>
    <div class="form-group">
        <label># de baños</label>
        <input type="text" pattern="[0-9-]{1,3}" class="form-control" name="house_bath_reg" maxlength="3" >
    </div>
    <div class="form-group">
        <label># de parqueaderos</label>
        <input type="text" pattern="[0-9-]{1,3}" class="form-control" name="house_parking_reg" maxlength="3" >
    </div>
    <div class="form-group">
        <label>Internet</label>
        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,5}" class="form-control" name="house_internet_reg" maxlength="5" >
    </div>
    <div class="form-group">
        <label>Servicios adicionales</label>
        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,100}" class="form-control" name="house_services_reg" maxlength="100" >
    </div>
    <div class="form-group">
        <label>Ubicación</label>
        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" name="house_location_reg" maxlength="50" >
    </div>
    <div class="form-group">
        <label>Precio</label>
        <input type="text" pattern="[0-9-]{1,11}" class="form-control" name="house_price_reg" maxlength="20" >
    </div>
    <div class="form-group">
        <label>Capacidad</label>
        <input type="text" pattern="[0-9-]{1,11}" class="form-control" name="house_capacity_reg" maxlength="20" >
    </div>
    <div class="form-group">
        <label>id del dueño</label>
        <input type="text" pattern="[0-9-]{5,8}" class="form-control" name="house_owner_reg" maxlength="20" >
    </div>

    <button type="reset" class="">LIMPIAR</button>
    <button type="submit" class="">GUARDAR</button>
</form>