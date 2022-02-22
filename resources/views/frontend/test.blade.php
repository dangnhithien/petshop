@extends('frontend.master3') 
@section('main')
{{-- {{dd(session('cart'))}} --}}
<div class=" bg-light w-100 col-md-12 h-100">
        <nav >
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active"  data-toggle="tab" href="#nav-receipt" >Thanh toán</a>
                <a class="nav-item nav-link"         data-toggle="tab" href="#nav-pet" >Thú cưng</a>
                <a class="nav-item nav-link"         data-toggle="tab" href="#nav-item" >Phụ kiện</a>
            </div>
        </nav>
   
        <div class="col-md-10 mt-5 mx-auto" >
            <div class="tab-content " id="nav-tabContent">
                <div class="tab-pane fade show active " id="nav-receipt" role="tabpanel" aria-labelledby="nav-receipt-tab">
                    <table class="table table-bordered table-striped pd-0">
                        <thead class="table-dark">
                        <th class="col text-center">Loài</th>
                        <th class="col-md-4 text-center">Hinh ảnh</th>
                        <th class="col text-center">Tên giống</th>
                        <th class="col text-center">Giá(vnd)</th>
                        <th class="col text-center"></th>
                        <th class="col-md-2"></th>
                        </thead>
                        <tbody> 
                            @if(session()->has('cart'))
                            {{-- {{dd(session('cart'))}} --}}
                            @foreach (session('cart')['thucung'] as $key=>$value )
                                {{-- {{dd($key)}} --}}
                                <tr>
                                    <td class="text-center align-middle">{{$value['tenloaithucung']}}</td>
                                    <td class="text-center">
                                        <div class="col-md-10 mx-auto">
                                            <img class ="mw-100" src="{{asset($value['hinhanh'])}}" alt="">
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">{{$value['tengiongthucung']}}</td>
                                    <td class="text-center align-middle">{{$value['giaban']}} </td>
                                    <td class="text-center align-middle">
                                        <a href="{{route('detailPet',['slug'=>$value['slug']])}}">xem</a>
                                    </td>
                                    <td class="text-center align-middle">
                                            <a class="delete  btn-danger btn col-md-4 "
                                            data-url = "{{route('del-to-cart',['type'=>'thucung','id'=>$key])}}"
                                            >
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                    </td>
                                </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-pet" role="tabpanel" aria-labelledby="nav-pet-tab">
                    <table class="table table-bordered table-striped pd-0">
                        <thead class="table-dark">
                        <th class="col">Id</th>
                        <th class="col-md-4">Hinh ảnh</th>
                        <th class="col">Tên giống</th>
                        <th class="col">Giá</th>
                        <th class="col"></th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>2</td>
                            <td>lo</td>
                            <td>alsaka</td>
                            <td>12000000</td>
                            <td>12000000</td>
                        </tr>
                        </tbody>
                    </table>
                        
                   
        
                </div>
                <div class="tab-pane fade" id="nav-item" role="tabpanel" aria-labelledby="nav-item-tab">
                    <table class="table table-bordered table-striped pd-0">
                        <thead class="table-dark">
                        <th class="col">Id</th>
                        <th class="col-md-4">Hinh ảnh</th>
                        <th class="col">Tên giống</th>
                        <th class="col">Giá</th>
                        <th class="col"></th>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td>lo</td>
                            <td>alsaka</td>
                            <td>12000000</td>
                            <td>12000000</td>
                        </tr>
                        </tbody>
                    </table>
                        
                   
        
                </div>
                
            </div>

        </div>
    
</div> 
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="{{asset('/frontend/js/cart.js')}}"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
        const API_URL = 'https://v6.exchangerate-api.com/v6/52b819857ecf1895ff60a1af/latest/VND';
        async function currency() {
        const res = await fetch(API_URL);
        const data = await res.json();
        
        let vnd_to_usd = data.conversion_rates['USD'];
        let usd = document.querySelector("#price");
        if(usd != null){
        usd = (usd.value * vnd_to_usd).toFixed(2);
        }
            paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'Aea1-8-sLea9iI9AJqns5RuO0asq3sEBj-a4XoMnS-ouK4mB35Ndxl43xi4UpPYpCtCxJzZ6JnUqdaGh',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'small',
                color: 'gold',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                transactions: [{
                    amount: {
                    total: usd,
                    currency: 'USD'
                    }
                }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                // Show a confirmation message to the buyer
                window.alert('Thank you for your purchase!');
                });
            }
            }, '#paypal-button');
        }
        currency();
</script>
@endsection