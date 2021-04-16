<?php

require_once "mainModel.php";

class housesModel extends mainModel
{
    protected static function mdlInfoHouses()
    {
        $info = mainModel::connect()->prepare("SELECT * FROM houses");
        $info->execute();
        return $info->fetchAll();
    }
}
