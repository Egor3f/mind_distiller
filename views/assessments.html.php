<a href="<?=url_for('add_assessment')?>">Добавить оценку</a>
<?foreach($assessments as $assessment): ?>
<p><b><?=($assessment->assessment ? 'Согласен' : 'Не согласен')?></b></p>
<p> 
Интерес: <?=$assessment->interest?><br>
Важность: <?=$assessment->priority?><br>
Постановка: <?=$assessment->tidy?>
</p>
<?endforeach?>
