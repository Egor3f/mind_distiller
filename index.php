<?php
error_reporting(E_ALL);
ini_set ('display_errors', true);

require_once 'lib/limonade.php';
#require_once 'configure.php';
#require_once 'models/worker.php';

function before()
{
    $user_id = isset($_SESSION['user_id'])? $_SESSION['user_id'] : null;
    layout('layouts/default.html.php');
    #if (! $user_id && !isset($) ) redirect('login');
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
    flash('Добро пожаловать!','Рады видеть Вас снова!');   
    return $username . ":" . $password;
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
