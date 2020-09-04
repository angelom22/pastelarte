<!-- Modal Ver Usiario -->
<div class="modal fade bs-example-modal-lg" id="AbrirModalUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-8">
                        @include('custom.message')
                        <div class="card">

                            <div class="card-body">
                            @include('custom.message')

                                <form action="{{route('user.update', '$user->id')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="user_id" name="user_id">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{old('name', $user->name)}}" disabled>
                                        </div>  
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Correo" value="{{old('email', $user->email)}}" disabled>
                                        </div> 
                                        <div class="form-group">
                                            <select disabled class="form-control" name="roles" id="roles">
                                                
                                            </select>
                                        </div>  
                                        
                                    </div>
                
                                </form>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4">
                        <div class="recent_job_activity">
                            <h4 class="title">Avatar</h4>
                            <div class="grid mb0">
                                <div class="details">
                                    <div class="col-xl-2">
                                        <div class="wrap-custom-file">
                                            <img class="float-left" src="{{asset($user->avatar)}}" alt=".png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
					    <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times fa-2x"></i>Cerrar</button>
                        <!-- <button type="submit" class="btn btn-success"> <i class="fa fa-check fa-2x"></i>Aceptar</button>                 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Usuario -->
<div class="modal fade bs-example-modal-lg" id="ModificarUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="application_statics">
                            <h4>Editar Usuarios</h4>
                            @include('custom.message')
                            <div class="card">
            
                                <div class="card-body">
                                @include('custom.message')
                                
                                    <form action="{{route('user.update', $user->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')

                                        <div class="form-group">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{old('name', $user->name)}}">
                                            </div>  
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Correo" value="{{old('email', $user->email)}}">
                                            </div>  
                                            
                                            <div class="form-group">
                                                <select class="form-control" name="roles" id="roles">
                                                    
                                                </select>
                                            </div>  
                                            
                                            <input type="submit" class="btn btn-primary" value="Salvar">
                                            
                                        </div>
                    
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-6">
						<div class="recent_job_activity">
							<h4 class="title">Avatar</h4>
							<div class="grid mb0">
								<div class="details">
									<div class="col-xl-2">
										<div class="wrap-custom-file">
											<input style="display: hidden;" type="file" name="avatar" id="avatar" accept=".gif, .jpg, .png">
											<label  for="avatar">
												<span>Subir</span>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i>Cerrar</button>                  
                    </div>
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
                    
                
            </div>
        </div>
    </div>
</div>
