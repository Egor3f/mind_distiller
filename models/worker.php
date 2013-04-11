<?php

class User extends Model
{
    public static $_table='users';
    public static $_id_column='user_id';
    public $assess_agree=array('Не согласен', 'Частично согласен', 'Согласен');

    public static function getInstance()
    {
        return $user = option('user');
    }

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

    public function invitations()
    {
        return $this->has_many('Invitation','user_id');
    }
}

class Assertion extends Model
{
    public static $_table='assertions';
    public static $_id_column='assertion_id';
    
    public function assessments()
    {
        return $this->has_many('Assessment', 'assertion_id');
    }
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

class Invitation extends Model
{
    public static $_table='invitations';
    public static $_id_column='invitation_id';
}

?>
