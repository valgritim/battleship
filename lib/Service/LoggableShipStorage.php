<?php

use Service\ShipStorageInterface;

//Composition - wrapping an object into another, allows to modify methods or to add something to methods
class LoggableShipStorage implements ShipStorageInterface{

    private $shipStorage;

    public function __construct(ShipStorageInterface $shipstorage)
    {
        $this->shipStorage = $shipstorage;
    }

    public function fetchAllShipsData(){

        return $this->shipStorage->fetchAllShipsData();
    }

    public function fetchSingleShipData($id){

        return $this->shipStorage->fetchSingleShipData($id);
    }
}