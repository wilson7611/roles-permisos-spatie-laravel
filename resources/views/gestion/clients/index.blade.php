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
                                            <li class="breadcrumb-item active">Clients</li>
                                    </ol>
            </div>
            
        </div>
    </div>
</div>
@can('Ver Cliente')
    

<div class="row">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Clientes</h5>
                </div>
                <div class="card-body">
                    @include('gestion.clients.create')
                    
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">  
                    
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>CI</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                @can('Crear Cliente')
                                <th><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoCliente">
                                    Nuevo
                                    </button></th>@endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->ci}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->address}}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            @can('Editar Cliente')
                                                
                                            
                                            {{-- <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Ver</a></li> --}}
                                            <li><button type="button" class="dropdown-item edit-item-btn" data-bs-toggle="modal" data-bs-target="#editarClient-{{$client->id}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Editar</a></li>
                                            @endcan
                                            @can('Eliminar Cliente')
                                            <li>
                                                <button type="button" class="dropdown-item remove-item-btn" data-bs-toggle="modal" data-bs-target="#eliminarClient-{{$client->id}}">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Eliminar
                                                </button>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @include('gestion.clients.edit')

                            <div class="modal fade" id="eliminarClient-{{$client->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $client->name }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <form action="{{ route('clients.destroy',['client'=>$client->id]) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Confirmar</button>
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
</div>
@endcan
@endsection