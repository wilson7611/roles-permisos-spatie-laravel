@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Sistema de Ventas</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                            <li class="breadcrumb-item active">Roles y Permisos</li>
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
                    <h5 class="card-title mb-0">{{$role->name}}</h5>
                </div>
                {{-- <div class="card-body">
                    <h5>Lista de Permisos</h5>
                    {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put']) !!}
                        @foreach ($permisos as $permiso)
                            <div>
                                <label for="">
                                    {!! Form::checkbox('permisos[]', $permiso->id, null, ['class'=>'mr-1']) !!}
                                    {{$permiso->name}}
                                </label>
                            </div>
                        @endforeach
                    {!! Form::close() !!}
                </div> --}}

                <div class="card-body">
                    <h5>Lista de Permisos</h5>
                    <form action="{{ route('roles.update', $role) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @foreach ($permisos as $permiso)
                            <div>
                                <label for="permiso-{{ $permiso->id }}">
                                    <input 
                                        type="checkbox" 
                                        name="permisos[]" 
                                        id="permiso-{{ $permiso->id }}" 
                                        value="{{ $permiso->id }}" 
                                        {{ $role->permissions->contains($permiso->id) ? 'checked' : '' }}
                                    >
                                    {{ $permiso->name }}
                                </label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection