<a href="<?=url_for('add_assertion')?>">Добавить утверждение</a>
<?foreach($assertions as $assertion):?>
<p>
<?=$assertion->assertion_text?> 
<a href="<?=url_for('add_assessment/'.$assertion->assertion_id)?>">Оценить</a>
</p>
<?endforeach?>
