<?php

interface ShipStorageInterface {

    /**
     * Returns an array of ship arrays, with keys id, name, weapon power, jedi factor
     * @return array
     */
    public function fetchAllShipsData();

    /**
     * Returns an array of one ship
     *
     * @param integer $id
     * @return array
     */
    public function fetchSingleShipData($id);
}