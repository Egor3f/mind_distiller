<a href="<?=url_for('add_assertion')?>">Добавить утверждение</a>
<?foreach($assertions as $assertion):?>
<p>
<?=$assertion->assertion_text?><br>
<a href="<?=url_for('add_assessment')?>">Оценить</a>
</p>
<?endforeach?>
