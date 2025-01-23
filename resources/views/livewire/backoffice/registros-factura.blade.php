<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h5>Todos los registros de factura</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Buscar por cédula:</label>
                        <input wire:model.live="cedula_search" type="text" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Buscar por factura:</label>
                        <input wire:model.live="factura_search" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div style="overflow-x: auto; max-height: 800px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nombre</td>
                            <td>Número de factura</td>
                            <td>Correo</td>
                            <td>Foto de factura</td>
                            <td>Foto de portada</td>
                            <td>Celular</td>
                            <td>Cédula</td>
                            <td>Ciudad</td>
                            <td>Estado</td>
                            <td>Observaciones</td>
                            <td>Fecha</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($RegistrosFactura as $RegistroFactura)
                            <tr>
                                <td>{{ $RegistroFactura->id }}</td>
                                <td>{{ $RegistroFactura->user->name }}</td>
                                <td>{{ $RegistroFactura->num_factura ?? 'N/A' }}</td>
                                <td>{{ $RegistroFactura->user->email }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . str_replace('public/', '', $RegistroFactura->foto_factura)) }}"
                                        target="_blank">
                                        {{ \Illuminate\Support\Str::limit($RegistroFactura->foto_factura, 10) }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ asset('storage/' . str_replace('public/', '', $RegistroFactura->foto_portada)) }}"
                                        target="_blank">
                                        {{ \Illuminate\Support\Str::limit($RegistroFactura->foto_portada, 10) }}
                                    </a>
                                </td>
                                <td>{{ $RegistroFactura->user->celular }}</td>
                                <td>{{ $RegistroFactura->user->cedula }}</td>
                                <td>{{ $RegistroFactura->user->ciudad->descripcion }}</td>
                                <td>
                                    @if ($RegistroFactura->estado_id == 1)
                                        Aprobado
                                    @elseif ($RegistroFactura->estado_id == 4)
                                        Rechazado
                                    @elseif ($RegistroFactura->estado_id == 2)
                                        En revisión
                                    @else
                                        Desconocido
                                    @endif
                                </td>
                                <td>{{ $RegistroFactura->observaciones ?? 'N/A' }}</td>
                                <td>{{ $RegistroFactura->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div>
                {{ $RegistrosFactura->links() }}
            </div>
        </div>
    </div>
</div>
