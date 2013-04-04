<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<link rel="stylesheet" type="text/css" href="views/css/style.css" />
<body>
    <div id="logo">
        <?=$logo;?>
    </div>
    <div id="navigation">
	<ul id="main-menu">
            <li><a href="<?=url_for('')?>">Главная</a></li>
            <li><a href="<?=url_for('question')?>">Отвеченные Вопросы</a></li>
            <li><a href="<?=url_for('all_questions')?>">Статистика</a></li>
            <li><a href="<?=url_for('add_question')?>">Добавить вопрос</a></li>
            <?if($user):?>
                <li><a href="<?=url_for('logout')?>">Выход</a></li>
            <?else:?>
                <li><a href="<?=url_for('login')?>">Вход</a></li>
            <?endif?>
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

    <div id="content">
        <?= $content; ?>
    </div>
</body>
