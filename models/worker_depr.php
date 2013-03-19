<?php

require_once 'lib/idiorm.php';

ORM::configure('pgsql:host=localhost;dbname=mind_db');
ORM::configure('username', 'mind_distiller');
ORM::configure('password', 'qwasdf');
ORM::configure('id_column_overrides', array(
    'users'=>'user_id',
    'assertions'=>'assertion_id',
    'assessments'=>'assertion_id',
    'rationales'=>'rationale_id'
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
    $new_assertion->assertion_text=$text;

    $new_assertion->save();
}

function add_assessment($creator_name, $assertion, $assessment, $inter, $prior, $tidy, $rat)
{
    $creator=ORM::for_table('users')->where('username', $creator_name)->find_one();
    
    $new_assessment=ORM::for_table('assessments')->create();
    
    $new_assessment->user_id=$creator->user_id;
    $new_assessment->assertion_id=$assertion;  
    $assessment ? $new_assessment->assessment=1 : $new_assessment->assessment=0;
    $new_assessment->interest=$inter;
    $new_assessment->priority=$prior;
    $new_assessment->tidy=$tidy;
    
    if ((bool) $rat)
    {
        $new_rationale=ORM::for_table('rationales')->create();
        
        $new_rationale->user_id=$creator->user_id;
        $new_rationale->assertion_id=$assertion;
        $new_rationale->rationale_text=$rat;
        
        $new_rationale->save();
        
        $new_assessment->rationale_id=$new_rationale->id();
    }
    else
    {
        $new_assessment->rationale_id=1;
    }
    
    $new_assessment->save();
}

function get_user_assessments($user_name)
{
    $user=ORM::for_table('users')->where('username', $user_name)->find_one();
        
    $result=ORM::for_table('assessments')->where('user_id', $user->user_id)->find_array();
    
    return $result;
}

?>
