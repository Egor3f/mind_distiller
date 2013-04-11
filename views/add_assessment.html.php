<form method="post" action="<?=url_for('add_assessment')?>">
<input type="hidden" name="assertion_id" value="<?=$assertion_id?>"><br>
<table>
<tr>
<td align="right">
Согласие:
</td>
<td align="left">
<input type="range" name="assess_agree"> (от 0 до 2)<br>
</td>
</tr>
<tr>
<td align="right">
Интересность:
</td>
<td align="left">
<input type="text" name="assess_interest"> (от 1 до 10)
</td>
<tr>
<td align="right">
Важность:
</td>
<td align="left">
<input type="text" name="assess_priority"> (от 1 до 10)
</td>
</tr>
<tr>
<td align="right">
Постановка вопроса:
</td>
<td align="left">
<input type="text" name="assess_tidy"> (от 1 до 10)
</td>
</tr>
<tr>
<td align="right">
Обоснование:
</td>
<td align="left">
<input type="text" name="rationale_text">  (опционально)
</td>
</tr>
<tr><td></td><td align="right"><input type="submit" value="Добавить"></td></tr>
</table>
</form>
