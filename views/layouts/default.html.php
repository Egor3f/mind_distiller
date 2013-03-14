<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<link rel="stylesheet" type="text/css" href="views/css/style.css" />
<body>
	<div id="logo">
		<?= $logo; ?>
<div id="navigation">
	<ul id="main-menu">
		<li><a href="<?=url_for('')?>">Главная</a>
		<li><a href="<?=url_for('question')?>">Отвеченные Вопросы</a>
		<li><a href="<?=url_for('all_questions')?>">Статистика</a>
		<li><a href="<?=url_for('add_question')?>">Добавить вопрос</a>
		<li><a href="login.html">Вход</a>
	</ul>
</div>
<? if (isset($news)):?>
<div class="news" width=50%>
<?= $news; ?>

</div>
<?endif?>
<? if (isset($login)):?>
	<div id="login">
		<?= $login; ?>
	</div>
	<?endif?>
	<br>
	<div id="content">
	<?= $content; ?>
</div>
</body>