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
        const itemsPerPage = 9;
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

        function createPagination(currentPage = 1) {
            const totalPages = Math.ceil(items.length / itemsPerPage);
            const maxVisiblePages = 5;
            paginationLinks.innerHTML = '';

            function addPageLink(page) {
                const link = document.createElement('a');
                link.href = '#';
                link.innerText = page;
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    showPage(page);
                    createPagination(page);
                });
                paginationLinks.appendChild(link);
            }

            function addEllipsis() {
                const ellipsis = document.createElement('span');
                ellipsis.innerText = '...';
                paginationLinks.appendChild(ellipsis);
            }

            if (currentPage > 1) {
                addPageLink(1);
                if (currentPage > 3) {
                    addEllipsis();
                }
            }

            const startPage = Math.max(2, currentPage - Math.floor(maxVisiblePages / 2));
            const endPage = Math.min(totalPages - 1, currentPage + Math.floor(maxVisiblePages / 2));

            for (let i = startPage; i <= endPage; i++) {
                addPageLink(i);
            }

            if (currentPage < totalPages - 2) {
                addEllipsis();
            }
            if (currentPage < totalPages) {
                addPageLink(totalPages);
            }

            // Marcar la página actual como activa
            const links = paginationLinks.getElementsByTagName('a');
            Array.from(links).forEach(link => {
                if (parseInt(link.innerText) === currentPage) {
                    link.classList.add('active');
                }
            });
        }

        createPagination();
        showPage(1);
    });
</script>