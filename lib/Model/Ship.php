<?php

class Ship {

    private $id;
    private $name;
    private $weaponPower = 0;
    private $jediFactor = 0;
    private $strength = 0;
    private $underRepair;

    public function __construct($id,$name,$weaponPower,$jediFactor, $strength)
    {   
        $this->id = $id;
        $this-> name = $name;
        $this-> weaponPower = $weaponPower;
        $this-> jediFactor = $jediFactor;
        $this-> strength = $strength;
        $this->underRepair = mt_rand(1,100) < 30;
    }

    public function isFunctionnal(){
        return $this->underRepair;
    }

    /**
     * Get the value of id
     * @return integer
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of strength
     */ 
    public function getStrength()
    {
            return $this->strength;
    }

    /**
     * Set the value of strength
     *
     * @return  self
     */ 
    public function setStrength($strength)
    {
        if(!is_numeric($strength)){
            throw new Exception('Invalid strength passed : ' . $strength);
        } 
        $this->strength = $strength;
        return $this;      

        
    }

    /**
     * Get the value of weaponPower
     */ 
    public function getWeaponPower()
    {        
        return $this->weaponPower;
    }

    /**
     * Set the value of weaponPower
     *
     * @return  self
     */ 
    public function setWeaponPower($weaponPower)
    {
        if(!is_numeric($weaponPower)){
            throw new Exception('Invalid weapon power passed : ' . $weaponPower);
        }
        $this->weaponPower = $weaponPower;

        return $this;
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

    public function getNameAndSpecs($useShortFormat){
        if($useShortFormat){
            return sprintf(
                '%s: %s/%s/%s',
                $this->getName(),
                $this->getWeaponPower(),
                $this->getJediFactor(),
                $this->getStrength()
            );
        } else {
            return sprintf(
                '%s: w:%s, j:%s, s:%s',
                $this->getName(),
                $this->getWeaponPower(),
                $this->getJediFactor(),
                $this->getStrength()
            );
        }
    }

    public function doesGivenShipHaveMoreStrength($givenShip){
        //retourne un boolean
        return $givenShip->getStrength > $this->getStrength;
    }


}