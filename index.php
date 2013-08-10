<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'lib/limonade.php';
require_once 'configure.php';
require_once 'models/classes.php';

function before()
{
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : false;
    option('user', $user);
    set('user', $user);
    layout('layouts/default.html.php');
}

dispatch('authorities', function(){
    $user = User::getInstance() or redirect('/login');
    return html('authorities.html.php');
});

dispatch('login', function(){
    return html('login.html.php');
});

dispatch('/', function(){
    $user = User::getInstance() or redirect('/login');
    return html('main.html.php');
});

dispatch('account', function(){
    $user = User::getInstance() or redirect('/login');
    return html('account.html.php');
});

dispatch_post('login', function(){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = Model::factory('User')
        ->where('username',$username)
        ->where('passwd',md5($password))
        ->find_one();
    echo ORM::get_last_query();
    $_SESSION['user'] = $user;
    if ($user) {
        flash('Сообщение','Рады видеть Вас снова!');
        redirect('/');
    } else { 
        flash('Ошибка','Неправильный пароль или имя пользователя');
        redirect('/login');
    }
});

dispatch('logout', function(){
    $_SESSION['user']=null;
    redirect('/');
});

dispatch('assertions', function(){
    $user = User::getInstance() or redirect('/login');
    $assertions = Model::factory('Assertion')->where_gt('assertion_id', 1)->find_many(); // Пропускаем NULL-овое с id=1
    set('assertions', $assertions);
    return html('assertions.html.php');
});

dispatch('assertions_current', function(){
    $user = User::getInstance() or redirect('/login');
    $assertions = $user->assertions()->find_many();
    set('assertions', $assertions);
    return html('assertions.html.php');
});

dispatch('add_assertion', function(){
    $user = User::getInstance() or redirect('/login');
    return html('add_assertion.html.php');
});

dispatch_post('add_assertion', function(){
    $user = User::getInstance() or redirect('/login');
    $assertion = Model::factory('Assertion')->create();
    $assertion->assertion_text = $_POST['assertion_text'];
    $assertion->user_id=$user->user_id;
    $assertion->save();
    redirect('/assertions');
});

dispatch('assessments', function(){
    $user = User::getInstance() or redirect('/login');
    $assessments = Model::factory('Assessment')->find_many();
    set('assessments', $assessments);
    set('user', $user);
    return html('assessments.html.php');
});

dispatch('assessments_current', function(){
    $user = User::getInstance() or redirect('/login');
    set('assessments', $user->assessments()->find_many());
    set('user', $user);
    return html('assessments.html.php');
});

dispatch('add_assessment/:assertion_id', function(){
    $user = User::getInstance() or redirect('/login');
    set('assertion_id', params('assertion_id'));
    return html('add_assessment.html.php');
});

dispatch_post('add_assessment', function(){
    $user = User::getInstance() or redirect('/login');
    $assessment = Model::factory('Assessment')->create();
    $assessment->assessment=$_POST['assess_agree'];
    $assessment->interest=$_POST['assess_interest'];
    $assessment->priority=$_POST['assess_priority'];
    $assessment->tidy=$_POST['assess_tidy'];
    $assessment->user_id=$user->user_id;
    $assessment->assertion_id=$_POST['assertion_id'];
    if ($_POST['rationale_text'])
    {
        $rationale = Model::factory('Rationale')->create();
        $rationale->rationale_text=$_POST['rationale_text'];
        $rationale->user_id=$user->user_id;
        $rationale->assertion_id=$_POST['assertion_id'];
        $rationale->save();
        $assessment->rationale_id=$rationale->rationale_id;
    }
    else
    {
        $assessment->rationale_id=1;
    }
    $assessment->save();
    redirect('/assessments');
});

dispatch_get('invitations', function(){
    $user = User::getInstance() or redirect('/login');
    set('invitations', $user->invitations()->find_many());
    return html('invitations.html.php');
});

dispatch_post('invitation', function(){
    $user = User::getInstance() or redirect('/login');
    $key=md5(time()+mt_rand());
    $new_inv = Model::factory('Invitation')->create();
    $new_inv->email=$_POST['email'];
    $new_inv->invitation_brief=$_POST['invitation_brief'];
    $new_inv->invitation_text=$_POST['invitation_text'];
    $new_inv->invitation_key=$key;
    $new_inv->user_id=$user->user_id;
    $new_inv->save();
    redirect('/invitations');
});

run();
?>
