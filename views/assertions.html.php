<a href="<?=url_for('add_assertion')?>">Добавить утверждение</a>
<?foreach($assertions as $assertion):?>
<p>
<span style="color:#AA0000">
<?=$assertion->assertion_text?>
</span><br>
<?$assert_author = Model::factory('User')->find_one($assertion->user_id);?>
Автор: <?=$assert_author->username?><br> 
<a href="<?=url_for('add_assessment/'.$assertion->assertion_id)?>">Оценить</a>
</p>
<?endforeach?>
