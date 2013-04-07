<div>
    <form method="post" action="<?=url_for('invitation')?>">
        <input type="text"></input>
        <button>добавить приглашение</button>
    </form>
</div>
<div>
    <table>
    <?foreach($invitations as $invitation):?>
    <tr><td><?=$invitation->email?></td></tr>
    <?endforeach?>
    </table>
</div>
