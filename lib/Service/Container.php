<?php


class Container {

    private $configuration;
    private $pdo;
    private $shipLoader;
    private $shipStorage;
    private $battleManager;

    public function __construct(array $configuration){
        $this->configuration = $configuration;        
    }

    /**
     * @return PDO
     */
    public function getPDO(){
    //Allows to create PDO connection if doesn't exist, otherwise takes existing connection
        if($this->pdo === null){

            $this->pdo = new PDO($this->configuration['dbDns'], $this->configuration['dbUser'], $this->configuration['dbPassword']);
        }
        return $this->pdo;
    }

    /**
     * Undocumented function
     *
     * @return ShipStorageInterface
     */
    public function getShipLoader(){
        if($this->shipLoader === null){
            $this->shipLoader = new ShipLoader($this->getShipsStorage());
        }
        return $this->shipLoader;
    }

    /**
     * Undocumented function
     *
     * @return ShipStorageInterface
     * 
     */
    public function getShipsStorage(){
        if($this->shipStorage === null){
            //$this->shipStorage = new PdoShipStorage($this->getPDO());
            $this->shipStorage = new JsonFileShipStorage(__DIR__.'/../../resources/ships.json');
        }
        return $this->shipStorage;
    }

    public function getBattleManager(){
        if($this->battleManager === null){
            $this->battleManager = new BattleManager();
        }
        return $this->battleManager;
    }
}