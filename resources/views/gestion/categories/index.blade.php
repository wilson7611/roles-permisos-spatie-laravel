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
                                            <li class="breadcrumb-item active">Categorias</li>
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
                    <h5 class="card-title mb-0">Categorias</h5>
                </div>
                <div class="card-body">
                    @include('gestion.categories.create')
                    
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">  
                    
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                
                                <th><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevaCategoria">
                                    Nuevo
                                    </button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    @if ($category->status == 1)
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
                                            <li><button type="button" class="dropdown-item edit-item-btn" data-bs-toggle="modal" data-bs-target="#editarCategory-{{$category->id}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Editar</a></li>
                                            
                                            <li>
                                                @if ($category->status == 1)
                                                    <button title="Deshabilitar" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$category->id}}" class="dropdown-item remove-item-btn">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>  Deshabilitar
                                                    </button>
                                                    @else
                                                    <button title="Habilitar" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$category->id}}" class="dropdown-item remove-item-btn">
                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Habilitar
                                                    </button>
                                                 @endif
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item remove-item-btn" data-bs-toggle="modal" data-bs-target="#eliminarCategory-{{$category->id}}">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Eliminar
                                                </button>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @include('gestion.categories.edit')

                            <div class="modal fade" id="eliminarCategory-{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $category->name }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <form action="{{ route('categories.destroy',['category'=>$category->id]) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Confirmar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="confirmModal-{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{$category->name}}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $category->status == 1 ? '¿Seguro que quieres deshabilitar el proveedor?' : '¿Seguro que quieres restaurar el Proveedor?' }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <form action="{{ route('category/estado',['category'=>$category->id]) }}" method="post">
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