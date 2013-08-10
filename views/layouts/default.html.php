<html>
<head>
<title>Главная</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<link rel="stylesheet" type="text/css" href="./css/layout.css" />
<link rel="stylesheet" type="text/css" href="./css/colors.css" />
</head>
<body>
	
<div id="header">
	<div id="up">
		<div id="logo">
			<a href="<?=url_for('')?>"><img src="./img/logo.png"></a>
		</div>
		<div id="account" >
			<br><br>
			<p>
				<?if($user):?>
				<?=$user->username?> | <a href="<?=url_for('logout')?>" >Выход</a>
				<?else:?>
				<a href="<?=url_for('login')?>" >Вход</a>
				<?endif?>
			</p>
		</div>
	</div>
	<div id="fast_actions">
			<hr>
	</div>
</div>

<div id="content">
	<div id="menu">
		<ul>
			<a href="<?=url_for('account')?>"><li><img src=""><br>Мой профиль</li></a><hr>
			<a href="<?=url_for('')?>"><li><img src=""><br>Новости</li></a><hr>
			<a href="<?=url_for('assertions')?>"><li><img src=""><br>Утверждения</li></a><hr>
			<a href="<?=url_for('assessments')?>"><li><img src=""><br>Оценки</li></a><hr>
			<a href="<?=url_for('authorities')?>"><li><img src=""><br>Авторитеты</li></a><hr>
			<a href="<?=url_for('invitations')?>"><img src=""><br>Приглашения</li></a><hr>
		</ul>
	</div>
	
	<div id="container">
		<? foreach($flash as $type => $message): ?>
		<? if (true || $type == 'Ошибка' || $type == 'Уведомление'): ?>
		<p><?= $message ?></p>
		<? endif ?>
		<? endforeach ?>	
		
		<? if (isset($content)): ?>
		<?= $content; ?>
		<? endif ?>
	</div>

	<div id="footer">
		<center>Mind Distiller</center>
	</div>
</div>

</body>
</html>
