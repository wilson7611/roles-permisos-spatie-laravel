<!-- Grids in modals -->

    <div class="modal fade" id="nuevaCategoria" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="nuevoCategoria">Nueva Categoria</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
    <div class="row g-3">
       
        <div class="col-xxl-12">
            <div>
                <label for="lastName" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Introducir Nombre Completo">
            </div>
        </div><!--end col-->
        <div class="mb-3">
            <div>
                <label for="firstName" class="form-label">Descripcion: </label>
                <textarea name="description" class="form-control" id=""></textarea>
            </div>
        </div><!--end col-->
        
        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    </form>
    </div>
    </div>
    </div>
    </div>