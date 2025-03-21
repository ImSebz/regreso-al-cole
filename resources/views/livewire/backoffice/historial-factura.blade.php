<div class="container">
    <div class="mt-3">
        <a href="{{ route('dashboard-backoffice') }}" class="btn btn-success">Volver al Dashboard</a>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h5>Todos los registros de factura</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Número de Factura</th>
                        <th>Foto de Factura</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Observaciones</th>
                        <th>Fecha de Creación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($RegistrosFactura as $registro)
                        <tr>
                            <td>{{ $registro->num_factura }}</td>
                            <td>
                                <a href="{{ str_replace('public', 'storage', asset($registro->foto_factura)) }}" target="_blank">
                                    <img src="{{ str_replace('public', 'storage', asset($registro->foto_factura)) }}" alt="Foto de Factura" width="100">
                                </a>
                            </td>
                            <td>{{ $registro->user->name }}</td>
                            <td>
                                @if($registro->estado_id == 1)
                                    Aprobado
                                @elseif($registro->estado_id == 4)
                                    Rechazado
                                @else
                                    Pendiente
                                @endif
                            </td>
                            <td>{{ $registro->observaciones }}</td>
                            <td>{{ $registro->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $RegistrosFactura->links() }}
        </div>
    </div>
</div>