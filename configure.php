<?php
require_once 'lib/idiorm.php';
require_once 'lib/paris.php';
ORM::configure('pgsql:host=localhost;dbname=h811_mdbase1');
ORM::configure('username', 'h811_mduser1');
ORM::configure('password', '5aOjkjhH');
ORM::configure('logging', true);
?>
