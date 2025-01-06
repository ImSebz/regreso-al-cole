<div class="main-galeria-container">
    <div class="galeria-container">
        <h1>Ya compartiste tu arte, ahora descubre  las creaciones de los demás</h1>
        <div class="galeria">
            @foreach ($fotosPortada as $foto)
                <div class="galeria-item">
                    <img class="galeria-img" src="{{ Storage::url($foto) }}" alt="Foto de Portada">
                </div>
            @endforeach
        </div>
    </div>
</div>

@script
    @if (session('compra-success'))
        <script>
            Swal.fire({
                title: '{{ session('title') }}',
                text: '{{ session('compra-success') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
@endscript
