<!-- Modal -->
<div class="modal fade" id="tituloBlog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('BlogStore') }}" method="POST">
    @method('POST')
    @csrf
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agrega el título de la publicación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titulo de la publicación" value="{{ old('title') }}">
                        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                        
                    </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary">Crear publicación</button>
            </div>
            </div>
        </div>
    </form>
</div>