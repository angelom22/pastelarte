<div class="col-md-12 col-lg-8 col-xl-8">
    @include('custom.message')
    <div class="cart_page_form table-responsive">
        <form action="#">
            <table class="table table-stripe table-hover">
                <thead class="thead-dark">
                    <tr class="carttable_row">
                        <th class="cartm_title">Curso</th>
                        <th class="cartm_title">Precio</th>
                        <!-- <th class="cartm_title">Total</th> -->
                    </tr>
                </thead>
                <tbody class="table_body">
                    @forelse($cart->getContent() as $curso)
                        <tr>
                            <th scope="row">
                                <ul class="cart_list">
                                    <li class="list-inline-item pr15"><a href="{{route('remove_curso_from_cart', $curso)}}"><img  src="{{asset('img/shop/close.png')}}" alt="close.png"></a></li>
                                    <li class="list-inline-item pr20"><a href="{{route('cursos.show', $curso)}}"><img style="width: 120px; heigh:90px; object-fit: cover;" src="/storage/{{$curso->thumbnail}}" alt="{{$curso->slug}}"></a></li>
                                    <li class="list-inline-item"><a class="cart_title" href="#">{{$curso->title}} <br> {{$curso->instructor}}  </a></li>
                                </ul>
                            </th>
                            <td class="cart_total">${{$curso->formatted_price}}</td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <div class="empty-results">
                                    {!! __("No tienes ningún curso en el carrito") !!}
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </form>
    </div>


    <!-- <div class="checkout_form">
        <div class="checkout_coupon ui_kit_button">
            <form class="form-inline">
                <input class="form-control" type="search" placeholder="Coupon Code" aria-label="Search">
                <button type="button" class="btn btn2">Apply Coupon</button>
                <button type="button" class="btn btn3">Update Cart</button>
            </form>
        </div>
    </div> -->
</div>