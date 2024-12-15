<!-- Grids in modals -->

<div class="modal fade" id="nuevoUsuario" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="nuevoCliente">Nuevo Usuario</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row g-3">
       
        <div class="col-xxl-12">
            <div>
                <label for="lastName" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Introducir Nombre Completo">
            </div>
        </div><!--end col-->
        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">CI</label>
                <input type="text" class="form-control" name="ci" placeholder="Introducir Cedula de identidad">
            </div>
        </div><!--end col-->
        <div class="col-lg-6">
            <label for="genderInput" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Introducir Email">
        </div><!--end col-->
        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="***********">
            </div>
        </div><!--end col-->
        <div class="col-lg-6">
            <label for="genderInput" class="form-label">Repetir Contraseña</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="***********">
        </div><!--end col-->
        <div class="col-xxl-6">
            <div>
                <label for="emailInput" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="phone" placeholder="Introducir # telefonico">
            </div>
        </div><!--end col-->
        <div class="col-xxl-6">
            <div>
                <label for="passwordInput" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="address" placeholder="Introducir Direccion">
            </div>
        </div><!--end col-->
        <div class="col-xxl-4">
            <div>
                <label for="emailInput" class="form-label">Fecha De Nacimientos</label>
                <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Introducir # telefonico">
            </div>
        </div><!--end col-->
        <div class="col-xxl-8">
            <div>
                <label for="passwordInput" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="img" placeholder="Introducir Direccion">
            </div>
        </div><!--end col-->
        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    </form>
    </div>
    </div>
    </div>
    </div>