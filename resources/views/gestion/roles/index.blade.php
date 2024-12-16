@extends('layouts.app')

@section('content')
@include('layouts.alerts.alert')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Sistema de Ventas</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                            <li class="breadcrumb-item active">Roles</li>
                                    </ol>
            </div>
            
        </div>
    </div>
</div>
<div class="row">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Roles</h5>
                </div>
                <div class="card-body">
                    @include('gestion.roles.create')
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoRol">
                                    Nuevo
                                    </button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                            @include('gestion.roles.editarRol')
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            
                                            <li>
                                                <button 
                                                type="button" 
                                                data-id="{{$role->id}}" 
                                                data-name="{{$role->name}}" 
                                                data-action="edit"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#dynamicModal" 
                                                class="dropdown-item edit-item-btn open-modal"
                                                ><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Editar</button>
    
                                            </li>
                                            <li>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#asignarPermiso-{{$role->id}}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Asignar Permisos</button>
                                            </li>
                                            <li>
                                                <button 
                                                class="dropdown-item remove-item-btn open-modal" 
                                                type="button"  
                                                data-id="{{$role->id}}" 
                                                data-name="{{$role->name}}" 
                                                data-action="delete"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#dynamicModal"
                                                >
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Eliminar
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @include('gestion.roles.edit')
                           
                            @empty
                                <span>No hay datos...</span>
                            @endforelse
                            
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('dynamicModal');
    const modalTitle = modal.querySelector('.modal-title');
    const modalBody = modal.querySelector('.modal-body');
    const modalFooter = modal.querySelector('.modal-footer');

    document.querySelectorAll('.open-modal').forEach(button => {
        button.addEventListener('click', function () {
            const action = this.dataset.action;
            const id = this.dataset.id;
            const name = this.dataset.name;

            // Configurar el contenido del modal según la acción
            if (action === 'edit') {
                modalTitle.textContent = `Editar Rol: ${name}`;
                modalBody.innerHTML = `
                    <form action="/roles/updaterol/${id}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="roleName" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="roleName" name="name" value="${name}">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                `;
            }
            else if (action === 'delete') {
                modalTitle.textContent = `Eliminar Rol: ${name}`;
                modalBody.innerHTML = `
                    <p>¿Estás seguro de que deseas eliminar el rol <strong>${name}</strong>?</p>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="/roles/${id}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        
                    </form>
                `;
                modalFooter.innerHTML = `
                    
                `;
            }
        });
    });
});

</script>
@endsection