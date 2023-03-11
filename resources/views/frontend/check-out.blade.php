@extends('frontend.layouts.master')
@section('content')

<div class="container">

    <h2 class="mt-5"><i class="fa  fa-credit-card-alt"></i> Checkout</h2>
    <hr>
        <div class="row">
        <div class="col-md-7">
            <h4>Billing Details</h4>

               <form action="{{route('checkout.store')}}" method="POST">
                @csrf
                <input type="hidden" value="1" name="product_id" />
                <input type="hidden" value="1" name="quantity" />

                  <div class="form-row">
                    {{-- <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="Email"name="email">
                    </div> --}}
                    <div class="form-group col-md-12">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="name" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="address" name="address">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label for="city">City</label>
                      <input type="text" class="form-control" id="city" placeholder="City" name="city">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="provance">Provance</label>
                        <input type="text" class="form-control" id="provance" placeholder="Provance" name="provance">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="postal">Postal</label>
                      <input type="integer" class="form-control" id="postal" placeholder="Postal"name="postal">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="integer" class="form-control" id="phone" placeholder="Phone" name="phone">
                  </div>
                  <hr>
                  {{-- <h5><i class="fa fa-credit-card"></i> Payment Details</h5>

                  <div class="form-group">
                    <label for="name_card">Name on card</label>
                    <input type="text" class="form-control" id="name_card" placeholder="Name on card">
                  </div>

                  <div class="form-group">
                    <label for="card">Credit or debit card</label>
                    <input type="text" class="form-control" id="card" placeholder="Credit or debit card">
                  </div> --}}

                  <button type="submit" class="btn btn-outline-info col-md-12">Complete Order</button>
                </form>

            </div>

            <div class="col-md-5">

            <h4>Your Order</h4>

                <table class="table your-order-table">

                    <tr>
                        <th>Image</th>
                        <th>Details</th>
                        <th>Qty</th>
                    </tr>



                    @foreach ($data as $d)
                    <?php
                        $data_new = App\Models\Product::find($d->id);
                    ?>


                    <tr>
                        <td><img src="{{asset('uploads/'.$data_new->image)}}" alt="" style="width: 4em"></td>
                        <td>
                            <strong>{{$d->name}}</strong> <br>
                            <span class="text-dark">{!!$data_new->description!!}</span>
                            <span class="text-dark">Rs.{{$d->price}}</span>
                        </td>
                        <td>
                            <select name="" id="" class="form-control qty" style="width: 4.7em" data-id={{ $d->rowId }}>
                                <option {{$d->qty == 1 ? 'selected' : ''}}>1</option>
                                            <option {{$d->qty == 2 ? 'selected' : ''}}>2</option>
                                            <option {{$d->qty == 3 ? 'selected' : ''}}>3</option>
                                            <option {{$d->qty == 4 ? 'selected' : ''}}>4</option>
                                        </select>
                        </td>
                    </tr>

                    @endforeach
                </table>

                <hr>
                <table class="table your-order-table table-bordered">
                    <tr>
                        <th colspan="2" >Price Details</th>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td>{{Cart::subtotal()}}</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>{{Cart::tax()}}</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <th>{{Cart::total()}}</th>

                    </tr>

                </table>

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

