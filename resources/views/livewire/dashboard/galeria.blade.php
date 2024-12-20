<!-- filepath: /c:/laragon/www/regreso-al-cole/resources/views/livewire/dashboard/galeria.blade.php -->
<div>
    <h1>Galería</h1>
    <div class="galeria">
        @foreach($fotosPortada as $foto)
            <div class="galeria-item">
                <img src="{{ Storage::url($foto) }}" alt="Foto de Portada">
            </div>
        @endforeach
    </div>

    <style>
        .galeria {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .galeria-item {
            flex: 1 1 calc(33.333% - 10px);
            box-sizing: border-box;
        }
        .galeria-item img {
            width: 100%;
            height: auto;
            display: block;
        }
    </style>
</div>