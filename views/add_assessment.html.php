<form method="post" action="<?=url_for('add_assessment')?>">
  <input type="hidden" name="assertion_id" value="<?=$assertion_id?>"><br>
  Согласие: <input type="checkbox" name="assess_flag"><br>
  Интересность: <input type="text" name="assess_interest"><br>
  Важность: <input type="text" name="assess_priority"><br>
  Постановка вопроса: <input type="text" name="assess_tidy"><br>
  Обоснование (опционально): <input type="text" name="rationale_text"><br>
  <input type="submit" value="Добавить">
</form>
