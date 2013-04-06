<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<link rel="stylesheet" type="text/css" href="views/css/style.css" />
<body>
    <div class="flash">
        <? foreach($flash as $type => $message): ?>
            <? if (true || $type == 'Ошибка' || $type == 'Уведомление'): ?>
                <p><?= $message ?></p>
            <? endif ?>
        <? endforeach ?>
    </div>
    <?if(isset($logo)):?>
    <div id="logo">
        <?=$logo;?>
    </div>
    <?endif?>
    <div id="navigation">
	<ul id="main-menu">
            <li><a href="<?=url_for('')?>">Главная</a></li>
            <li><a href="<?=url_for('assertions')?>">Утверждения</a></li>
            <li><a href="<?=url_for('invitations')?>">Приглашения</a></li>
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
