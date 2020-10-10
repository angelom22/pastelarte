@extends('admin.layouts.app')

@push('css')
    <link rel="stylesheet" href="/css/credit-cart.css">
@endpush

@section('content')
    <!-- Main Header Nav -->
    @include('admin.layouts.header-nav')

    <!-- Main Header Nav For Mobile -->
    @include('admin.layouts.header-nav-mobile')

    <!-- Our Dashbord -->
	<section class="our-dashbord dashbord pb50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-lg-4 col-xl-2 dn-smd pl0">
                @include('admin.layouts.menu-lateral')
				</div>
				<div class="col-sm-12 col-lg-8 col-xl-10">
					<div class="row">
						<div class="col-lg-12">
                        @include('admin.layouts.menu-lateralMobil')
						</div>
						<div class="col-lg-12">
                        @include('admin.layouts.nav-admin', ['title' => 'Tus datos de pago', 'page' => 'Estidiante'] )
						</div>
						<div class="col-lg-12">
							<div class="my_course_content_container">
								<div class="my_setting_content mb30">
                                    <div class="my_setting_content_header">
										<div class="my_sch_title">
											<h4 class="m0">{{ __("Información de tu tarjeta en :app", ["app" => env("APP_NAME")]) }}</h4>
										</div>
                                    </div>

                                    @include('custom.message')

                                    <div class="contenedor">                            
                                        <!-- Tarjeta -->
                                        <div class="tarjeta" id="tarjeta">
                                            <div class="delantera">
                                                <div class="logo-marca" id="logoMarca"></div>
                                                <img src="/img/chip-tarjeta.png" class="chip" alt="img chip">

                                                <div class="datos">
                                                <div class="grupo" id="numero">
                                                    <p class="label">Número Tarjeta</p>
                                                    <p class="numero">#### #### #### ####</p>
                                                </div>

                                                <div class="flexbox">
                                                    <div class="grupo" id="nombre">
                                                    <p class="label">Nombre Tarjeta</p>
                                                    <p class="nombre">Jhon Doe</p>
                                                    </div>

                                                    <div class="grupo" id="expiracion">
                                                    <p class="label">Exp</p>
                                                    <p class="expiracion"><span class="mes">MM</span> / <span class="year">AA</span></p>
                                                    </div>
                                                </div>

                                                </div>
                                            </div>

                                            <div class="trasera">
                                                <div class="barra-magnetica"></div>
                                                <div class="datos">
                                                <div class="grupo" id="firma">
                                                    <p class="label">Firma</p>
                                                    <div class="firma">
                                                    <p></p>
                                                    </div>
                                                </div>
                                                <div class="grupo" id="ccv">
                                                    <p class="label">CCV</p>
                                                    <p class="ccv"></p>
                                                </div>
                                                </div>
                                                <p class="leyenda">Esta tarjeta es propiedad del Banco C.A, su utilización queda sujeta a las condiciones que
                                                regulan el uso de la misma y que el cliente conoce. En caso de pérdida favor notificar al Servicio Atención
                                                Telefónica (999-99-99) y notificarlo por escrito al Banco emisor. Si esta tarjeta es encontrada, favor
                                                remitirla al Banco, a cualquiera de sus oficinas.
                                                </p>
                                                <a href="#" class="link-banco">www.Banco.com</a>
                                            </div>
                                        </div>

                                        <!--  Conetenrdor boton abrir formulario  -->
                                        <div class="contenedor-btn">
                                            <button class="btn-abrir-formulario" id="btnAbrirFormulario"><i class="fas fa-plus"></i>
                                            </button>
                                        </div>

                                        <!-- Formulario -->
                                        <form role="form" action="{{route('estudiante.billing.process_credit_card')}}" id="formularioTarjeta" class="formulario-tarjeta" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="grupo">
                                                <label for="inputNumero">Número Tarjeta</label>
                                                <input type="text" id="inputNumero" name="card_number" maxlength="19" autocomplete="off" value="{{
                                                old('card_number') ?
                                                old('card_number') :
                                                (auth()->user()->card_last_four ? '************' . auth()->user()->card_last_four : null)
                                            }}">
                                            </div>
                                            <div class="grupo">
                                                <label for="inputNombre">Nombre</label>
                                                <input type="text" id="inputNombre" maxlength="19" autocomplete="off" name="inputNombre" value="{{old('inputNombre')}}">
                                            </div>
                                            <div class="flexbox">
                                                <div class="grupo expira">
                                                <label for="selectMes">Expiracion</label>
                                                <div class="flexbox">
                                                    <div class="grupo-select">
                                                    <select name="mes" id="selectMes" required>
                                                        <option disabled selected>Mes</option>
                                                    </select>
                                                    <i class="fas fa-angle-down"></i>
                                                    </div>
                                                    <div class="grupo-select">
                                                    <select name="year" id="selectYear" required>
                                                        <option disabled selected>Año</option>
                                                    </select>
                                                    <i class="fas fa-angle-down"></i>
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="grupo ccv">
                                                <label for="inputCCV">CCV</label>
                                                <input type="text" id="inputCCV" name="cvc" required maxlength="3">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn-enviar">{{ __("Guardar tarjeta") }}</button>
                                        </form>
                                    </div>                            
                                
								</div>
							</div>
						</div>
					</div>
					<div class="row mt10">
                    @include('admin.layouts.footer')
					</div>
				</div>
			</div>
		</div>
    </section>
@endsection

@push('js')
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="/js/credit-cart.js"></script>
@endpush