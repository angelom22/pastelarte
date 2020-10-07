
<!-- Mensaje de alerta 1 -->
@if(session('message'))
    <div class="row justify-content-center mt-3 mb-0 pb-0">
        <div class="col-md-10">
            <div class="alert alert-{{ session('message')[0] }}">
                <h4 class="alert-heading">{{ __("Mensaje informativo...!!!") }}</h4>
                <p>{{ session('message')[1] }}</p>
            </div>
        </div>
    </div>
@endif

<!-- Mensaje de alerta 2 -->
@if (session('status_success'))
    <div class="alert alert-success" role="alert">
        {{ session('status_success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
@endif