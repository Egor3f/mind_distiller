<?foreach($assessments as $assessment):?>
<p>
<span id="marker">
<?$assertion = Model::factory('Assertion')->find_one($assessment->assertion_id);
  echo $assertion->assertion_text;?>
</span><br>
<?$assess_author = Model::factory('User')->find_one($assessment->user_id);?>
Оценил: <?=$assess_author->username?><br>
<b><?=($user->assess_agree[$assessment->assessment])?></b><br>
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
