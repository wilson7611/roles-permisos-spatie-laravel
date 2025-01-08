<!-- Grids in modals -->

<div class="modal fade" id="editarBrazalet-{{$brazalet->id}}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog ">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="editarBrazalet-{{$brazalet->id}}">Editar Brazalet</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="{{route('brazalets.update', $brazalet->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="row g-3">
       
        <div class="col-xxl-12">
            <div>
                <label for="lastName" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{$brazalet->name}}" placeholder="Introducir Nombre Completo">
            </div>
        </div><!--end col-->
       
        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">Descripcion: </label>
                <textarea type="text" class="form-control" name="description" value="{{$brazalet->description}}">{{$brazalet->description}}</textarea>
            </div>
        </div><!--end col-->

        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">Precio: </label>
                <input type="number" class="form-control" name="price_brazalete" value="{{$brazalet->price_brazalete}}"/>
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