<div id="invitation-form">
  <h2>Добро пожаловать в систему MindDistiller.</h2>
  <p>Наш пользователь <?=$invitation->author()->find_one()->username?> отправил Вам это приглашение.</p>
  <?=ORM::get_last_query();?>
  <p>Мы будем рады, если Вам понравится наш сайт. Мы уже создали для Вас 
  учетную запись. Вы можете заходить к нам по ссылке из письма с приглашением (как Вы 
  сделали сейчас) или установить пароль</p>
</div>