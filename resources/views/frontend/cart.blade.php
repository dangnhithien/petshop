@extends('frontend.master3') 
@section('css')
<link rel="stylesheet" href="{{asset('/frontend/css/cart.css')}}" />
@endsection
@section('main')
    <div class="container mt-2 bg-light w-100 h-100 shadow rounded">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#receipt" onclick="reload()" >
                    <i class="fas fa-money-check-alt"></i>
                    Thanh toán</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#pet">
                    <i class="fas fa-paw"></i>
                    Pet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#item">
                    <i class="fas fa-box"></i>
                  Phụ kiện</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="receipt">
                <div class="row border g-0 rounded shadow-sm">
                    <div class="col p-4">
                        <div class = "pay ">
                            <div class = "border-bottom border-secondary">
                                <div class="row pb-3">
                                    <div class="col-md-12 text-secondary">
                                        <span >Thú cưng:</span> <span id="total-pet">{{session('totalPrice')['thucung']}}</span> đ
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-md-12 text-secondary">
                                       <span > Vật dụng:  </span ><span id="total-item">{{
                                           session('totalPrice')['vatdung']}}</span> đ
                                    </div>
                                </div>
                            </div>
                            <p class = "pt-2 text-success">
                                <span >Tổng tiền:</span >
                                    <span id='total-price'>
                                        {{session('totalPrice')['tong']}}
                                    </span>
                                <span>đ</span></p>
                            <div id="pay"><div id="paypal-button"></div></div>
                            <input type="hidden" id="price" value="{{session('totalPrice')['tong']}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pet">
                <div class="row border g-0 rounded shadow-sm">
                    <div class="col table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table  table-striped pd-0">
                            <thead class="table-default">
                            <th class="col text-center">Loài</th>
                            <th class="col-md-4 text-center">Hinh ảnh</th>
                            <th class="col text-center">Tên giống</th>
                            <th class="col text-center">Giá(vnd)</th>
                            <th class="col text-center"></th>
                            <th class="col-md-2"></th>
                            </thead>
                            <tbody> 
                                
                                @if(session()->has('cart') and isset(session('cart')['thucung']))
                                    
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
                </div>
            </div>
            <div class="tab-pane fade" id="item">
                <div class="row border g-0 rounded shadow-sm">
                    <div class="col ">
                        <table class="table  table-striped pd-0 mb-0">
                            <thead class="table-default">
                            <th class="col text-center">Loại</th>
                            <th class="col-md-4 text-center">Hinh ảnh</th>
                            <th class="col text-center">Tên</th>
                            <th class="col text-center">Số lượng</th>
                            <th class="col text-center">Giá(vnd)</th>
                            <th class="col text-center"></th>
                            <th class="col-md-2"></th>
                            </thead>
                            <tbody> 
                                @if(session()->has('cart') and isset(session('cart')['vatdung']))
                                {{-- {{dd(session('cart'))}} --}}
                                @foreach (session('cart')['vatdung'] as $key=>$value )
                                    {{-- {{dd($key)}} --}}
                                    <tr>
                                        <td class="text-center align-middle">{{$value['tenloaivatdung']}}</td>
                                        <td class="text-center">
                                            <div class="col-md-10 mx-auto">
                                                <img class ="mw-100" src="{{asset($value['hinhanh'])}}" alt="">
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">{{$value['tenvatdung']}}</td>
                                        <td class="text-center align-middle">{{$value['soluong']}} </td>
                                        <td class="text-center align-middle">{{$value['giaban']}} </td>
                                        <td class="text-center align-middle">
                                            <a href="{{route('detailItem',['slug'=>$value['slug']])}}">xem</a>
                                        </td>
                                        <td class="text-center align-middle">
                                                <a class="delete  btn-danger btn col-md-4 "
                                                data-url = "{{route('del-to-cart',['type'=>'vatdung','id'=>$key])}}"
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
    $(document).ready(()=>{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name=csrf]').attr('content')
            }
        });

        function payment(status){
            if(status = 'COMPLETED'){
                $.ajax({
                    type: "POST",
                    url: 'payment-success',
                    data:"",
                })
            }
            return;
        }
        const API_URL = 'https://v6.exchangerate-api.com/v6/52b819857ecf1895ff60a1af/latest/VND';
        async function currency() {
        const res = await fetch(API_URL);
        const data = await res.json();
        
        let vnd_to_usd = data.conversion_rates['USD'];
        let usd = document.querySelector("#price");
        if(usd != null){
            usd = (usd.value * vnd_to_usd).toFixed(2);
        }
        else{
            usd = 0.1;
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
                size: "medium",
                color: "gold",//['gold','sliver','blue','black','white']
                shape: "rect",
                hight: "55",
                tagline: false,
                label: "paypal",
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
                return actions.order.capture().then(function(detail) {
                // Show a confirmation message to the buyer
                payment(detail.status);
                window.alert('Cảm ơn bạn đã mua sản phẩm');
                // window.reload();
                });
            },
            oncancel: function(data){
                window.alert('Thanh toán không thành công');
            }
            },'#paypal-button');
        }
        currency();
    })


        
</script>
@endsection