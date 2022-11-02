<div class="notification">
    <p class="notification_title">NOTIFICAÇÃO</p>
    <p style="padding: 30px 5px 5px 5px">
        Olá, o hemocentro avisa que recebemos uma notificação que uma doação foi feita para você, no dia _/_/__.<br/>
        <br>
        Você realmente recebeu esta doação?
    </p>
    <div style="display: flex;">
        <button onclick="event.preventDefault(); document.getElementById(`{{'confirm-notification-form-' . $notification['id']}}`).submit();" class="notification_button">SIM</button>
        <button onclick="event.preventDefault(); document.getElementById(`{{'deny-notification-form-' . $notification['id']}}`).submit();" class="notification_button">NÃO</button>
        <form id={{"confirm-notification-form-" . $notification["id"]}} action="/validate_noti" method="POST" style="display: none;">
            @csrf
            <input type="checkbox" name="confirm" checked hidden>
            <input type="text" name="noti_id" hidden value={{$notification["id"]}}>
            <input type="text" name="post_id" hidden value={{$post["id"]}}>
            <input type="text" name="post_amount" hidden value={{$post["amount"]}}>
            <input type="text" name="amount" hidden value={{$notification["amount"]}}>
        </form>
        <form id={{"deny-notification-form-" . $notification["id"]}} action="/validate_noti" method="POST" style="display: none;">
            @csrf
            <input type="checkbox" name="confirm" hidden>
            <input type="text" name="noti_id" hidden value={{$notification["id"]}}>
        </form>
    </div>
</div>