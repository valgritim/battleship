<?php
namespace Service;
use Model\RebelShip;
use Model\Ship;
use Model\AbstractShip;
use Model\BountyHunterShip;

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
        
        try{

            $shipsData = $this->queryForShips();

        } catch(\PDOException $e){
           
            trigger_error('Database Exception!' . $e->getMessage());
            $shipsData = []; 
        }
        $ships = array();
        foreach ($shipsData as $shipData) {
            $ships[] = $this->createShipFromData($shipData);
        }

        //Boba Fett's ship
        $ships[] = new BountyHunterShip(8, "Slave I", 0, 0, "Bounty Hunter");

        return $ships;
    }

    /**
     * @param $id
     * @return AbstractShip
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
    private function queryForShips()
    {
        return $this->shipsStorage->fetchAllShipsData();
    }

}