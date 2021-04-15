<?php

require_once "./controllers/housesController.php";

$houses = housesController::ctrInfoHouses();
/* echo '<pre style="background-color:white;">'; print_r($houses); echo '</pre>'; */

?>

<!-- Content -->
<div class="container container-web-page">

    <h3 class="font-weight-bold poppins-regular text-uppercase">Inmuebles en alquiler</h3>
    <p class="text-justify">Bienvenido, acá encontrarás todas las casas disponibles para alquiler.</p>
    <hr />

    <div class="container-cards full-box" style="padding-bottom: 40px;">

        <?php foreach ($houses as $key => $house) : ?>
            <div class="card-product div-bordered bg-white shadow-2">
                <figure class="card-product-img">
                    <img class="img-fluid" src="<?php echo $house["img_main"]; ?>" alt="nombre_platillo">
                </figure>
                <div class="card-product-body">
                    <div class="card-product-content">
                        <h5 class="text-center fw-bolder"><?php echo $house["name"]; ?></h5>
                        <p class="card-product-price text-center fw-bolder">$<?php echo $house["price"]; ?> COP</p>
                    </div>
                    <div class="text-center card-product-options" style="padding: 10px 0;">
                        
                            <a href="details?id=<?php echo $house["id"]; ?>" class="btn btn-link btn-sm btn-rounded text-success"><i class="fas fa-plus"></i> &nbsp; Detalles</a>
                        
                    </div>
                </div>
            </div>
        <?php endforeach ?>

    </div>


    <!-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#">Anterior</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">Siguiente</a>
            </li>
        </ul>
    </nav> -->

</div>
