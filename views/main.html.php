<?php content_for('news'); ?>
<p>Дела у нас продвигаются</p>
<p>Двигаются дела</p>
<p>Дела наши двигаются</p> 
<?php end_content_for(); ?>

<?php content_for('login'); ?>
Текущий пользователь: <?=($user=User::getInstance() ? $user->username : 'вход не произведён')?>
<?php end_content_for(); ?>

<?php content_for('latest_assertions'); ?>
Последние утверждения
<?php end_content_for(); ?>

