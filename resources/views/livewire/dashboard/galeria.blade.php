<!-- filepath: /c:/laragon/www/regreso-al-cole/resources/views/livewire/dashboard/galeria.blade.php -->
<div>
    <h1>Galería</h1>
    <div class="galeria">
        @foreach ($fotosPortada as $foto)
            <div class="galeria-item">
                <img class="galeria-img" src="{{ Storage::url($foto) }}" alt="Foto de Portada">
            </div>
        @endforeach
    </div>
</div>