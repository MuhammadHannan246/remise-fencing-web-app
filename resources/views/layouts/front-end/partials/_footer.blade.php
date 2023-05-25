<style>
    .social-media :hover {
        color: {{ $web_config['secondary_color'] }} !important;
    }

    .start_address_under_line {
        {{ Session::get('direction') === 'rtl' ? 'width: 344px;' : 'width: 331px;' }}
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remise Fencing</title>

    <link rel="stylesheet" href="style.css">




    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

    <style>
        /* footer CSS */
        .footer {
            /* background: #000; */
            background: #151515;

            padding-top: 100px;
        }

        .headingFoot {
            color: #fff;
        }

        .textFoot {
            color: #FFF;
            line-height: 0;
        }


        .footLogo {
            width: 180px;
        }

        .footText2 {
            color: #fff;
            font-size: 13px;
            font-weight: 300;
            text-align: justify;
        }

        .footRight {
            display: flex;
            justify-content: center;

        }

        .footMenu {
            margin-top: 32px !important;
        }

        .company {
            justify-content: center;
            align-items: center;
            /* margin: 24px 0px 24px 24px;
    margin-right: 0px; */
        }


        .comp3 {
            margin-left: 20px;
        }

        .comp2 {
            margin-left: 30px;
        }

        /* .comp1 {
    margin-left: 50px;
} */

        .companyName {
            color: #fff;
            font-size: 17px;
            margin-left: 40px;
            /* text-align: center; */
            font-weight: 600;
        }

        .socialIcons {
            float: right;
        }

        .iconSocial {
            color: #FFF;
            float: right;
            margin: 0 0 0 35px !important;
            font-size: 20px;
        }

        .menuList a {
            line-height: 2;
            font-size: 12px;
            list-style: none;
            color: #FFF;
            text-decoration: none;

        }

        .searchMarketing {
            color: #fff;
            font-size: 16px;
        }

        .menuList {
            line-height: 2;
            font-size: 12px;
            list-style: none;
            color: #FFF;
            /* justify-content: center; */
            padding-left: 40px;
        }

        .menuList .menuItem:hover {
            cursor: pointer;
            color: #FF061E;
        }

        .menuList a:hover {
            color: #FF061E;
        }

        .mobileDivide {
            display: none;
        }

        @media screen and (max-width: 825px) {
            .searchMarketing {
                text-align: center;
            }

            .mobileDivide {
                display: block;
            }

            .socialIcons {
                display: flex;
                justify-content: center;
                margin: 10px;
            }

            .textFoot {
                font-size: 8px;
            }

            .comp4 {
                margin-left: 25px;

            }

            .socialIcons {
                float: none;
            }

            .comp2,
            .comp3,
            .comp4 {
                display: grid;
                justify-content: left;
            }

            .comp1 {
                display: grid;
                justify-items: left;
            }

            .logFooter {
                display: grid;

                justify-items: center;
            }

            .comp1 {
                margin-left: 20px;
            }
        }

        @media screen and (max-width:480px) {
            .comp3 {
                margin-left: 0px;
            }

            .comp2 {
                margin-left: 0px;
            }

            .comp1 {
                margin-left: 10px;
                justify-items: center;
            }

            .companyName {
                margin-left: 30px;
                text-align: center;
            }

            .menuItemTerm {
                text-align: center;
            }

            .searchMarketing {
                text-align: center;
            }

            .comp2,
            .comp3,
            .comp4 {
                justify-content: center;
            }

            .socialIcons {
                display: flex;
                justify-content: center;
                margin: 10px;
            }

            .textFoot {
                font-size: 12px;
            }

            .menuOffice {
                /* margin-left: 25px; */
                text-align: center;
            }

        }
    </style>
</head>


<body>

    <br><br><br><br>

    <!-- FOOTER -->
    <div class="footer">
        <div class="container">

            <div class="row ml-0">
                <div class="col col-lg-6 col-md-4 col-sm-4 ">
                    <h2 class="headingFoot">{{ App\CPU\translate('Join Our Newsletter') }}</h2>
                    <p class="textFoot">Norem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8 ">

                    <form action="{{ route('subscription') }}" method="post"
                        style="width: 100%;border: 1px solid #97A3AE;border-radius: 10px;display: flex;flex-direction: row; ; font-family:poppins;padding:2px;height:65px"
                        class="example" action="action_page.php">
                        @csrf
                        <input
                            style="padding: 29px 10px !important;
        font-size: 17px;
        font-family:poppins;
        border: none !important;
        border-radius: 20px;
        float: left;
        width: 80%;
        background: transparent;
        color: #fff;
    font-weight: 200;
        "
                            type="email" name="subscription_email" class="form-control subscribe-border"
                            placeholder="{{ \App\CPU\translate('Your Email Address') }}" required
                            style="padding: 20px;text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">

                        <button
                            style="  float: left;
        width: 40%;
        font-family:poppins;
        padding: 12px 20px;
        background: #FF061E;
        color: white;
        font-size: 17px;
        border: 1px solid #FF061E;
        border-radius: 10px;
        margin: 2px;
        cursor: pointer;
        font-family: 'poppins';"
                            type="submit">{{ App\CPU\translate('Subscribe') }}</button>
                    </form>
                </div>
            </div>
            <hr><br><br>
            <div class="row  mr-0">
                <div class="col-lg-3 col-md-12 col-sm-12 pr-0 logFooter">
                    <img class="footLogo"
                        src="{{ asset('storage/app/public/company/') }}/{{ $web_config['footer_logo']->value }}"
                        alt="">
                    <br><br>
                    <p class="footText2">Torem ipsum dolor sit amet, consectetur ddda adipiscing elit. Etiam eu turpis
                        molestie, dictum est a,
                        mattis tellus. Sed dignissim, metus nec s fringilla accumsan, risus sem sollicitudin lacus, ut
                        interdum tellus elit.
                    </p>

                </div>

                {{-- <hr class="mobileDivide"> --}}

                <!-- <div class="col-1">

            </div> -->
                <br><br>

                <div class="col col-lg-9 col-md-12 col-sm-12 footRight">
                    <div class="row mr-0">

                        <div class="col col-lg-2 col-md-6 col-sm-12 col-12">
                            <div class="company comp4">
                                <h4 class="companyName">{{ App\CPU\translate('Company') }}</h4>
                                <ul class="menuList">
                                    <li class="menuItem"><a href="{{ route('home') }}">{{ App\CPU\translate('Home') }}</a> </li>
                                    <li class="menuItem"><a href="{{ route('about-us') }}">{{ App\CPU\translate('About Us') }}</a> </li>
                                    <li class="menuItem">
                                        <a href="{{route('contacts')}}">
                                            {{ App\CPU\translate('Contact Us') }} </a></li>
                                    <li class="menuItem"><a href="{{ route('helpTopic') }}">{{ App\CPU\translate('FAQ') }}</a> </li>

                                </ul>

                            </div>
                        </div>

                        <hr class="mobileDivide">

                        <div class="col col-lg-2 col-md-6 col-sm-12 col-12">
                            <div class="company comp3">
                                <h4 class="companyName">{{ App\CPU\translate('Socials') }}</h4>
                                <ul class="menuList">

                                    <li class="menuItem"><a href="https://www.twitter.com/">Twitter</a></li>


                                    <li class="menuItem"><a href="https://www.facebook.com/">Facebook</a></li>


                                    <li class="menuItem"><a href="https://www.instagram.com/">Instagram</a></li>


                                    <li class="menuItem"><a href="https://www.linkedin.com/">LinkedIn</a></li>


                                    <li class="menuItem"><a href="https://www.pinterest.com/">Pinterest</a></li>

                                </ul>

                            </div>

                        </div>

                        <hr class="mobileDivide">

                        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="company comp2">
                                <h4 class="companyName">{{ App\CPU\translate('Legal') }}</h4>
                                <ul class="menuList">
                                    <a href="{{ route('terms') }}" class="widget-list-link menuItemTerm">
                                     Terms & Conditions

                                    </a>
                                    <a class="widget-list-link menuItemTerm" href="{{ route('privacy-policy') }}">
                                        {{ \App\CPU\translate('privacy_policy') }}

                                    </a>

                                    <a href="{{ route('refund-policy') }}" class="widget-list-link menuItemTerm">
                                       {{ \App\CPU\translate('refund_policy') }}
                                    </a>
                                    <a href="{{ route('return-policy') }}" class="widget-list-link menuItemTerm">
                                        {{ \App\CPU\translate('return_policy') }}
                                    </a>
                                    <a href="{{ route('cancellation-policy') }}" class="widget-list-link menuItemTerm">
                                       {{ \App\CPU\translate('cancellation_policy') }}
                                    </a>
                                </ul>

                            </div>
                        </div>
                        <hr class="mobileDivide">


                        <div class="col col-lg-5 col-md-6 col-sm-12 col-12">
                            <div class="company comp1">
                                <h4 class="companyName">{{ App\CPU\translate('Offices') }}</h4>
                                <ul class="menuList menuOffice">
                                    <li class="menuItem officeBranch">Branch Office:
                                        {{ \App\CPU\Helpers::get_business_settings('shop_address') }}</li>
                                    <li class="menuItem">Head Office: 999 Tyra Extension,
                                        Haagmouth, Georgia, USA, 42553</li>

                                </ul>

                                <h4 class="companyName">{{ App\CPU\translate('Support') }}</h4>
                                <ul class="menuList menuOffice">
                                    <li class="menuItem"><a href="{{ route('hint-for-sell') }}">{{ App\CPU\translate('Hint For Selling') }}</a> </li>

                                </ul>
                            </div>
                        </div>

                    </div>







                </div>


            </div>
            <br><br><br>

            <hr>

            <div class="row ml-0">
                <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                    <p class="searchMarketing">© 2023. {{ App\CPU\translate('All Rights Reserved By') }} {{ config('app.name') }}</p>
                </div>
                <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="socialIcons">





                        <a href="https://www.facebook.com/">
                            {{-- <i class="fab fa-facebook-f iconSocial"></i> --}}
                            {{-- <i class="fa-brands fa-facebook-f iconSocial"></i> --}}
                            <img src="{{ asset('public/assets/Images/fb.png') }}" alt="" class="iconSocial">
                        </a>
                        <a href="https://www.instagram.com/">
                            {{-- <i class="fab fa-instagram iconSocial"></i> --}}
                            <img src="{{ asset('public/assets/Images/insta.png') }}" alt="" class="iconSocial">

                        </a>
                        <a href="https://www.twitter.com/">
                            {{-- <i class="fab fa-twitter iconSocial"></i> --}}
                            <img src="{{ asset('public/assets/Images/t.png') }}" alt="" class="iconSocial">

                        </a>

                        <a href="https://www.linkedin.com/">
                            {{-- <i class="fab fa-linkedin-in iconSocial"></i> --}}
                            <img src="{{ asset('public/assets/Images/link.png') }}" alt=""
                                class="iconSocial">

                        </a>
                        <a href="https://www.pinterest.com/">
                            {{-- <i class="fab fa-pinterest iconSocial"></i> --}}
                            <img src="{{ asset('public/assets/Images/p.png') }}" alt="" class="iconSocial">

                        </a>
                    </div>



                </div>
            </div>
        </div>
    </div>



</body>

</html>
