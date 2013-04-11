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
  
    <div id="logo" align="center">
     <a href="<?=url_for('')?>"><img src="views/img/logo.png"></a> 
    </div>
    <div id="navigation" width=100%>
	<ul id="main-menu">
            <li><a href="<?=url_for('')?>">Главная</a></li>
            <li><a href="<?=url_for('assertions')?>">Утверждения</a></li>
            <li><a href="<?=url_for('assessments')?>">Оценки</a></li> 
            <li><a href="<?=url_for('invitations')?>">Приглашения</a></li>
            <?if($user):?>
                <li><a href="<?=url_for('logout')?>">Выход</a></li>
            <?else:?>
                <li><a href="<?=url_for('login')?>">Вход</a></li>
            <?endif?>
	</ul>
    </div>
    <? if (isset($news)):?>
        <div class="news">
            <?= $news; ?>
        </div>
    <?endif?>

    <? if (isset($login)):?>
        <div class="login">
            <?= $login; ?>
        </div>
    <?endif?>
    
    <? if (isset($latest_assertions)):?>
        <div class="latest_assertions">
            <?= $latest_assertions; ?>
        </div>
    <?endif?>
    <div id="content" width=100%>
        <?= $content; ?>
    </div>
</body>
