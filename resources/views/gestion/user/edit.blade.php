<!-- Grids in modals -->

<div class="modal fade" id="editarUsuario-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="editarCliente-{{$user->id}}">Editar Usuario</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="row g-3">
       
        <div class="col-xxl-6">
            <div>
                <label for="lastName" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Introducir Nombre Completo">
            </div>
        </div><!--end col-->
        <div class="col-xxl-4">
            <div>
                <label for="lastName" class="form-label">Rol</label>
                <div class="form-check">
                    @foreach($roles as $role)
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name="roles[]" 
                            value="{{ $role->id }}" 
                            id="role-{{ $role->id }}"
                            @if($user->roles->contains($role->id)) checked @endif
                        >
                        <label class="form-check-label" for="role-{{ $role->id }}">
                            {{ $role->name }}
                        </label>
                        <br>
                    @endforeach
                </div>
            </div>
        </div><!--end col-->
        <div class="col-xxl-2">
            <div>
                <label for="firstName" class="form-label">CI</label>
                <input type="text" class="form-control" name="ci" value="{{$user->ci}}" placeholder="Introducir Cedula de identidad">
            </div>
        </div><!--end col-->
        <div class="col-lg-4">
            <label for="genderInput" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Introducir Email">
        </div><!--end col-->
        <div class="col-xxl-4">
            <div>
                <label for="firstName" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="***********">
            </div>
        </div><!--end col-->
        <div class="col-lg-4">
            <label for="genderInput" class="form-label">Repetir Contraseña</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="***********">
        </div><!--end col-->
        <div class="col-xxl-6">
            <div>
                <label for="emailInput" class="form-label">Telefono</label>
                <input type="text" class="form-control" value="{{$user->phone}}" name="phone" placeholder="Introducir # telefonico">
            </div>
        </div><!--end col-->
        <div class="col-xxl-6">
            <div>
                <label for="passwordInput" class="form-label">Direccion</label>
                <input type="text" class="form-control" value="{{$user->address}}" name="address" placeholder="Introducir Direccion">
            </div>
        </div><!--end col-->
        <div class="col-xxl-4">
            <div>
                <label for="emailInput" class="form-label">Fecha De Nacimientos</label>
                <input type="date" class="form-control" value="{{$user->fecha_nacimiento}}" name="fecha_nacimiento" placeholder="Introducir # telefonico">
            </div>
        </div><!--end col-->
        <div class="col-xxl-4">
            <div>
                <label for="passwordInput" class="form-label">Imagen Actual</label>
                @if (file_exists(public_path('storage/' . $user->img)))
                    <img src="{{ asset('storage/' . $user->img) }}" alt="{{$user->name}}" width="150">  
                @else
                    <img src="{{ asset('assets/images/users/deafult-user.jpg') }}" alt="{{$user->name}}" width="150">
                @endif
            </div>
        </div><!--end col-->
        <div class="col-xxl-4">
            <div>
                <label for="passwordInput" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="img" placeholder="Introducir Direccion">
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