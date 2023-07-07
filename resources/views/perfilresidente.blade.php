<!DOCTYPE html>
<html>
<head>
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tablaresidente.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- component -->
</head>
    <body>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://randomuser.me/api/portraits/men/1.jpg"><span class="font-weight-bold">{{$registros[+1]->NOM_RESIDENTE}} {{$registros[+1]->APELLIDO_PA}}</span><span class="text-black-50">{{$registros[+1]->NUM_RUT}}-{{$registros[+1]->DV_RUT}}

            </span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Información residente</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Nombre completo</label><input type="text" class="form-control" placeholder="{{$registros[+1]->NOM_RESIDENTE}} {{$registros[+1]->SEG_NOMBRE_RESIDENTE}} {{$registros[+1]->APELLIDO_PA}} {{$registros[+1]->APELLIDO_MA}}" readonly></div>
                   
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Correo electronico</label><input type="text" class="form-control" placeholder="{{$registros[+1]->CORREO_RESIDENTE}}" readonly></div>
                    <div class="col-md-12"><label class="labels">Fecha nacimiento</label><input type="text" class="form-control" placeholder="{{$registros[+1]->FECHA_NACIMIENTO}}" readonly></div>
                    <div class="col-md-12"><label class="labels">Direccion</label><input type="text" class="form-control" placeholder="{{$registros[+1]->DIRECCION}}" readonly></div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="{{$registros[+1]->ID_CONDOMINIO}}" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div>
                <div class="mt-5 text-center">
                <a href="{{  route('pagar')}}" class="btn btn-primary d-block h8">    
                <button class="btn btn-primary profile-button" type="button">Ir a pagar</button>
</a>
</div>
            </div>
        </div>
        
</div>
</body>
</html>