<?php
require_once 'lib/limonade.php';

function before()
{
 layout('layouts/default.html.php');
}

dispatch('/', 'hello');
    function hello()
    {

        return html('main.html.php');
    }

   dispatch('/question', 'question');
    function question()
    {
        return html('questions.html.php');
    }

   dispatch('/add_question', 'add_question');
    function add_question()
    {
        return html('add_questions.html.php');
    }

    dispatch('/all_question', 'all_questions');
    function all_questions()
    {
        return html('all_questions.html.php');
    }
run();

?>