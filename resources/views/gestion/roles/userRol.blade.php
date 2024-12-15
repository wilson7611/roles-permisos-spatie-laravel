@extends('layouts.app')

@section('content')
{{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Sistema de Ventas</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Usuarios y Roles</li>
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
                    <h5 class="card-title mb-0">{{ $user->name }}</h5>
                </div>

                <div class="card-body">
                    <h5>Lista de Permisos</h5>
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
</div> --}}




@endsection
