<!-- filepath: /c:/laragon/www/regreso-al-cole/resources/views/livewire/dashboard/registro-compra.blade.php -->
<div>
    <h1>Registro de Compra</h1>

    <div class="foto-factura-cont">
        <label for="foto_factura">Foto factura:</label>
        <input type="file" id="foto_factura" wire:model="foto_factura" accept="image/*" capture="user" style="display: none;">
        <label for="foto_factura" class="custom-file-upload" id="imagePreviewFactura"
            style="{{ $foto_factura ? 'background-image: url(' . $foto_factura->temporaryUrl() . '); background-size: 75%;' : '' }}">
        </label>
        @error('foto_factura')
            <div class="text-invalid-factura">
                {{ $message }}
            </div>
        @enderror
        <div wire:loading wire:target="foto_factura">
            Cargando...
        </div>
    </div>

    <div class="foto-portada-cont">
        <label for="foto_portada">Foto Dibujo:</label>
        <input type="file" id="foto_portada" wire:model="foto_portada" accept="image/*" capture="user" style="display: none;">
        <label for="foto_portada" class="custom-file-upload" id="imagePreviewPortada"
            style="{{ $foto_portada ? 'background-image: url(' . $foto_portada->temporaryUrl() . '); background-size: 75%;' : '' }}">
        </label>
        @error('foto_portada')
            <div class="text-invalid-portada">
                {{ $message }}
            </div>
        @enderror
        <div wire:loading wire:target="foto_portada">
            Cargando...
        </div>
    </div>

    <div class="registrar-compra-btn">
        <button wire:click="storeCompra" id="registrar_compra">REGISTRAR COMPRA</button>
    </div>

    <script>
        const MAX_WIDTH = 1020;
        const MAX_HEIGHT = 980;
        const MIME_TYPE = "image/jpeg";
        const QUALITY = 0.9;

        const foto_factura = document.getElementById("foto_factura");
        const foto_portada = document.getElementById("foto_portada");

        foto_factura.onchange = (ev) => {
            handleImageUpload(ev, "imagePreviewFactura", "foto_factura");
        };

        foto_portada.onchange = (ev) => {
            handleImageUpload(ev, "imagePreviewPortada", "foto_portada");
        };

        const handleImageUpload = (ev, previewId, inputName) => {
            const file = ev.target.files[0];
            const blobURL = URL.createObjectURL(file);
            const img = new Image();
            img.src = blobURL;
            img.onerror = () => {
                URL.revokeObjectURL(this.src);
                console.error("Cannot load image");
            };
            img.onload = () => {
                URL.revokeObjectURL(this.src);
                const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
                const canvas = document.createElement("canvas");
                canvas.width = newWidth;
                canvas.height = newHeight;
                const ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0, newWidth, newHeight);
                canvas.toBlob(
                    blob => {
                        uploadImage(blob, inputName);
                        document.getElementById(previewId).style.backgroundImage =
                            `url(${URL.createObjectURL(blob)})`;
                    },
                    MIME_TYPE,
                    QUALITY
                );
            };
        };

        const calculateSize = (img, maxWidth, maxHeight) => {
            let width = img.width;
            let height = img.height;

            if (width > height) {
                if (width > maxWidth) {
                    height = Math.round(height * maxWidth / width);
                    width = maxWidth;
                }
            } else {
                if (height > maxHeight) {
                    width = Math.round(width * maxHeight / height);
                    height = maxHeight;
                }
            }

            return [width, height];
        };

        const uploadImage = (file, inputName) => {
            @this.upload(inputName, file, (uploadedFilename) => {
                console.log('Upload successful:', uploadedFilename);
            }, (error) => {
                console.error('Upload error:', error);
            });
        };
    </script>
</div>