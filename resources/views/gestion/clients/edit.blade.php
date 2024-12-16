<!-- Grids in modals -->

<div class="modal fade" id="editarClient-{{$client->id}}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog ">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="editarClient-{{$client->id}}">Editar Cliente</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="{{route('clients.update', $client->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="row g-3">
       
        <div class="col-xxl-12">
            <div>
                <label for="lastName" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{$client->name}}" placeholder="Introducir Nombre Completo">
            </div>
        </div><!--end col-->
       
        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">CI</label>
                <input type="text" class="form-control" name="ci" value="{{$client->ci}}" placeholder="Introducir Cedula de identidad">
            </div>
        </div><!--end col-->
        <div class="col-lg-6">
            <label for="genderInput" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{$client->email}}" placeholder="Introducir Email">
        </div><!--end col-->
        
       
        <div class="col-xxl-6">
            <div>
                <label for="emailInput" class="form-label">Telefono</label>
                <input type="text" class="form-control" value="{{$client->phone}}" name="phone" placeholder="Introducir # telefonico">
            </div>
        </div><!--end col-->
        <div class="col-xxl-6">
            <div>
                <label for="passwordInput" class="form-label">Direccion</label>
                <input type="text" class="form-control" value="{{$client->address}}" name="address" placeholder="Introducir Direccion">
            </div>
        </div><!--end col-->
        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    </form>
    </div>
    </div>
    </div>
    </div>