<html>
<head>
<title>Главная</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<link rel="stylesheet" type="text/css" href="./css/layout.css" />
<link rel="stylesheet" type="text/css" href="./css/colors.css" />
<script src="http://userapi.com/js/api/openapi.js" type="text/javascript" charset="windows-1251"></script>
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
			<a href="<?=url_for('account')?>"><li><img src="./img/menu_account.png"><br>Мой профиль</li></a><hr>
			<a href="<?=url_for('')?>"><li><img src="./img/menu_news.png"><br>Новости</li></a><hr>
			<a href="<?=url_for('assertions')?>"><li><img src="./img/menu_assertions.png"><br>Утверждения</li></a><hr>
			<a href="<?=url_for('assessments')?>"><li><img src="./img/menu_assessments.png"><br>Оценки</li></a><hr>
			<a href="<?=url_for('authorities')?>"><li><img src="./img/menu_authorities.png"><br>Авторитеты</li></a><hr>
			<a href="<?=url_for('invitations')?>"><li><img src="./img/menu_invitations.png"><br>Приглашения</li></a>
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
