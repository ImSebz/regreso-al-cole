<div class="container my-5">
    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-end mb-3">
        <a href="#" class="btn btn-danger"
            onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas cerrar sesión?')) { document.getElementById('logout-form').submit(); }">Cerrar
            sesión</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Registro de compras</h5>
        </div>
        @isset($RegistroFactura)
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <span class="fw-bold">Usuario:</span>
                                {{ $RegistroFactura->user->name }} <br>
                                <span class="fw-bold">Correo:</span>
                                {{ $RegistroFactura->user->email }}
                            </div>
                            <div class="col-4">
                                <span class="fw-bold">Celular:</span>
                                {{ $RegistroFactura->user->celular }} <br>
                                <span class="fw-bold">Cedula:</span>
                                {{ $RegistroFactura->user->cedula }}
                            </div>
                            <div class="col-4">
                                <span class="fw-bold">Fecha:</span>
                                {{ $RegistroFactura->created_at }}
                            </div>
                            <div class="col-4">
                                <span class="fw-bold">Ciudad:</span>
                                {{ $RegistroFactura->user->ciudad->descripcion }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="row">
                                    @php
                                        $foto_factura = str_replace('public/', '', $RegistroFactura->foto_factura);
                                        $foto_portada = str_replace('public/', '', $RegistroFactura->foto_portada);
                                    @endphp
                                    <div class="col-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="">Foto de factura:</label>
                                            <a href="{{ asset("storage/$foto_factura") }}" target="_blank">
                                                <img src="{{ asset("storage/$foto_factura") }}" height="250"
                                                    width="250">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">N&uacute;mero de factura:</label>
                                            <input wire:model.lazy="num_factura" type="text" class="form-control">
                                            @error('num_factura')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Foto de portada:</label>
                                            <a href="{{ asset("storage/$foto_portada") }}" target="_blank">
                                                <img src="{{ asset("storage/$foto_portada") }}" height="250"
                                                    width="250">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Aprobar portada</label>
                                            <select wire:model.change="aprobacion_portada" name="" id=""
                                                class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="1">Aprobar</option>
                                                <option value="3">Rechazar</option>
                                            </select>
                                            @error('aprobacion_portada')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="">Observaciones:</label>
                                    <textarea wire:model.lazy="observaciones" cols="30" rows="5" class="form-control"></textarea>
                                    @error('observaciones')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button class="btn btn-success" wire:click="validacionRegistro(1)"
                                    wire:confirm="¿Estas segur@ de APROBAR esta factura?"> Aprobar factura</button>
                                <button class="btn btn-danger" wire:click="validacionRegistro(0)"
                                    wire:confirm="¿Estas segur@ de RECHAZAR esta factura?"> Rechazar factura</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
        <div class="card-body">
            @foreach ($RegistrosFactura as $RegistroFactura)
                <div class="card my-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <span class="fw-bold">Usuario:</span>
                                {{ $RegistroFactura->user->name }} <br>
                                <span class="fw-bold">Correo:</span>
                                {{ $RegistroFactura->user->email }}
                            </div>
                            <div class="col-3">
                                <span class="fw-bold">Celular:</span>
                                {{ $RegistroFactura->user->celular }} <br>
                                <span class="fw-bold">Cedula:</span>
                                {{ $RegistroFactura->user->cedula }}
                            </div>
                            <div class="col-3">
                                <span class="fw-bold">Fecha:</span>
                                {{ $RegistroFactura->created_at }}
                            </div>
                            <div class="col-2">
                                <button wire:click="getRegistro({{ $RegistroFactura->id }})" class="btn btn-primary">
                                    Ver mas </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="card-body">
                {{ $RegistrosFactura->links() }}
            </div>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header">
            <h5>Todos los registros de factura</h5>
        </div>
        <div class="card-body">
            {{-- <div class="mb-3">
                <input type="text" class="form-control" placeholder="Buscar por cédula" wire:model.lazy="search">
                <button class="btn btn-primary mt-2" wire:click="search">Buscar</button>
            </div> --}}

            <div style="overflow-x: auto; max-height: 400px;">
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
                        @foreach ($RegistroFacturaComplete as $RegistroFactura)
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
                {{ $RegistroFacturaComplete->links() }}
            </div>
        </div>
    </div>
</div>
