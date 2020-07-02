<?php
require_once __DIR__.'/lib/Service/ShipLoader.php';
require_once __DIR__.'/lib/Service/BattleManager.php';
require_once __DIR__.'/lib/Model/Ship.php';
require_once __DIR__.'/lib/Model/BattleResult.php';
require_once __DIR__.'/lib/Service/Container.php';

$configuration = array(
    'dbDns' => 'mysql:host=localhost;charset=utf8;port=3307;dbname=oo_battle' ,           
    'dbUser' => 'root',
    'dbPassword' => ''
    
);