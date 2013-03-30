<?php
require_once 'lib/idiorm.php';
require_once 'lib/paris.php';
ORM::configure('pgsql:host=localhost;dbname=mind_db');
ORM::configure('username', 'mind_distiller');
ORM::configure('password', 'qwasdf');
ORM::configure('logging', true);
?>
