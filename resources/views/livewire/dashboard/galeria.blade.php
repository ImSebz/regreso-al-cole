<div class="main-galeria-container">
    <div class="galeria-container">
        <h1>Ya compartiste tu arte, ahora descubre las creaciones de los demás</h1>
        <div class="galeria" id="galeria">
            @foreach ($fotosPortada as $foto)
                <div class="galeria-item">
                    <img class="galeria-img" src="{{ Storage::url($foto) }}" alt="Foto de Portada">
                </div>
            @endforeach
        </div>
        <div class="pagination-links" id="pagination-links"></div>
    </div>
</div>

@if (session('compra-success'))
    <script>
        Swal.fire({
            title: '{{ session('title') }}',
            text: '{{ session('compra-success') }}',
            icon: 'success',
            confirmButtonText: 'Aceptar',
            customClass: {
                container: 'custom-swal-container'
            },
            didOpen: () => {
                document.querySelector('.custom-swal-container').id = 'compra_success_id';
            }
        });
    </script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const itemsPerPage = 6;
        const galeria = document.getElementById('galeria');
        const items = Array.from(galeria.getElementsByClassName('galeria-item'));
        const paginationLinks = document.getElementById('pagination-links');

        function showPage(page) {
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            items.forEach((item, index) => {
                item.style.display = (index >= start && index < end) ? 'block' : 'none';
            });

            // Actualizar la clase activa en los enlaces de paginación
            const links = paginationLinks.getElementsByTagName('a');
            if (links.length > 0) {
                Array.from(links).forEach(link => {
                    link.classList.remove('active');
                });
                if (links[page - 1]) {
                    links[page - 1].classList.add('active');
                }
            }
        }

        function createPagination() {
            const totalPages = Math.ceil(items.length / itemsPerPage);
            paginationLinks.innerHTML = '';
            for (let i = 1; i <= totalPages; i++) {
                const link = document.createElement('a');
                link.href = '#';
                link.innerText = i;
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    showPage(i);
                });
                paginationLinks.appendChild(link);
            }
            // Marcar la primera página como activa inicialmente
            if (paginationLinks.getElementsByTagName('a').length > 0) {
                paginationLinks.getElementsByTagName('a')[0].classList.add('active');
            }
        }

        createPagination();
        showPage(1);
    });
</script>