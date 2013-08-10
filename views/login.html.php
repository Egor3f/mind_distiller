<center>
		<p>Для доступа к системе необходимо авторизоваться</p>
		<form id="login" action="<?=url_for('login')?>" method="post">
		<div id="login_page">
		<table>
				<tr>
					<td class="label">
						<label>Логин:</label>
					</td>
					<td>
						<input type="text" name='username' id='username' maxlength="40" /><br>
					</td>
				<tr>
					<td class="label">
						<label>Пароль:</label>
					</td>
					<td>
						<input type='password' name='password' id='password' maxlength="40" /><br>
					</td>
		</table>
		</div>
		<input type="submit" name="submit" value="Войти" />
		</form>		
</center>
