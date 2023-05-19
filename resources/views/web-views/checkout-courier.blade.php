@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Choose Courier Service'))

@push('css_or_js')
    <style>
         @font-face {
            font-family: 'BURBANKBIGCONDENSED-BOLD';
            src: url({{ asset('public/assets/front-end/fonts/BURBANKBIGCONDENSED-BOLD.ttf')}});
        }
        @font-face {
            font-family: 'BURBANKBIGCONDENSED-BLACK';
            src: url({{ asset('public/assets/front-end/fonts/BURBANKBIGCONDENSED-BLACK.ttf')}});

        }
        .stripe-button-el {
            display: none !important;
        }

        .razorpay-payment-button {
            display: none !important;
        }
        .steps-light .step-item.active .step-count, .steps-light .step-item.active .step-progress{
            background-color: #FF061E !important;
        }

        .btnShipping{
            background: #000 !important;
                            border: 1px solid #000 !important;
                            width:100%;
                            text-transform: capitalize;
        }
        .btnShipping:hover{
            background: #FF061E !important;
            border: 1px solid #FF061E !important;
        }
    </style>
@endpush

@section('content')
    <div class="container pb-5 mb-2 mb-md-4 rtl"
         style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="row">
            <div class="col-md-12 mb-5 pt-5">
                <div class="feature_header __feature_header" style="background: transparent !important;">
                    <span style="    font-family: 'BURBANKBIGCONDENSED-BOLD' !important; font-size: 33.23px;
                    ">{{ \App\CPU\translate('courier_service')}}</span>
                </div>
            </div>
            <section class="col-lg-8">
                <div class="checkout_details mt-2" style="    border: 1px solid #7777;
                padding: 25px;
                border-radius: 10px;">
                @include('web-views.partials._checkout-steps',['step'=>3])
                    <h2 class="h6 pb-3 mb-2 mt-5">{{\App\CPU\translate('choose_courier_service')}}</h2>
                    <div class="form-group">
                      <label for="">Courier Service</label>
                      {{-- {{ dd($services['data']['rates'][0]) }} --}}
                      <select class="form-control" name="courier_service" id="courier_service">
                        <option value="" selected>Select Courier Service</option>
                        @foreach ($services['data']['rates'] as $service)
                            <option value="{{ json_encode($service) }}">{{ $service['service_name'] }}  rates( {{ $service['total_charge']['amount'] }}{{ $service['total_charge']['currency'] }} )  delivery date ( {{ $service['delivery_date'] }} )</option>
                        @endforeach
                      </select>
                    </div>
                     <!-- Navigation (desktop)-->
                     <div class="row mt-3">
                        <div class="col-6">
                            <a class="btn btn-secondary btn-block" href="{{route('checkout-details')}}" style="padding:10px 15px; border: 1px solid #000 !important; text-transform:capitalize;">
                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'right' : 'left'}} mt-sm-0 mx-1"></i>
                                <span class="d-none d-sm-inline">{{ \App\CPU\translate('shop_cart')}}</span>
                                <span class="d-inline d-sm-none">{{ \App\CPU\translate('shop_cart')}}</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a class="btn btn--primary btn-block" style="background: #FF061E !important; padding:10px 15px; border: 1px solid #FF061E !important; text-transform:capitalize;" href="javascript:" onclick="proceed_to_next()">
                                <span class="d-none d-sm-inline">{{ \App\CPU\translate('proceed_payment')}}</span>
                                <span class="d-inline d-sm-none">{{ \App\CPU\translate('Next')}}</span>
                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}} mt-sm-0 mx-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            @include('web-views.partials._order-summary')
        </div>
    </div>


@endsection

@push('script')
<script>
    function proceed_to_next() {
        $.ajax({
            url: "{{route('courier-update')}}",
            method: "post",
            data: {
                _token: "{{ csrf_token() }}",
                service: $("#courier_service").val(),
            },
            success: function (data) {
                location.href = "{{route('checkout-payment')}}";
            },
        });
    }
</script>
@endpush
