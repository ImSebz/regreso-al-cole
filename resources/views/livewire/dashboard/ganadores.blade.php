<div class="main-ganadores-container">
    <div class="ganadores-container">
        <div class="ganadores-table-container">
            <div class="ganadores-column">
                @foreach ($ganadores->slice(0, 5) as $ganador)
                    <div class="ganador">
                        <div class="ganador-number">
                            {{ $loop->iteration }}.
                        </div>
                        <div class="ganador-name">
                            {{ $ganador->user->name }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="ganadores-column">
                @foreach ($ganadores->slice(5, 5) as $ganador)
                    <div class="ganador">
                        <div class="ganador-number">
                            {{ $loop->iteration + 5 }}.
                        </div>
                        <div class="ganador-name">
                            {{ $ganador->user->name }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- TODO: Vista ganadores --}}