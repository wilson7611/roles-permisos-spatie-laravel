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
                                            <li class="breadcrumb-item active">Administracion de Usuarios</li>
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
                    <h5 class="card-title mb-0">Rolessss</h5>
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
                            @forelse ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>    
                                     <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#asignarRol-{{$user->id}}"><i class="ri-pencil-fill align-bottom me-2 text-white"></i>Asignar Rol</button>   
                                </td>
                            </tr>
                            <!-- Grids in modals -->

</div>

    <div class="modal fade" id="asignarRol-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="asignarRol-{{$user->id}}">{{$user->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('asignar', $user) }}" method="POST">
                @csrf
                @method('PUT')
                @foreach ($roles as $role)
                    <div>
                        <label for="role-{{ $role->id }}">
                            <input 
                                type="checkbox" 
                                name="roles[]" 
                                id="role-{{ $role->id }}" 
                                value="{{ $role->id }}" 
                                {{ $user->roles->contains($role->id) ? 'checked' : '' }}
                            >
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Asignar Rol</button>
            </form>
        </div>
        </div>
        </div>
        </div>
                            @empty
                                <span>No hay datos...</span>
                            @endforelse
                            
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection