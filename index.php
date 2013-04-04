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
        flash('Добро пожаловать!','Рады видеть Вас снова!');
        redirect('/');
    } else { 
        flash('Неправельный пароль или имя пользователя');
        redirect('/login');
    }
});

dispatch('logout', function(){
    $_SESSION['user']=null;
    redirect('/');
});

dispatch('assertions', function(){
    $user=option('user');
    if (!$user) redirect('/login');
    $assertions = $user->assertions()->find_many();
    return html('assertions.html.php');
});
/*   dispatch('/question', 'question');
    function question()
    {
        return html('questions.html.php');
    }

   dispatch('/add_question', 'add_question');
    function add_question()
    {
        return html('add_questions.html.php');
    }

    dispatch('/question', 'all_questions');
    function all_questions()
    {
        set ('posts', get_user_assessments('User'));
        return html('questions.html.php');
    }
*/

run();

?>
