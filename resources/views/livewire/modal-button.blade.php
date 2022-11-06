
<link rel="stylesheet" href="{{ asset('css/modal.css') }}" />

<script>
    opened = false;
</script>


<button class="modal_button" onclick="opened = !opened;console.log(opened);document.getElementById({{$data['id']}}).style.display = opened ? 'flex' : 'none';document.body.style.overflow = 'hidden';">Fiz a doação</button>

<div class="modal" id={{$data["id"]}}>
    <form action="make_noti" method="POST">
        <img onclick="opened = !opened;console.log(opened);document.getElementById({{$data['id']}}).style.display = opened ? 'flex' : 'none';document.body.style.overflow = 'auto';" width="30px" src="{{asset('images/Close.png')}}" alt="Fechar" />
        @csrf
        <input type="text" name="post_id" value={{$data["id"]}} hidden>
        <input type="text" name="user_id" value={{$data["user_id"]}} hidden>
        <div>
            <label for="amount">Dia: </label>
            <input class="inputdate" type="date" name="date" required>
        </div>
        <div>
            <label for="amount">Quantidade doada (ml)</label>
            <input class="short_input" type="number" name="amount" min="0" max="475" required>
        </div>
        <div style="display: flex;justify-content:flex-end;">
            <button class="confirm_modal_button">Finalizar</button>
        </div>
    </form>

</div>