<!-- Grids in modals -->

    <div class="modal fade" id="dynamicModal" tabindex="-1" aria-labelledby="dynamicModalLabel" aria-modal="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="dynamicModalLabel">Editar Rol</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="{{route('update-rol', $role)}}" method="post">
        @csrf
        @method('PUT')
    <div class="row g-3">
        <div class="col-xxl-12">
            <div>
                <label for="firstName" class="form-label">Nombre Rol</label>
                <input type="text" class="form-control" id="firstName" name="name" value="{{$role->name}}">
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