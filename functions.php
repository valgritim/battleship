<?php
require_once __DIR__.'/lib/ShipLoader.php';
require_once __DIR__.'/lib/BattleManager.php';
require_once __DIR__.'/lib/Ship.php';
require_once __DIR__.'/lib/BattleResult.php';

$configuration = array(
    'dbDns' => 'mysql:host=localhost;charset=utf8;port=3307;dbname=oo_battle' ,           
    'dbUser' => 'root',
    'dbPassword' => ''
    
);