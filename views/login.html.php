		<center>
			<h1>Вход</h1>
			<form id="login" action="<?=url_for('login')?>" method="post">
				<table>
				<tr>
					<td>
				<label>Логин:</label>
			</td>
			<td>
				<input type="text" name='username' id='username' maxlength="50" /><br>
			</td>
			<tr>
				<td>
				<label>Пароль:</label>
			</td>
			<td>
				<input type='password' name='password' id='password' maxlength="40" /><br>
			</td>
		</table>
				<input type="submit" name="submit" value="Вход" />
		</form>
	</center>
