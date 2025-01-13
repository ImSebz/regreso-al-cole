<!-- filepath: /c:/laragon/www/regreso-al-cole/resources/views/livewire/dashboard/galeria.blade.php -->
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
        }

        showPage(1);
        createPagination();
    });
</script>