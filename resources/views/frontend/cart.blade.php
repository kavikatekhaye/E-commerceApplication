@extends('frontend.layouts.master')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <h2 class="mt-5"> <i class="fa fa-shopping-cart"></i> Shooping Cart</h2>
        <hr>
        @if (session()->has('msg'))
        <div class="alert alert-success alert-dismissable">
            {{ session()->get('msg') }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        </div>
    @endif

        <h4 class="mt-5">{{ Cart::instance('default')->count() }} items(s) in Shopping Cart</h4>

        <div class="cart-items">

            <div class="row">

                <div class="col-md-12">

                    <table class="table">


                        <tbody>
                            @foreach ($data as $d)
                                <?php
                                $data_new = App\Models\Product::find($d->id);
                                ?>



                                <tr>
                                    <td><img src="{{ asset('uploads/' . $data_new->image) }}" style="width: 5em"></td>
                                    <td>
                                        <strong>{{ $d->name }}</strong><br>
                                        <span class="text-dark">{!! $data_new->description !!}</span>

                                    </td>

                                    <td>
                                        <form action={{ route('cart.destroy', $d->rowId) }} method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('cart.remove', $d->rowId) }}">Remove</a><br>
                                        </form>
                                        <a href="{{ route('cart.saveForLater', $d->rowId) }}">Save for later</a>

                                    </td>

                                    <td>
                                        <select name="" id="" class="form-control qty" style="width: 4.7em"
                                            data-id={{ $d->rowId }}>
                                            <option {{ $d->qty == 1 ? 'selected' : '' }}>1</option>
                                            <option {{ $d->qty == 2 ? 'selected' : '' }}>2</option>
                                            <option {{ $d->qty == 3 ? 'selected' : '' }}>3</option>
                                            <option {{ $d->qty == 4 ? 'selected' : '' }}>4</option>
                                            {{-- <option {{ $d->qty == 5 ? 'selected' : '' }}>5</option>
                                            <option {{ $d->qty == 6 ? 'selected' : '' }}>6</option>
                                            <option {{ $d->qty == 7 ? 'selected' : '' }}>7</option>
                                            <option {{ $d->qty == 8 ? 'selected' : '' }}>8</option>
                                            <option {{ $d->qty == 9 ? 'selected' : '' }}>9</option>
                                            <option {{ $d->qty == 10 ? 'selected' : '' }}>10</option> --}}

                                        </select>
                                    </td>

                                    <td>Rs.{{ $d->price }}</td>
                                </tr>
                            @endforeach


                        </tbody>

                    </table>

                </div>
                <!-- Price Details -->
                <div class="col-md-6">
                    <div class="sub-total">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th colspan="2">Price Details</th>
                                </tr>
                            </thead>
                            <tr>
                                <td>Subtotal </td>
                                <td>{{ Cart::subtotal() }} </td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>{{ Cart::tax() }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <th>{{ Cart::total() }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- Save for later  -->
                <div class="col-md-12">
                    <a href="{{ route('index') }}"><button class="btn btn-outline-dark">Continue Shopping</button> </a>

                    @if (Auth::user())
                        <a href="{{ route('checkout') }}"><button class="btn btn-outline-info">Proceed to checkout</button>
                        </a>
                    @else
                        <a href="{{ route('signin') }}"><button class="btn btn-outline-info col-md-2">Signin</button> </a>
                    @endif
                    <hr>

                </div>

                <div class="col-md-12">

                    <h4>{{ Cart::instance('saveForLater')->count() }} items Save for Later</h4>

                    <table class="table">
                        <tbody>
                        <tbody>
                            @foreach (Cart::instance('saveForLater')->content() as $d)
                                <tr>
                                    @php
                                        $data_new = App\Models\Product::find($d->id);
                                    @endphp


                                <tr>
                                    <td><img src="{{ asset('uploads/' . $data_new->image) }}" style="width: 5em"></td>
                                    <td>
                                        <strong>{{ $d->name }}</strong><br>
                                        <span class="text-dark">{!! $data_new->description !!}</span>
                                    </td>

                                    <td>
                                        <form action={{ route('cart.saveForLaterDestroy', $d->rowId) }} method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-link btn-large">Remove</button><br>
                                            <a href="{{ route('cart.moveToCart', $d->rowId) }}">Move to Cart</a>

                                    </td>

                                    <td>
                                        <select name="" id="" class="form-control qty" style="width: 4.7em"
                                            data-id={{ $d->rowId }}>
                                            <option {{ $d->qty == 1 ? 'selected' : '' }}>1</option>
                                            <option {{ $d->qty == 2 ? 'selected' : '' }}>2</option>
                                            <option {{ $d->qty == 3 ? 'selected' : '' }}>3</option>
                                            <option {{ $d->qty == 4 ? 'selected' : '' }}>4</option>
                                        </select>
                                    </td>
                                    <td>Rs.{{ $d->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>


        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const className = document.querySelectorAll('.qty');
        Array.from(className).forEach(function(el) {
            el.addEventListener('change', function() {
                const id = el.getAttribute('data-id');
                axios.patch(`/cart/update/${id}`, {
                        qty: this.value
                    })
                    .then(function(response) {
                        location.reload();
                    })
                    .catch(function(error) {
                        location.reload();
                    });
                console.log(id);
            })
        })
    </script>
@endsection
