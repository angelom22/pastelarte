<!-- Modal Ver Etiqueta -->

<div class="modal fade bs-example-modal-lg" id="ver" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">
                </h4>
            </div>
            <div class="modal-body">
                    
                    
                <div class="modal-footer">
					footer                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Etiqueta -->

<div class="modal fade bs-example-modal-lg" id="modificar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">
                </h4>
            </div>
            <div class="modal-body">
                    
                    
                <div class="modal-footer">
					footer                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar Etiqueta -->

<div class="modal fade bs-example-modal-lg" id="eliminar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">
                </h4>
            </div>
            <div class="modal-body">
                    
                <form action="{{route('etiqueta.destroy', $tag->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">
                        Eliminar
                    </button>
                </form> 
                
                <div class="modal-footer">
					footer                    
                </div>
            </div>
        </div>
    </div>
</div>
