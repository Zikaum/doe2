
<link rel="stylesheet" href="{{ asset('css/modal.css') }}" />

<script>
    opened = false;
</script>

<button onclick="opened = !opened;console.log(opened);document.getElementById({{$data['id']}}).style.display = opened ? 'flex' : 'none';">Fiz a doação</button>

<div class="modal" id={{$data["id"]}}>
    <form action="make_noti" method="POST">
        <img onclick="opened = !opened;console.log(opened);document.getElementById({{$data['id']}}).style.display = opened ? 'flex' : 'none';" width="30px" src="{{asset('images/Close.png')}}" alt="Fechar" />
        @csrf
        <input type="text" name="post_id" value={{$data["id"]}} hidden>
        <input type="text" name="user_id" value={{$data["user_id"]}} hidden>
        <div>
            <label for="amount">Quantidade doada (ml)</label>
            <input type="number" name="amount" max="475" required>
        </div>
        <button>Finalizar</button>
    </form>

</div>