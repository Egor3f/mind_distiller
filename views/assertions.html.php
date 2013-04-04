<a href="<?=url_for('add_assertion')?>">добавить утверждение</a>
<?foreach($assertions as $assertion): ?>
<p> <?=$assertion->assertion_text?></p>
<?endforeach?>
