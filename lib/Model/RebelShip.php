<?php 

class RebelShip extends AbstractShip {

    private $jediFactor;
    
    public function __construct($id,$name,$weaponPower, $jediFactor, $strength, $team) {
        parent::__construct($id,$name,$weaponPower, $strength, $team);
        $this->jediFactor = $jediFactor;        
          
    }
    //Override
    public function getNameAndSpecs($useShortFormat){
        $val = parent::getNameAndSpecs($useShortFormat);
        $val .= '(Rebel)';
        return $val;
    }

    //Override
    public function isFunctional(){
        return true;
    }
    //Override
    public function getType(){
        return 'Rebel';
    }

    public function getJediFactor(){
        return rand(10,30);
    }
}