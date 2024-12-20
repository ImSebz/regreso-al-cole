<div>
    <h1>Ganadores</h1>

    @foreach ($ganadores as $key => $ganador)
        {{ $key+=1 }}    <br>
        {{ $ganador->user->name }}  <br>
        {{ $ganador->created_at }} <br>
    @endforeach
</div>
