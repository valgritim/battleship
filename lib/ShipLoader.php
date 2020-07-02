<?php
require_once 'functions.php';

//Service
class ShipLoader {

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;

    }
    /**
     * @return Ship[]
     *
     */
    public function getShips()
    {
        $shipsData = $this->queryForShips();

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
     * @return Ship|null
     */
    public function findOneById($id){

        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM ship WHERE id=:id');
        $statement->execute(array('id' => $id));
        $shipArray = $statement->fetch(PDO::FETCH_ASSOC);
       
        if(!$shipArray){
            return null;
        }
        return $this->createShipFromData($shipArray);
    }

    private function createShipFromData(array $shipData){
        $ship = new Ship($shipData['id'],$shipData['name'],$shipData['weapon_power'],$shipData['jedi_factor'], $shipData['strength'], $shipData['is_under_repair']);
        return $ship;
    }

    private function queryForShips(){

        $pdo = $this->getPDO();
        
        $statement = $pdo->prepare('SELECT * FROM ship');
        $statement->execute();
        $ships = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $ships;
    }
    /**
     * 
     *
     * @return PDO
     */
    private function getPDO(){
        
        return $this->pdo;
    }
}