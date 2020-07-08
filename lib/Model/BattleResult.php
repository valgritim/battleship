<?php

namespace Model;

class BattleResult implements \ArrayAccess{

    private $winningShip;
    private $loosingShip;
    private $usedJediPower;

    public function __construct(AbstractShip $winningShip = null,AbstractShip $loosingShip = null, $usedJediPower)
    {
        $this->winningShip = $winningShip;
        $this->loosingShip = $loosingShip;
        $this->usedJediPower = $usedJediPower;
    }

    /**
     * @return AbstractShip|null
     */ 
    public function getWinningShip()
    {
        return $this->winningShip;
    }

    /**
     *  @return AbstractShip|null
     */ 
    public function getLoosingShip()
    {
        return $this->loosingShip;
    }

    /**
     *  @return boolean
     */ 
    public function wereJediPowerUsed()
    {
        return $this->usedJediPower;
    }

    public function isThereAWinner(){

        return $this->getWinningShip() !== null;
    }


   public function offsetExists($offset ){

    return property_exists($this, $offset);
   }

   public function offsetGet($offset)
   {
       return $this->$offset;
   }

   public function offsetSet( $offset ,$value ){
        $this->$offset = $value;
   }

   public function offsetUnset($offset ){

        unset($this->$offset);
   }
}