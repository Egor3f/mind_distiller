<?php

require_once '../lib/idiorm.php';
//require_once '../lib/limonade.php';

ORM::configure('pgsql:host=localhost;dbname=mind_db');
ORM::configure('username', 'mind_distiller');
ORM::configure('password', 'qwasdf');
ORM::configure('logging', 'true');
//ORM::get_last_query() - возвращает последний запрос

//Добавить проверку на коллизию имени
function add_user($name, $pass)
{
    $new_id=ORM::for_table('users')->max('user_id');
    $new_id=($new_id)+1;

    $user=ORM::for_table('users')->create();

    $user->username=$name;
    $user->passwd=md5($pass);
    $user->user_id=$new_id;

    $user->save();
}

function add_assertion($creator_name, $text)
{
    $new_id=ORM::for_table('assertions')->max('assertion_id');
    $new_id=($new_id)+1;

    $creator=ORM::for_table('users')->where('username', $creator_name)->find_one();

    $assertion=ORM::for_table('assertions')->create();

    $assertion->user_id=$creator.user_id;
    $assertion->assertion=$text;
    $assertion->assertion_id=$new_id;

    $assertion->save();
}

/*function add_assessment()
{
}

function get_user_stats()
{
}

function get_assertion_stats()
{
}*/

//Отладка
add_user('Tester', 'kolobok');
add_assertion('Tester', 'Любите молочко?');

?>
