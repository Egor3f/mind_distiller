<p>Просмотр профиля:</p>
<p><?=$user->username;?></p>
<p>
	<? if ($user->assertions()->count()>0) { ?>
	Утверждений:
	<a href="<?=url_for('assertions_my')?>"><?=$user->assertions()->count();?></a>
	<? } else echo "Нет утверждений" ?>
	
	<br>
		
	<? if ($user->assessments()->count()>0) { ?>
	Оценок:
	<a href="<?=url_for('assessments_my')?>"><?=$user->assessments()->count();?></a>
	<? } else echo "Нет оценок" ?>
</p>
