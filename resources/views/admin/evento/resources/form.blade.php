<div class="card text-white bg-dark">
    <div class="card-body">
        <div class="col-md-12">	
        
            <h4 style="color: #fff;">{{$titleform}}</h4>	
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titulo del evento" value="{{ old('title', $evento->title) }}">
                        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                        
                    </div>
                
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                        <textarea rows="10" class="form-control" id="content" name="content" placeholder="Ingresa contenido del evento">{{ old('content',  $evento->content) }}</textarea>
                        {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
                    </div>
        </div>
        <div class="col-md-8">

                <div class="form-group {{ $errors->has('extracto') ? 'has-error' : ''}}">
                    <textarea class="form-control" id="extracto" name="extracto" placeholder="Ingresa el extracto del evento">{{ old('extracto', $evento->extracto) }}</textarea>
                    {!! $errors->first('extracto', '<span class="help-block">:message</span>') !!}
                </div>
            

                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
                    <label for="category_id">Categorias</label>
                    <select name="category_id" id="category_id" class="form-control select2">
                        <option value="">Seleccione Categoria</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ old('category_id', $evento->category_id) == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
                </div> 

                <div class="form-group">
                    <label for="tag_id">Etiquetas</label>
                    <select multiple="multiple" name="tag_id[]" id="tag_id" class="form-control select2">
                        @foreach($tags as $tag)
                        <option value="{{$tag->id}}" {{ collect(old('tags_id', $evento->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''}}
                        >{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Date and time range -->
                <div class="form-group">
                    <label for="fecha">Fecha del evento</label>                                       
                    <input type="text" name="fecha" id="fecha" class="form-control" value="{{  old('fecha', $evento->fecha) }}">
                </div>
                <!-- /.form group -->

                <!-- time Picker -->
                <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Hora del evento:</label>

                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                        <input type="text" name="hora" id="hora" class="form-control time" value="{{ old('hora', $evento->hora) }}">
                        </div>
                    </div>
                    <!-- /.form group -->
                </div>

                <div class="form-group">
                    <label>Dirección:</label>
                    <input class="form-control" type="text" name="direccion" id="direccion" value="{{ old('direccion', $evento->direccion) }}">
                </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                    <!-- <div class="dropzone">
                </div> -->
                <input type="file" id="file" name="file" value="{{ $evento->file }}" />	
            </div>
        </div>		
    </div>	
</div>
<div class="form-group">
    <button type="submit" class="btn mt-2 btn-primary btn-block" >{{$btnSubmit}}</button>
</div>