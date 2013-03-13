<?php

require_once '../lib/idiorm.php';

ORM::configure('pgsql:host=localhost;dbname=mind_db');
ORM::configure('username', 'mind_distiller');
ORM::configure('password', 'qwasdf');
ORM::configure('id_column_overrides', array(
    'users'=>'user_id',
    'assertions'=>'assertion_id',
    'assessments'=>'assertion_id'
    ));

ORM::configure('logging', true);

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

function add_assessment($creator_name, $assertion, $assessment, $inter, $prior, $tidy, $ment)
{
    $creator=ORM::for_table('users')->where('username', $creator_name)->find_one();
    
    $new_assessment=ORM::for_table('assessments')->create();
    
    $new_assessment->user_id=$creator->user_id;
    $new_assessment->assertion_id=$assertion;  
    $assessment ? $new_assessment->assessment=1 : $new_assessment->assessment=0;
    $new_assessment->interest=$inter;
    $new_assessment->priority=$prior;
    $new_assessment->tidy=$tidy;
    if ((bool) $ment) $new_assessment->mention=$ment;
    
    $new_assessment->save();
}

function get_user_assessments($user_name)
{
    $user=ORM::for_table('users')->where('username', $user_name)->find_one();
        
    $result=ORM::for_table('assessments')->where('user_id', $user->user_id)->find_array();
    
    return $result;
}

//Отладка
/*
//add_user('Tester', 'kolobok');
//add_assertion('Tester', 'Любите молочко?');
add_assessment('Tester', 2, 1, 0.6, 0.9, 1.0, 'Балдею с молока!');
add_assessment('Tester', 2, 0, 0.1, 0.1, 0.1, 'Дрянь молоко ваше');
$res=get_user_assessments('Tester');
print_r($res);
//echo "Query:\n"; $lastq=ORM::get_last_query(); echo $lastq, "\n";
*/

?>
