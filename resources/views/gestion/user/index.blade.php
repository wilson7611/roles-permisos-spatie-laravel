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
                                            <li class="breadcrumb-item active">Usuarios</li>
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
                    <h5 class="card-title mb-0">Usuarios</h5>
                </div>
                <div class="card-body">
                    @include('gestion.user.create')
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Foto</th>
                                <th><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoUsuario">
                                    Nuevo
                                    </button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @forelse ($user->roles as $role)
                                        <span class="badge bg-success">{{ $role->name }}</span>
                                    @empty
                                        <span class="badge bg-danger">Sin roles asignados</span>
                                    @endforelse
                                </td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->fecha_nacimiento}}</td>
                                <td>
                                    @if(auth()->user()->img)
                                        <img src="{{ asset('storage/' . auth()->user()->img) }}" alt="Imagen del usuario">
                                    @else
                                        <img src="{{ asset('default-avatar.png') }}" alt="Avatar por defecto">
                                    @endif
                                </td>
                                
                                
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Ver</a></li>
                                            <li><a href="" class="dropdown-item edit-item-btn" data-bs-toggle="modal" data-bs-target="#editarUsuario-{{$user->id}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Editar</a></li>
                                            <li>
                                                <a class="dropdown-item remove-item-btn">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Eliminar
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @include('gestion.user.edit')
                            @empty
                                <span>No hay datos...</span>
                            @endforelse
                            
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection