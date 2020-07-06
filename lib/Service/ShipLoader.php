<?php
require_once 'functions.php';

//Service
class ShipLoader {

    private $shipsStorage;

    public function __construct(ShipStorageInterface $shipsStorage)
    {
        $this->shipsStorage = $shipsStorage;

    }
    /**
     * @return AbstractShip[]
     *
     */
    public function getShips()
    {
        $shipsData = $this->shipsStorage->fetchAllShipsData();

        $ships = array();
        foreach($shipsData as $shipData){

            $ship = $this->createShipFromData($shipData);
            $ships[]=$ship;
        }
        // $ships = array();
        // $ship = new Ship('Jedi Starfighter',5,15,30);
        // $ship1 = new Ship('CloakShape Fighter',2,2,70);
        // $ship2 = new Ship('Super Star Destroyer',70,0,500);
        // $ship3 = new Ship('RZ-1 A-wing interceptor',4,4,50);


        // $ships['starfighter'] = $ship;
        // $ships['cloakshape_fighter'] = $ship1;
        // $ships['super_star_destroyer'] = $ship2;
        // $ships['rz1_a_wing_interceptor'] = $ship3;

        return $ships;       

    }

    /**
     * @param $id
     * @return AbstractShip|null
     */
    public function findOneById($id){
        $shipArray = $this->shipsStorage->fetchSingleShipData($id);
        return $this->createShipFromData($shipArray);
    }

    private function createShipFromData(array $shipData){
        if($shipData['team'] === 'rebel'){
            $ship = new RebelShip($shipData['id'],$shipData['name'],$shipData['weapon_power'],$shipData['jedi_factor'], $shipData['strength'], $shipData['team'],$shipData['is_under_repair']);
        } else {

            $ship = new Ship($shipData['id'],$shipData['name'],$shipData['weapon_power'],$shipData['jedi_factor'], $shipData['strength'], $shipData['team'],$shipData['is_under_repair']);
        }
        return $ship;
    }



}