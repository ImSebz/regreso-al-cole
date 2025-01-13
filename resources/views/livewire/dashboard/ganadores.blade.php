<div class="main-ganadores-container">
    <div class="ganadores-container">
        <h1>Semana 1</h1>
        <div class="ganadores-table-container" id="ganadores-table-container">
            <!-- El contenido se generará dinámicamente -->
        </div>
        <div class="pagination-links-ganadores" id="pagination-links-ganadores"></div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const itemsPerPage = 10; // Máximo 10 elementos por página
        const ganadores = @json($ganadores);
        const ganadoresContainer = document.getElementById('ganadores-table-container');
        const paginationLinks = document.getElementById('pagination-links-ganadores');

        function showPage(page) {
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            ganadoresContainer.innerHTML = '';

            const column1 = document.createElement('div');
            column1.classList.add('ganadores-column');
            const column2 = document.createElement('div');
            column2.classList.add('ganadores-column');

            ganadores.slice(start, end).forEach((ganador, index) => {
                const ganadorDiv = document.createElement('div');
                ganadorDiv.classList.add('ganador');

                const numberDiv = document.createElement('div');
                numberDiv.classList.add('ganador-number');
                numberDiv.textContent = (start + index + 1) + '.';

                const nameDiv = document.createElement('div');
                nameDiv.classList.add('ganador-name');
                nameDiv.textContent = ganador.user.name;

                ganadorDiv.appendChild(numberDiv);
                ganadorDiv.appendChild(nameDiv);

                if (index < 5) {
                    column1.appendChild(ganadorDiv);
                } else {
                    column2.appendChild(ganadorDiv);
                }
            });

            ganadoresContainer.appendChild(column1);
            ganadoresContainer.appendChild(column2);
        }

        function createPagination() {
            const totalPages = Math.ceil(ganadores.length / itemsPerPage);
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
{{-- TODO: Vista ganadores --}}