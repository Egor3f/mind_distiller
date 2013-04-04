<?php
error_reporting(E_ALL);
ini_set ('display_errors', true);

require_once 'lib/limonade.php';
require_once 'configure.php';
require_once 'models/worker.php';

function before()
{
    option('user',$_SESSION['user']);
    set('user',$_SESSION['user']);
    layout('layouts/default.html.php');
}

dispatch ('login', function(){
    return html('login.html.php');
});

dispatch('/', function() {
    return html('main.html.php');
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
    $assertions = $user->assertions()->find_many();
    set('assertions',$assertions);
    return html('assertions.html.php');
});

dispatch('add_assertion',function(){
    $user = User::getInstance() or redirect('/login');
    return html('add_assertion.html.php');
});

dispatch_post('add_assertion',function(){
    $user = User::getInstance() or redirect('/login');
    $assertion = Model::factory('Assertion')->create();
    $assertion->assertion_text = $_POST['assertion_text'];
    $assertion->user_id=$user->user_id;
    $assertion->save();
    redirect('/assertions');
});

run();

?>
