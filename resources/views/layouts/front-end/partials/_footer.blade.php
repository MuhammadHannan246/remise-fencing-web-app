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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        /* footer CSS */
.footer {
    background: #000;
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

.comp1 {
    margin-left: 50px;
}

.companyName {
    color: #fff;
    font-size: 17px;
    margin-left: 20px;
    text-align: center;
    font-weight: 600;
}
.socialIcons{
    float: right;
}
.menuList a{
    line-height: 2;
    font-size: 14px;
    list-style: none;
    color: #FFF;
    text-decoration: none;

}
.menuList a:hover{
    color: #FF061E;
}
@media screen and (max-width: 825px) {
    .searchMarketing {
        text-align: center;
    }

    .socialIcons {
        display: flex;
        justify-content: center;
        margin: 10px;
    }

    .textFoot {
        font-size: 8px;
    }

    .companyName {
        margin-left: 0;
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
    }

    .companyName {
        margin-left: 10px;
    }

    .searchMarketing {
        text-align: center;
    }

    .socialIcons {
        display: flex;
        justify-content: center;
        margin: 10px;
    }

    .textFoot {
        font-size: 12px;
    }
}


    </style>
</head>


<body>

    <br><br><br><br>

    <!-- FOOTER -->
    <div class="footer">
        <div class="container">

            <div class="row">
                <div class="col col-lg-6 col-md-4 col-sm-4 ">
                    <h2 class="headingFoot">Join Our News Letter</h2>
                    <p class="textFoot">Norem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8 ">
                    <form action="{{ route('subscription') }}" method="post"
                        style="width: 100%;
    border: 1px solid #97A3AE;
    border-radius: 10px;
    display: flex;
    flex-direction: row; ; font-family:poppins;
    padding:2px;
    height:65px"
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
                            type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
            <hr><br><br>
            <div class="row">
                <div class="col col-lg-3 col-md-12 col-sm-12 logFooter">
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
                <!-- <div class="col-1">

            </div> -->
                <br><br>

                <div class="col col-lg-9 col-md-12 col-sm-12 footRight">
                    <div class="row">

                        <div class="col col-lg-2 col-md-12 col-sm-12 col-12">
                            <div class="company comp4">
                                <h4 class="companyName">Company</h4>
                                <ul class="menuList">
                                    <li class="menuItem">About Us</li>
                                    <li class="menuItem">Careers</li>
                                    <li class="menuItem">Contact Us</li>
                                    <li class="menuItem">Help Center</li>
                                    <li class="menuItem">Support</li>
                                </ul>

                            </div>
                        </div>


                        <div class="col col-lg-2 col-md-12 col-sm-12 col-12">
                            <div class="company comp3">
                                <h4 class="companyName">Socials</h4>
                                <ul class="menuList">
                                    <a href="https://www.twitter.com/">
                                        <li class="menuItem">Twitter</li>
                                    </a>
                                    <a href="https://www.facebook.com/">
                                        <li class="menuItem">Facebook</li>
                                    </a>
                                    <a href="https://www.instagram.com/">
                                        <li class="menuItem">Instagram</li>
                                    </a>
                                    <a href="https://www.linkedin.com/">
                                        <li class="menuItem">LinkedIn</li>
                                    </a>
                                    <a href="https://www.pinterest.com/">
                                        <li class="menuItem">Pinterest</li>
                                    </a>
                                </ul>

                            </div>

                        </div>


                        <div class="col col-lg-2 col-md-12 col-sm-12 col-12">
                            <div class="company comp2">
                                <h4 class="companyName">Legal</h4>
                                <ul class="menuList">
                                    <a href="{{ \App\CPU\translate('terms_&_conditions') }}">
                                    <li class="menuItem">Terms & Conditions</li>
                                            </a>
                                    <a class="widget-list-link" href="{{route('privacy-policy')}}">
                                        {{\App\CPU\translate('privacy_policy')}}
                                    
                                </a>
                                </ul>

                            </div>
                        </div>


                        <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="company comp1">
                                <h4 class="companyName">Offices</h4>
                                <ul class="menuList">
                                    <li class="menuItem">Branch Office:
                                        {{ \App\CPU\Helpers::get_business_settings('shop_address') }}</li>
                                    <li class="menuItem">Head Office: 999 Tyra Extension,
                                        Haagmouth, Georgia, USA, 42553</li>

                                </ul>

                            </div>
                        </div>

                    </div>







                </div>


            </div>
            <br><br><br>

            <hr>

            <div class="row">
                <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                    <p class="searchMarketing">© 2023. All Rights Reserved By Search Marketing Services</p>
                </div>
                <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="socialIcons">





                        <a href="https://www.facebook.com/">
                            <i class="fab fa-facebook-f iconSocial"></i>
                        </a>
                        <a href="https://www.instagram.com/">
                            <i class="fab fa-instagram iconSocial"></i>
                        </a>
                        <a href="https://www.twitter.com/">
                            <i class="fab fa-twitter iconSocial"></i>
                        </a>

                        <a href="https://www.linkedin.com/">
                            <i class="fab fa-linkedin-in iconSocial"></i>
                        </a>
                        <a href="https://www.pinterest.com/">
                            <i class="fab fa-pinterest iconSocial"></i>
                        </a>
                    </div>



                </div>
            </div>
        </div>
    </div>



</body>

</html>
