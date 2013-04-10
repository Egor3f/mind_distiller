<a href="<?=url_for('add_assessment')?>">Добавить оценку</a>
<?foreach($assessments as $assessment): ?>
<p><b><?=($assessment->assessment ? 'Согласен' : 'Не согласен')?></b></p>
<p> 
Интерес: <?=$assessment->interest?><br>
Важность: <?=$assessment->priority?><br>
Постановка: <?=$assessment->tidy?><br>
<?if ($assessment->rationale_id!=1)
{
    $rationale = Model::factory('Rationale')->find_one($assessment->rationale_id);
    echo 'Обоснование: '; echo $rationale->rationale_text;
}
else
{
    echo 'Без обоснования';
}?>
</p>
<?endforeach?>
