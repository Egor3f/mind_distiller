<?php


class User extends Model
{
    public static $_table='users';
    public static $_id_column='user_id';

    public function assertions()
    {
        return $this->has_many('Assertion', 'user_id');
    }
    
    public function assessments()
    {
        return $this->has_many('Assessment', 'user_id');
    }

    public function rationales()
    {
	return $this->has_many('Rationale', 'user_id');
    }
}

class Assertion extends Model
{
    public static $_table='assertions';
    public static $_id_column='assertion_id';
}

class Assessment extends Model
{
    public static $_table='assessments';
    public static $_id_column='user_id';
}

class Rationale extends Model
{
    public static $_table='rationales';
    public static $_id_column='rationale_id';
}
/*
//Тестирование
$new_user=Model::factory('User')->create();
$new_user->username='Tester';
$new_user->passwd=md5('kkk');
$new_user->save();

$new_assertion=Model::factory('Assertion')->create();
$new_assertion->user_id=$new_user->user_id;
$new_assertion->assertion_text='Хорошо поёт Киркоров?';
$new_assertion->save();

$user=Model::factory('User')->where('username', 'Tester')->find_one();
$result=$user->assertions()->find_array();
print_r($result);
*/
?>
