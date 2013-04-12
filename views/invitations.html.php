<div id="invitation-create-form">
    <form method="post" action="<?=url_for('invitation')?>">
        <fieldset>
            <legend>Приглашение</legend>
            <p>email: <input type="text" name="email"></input></p>
            <p>кратко:<input type="text" name="invitation_brief"></input></p>
            <p>подробно:<input type="textfield" name="invitation_text"></input></p>
            <button>отправить приглашение</button>
        </fieldset>
    </form>
</div>
<div>
    <h2>Я пригласил:</h2>    
    <table id="invitations-tbl">
        <tr>
            <th>email приглашенного</th>
            <th>краткое сообщение</th>
            <th>полное сообщение</th>
            <th>ссылка на приглашение</th>
            <th>дата и время отправки</th>
        </tr>
        <?foreach($invitations as $invitation):?>
        <tr>
            <td><?=$invitation->email?></td>
            <td><?=$invitation->invitation_brief?></td>
            <td><?=$invitation->invitation_text?></td>
            <td><a href="<?=$invitation->invitation_url()?>">принять</a></td>
            <td><?=$invitation->invitation_timestamp?></td>
        </tr>
        <?endforeach?>
    </table>
</div>
