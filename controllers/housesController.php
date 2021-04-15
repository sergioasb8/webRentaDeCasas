<?php

require_once "./models/housesModel.php";

Class housesController extends housesModel{

    static public function ctrInfoHouses(){

        $respuesta = housesModel::mdlInfoHouses();

        return $respuesta;
    }
}