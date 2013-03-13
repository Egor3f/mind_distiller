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

//Добавить проверку на коллизию имени
function add_user($name, $pass)
{
    $new_user=ORM::for_table('users')->create();
    
    $new_user->username=$name;
    $new_user->passwd=md5($pass);
    
    $new_user->save();
}

function add_assertion($creator_name, $text)
{
    $creator=ORM::for_table('users')->where('username', $creator_name)->find_one();

    $new_assertion=ORM::for_table('assertions')->create();
    
    $new_assertion->user_id=$creator->user_id;
    $new_assertion->assertion=$text;

    $new_assertion->save();
}

function add_assessment()
{
}

//Отладка
//echo "Query:\n"; $lastq=ORM::get_last_query(); echo $lastq, "\n";

?>
