<div>
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
    
    <table>
        <?foreach($invitations as $invitation):?>
        <tr>
            <td><?=$invitation->email?></td>
            <td><?=$invitation->invitation_brief?></td>
            <td><?=$invitation->invitation_text?></td>
            <td><?=$invitation->invitation_timestamp?></td>
        </tr>
        <?endforeach?>
    </table>
</div>
