<form method="post" action="<?=url_for('add_assessment')?>">
  <input type="hidden" name="assertion_id" value="<?=$assertion_id?>"><br>
  <table>
	  <tr>
		<td align="left">
			Согласие:
		</td> 
		<td align="left">
			  <input type="checkbox" name="assess_flag"><br>
		</td>
	</tr>
	<tr>
		<td align="left">
			Интересность: 
		</td>
		<td align="left">
			<input type="range" name="assess_interest" min=0 max=100 step=1 value=50 />
		</td>
	<tr>
		<td align="left">
			Важность: 
		</td>
		<td align="left">
			<input type="range" name="assess_priority" min=0 max=100 step=1 value=50 />
		</td>
	</tr>
	<tr>
		<td>
			Постановка вопроса:
		</td>
		<td>
			<input type="range" name="assess_tidy" min=0 max=100 step=1 value=50 />
		</td>
	</tr>
		<tr>
		<td align="left">
			Обоснование (опционально):
		</td>
		<td align="left">
			 <input type="text" name="rationale_text">
		</td>
	</tr>
   
  
  </table>
  <input type="submit" value="Добавить">
</form>
