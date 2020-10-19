@guest
    <a
        href="{{ route("register") }}"
        class="btn btn-info btn-lg btn-block"
    >
        {{ __("Crear una cuenta") }}
    </a>
@else
    @can("purchaseCurso", $curso)
        <a  class="cart_btnss"
            href="{{ route("add_curso_to_cart",  $curso) }}"
            class="site-btn btn-block"
        >
            {{ __("Agregar al carrito por: :precio", ["precio" => $curso->formatted_price]) }}
        </a>
        <!-- <a href="{{ route("checkout_form",  $curso) }}" class="cart_btnss_white">Comprar ahora</a> -->
    @else
        <a  class="cart_btnss site-btn btn-block"
            href="{{route('cursos.aprende', ["curso" => $curso])}}"
        >
            {{ __("Ver Curso") }}
        </a>
    @endcan
@endguest