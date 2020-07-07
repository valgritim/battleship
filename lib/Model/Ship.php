<?php

namespace Model;

class Ship extends AbstractShip{
    private $jediFactor = 0;
    protected $underRepair;

    public function __construct($id,$name,$weaponPower, $jediFactor,$strength, $team) {
        parent::__construct($id,$name,$weaponPower, $strength, $team);
        $this->jediFactor = $jediFactor;
        $this->underRepair = mt_rand(1,100) < 30;
          
    }

    public function isFunctional(){
        return $this->underRepair;
    }

    /**
     * Get the value of jediFactor
     */ 
    public function getJediFactor()
    {
        return $this->jediFactor;
    }

        /**
     * Set the value of jediFactor
     *
     * @return  self
     */ 
    public function setJediFactor($jediFactor)
    {
        if(!is_numeric($jediFactor)){
            throw new Exception('Invalid jedi factor power passed : ' . $jediFactor);
        }
        $this->jediFactor = $jediFactor;

        return $this;
    }

    public function getType(){
        return 'Empire';
    }

    private function getSecretDoorCodeToTheDeathstar() {
        return 'Ra1nb0ws';
    }
    
}