<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <h5>Registro de compras</h5>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Foto de factura:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group d-flex flex-column">
                                <label for="">N&uacute;mero de factura:</label>
                                <a href="">
                                    <img src="public/facturas/uCKQ7N1ME3mgBCbLI5Y8rzWpDl2jxpA780eBS8fV.jpg" height="250" width="250">
                                    {{-- http://localhost:8000/storage/facturas/uCKQ7N1ME3mgBCbLI5Y8rzWpDl2jxpA780eBS8fV.jpg --}}
                                </a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Foto de portada:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">

                        </div>
                        <div class="col-2">
                            {{-- <button class="btn btn-primary"> Ver mas </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            @foreach ($RegistrosFactura as $RegistrosFactura)
                <div class="card my-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <span class="fw-bold">Usuario:</span>
                                {{ $RegistrosFactura->user->name }} <br>
                                <span class="fw-bold">Correo:</span>
                                {{ $RegistrosFactura->user->email }}
                            </div>
                            <div class="col-3">
                                <span class="fw-bold">Celular:</span>
                                {{ $RegistrosFactura->user->celular }} <br>
                                <span class="fw-bold">Cedula:</span>
                                {{ $RegistrosFactura->user->cedula }}
                            </div>
                            <div class="col-3">
                                <span class="fw-bold">Fecha:</span>
                                {{ $RegistrosFactura->created_at }}
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary"> Ver mas </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
