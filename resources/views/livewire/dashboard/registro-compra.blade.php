<div class="main-registro-compra-container">
    <div class="registro-compra-container">

        <div class="main-img-cont-mobile">
            <img src="{{ asset('assets/sharpie-logo.png') }}" alt="Sharpie Logo">
            <img src="{{ asset('assets/papermate-logo.png') }}" alt="Papermate Logo">
            <img src="{{ asset('assets/prismacolor-logo.png') }}" alt="Prismacolor Logo">
            <img src="{{ asset('assets/kilometrico-logo1.png') }}" alt="Kilometrico Logo">
        </div>
        <div class="main-info-cont">
            <h1>Regístrate y sé 1 de los 1200 ganadores</h1>
            <img src="{{ asset('assets/logo-bonos-home.png') }}" class="img-logos-bonos" alt="Logos Bonos Home">
            <div class="info-text-cont">
                <div class="info-text-cajas">
                    <p>1. Sube tu factura* debe incluir <span class="bold-text"> 1 caja de colores Paper Mate®</span>
                        y/o
                        <span class="bold-text">Prismacolor®</span>.
                    </p>
                    <img src="{{ asset('assets/logo-cajas-home.png') }}" class="img-logo-cajas" alt="Logos Cajas Home">
                </div>
                <div class="info-text-dibujo">
                    <p>2. Sube la foto de tu dibujo* hecho a mano.</p>
                </div>

            </div>
        </div>
        <div class="main-fotos-cont">
            <div class="fotos-cont">
                <div class="foto-factura-cont">
                    <label for="foto_factura" class="fotos-label">Sube tu factura</label>
                    <input type="file" id="foto_factura" accept="image/*" capture="environment"
                        style="display: none;">
                    <div class="foto-factura-background">
                        <label for="foto_factura" class="custom-file-upload" id="imagePreviewFactura"
                            style="{{ $foto_factura ? 'background-image: url(' . $foto_factura->temporaryUrl() . '); background-size: 75%;' : '' }}">
                        </label>
                    </div>
                    <p class="disclaimer-text">Recuerda que la factura se debe ver completa*</p>

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
                    <label for="foto_portada" class="fotos-label">Sube tu dibujo</label>
                    <input type="file" id="foto_portada" accept="image/*" capture="environment"
                        style="display: none;">
                    <div class="foto-portada-background">
                        <label for="foto_portada" class="custom-file-upload" id="imagePreviewPortada"
                            style="{{ $foto_portada ? 'background-image: url(' . $foto_portada->temporaryUrl() . '); background-size: 75%;' : '' }}">
                        </label>
                    </div>
                    <p class="disclaimer-text">Recuerda que el dibujo debe incluir nuestros productos*</p>
                    @error('foto_portada')
                        <div class="text-invalid-portada">
                            {{ $message }}
                        </div>
                    @enderror
                    <div wire:loading wire:target="foto_portada">
                        Cargando...
                    </div>
                </div>
            </div>

            @if (session()->has('max_registros'))
                <div class="error-max-registros">
                    {{ session('max_registros') }}
                </div>
                @script
                    <script>
                        Swal.fire({
                            title: '{{ session('max_registros_title') }}',
                            text: '{{ session('max_registros') }}',
                            icon: 'warning',
                            confirmButtonText: 'Aceptar',
                            customClass: {
                                container: 'custom-swal-container'
                            },
                            didOpen: () => {
                                document.querySelector('.custom-swal-container').id = 'max_registros_id';
                            }
                        });
                    </script>
                @endscript
            @endif
            <div class="registrar-compra-btn">
                <button wire:click="storeCompra" id="registrar_compra">Enviar</button>
            </div>


        </div>

        @script
            @if (session('register-success'))
                <script>
                    Swal.fire({
                        title: '{{ session('title') }}',
                        text: '{{ session('register-success') }}',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                        customClass: {
                            container: 'custom-swal-container'
                        },
                        didOpen: () => {
                            document.querySelector('.custom-swal-container').id = 'register_success_id';
                        }
                    });
                </script>
            @endif

            <script>
                const MAX_WIDTH = 1920;
                const MAX_HEIGHT = 1080;
                const MIME_TYPE = "image/jpeg";
                const QUALITY = 1;

                const foto_factura = document.getElementById("foto_factura");
                const foto_portada = document.getElementById("foto_portada");

                foto_factura.onchange = (ev) => {
                    const file = ev.target.files[0];
                    const blobURL = URL.createObjectURL(file);
                    const img = new Image();
                    img.src = blobURL;
                    img.onerror = () => {
                        URL.revokeObjectURL(this.src);
                        // Handle the failure properly
                        console.err("Cannot load image");
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
                                upload_foto_factura(blob);
                            },
                            MIME_TYPE,
                            QUALITY);
                    };
                };

                foto_portada.onchange = (ev) => {
                    const file = ev.target.files[0];
                    const blobURL = URL.createObjectURL(file);
                    const img = new Image();
                    img.src = blobURL;
                    img.onerror = () => {
                        URL.revokeObjectURL(this.src);
                        // Handle the failure properly
                        console.err("Cannot load image");
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
                                upload_foto_portada(blob);
                            },
                            MIME_TYPE,
                            QUALITY);
                    };
                };

                const calculateSize = (img, maxWidth, maxHeight) => {
                    let width = img.width;
                    let height = img.height;

                    // calculate the width and height, constraining the proportions
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
                }

                const upload_foto_factura = (file) => {
                    $wire.upload('foto_factura', file, (uploadedFilename) => {});
                }

                const upload_foto_portada = (file) => {
                    $wire.upload('foto_portada', file, (uploadedFilename) => {});
                }
            </script>
        @endscript
    </div>
</div>
