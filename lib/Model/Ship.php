<?php

namespace Model;

class Ship extends AbstractShip{

    use SettableJediFactorTrait;
    
    protected $underRepair;

    public function __construct($id,$name,$weaponPower, $jediFactor,$strength, $team) {
        parent::__construct($id,$name,$weaponPower, $strength, $team);
        $this->jediFactor = $jediFactor;
        $this->underRepair = mt_rand(1,100) < 30;
          
    }

    public function isFunctional(){
        return $this->underRepair;
    }  

    public function getType(){
        return 'Empire';
    }

    private function getSecretDoorCodeToTheDeathstar() {
        return 'Ra1nb0ws';
    }
    
}