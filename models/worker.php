<?php

require_once '../lib/idiorm.php';
//require_once '../lib/limonade.php';

ORM::configure('pgsql:host=localhost;dbname=mind_db');
ORM::configure('username', 'mind_distiller');
ORM::configure('password', 'qwasdf');
ORM::configure('id_column_overrides', array(
    'users'=>'user_id',
    'assertions'=>'assertion_id',
    'assessments'=>'assertion_id'
    ));

ORM::configure('logging', true);
ORM::configure('return_result_sets', true);

//ORM::get_last_query() - возвращает последний запрос
//where_id_is('user_id')->

//Добавить проверку на коллизию имени
function add_user($name, $pass)
{
    $user=ORM::for_table('users')->create();

    //$user->username=$name;
    //$user->passwd=md5($pass);
    
    $user->set(array(
    'username'=>$name,
    'passwd'=>md5($pass)
    ));
    
    $user->save();
}

function add_assertion($creator_name, $text)
{
    $creator=ORM::for_table('users')->where('username', $creator_name)->find_one();

    $assertion=ORM::for_table('assertions')->create();

    $assertion->user_id=$creator->user_id;
    $assertion->assertion=$text;

    $assertion->save();
}

function add_assessment()
{
}

//Отладка
add_user('Tester', 'kolobok');
add_assertion('Tester', 'Любите молочко?');

?>
