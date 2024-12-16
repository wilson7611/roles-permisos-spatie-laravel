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
                                            <li class="breadcrumb-item active">Personal</li>
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
                    <h5 class="card-title mb-0">Personal</h5>
                </div>
                <div class="card-body">
                    @include('gestion.staff.create')
                    
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">  
                    
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>CI</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Habitacion</th>
                                <th>Estado</th>
                                
                                <th><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoStaff">
                                    Nuevo
                                    </button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($staffs as $staff)
                            <tr>
                                <td>{{$staff->id}}</td>
                                <td>{{$staff->ci}}</td>
                                <td>{{$staff->name}}</td>
                                <td>{{$staff->phone}}</td>
                                <td>{{$staff->room}}</td>
                                <td>
                                    @if ($staff->status == 1)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            
                                                
                                            
                                            {{-- <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Ver</a></li> --}}
                                            <li><button type="button" class="dropdown-item edit-item-btn" data-bs-toggle="modal" data-bs-target="#editarStaff-{{$staff->id}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Editar</a></li>
                                            
                                            <li>
                                                @if ($staff->status == 1)
                                                    <button title="Deshabilitar" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$staff->id}}" class="dropdown-item remove-item-btn">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>  Deshabilitar
                                                    </button>
                                                    @else
                                                    <button title="Habilitar" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$staff->id}}" class="dropdown-item remove-item-btn">
                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Habilitar
                                                    </button>
                                                 @endif
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item remove-item-btn" data-bs-toggle="modal" data-bs-target="#eliminarStaff-{{$staff->id}}">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Eliminar
                                                </button>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @include('gestion.staff.edit')

                            <div class="modal fade" id="eliminarStaff-{{$staff->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $staff->name }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <form action="{{ route('staff.destroy',['staff'=>$staff->id]) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Confirmar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="confirmModal-{{$staff->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{$staff->name}}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $staff->status == 1 ? '¿Seguro que quieres deshabilitar el proveedor?' : '¿Seguro que quieres restaurar el Proveedor?' }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <form action="{{ route('staff/estado',['staff'=>$staff->id]) }}" method="post">
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

@endsection