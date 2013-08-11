<p><a href="<?=url_for('add_assertion')?>">Добавить утверждение</a></p>
<?foreach($assertions as $assertion):?>
<p>
<span id="marker">
<?=$assertion->assertion_text?>
</span><br>
<?$assert_author = Model::factory('User')->find_one($assertion->user_id);?>
Автор: <?=$assert_author->username?><br> 
<a href="<?=url_for('add_assessment/'.$assertion->assertion_id)?>">Оценить</a>
</p>
<?endforeach?>
