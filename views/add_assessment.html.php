<form method="post" action="<?=url_for('add_assessment')?>">
<input type="hidden" name="assertion_id" value="<?=$assertion_id?>">
<div id="add_assessment">
<table>
	<tr>
		<td class="label">
			Согласие:
		</td>
		<td>
			<input type="range" name="assess_agree"> (от 0 до 2)
		</td>
	</tr>
	<tr>
		<td class="label">
			Интересность:
		</td>
		<td>
			<input type="text" name="assess_interest"> (от 1 до 10)
		</td>
	<tr>
		<td class="label">
			Важность:
		</td>
		<td>
			<input type="text" name="assess_priority"> (от 1 до 10)
		</td>
	</tr>
	<tr>
		<td class="label">
			Постановка вопроса:
		</td>
		<td>
			<input type="text" name="assess_tidy"> (от 1 до 10)
		</td>
	</tr>
	<tr>
		<td class="label">
			Обоснование:
		</td>
		<td>
			<input type="text" name="rationale_text">  (опционально)
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td class="label">
			<input type="submit" value="Добавить">
		</td>
	</tr>
</table>
</div>
</form>
