@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('My Order List'))


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>
<body>
    @section('content')

    <div class="container-fluid my-3 top mt-5 orders">
        <h1 class="main-heading">
            My Orders
        </h1>

        <div class="row top-filter">
            <div class="col user col-xl-2 col-lg-3 col-md-12">
                <h4 class="order-h4">
                    Hello, {{$custname[0]->f_name}}
                </h4>
                <img src="{{asset('assets/Images/check-shield.png')}}">

            </div>
            <div class="col filter-btn col-xl-9 col-lg-9 col-md-12">
                <a class="btn" href="AllOrders" role="button">All</a>
                <a class="btn" href="PendingOrders" role="button">Pending</a>
                <a class="btn" href="CanceledOrders" role="button">Canceled</a>
                <a class="btn" href="ConfirmedOrders" role="button">Confirmed</a>
                <a class="btn" href="DeliveredOrders" role="button">Delivered</a>

            </div>
            {{-- <div class="col sort col-xl-3 col-lg-3 col-md-12">
                <p>
                    Sort:
                </p>
                <select class="form-control order-sort">
                    <option>Default</option>
                    <option value=""></option>
                </select>

            </div> --}}
        </div>

        <!-- Button trigger modal -->
        <div class="pop-btn">
            <i type="button" class="btn btn-primary fa-solid fa-bars popup-btn modal-btn" data-toggle="modal"
                data-target="#exampleModalCenter">
            </i>
            <h3 class="h3-heading mob-cat-btn">Account</h3>
        </div>

        <div class="row inner-content">
            <div class="account">
                <h4 class="order-h4">
                    My Account
                </h4>
                <ul>
                    <li><a href="user-account">Profile</a></li>
                    <li><a href="account-address">Address</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Payments</a></li>
                    <li><a href="#">Vouchers</a></li>
                    <li><a href="#">Reviews</a></li>
                </ul>

                <h4 class="order-h4">
                    My Orders
                </h4>
                <ul>
                    <li><a href="#">My Return</a></li>
                    <li><a href="#">My Cancellation</a></li>
                </ul>

                <h4 class="order-h4">
                    Sell on Remise
                </h4>
            </div>
            <div class="order-list">
               @foreach($orders as $order)
                <div class="row order-row">
                    <div class="col-3 col-md-5 name">
                        <div class="card order-card" style="width: 18rem;">
                            {{-- <img class="card-img-top" src="/Images/review-1-1.png" alt="Card image cap"> --}}
                            <div class="card-body order-card-body">
                                <h5>
                                    {{\App\CPU\translate('ID')}}: {{$order['id']}}
                                </h5>
                                <p class="card-text">{{$order['updated_at']}}</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-3 col-md-2 qty">
                        <p>QTY: {{$order->totalQTY}}</p>
                    </div>
                        @if ($order['order_status'] == 'confirmed')
                            <div class="col-3 col-md-2 status">
                                <a class="btn" href="#" role="button">
                                    Confirmed
                                </a>
                            </div>

                                @elseif ($order['order_status'] == 'pending')
                                    <div class="col-3 col-md-2 status">
                                        <a class="btn" href="#" role="button" style="background: #02932e;">
                                            Pending
                                        </a>
                                    </div>

                                    @elseif ($order['order_status'] == 'canceled')
                                    <div class="col-3 col-md-2 status">
                                        <a class="btn" href="#" role="button" style="background: #930210;">
                                            Canceled
                                        </a>
                                    </div>

                                    @elseif ($order['order_status'] == 'returned')
                                    <div class="col-3 col-md-2 status">
                                        <a class="btn" href="#" role="button" style="background: #023a93;">
                                            Returned
                                        </a>
                                    </div>

                                    @elseif ($order['order_status'] == 'delivered')
                                    <div class="col-3 col-md-2 status">
                                        <a class="btn" href="#" role="button" style="background: #b8a500;">
                                            Delivered
                                        </a>
                                    </div>

                                    @elseif ($order['order_status'] == 'out_for_delivery')
                                    <div class="col-3 col-md-2 status">
                                        <a class="btn" href="#" role="button" style="background: #9b4f0d;">
                                            Out For Delivery
                                        </a>
                                    </div>

                                    @elseif ($order['order_status'] == 'failed')
                                    <div class="col-3 col-md-2 status">
                                        <a class="btn" href="#" role="button" style="background: #930210;">
                                            Failed
                                        </a>
                                    </div>
                                    @elseif ($order['order_status'] == 'processing')
                                    <div class="col-3 col-md-2 status">
                                        <a class="btn" href="#" role="button" style="background: #026093;">
                                            Packaging
                                        </a>
                                    </div>
                        @endif
                    <div class="col-3 col-md-3 order-num">
                        <p class="number"></p>
                        <p class="date">{{$order['updated_at']}}</p>
                    </div>
                </div>
               @endforeach

                {{-- <div class="row order-row">
                    <div class="col-3 col-md-5 name">
                        <div class="card order-card" style="width: 18rem;">
                            <img class="card-img-top" src="/Images/review-1-1.png" alt="Card image cap">
                            <div class="card-body order-card-body">
                                <h5>
                                    Order Name
                                </h5>
                                <p class="card-text">Delivered on 23 Dec 2022</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-3 col-md-2 qty">
                        <p>Qty: 01</p>
                    </div>
                    <div class="col-3 col-md-2 status">
                        <a class="btn" href="#" role="button" style="background: #930210;">Canceled</a>
                    </div>
                    <div class="col-3 col-md-3 order-num">
                        <p class="number">Order # 154122288880723</p>
                        <p class="date">Placed on 13 Dec 2022</p>
                    </div>
                </div> --}}
{{--
                <div class="row order-row">
                    <div class="col-3 col-md-5 name">
                        <div class="card order-card" style="width: 18rem;">
                            <img class="card-img-top" src="/Images/review-1-1.png" alt="Card image cap">
                            <div class="card-body order-card-body">
                                <h5>
                                    Order Name
                                </h5>
                                <p class="card-text">Delivered on 23 Dec 2022</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-3 col-md-2 qty">
                        <p>Qty: 01</p>
                    </div>
                    <div class="col-3 col-md-2 status">
                        <a class="btn" href="#" role="button">Delivered</a>
                    </div>
                    <div class="col-3 col-md-3 order-num">
                        <p class="number">Order #154122288880723</p>
                        <p class="date">Placed on 13 Dec 2022</p>
                    </div>
                </div>

                <div class="row order-row">
                    <div class="col-3 col-md-5 name">
                        <div class="card order-card" style="width: 18rem;">
                            <img class="card-img-top" src="/Images/review-1-1.png" alt="Card image cap">
                            <div class="card-body order-card-body">
                                <h5>
                                    Order Name
                                </h5>
                                <p class="card-text">Delivered on 23 Dec 2022</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-3 col-md-2 qty">
                        <p>Qty: 01</p>
                    </div>
                    <div class="col-3 col-md-2 status">
                        <a class="btn" href="#" role="button" style="background: #930210;">Canceled</a>
                    </div>
                    <div class="col-3 col-md-3 order-num">
                        <p class="number">Order # 154122288880723</p>
                        <p class="date">Placed on 13 Dec 2022</p>
                    </div>
                </div>

                <div class="row order-row">
                    <div class="col-3 col-md-5 name">
                        <div class="card order-card" style="width: 18rem;">
                            <img class="card-img-top" src="/Images/review-1-1.png" alt="Card image cap">
                            <div class="card-body order-card-body">
                                <h5>
                                    Order Name
                                </h5>
                                <p class="card-text">Delivered on 23 Dec 2022</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-3 col-md-2 qty">
                        <p>Qty: 01</p>
                    </div>
                    <div class="col-3 col-md-2 status">
                        <a class="btn" href="#" role="button">Delivered</a>
                    </div>
                    <div class="col-3 col-md-3 order-num">
                        <p class="number">Order # 154122288880723</p>
                        <p class="date">Placed on 13 Dec 2022</p>
                    </div>
                </div>

                <div class="row order-row">
                    <div class="col-3 col-md-5 name">
                        <div class="card order-card" style="width: 18rem;">
                            <img class="card-img-top" src="/Images/review-1-1.png" alt="Card image cap">
                            <div class="card-body order-card-body">
                                <h5>
                                    Order Name
                                </h5>
                                <p class="card-text">Delivered on 23 Dec 2022</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-3 col-md-2 qty">
                        <p>Qty: 01</p>
                    </div>
                    <div class="col-3 col-md-2 status">
                        <a class="btn" href="#" role="button">Delivered</a>
                    </div>
                    <div class="col-3 col-md-3 order-num">
                        <p class="number">Order # 154122288880723</p>
                        <p class="date">Placed on 13 Dec 2022</p>
                    </div>
                </div> --}}

            </div>


        </div>


        <!-- Modal -->
       
        {{-- <div class="modal fade filter-modal" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            < class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Body start-->

                        <div class="account account-mob">
                            <h4 class="order-h4">
                                My Account
                            </h4>
                            <ul>
                                <li>
                                    Profile
                                </li>
                                <li>
                                    Address
                                </li>
                                <li>
                                    Settings
                                </li>
                                <li>
                                    Payments
                                </li>
                                <li>
                                    Vouchers
                                </li>
                                <li>
                                    Reviews
                                </li>
                            </ul>

                            <h4 class="order-h4">
                                My Orders
                            </h4>
                            <ul>
                                <li>
                                    My Return
                                </li>
                                <li>
                                    My Cancellation
                                </li>
                            </ul>

                            <h4 class="order-h4">
                                Sell on Remise
                            </h4>
                        </div>


                        <!-- Body end -->

                    </div>

                </div>
                
            </class>
        </div> --}}

        @endsection

    </body>



</html>


<style>
            .container-fluid {
            padding: 0px 60px !important;
        }

        .h2-heading {
            font-family: Burbank Big Condensed !important;
            font-size: 33.23px;
            color: #1E1E1E !important;
            font-weight: 600 !important;
            line-height: 33px !important;
            letter-spacing: 0em !important;
            text-align: left !important;
            margin-top: 0px !important;
        }

        .h3-heading {
            color: #1E1E1E !important;
            font-family: Burbank Big Condensed !important;
            font-size: 26px;
            font-weight: 600 !important;
            line-height: 26px !important;
            letter-spacing: 0em !important;
            text-align: left !important;
            margin: 0px 0px 15px 0px !important;
        }

        .h4-heading {
            color: #1E1E1E;
            font-family: Poppins;
            font-size: 15px;
            font-weight: 500;
            line-height: 22px;
            letter-spacing: 0em;
            text-align: left;

        }


        .breadcrumbs .breadcrumb {
            background-color: transparent;
            padding: 25px 0px;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            content: ">" !important;
        }

        .breadcrumbs .breadcrumb-item {
            color: #BC0012;
            font-family: Poppins;
            font-size: 12px;
            font-weight: 500;
            line-height: 18px;
            letter-spacing: 0em;
            text-align: left;

        }

        .breadcrumbs .breadcrumb-item a {
            color: #FF061E !important;
        }

        .breadcrumbs .breadcrumb-item a:active {
            color: #1E1E1E !important;
            text-decoration: none !important;
        }

        .breadcrumbs .breadcrumb-item a:hover {
            color: #BC0012 !important;
            text-decoration: none !important;
        }


        .divider {
            border-top: 1px solid #1e1e1e80;
            padding: 0px 0px 15px 0px;
        }

        .ft-img {
            background-color: #cccccc !important;
            background: linear-gradient(90deg, #5c5c5c, transparent);
            width: 100%;
            border-radius: 20px;
        }

        .border-left-cart {
            border-left: solid 1px #1E1E1E80;
            padding-bottom: 25px;
        }

        .rating {
            float: left;
            background: #FFB800;
            padding: 5px 13px;
            border-radius: 50px;
            font-size: 11px;
        }

        .fa-star:before {
            content: "\f005";
            position: relative;
            right: 3px;
        }

        .sold {
            border-left: solid 1px #1E1E1E80;
        }

        .sold p {
            font-family: poppins;
            font-size: 11.5px;
            font-weight: 600;
            color: #1E1E1E80;
        }

        .description .product-about i {
            font-size: 11px;
            line-height: 15px;
            letter-spacing: 0em;
            text-align: left;

        }

        .size button {
            border: solid 1px transparent;
            float: left;
            background-color: #1E1E1E0D;
            border-radius: 5px;
        }

        .size button:hover {
            background-color: #1E1E1E0D;
            border: solid 1px #BC0012;
            border-radius: 5px;
        }

        .size button:focus {
            outline: none;
            border: solid 1px #BC0012 !important;
            border-radius: 5px !important;
        }

        .cart select {
            width: 100%;
            padding: 10px 0px;
            font-size: 10.88px;
            border-radius: 10px;
        }

        .cart .form-select {
            border: none;
            padding: 0px !important;
        }

        .form-select::before {
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            content: "\f007";
        }

        .cart .form-select:focus {
            outline: none !important;
        }

        .cart-btn {
            width: 100%;
            background: #FF061E !important;
            border: solid 1px #FF061E !important;
            border-radius: 10px !important;
            padding: 15px 0px !important;
            color: white !important;
            font-family: Poppins !important;
            font-size: 16px !important;
            font-weight: 600 !important;
            line-height: 24px !important;
            letter-spacing: 0em !important;
            text-align: center !important;

        }

        .cart-btn:hover {
            background-color: #c10416 !important;
        }

        .cart-btn:focus {
            outline: none !important;
        }

        .buy-btn {
            background-color: transparent !important;
            width: 100%;
            border: solid 1px #FF061E !important;
            border-radius: 10px !important;
            padding: 15px 0px !important;
            margin-top: 10px !important;
            color: #ff061e !important;
            font-family: Poppins !important;
            font-size: 16px !important;
            font-weight: 600 !important;
            line-height: 24px !important;
            letter-spacing: 0em !important;
            text-align: center !important;

        }

        .buy-btn:hover {
            color: white !important;
            border: solid 1px #BC0012;
            background-color: #000 !important;
        }

        .buy-btn:focus {
            outline: none !important;
        }

        .product-inner .sold-by {
            font-family: Poppins;
            font-size: 10px;
            font-weight: 600;
            line-height: 15px;
            letter-spacing: 0em;
            padding-top: 20px;
            margin: 0px;
        }

        .product-inner .desrptn {
            clear: both;
            font-family: Poppins;
            font-size: 11px;
            font-weight: 500;
            line-height: 18px;
            letter-spacing: 0em;

        }

        .price p {
            color: Red;
            font-family: Burbank Big Condensed;
            font-size: 42px;
            font-weight: 600;
            line-height: 42px;
            letter-spacing: 0.02em;
            text-align: left;

        }



        .price .discount {
            color: #1E1E1E;
            font-family: Poppins;
            font-size: 11px;
            font-weight: 600;
            line-height: 17px;
            letter-spacing: 0em;
            text-align: left;

        }

        .thum {
            text-align: center;
        }

        .product-about .about-item-desc p {
            font-family: Poppins;
            font-size: 11px;
            font-weight: 500;
            line-height: 15px;
            letter-spacing: 0em;
            text-align: left;

        }

        .prod-det .thum img {
            width: 20%;
            border-radius: 15px;
        }

        .prod-det .thum img:hover {
            border: solid 1px #BC0012;
            border-radius: 15px;
            opacity: 0.8;
        }

        .product-inner .title {
            float: left !important;
        }

        .prod-det .thum img:active {
            border: solid 1px #BC0012;
            border-radius: 15px;
        }

        .reviews .progress-bar {
            background-color: #FFC700;
        }

        .reviews .glyphicon-star:before {
            color: #FFC700;
        }

        .reviews .btn-sm {
            padding: 0px 0px !important;
            background: transparent;
            border: none;
        }

        .reviews .rating-block .glyphicon-star:before {
            font-size: 24px !important;

        }


        /* Plus-Minus Field */
        /* Google fonts import link */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .Plus-Minus {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFF;
            border-radius: 12px;
            border: solid 1px #1e1e1e;
        }

        .Plus-Minus span {
            width: 20%;
            text-align: center;
            font-size: 42px;
            font-weight: 600;
            cursor: pointer;
            user-select: none;
        }

        .minus {
            color: white;
            border-top-left-radius: 12px !important;
            border-bottom-left-radius: 12px !important;
            background: #1e1e1e;
        }

        .plus {
            color: white;
            border-top-right-radius: 12px !important;
            border-bottom-right-radius: 12px !important;
            background: #FF061E;
        }

        .plus:hover {
            background-color: #c10416 !important;
        }

        .Plus-Minus span.num {
            width: 80%;
            font-size: 24px;
            border-right: 2px solid rgba(0, 0, 0, 0.2);
            border-left: 2px solid rgba(0, 0, 0, 0.2);
            pointer-events: none;
        }

        .price-shipping {
            padding-top: 20px;
        }

        .reviews h5 {
            padding-top: 5px;
            clear: both;
            font-family: Poppins !important;
            color: #1E1E1E99;
            font-size: 14px !important;
            font-weight: 600 !important;
            line-height: 21px !important;
            letter-spacing: 0em !important;
        }

        .review-block-rate button {
            background: transparent;
            border: none;
            padding: 0px 0px !important;
        }

        .review-block .review-block-name a {
            color: #1E1E1E;
            font-family: Poppins;
            font-size: 18px;
            font-weight: 600;
            line-height: 28px;
            letter-spacing: 0em;

        }

        .review-block .col-sm-10 img {
            float: left;
            padding-right: 10px;
        }

        .rev-img img {
            padding: 8px 5px 8px 0px;
            width: 10% !important;
        }

        .rev-like {
            color: #000;
        }

        .reviews hr {
            color: #f10d0d99;
        }

        .location-select {
            border: solid 1px #8e8e8e;
            position: relative;
            padding: 15px 10px 15px 32px;
            border-radius: 12px;
            margin-bottom: 12px;
        }

        .location-select .fa-location-dot {
            color: #000;
            position: absolute;
            top: 17px;
            left: 12px;
            font-size: 18px;
        }

        .sort-by select {
            padding: 8px 90px 8px 15px;
            margin: 0px 5px;
            border-radius: 8px;
            border: solid 1px #8e8e8e;
        }

        .sortBy {
            display: flex;
            padding-right: 5px;
            align-items: flex-end;
        }

        .sortBy select:focus {
            outline: none !important;
        }

        .sortBy p {
            padding-right: 15px;
            padding-top: 7px;
        }

        .rightSort {
            padding-left: 0px !important;
            display: flex;
            justify-content: flex-end;
        }

        .viewBy {
            display: flex;
            align-items: center;
        }

        .viewBy p {
            padding-right: 12px;
            margin-bottom: 0px;
        }

        .my-filters {
            margin-right: 0px !important;
            margin-left: 0px !important;
        }



        .orders .row {
            margin-left: 0px !important;
            margin-right: 0px !important;
        }

        .filters {
            margin-bottom: 25px;
        }

        .form-check {
            padding-left: 0px !important;
            margin-bottom: 5px !important;
        }

        .prod-filter-check .input-check {
            position: absolute;
            margin-top: 6.5px !important;
            margin-left: 0px !important;
        }

        .prod-filter-check .filter-check-lable {
            color: #757474;
            font-family: Poppins;
            font-size: 11px;
            font-weight: 400;
            line-height: 17px;
            letter-spacing: 0em;
            text-align: left;
            position: relative;
            left: 20px;
        }

        .left-col {
            border-right: solid 1px #1e1e1e80;
        }

        .filter-text {
            color: #757474;
            font-family: Poppins;
            font-size: 11px;
            font-weight: 400;
            line-height: 17px;
            letter-spacing: 0em;
            text-align: left;

        }

        .filter-check {
            accent-color: #FF061E;
        }

        .filter-price-div {
            padding: 0px !important;
            margin: 0px 0px 10px 0px !important;
        }

        .filter-price-div .filter-price {
            text-align: center;
            border-color: #1e1e1e80 !important;
        }

        .filter-price-div .filter-price:focus {
            box-shadow: none;
            border-color: #1e1e1e80 !important;
            outline: transparent !important;
        }

        .popup-btn {
            display: none !important;
        }

        .desktop p {
            color: #757474;
            font-family: Poppins !important;
            font-size: 11px !important;
            font-weight: 400 !important;
            line-height: 17px !important;
            letter-spacing: 0em !important;
            text-align: left !important;


        }

        .mob-cat-btn {
            display: none !important;
        }


        /* Shipping css START */

        .top .main-heading {
            color: #1E1E1E !important;
            font-family: Burbank Big Condensed !important;
            font-size: 33px !important;
            font-weight: 600 !important;
            line-height: 33px !important;
            letter-spacing: 0em !important;
            text-align: left !important;
        }

        .top p {
            color: rgba(30, 30, 30, 0.6);
            font-family: Poppins !important;
            font-size: 12px !important;
            font-weight: 500 !important;
            line-height: 18px !important;
            letter-spacing: 0em !important;
            text-align: left !important;

        }

        .Ship-row {
            border: solid 1px grey;
            padding: 25px 29px;
            background: transparent;
            margin: 15px 0px;
            border-radius: 15px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-content: flex-end;
            align-items: center;
        }

        .Ship-row:hover {
            border-color: #FF061E;
            background-color: #9302100D !important;
        }

        .Ship-row:active {
            border-color: #FF061E;
            background-color: #9302100D !important;
        }

        .Ship-row .compny input {
            position: relative;
            float: left;
            top: 17px;
        }

        .Ship-row .compny-title {
            color: #1E1E1E;
            font-family: Poppins;
            font-size: 20px;
            font-weight: 600;
            line-height: 30px;
            letter-spacing: 0em;
            text-align: left;
            padding-left: 35px;
        }

        .Ship-row .compny-desc {
            margin-top: -10px;
            margin-bottom: 0px !important;
            font-family: Poppins;
            font-size: 12px;
            font-weight: 500;
            line-height: 18px;
            letter-spacing: 0em;
            text-align: left;
            padding-left: 36px;
        }

        .Ship-row:hover .compny-title {
            color: #BC0012;
        }

        .Ship-row:active .compny-title {
            color: #BC0012;
        }

        .Ship-row:hover .shipping-rate {
            color: #BC0012 !important;
        }

        .Ship-row:active .shipping-rate {
            color: #BC0012 !important;
        }

        .Ship-row .shipping-rate {
            color: #1E1E1E;
            font-family: Poppins;
            font-size: 16px;
            font-weight: 600;
            line-height: 24px;
            letter-spacing: 0em;
            text-align: left;

        }

        .ship-sub-btn {
            margin-top: 10px !important;
            border-radius: 12px !important;
            font-family: Poppins !important;
            font-size: 16px !important;
            font-weight: 700 !important;
            line-height: 14px !important;
            letter-spacing: 0em !important;
            text-align: center !important;
            background: #1E1E1E !important;
            width: 100% !important;
            color: #FFFFFF !important;
            padding: 20px 0px !important;
        }

        .ship-sub-btn:hover {
            background-color: #FF061E !important;
        }

        .ship-sub-btn:active {
            background-color: #FF061E !important;
        }

        .rad {
            accent-color: #FF061E;
        }

        /* Shipping css END */

        /* payment with css START */

        .Ship-col {
            width: 48%;
            margin: 0px 7px;
            float: left;
            border: solid 1px grey;
            padding: 45px 35px;
            background: transparent;
            border-radius: 15px;
        }

        .Ship-col:hover {
            border-color: #FF061E;
            background-color: #f8f5f5 !important;
        }

        .Ship-col .compny-title {
            padding-right: 12px;
            float: left;
            color: #1E1E1E;
            font-family: Poppins;
            font-size: 26px;
            font-weight: 600;
            line-height: 30px;
            letter-spacing: 0em;
            text-align: left;
        }

        .Ship-col .compny-desc {
            clear: both;
            margin-top: -10px;
            margin-bottom: 0px !important;
            font-family: Poppins;
            color: #757474;
            font-size: 14px;
            font-weight: 500;
            line-height: 21px;
            letter-spacing: 0em;
            text-align: left;

        }

        .Ship-col .rad {
            accent-color: #FF061E;
            border: 0px;
            width: 25px;
            height: 2em;
        }


        .Ship-Ser-form {
            clear: both;
        }

        .Ship-Ser-form .ship-form label {
            color: #5f5f5f;
            font-family: Poppins;
            font-size: 14px;
            font-weight: 600;
            line-height: 14px;
            letter-spacing: 0em;
            text-align: left;
            position: relative;
            top: 18px;
            left: 38px;
            background: white;
            padding: 3px 7px;
        }

        .Ship-Ser-form .select-col-33 label {
            color: #5f5f5f;
            font-family: Poppins;
            font-size: 14px;
            font-weight: 600;
            line-height: 14px;
            letter-spacing: 0em;
            text-align: left;
            position: relative;
            top: 18px;
            left: 38px;
            background: white;
            padding: 3px 7px;
        }


        .product-review-bot{
            padding: 0px !important;
        }



        .Ship-Ser-form .ship-form {
            float: left;
            width: 48%;
            margin: 0px 8px;
        }

        .Ship-Ser-form .select-col-33 {
            float: left;
            width: 32%;
            margin-left: 10px;
        }

        .Ship-Ser-form .form-group .ship-control {
            color: #000 !important;
            height: 70px !important;
            border-radius: 15px !important;
            font-family: Poppins;
            font-size: 14px;
            font-weight: 500;
            line-height: 14px;
            letter-spacing: 0em;
            text-align: left;
            padding-left: 28px;
        }

        .Ship-Ser-form .ship-sub-btn {
            margin-top: 60px !important;
        }

        .ship-control:focus {
            box-shadow: none !important;
            border-color: #ced4da !important;
        }


        ::placeholder {
            color: #c1bfbf !important;
        }

        /* payment with css END */

        /* Order CSS START */

        .top-filter {
            display: flex !important;
            margin-top: 40px !important;
            justify-content: space-between !important;
            align-items: center !important;
        }

        .top-filter .filter-btn a {
            font-family: Poppins;
            font-size: 12px;
            font-weight: 500;
            line-height: 18px;
            letter-spacing: 0em;
            text-align: left;
            padding: 5px 42px;
            background-color: #c1bfbf;
            color: black;
            border-radius: 8px;
            margin: 0px 3px;
        }

        .top-filter .filter-btn a:hover {
            background-color: #1E1E1E;
            color: white;
        }

        .top-filter .filter-btn a:focus {
            box-shadow: none;
        }

        .top-filter .filter-btn a:active {
            background-color: #1E1E1E;
            color: white;
        }

        .top-filter .user h4 {
            float: left;
            margin: 0px;
        }

        .top-filter .user img {
            padding-left: 7px;
        }

        .top-filter .sort {
            display: flex;
            justify-content: flex-end;
        }

        .top-filter .sort p {
            padding-top: 5px;
            float: left;
            margin-bottom: 0px;
            padding-right: 10px;

        }

        .top-filter .sort .order-sort {
            border-color: #8e8e8e;
            font-family: Poppins;
            font-size: 10px;
            font-weight: 400;
            line-height: 16px;
            letter-spacing: 0em;
            text-align: left;
            width: 72%;
        }

        .top-filter .sort .order-sort:focus {
            border-color: #8e8e8e;
            box-shadow: none;
        }

        .account {
            width: 18%;
            margin-right: 8px;
            border: solid 1px #c2bfbf;
            border-radius: 18px;
            padding: 25px 30px;
        }

        .inner-content {
            margin-top: 20px;
        }

        .orders .account li {
            padding: 5px 0px;
            color: #4a4949;
            font-family: Poppins;
            font-size: 12px;
            font-weight: 500;
            line-height: 18px;
            letter-spacing: 0em;
            text-align: left;
            position: relative;
            left: 28px;
        }

        .orders .account li a {
            color: #4a4949;
        }

        .orders .account li a:hover {
            text-decoration: none;
            color: #FF061E !important;
        }

        .orders .account li a:active {
            color: #FF061E;
        }

        .order-list {
            width: 80%;
            margin-left: 8px;
            border: solid 1px #c2bfbf;
            border-radius: 18px;
            padding: 25px 30px;
        }

        .orders .order-h4 {
            font-family: Poppins !important;
            font-size: 16px !important;
            font-weight: 600 !important;
            line-height: 24px !important;
            letter-spacing: 0em !important;
            text-align: left !important;

        }

        .order-row {
            padding: 2px 17px !important;
            margin: 0px 20px 15px 20px !important;
            border-radius: 12px !important;
            background: #eceaea !important;
        }

        .order-row .card-body h5 {
            margin-bottom: 0px;
            color: #1E1E1E;
            font-family: Poppins;
            font-size: 20px;
            font-weight: 600;
            line-height: 30px;
            letter-spacing: 0em;
            text-align: left;

        }

        .order-row .card-body p {
            font-size: 12px !important;
            font-weight: 500 !important;
            color: #706f6f;
        }

        .qty {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .qty p {
            color: #1E1E1E;
            font-family: Poppins !important;
            font-size: 16px !important;
            font-weight: 600 !important;
            line-height: 24px !important;
            letter-spacing: 0em !important;
            text-align: left !important;
            margin-bottom: 0px !important;
        }

        .card-img-top {
            width: 20% !important;
        }

        .order-card {
            background: none !important;
            border: none !important;
            display: flex;
            flex-direction: row !important;
            align-items: center !important;
        }

        .status {
            display: flex !important;
            justify-content: center;
            align-items: center !important;
            flex-wrap: wrap !important;
        }

        .status a {
            font-family: Poppins;
            font-size: 10px;
            font-weight: 500;
            line-height: 15px;
            letter-spacing: 0em;
            text-align: left;
            background: #FF9B06;
            padding: 8px 20px;
            border-radius: 8px;
            color: white;
        }

        .status a:hover {
            color: white;
        }

        .order-num {
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            align-items: center;
            align-content: center;
        }

        .order-num .number {
            color: #1E1E1E !important;
            font-family: Poppins !important;
            font-size: 12px !important;
            font-weight: 600 !important;
            line-height: 18px !important;
            letter-spacing: 0em !important;
            text-align: left !important;

        }

        .order-num .date {
            font-family: Poppins !important;
            font-size: 12px !important;
            font-weight: 500 !important;
            line-height: 18px !important;
            letter-spacing: 0em !important;
            text-align: left !important;

        }

        .order-num p {
            margin-bottom: 0px !important;
        }

        /* Display Mob-Xsmall */

        @media only screen and (max-width: 375px) {

            .rightSort {
                display: block !important;
            }

            .sortBy {
                width: 50%;
                float: left;
            }

            .viewBy {
                padding-left: 44px;
                width: 50%;
                float: left;
                display: block;
            }

            .viewBy p {
                padding-bottom: 15px;
            }

            .sort-by select {
                padding: 5px 0px 5px 0px !important;
            }

            .filter-btn {
                padding-right: 0px !important;
            }

            .filter-btn a {
                margin-bottom: 8px !important;
            }

            .order-row {
                display: block !important;
            }

            .order-card {
                display: block !important;
            }

            .order-list .order-row {
                padding: 12px 0px 12px 0px !important;
            }

            .order-card img {
                float: left;
            }

            .qty {
                float: left;
                flex: 0 0 50% !important;
                max-width: 50% !important;
                justify-content: flex-start;
            }

            .status {
                flex: 0 0 50% !important;
                max-width: 50% !important;
                justify-content: flex-end;
            }

            .order-num {
                padding-top: 12px;
                flex: 0 0 100% !important;
            }

            .order-card {
                padding-bottom: 10px;
                width: 100% !important;
            }

            .order-card-body {
                padding: 0px !important;
                position: relative;
                top: -5px;
                left: 15px;
            }

        }


        /* Display Mob */

        @media only screen and (max-width: 480px) {

            .container-fluid {
                padding: 0px 25px !important;
            }

            .border-left-cart {
                border: none !important;
            }

            .image .thum img {
                margin: 6px 5px !important;
            }

            .h2-heading {
                font-size: 26px !important;
            }

            .h3-heading {
                font-size: 24px !important;
            }

            .popup-btn {
                display: block !important;
            }

            .desktop {
                display: none !important;
            }

            .modal-btn {
                padding: 0px !important;
                position: relative !important;
                top: -9px !important;
                left: 15px;
                background: transparent !important;
                color: #ff061e !important;
                border: none !important;
            }

            .fa-bars:before {
                font-size: 18px !important;
            }

            .mob-cat-btn {
                font-size: 14px !important;
                display: block !important;
                position: relative;
                top: -14px !important;
                left: 25px;
            }

            .filter-col {
                margin-top: -20px !important;
            }

            .Ship-row {
                padding: 10px 10px !important;
            }

            .Ship-row .compny-title {
                font-size: 16px !important;
                line-height: 20px !important;
            }

            .Ship-row .shipping-rate p {
                font-size: 12px;
                line-height: 13px;
            }

            .Ship-row .shipping-logo img {
                width: 85% !important;
                float: right !important;
            }

            .Ship-row .compny-title {
                padding-left: 25px !important;
                padding-bottom: 5px;
            }

            .Ship-row .compny-desc {
                padding-left: 26px !important;
                padding-right: 12px !important;
            }

            .Ship-col {
                width: 100% !important;
                margin: 10px 0px !important;
            }

            .Ship-Ser-form .ship-form {
                width: 100% !important;
                margin: 0px !important;
            }

            .Ship-Ser-form .select-col-33 {
                width: 100% !important;
                margin: 0px !important;
            }

            .breadcrumbs .breadcrumb-item {
                font-size: 10px !important;
            }

            .sort-by {
                display: block;
                text-align: left;
            }

            .rightSort {
                display: flex;
                justify-content: space-between;
                padding-left: 18px;
            }

            .product-review-bot {
                padding-left: 0px !important;
                padding-right: 0px !important;
                width: 100% !important;
            }

            .viewBy p {
                font-size: 14px !important;
            }



            .sort-by {
                padding-left: 0px !important;
                padding-right: 0px !important;
                width: 100% !important;
            }

            .sort-by select {
                margin: 0px;
                padding: 5px 18px 5px 8px !important;
            }

            .review-block .row .col-sm-10 {
                width: 50%;
            }

            .review-block .row .col-sm-2 {
                width: 50%;
            }

            .review-block .row .col-sm-6 {
                padding-top: 10px !important;
            }

            .filters {
                width: 50% !important;
                float: left !important;
            }

            .account {
                display: none !important;
                width: 100% !important;
            }

            .account-mob {
                display: block !important;
            }

            .top-filter .user {
                padding: 0px;
                width: 100% !important;
            }

            .top-filter .filter-btn {
                text-align: left !important;
                margin-top: 15px;
                max-width: 100% !important;
                flex: none;
                padding-left: 0px;
            }

            .top-filter .filter-btn a {
                padding: 5px 18px !important;
            }

            .orders .inner-content {
                margin-top: 0px !important;
            }

            .order-list {
                width: 100% !important;
                margin: 0px !important;
                padding: 12px 10px !important;
            }

            .order-list .order-row {
                margin: 0px 0px;
                padding: 0px 0px 12px 0px;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .order-list .order-row .name {
                max-width: 100% !important;
            }

            .order-list .order-row .order-num {
                max-width: 100% !important;
                display: block !important;
            }

            .top-filter .sort {
                display: block !important;
                flex: none;
                max-width: 100% !important;
                margin-top: 15px;
                padding-left: 0px;
            }

            .orders .pop-btn {
                margin-top: 15px;
            }

            .orders .pop-btn .popup-btn {
                position: inherit !important;
                text-align: left;
            }

            .orders .mob-cat-btn {
                padding-top: 0px !important;
                margin-bottom: 0px !important;
                display: block !important;
                position: relative;
                top: -22px !important;
                left: 25px !important;
            }

            .sortBy {
                display: block !important;
            }

            .sortBy label {
                font-size: 14px !important;
            }
        }

        /* Display tab */

        @media only screen and (max-width: 1024px) {
            .border-left-cart {
                border: none !important;
            }

            .container-fluid {
                padding: 0px 25px !important;
            }

            .product-about .fa-circle-check {
                margin-top: 7px !important;
            }

            .h3-heading {
                padding-top: 10px !important;
            }

            .Ship-col {
                width: 47%;
                margin: 0px 10px;
                padding: 22px 15px;
            }

            .Ship-Ser-form .ship-form {
                width: 47%;
            }

            .Ship-Ser-form .select-col-33 {
                width: 31%;
                float: left;
                margin-left: 11px;
            }

            .filter-col {
                padding: 0px;
            }

            .prod-det .desktop {
                display: none;
            }

            .prod-det .product-review-bot {
                padding: 0px;
            }

            .modal-body .filters {
                width: 50%;
                float: left;
            }

            .prod-det .mob-cat-btn {
                font-size: 20px;
                display: block !important;
                position: relative;
                top: -11px;
                left: 23px;
            }

            .prod-det .popup-btn {
                position: relative;
                left: 15px;
                font-size: 28px;
                display: block !important;
                padding: 0px !important;
                background: transparent !important;
                color: #ff061e !important;
                border: none !important;
            }

            .top-filter .sort {
                padding-top: 15px;
                justify-content: center;
            }

            .top-filter .filter-btn{
                padding-top: 15px;
                text-align: center;
            }

            .top-filter .user {
                padding: 0px;
                margin-top: 15px;
            }


            .top-filter .filter-btn a {
                padding: 5px 31px;
            }


            .account {
                display: none;
                width: 100%;
            }

            .orders .pop-btn .popup-btn {
                text-align: left;
            }

            .orders .pop-btn {
                margin-top: 15px;
            }

            .orders .popup-btn {
                font-size: 28px;
                display: block !important;
                padding: 0px !important;
                background: transparent !important;
                color: #ff061e !important;
                border: none !important;
            }

            .account-mob {
                display: block !important;
            }

            .orders .mob-cat-btn {
                font-size: 20px;
                display: block !important;
                position: relative;
                top: -39px;
                left: 34px;
            }

            .orders .inner-content {
                margin-top: 0px !important;
            }

            .orders .order-list {
                width: 100% !important;
                margin-left: 0px !important;
            }

            .filter-col {
                flex: none !important;
                max-width: 100% !important;
            }

            .sortBy {
                display: block;
            }

            .sort-by select {
                padding: 8px 45px 8px 5px;
            }

        }
</style>
