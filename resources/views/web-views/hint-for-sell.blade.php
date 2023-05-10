<style>
    @font-face {
        font-family: 'BURBANKBIGCONDENSED-BOLD';
        src: url({{ asset('public/assets/front-end/fonts/BURBANKBIGCONDENSED-BOLD.ttf') }});

    }

    @font-face {
        font-family: 'BURBANKBIGCONDENSED-BLACK';
        src: url({{ asset('public/assets/front-end/fonts/BURBANKBIGCONDENSED-BLACK.ttf') }});

        .__card .card-body p img {
            border-radius: 10px !important;
        }
    }
</style>

@extends('layouts.front-end.app')

@section('title', \App\CPU\translate('hint of selling'))

@push('css_or_js')
    <meta property="og:image" content="{{ asset('storage/app/public/company') }}/{{ $web_config['web_logo']->value }}" />
    <meta property="og:title" content="Terms & conditions of {{ $web_config['name']->value }} " />
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:description" content="{!! substr($web_config['about']->value, 0, 100) !!}">

    <meta property="twitter:card" content="{{ asset('storage/app/public/company') }}/{{ $web_config['web_logo']->value }}" />
    <meta property="twitter:title" content="Terms & conditions of {{ $web_config['name']->value }}" />
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value, 0, 100) !!}">
@endpush

@section('content')
    <div class="container py-5 rtl" style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
        <h2 class="text-center mb-3 headerTitle" style="font-family: 'BURBANKBIGCONDENSED-BOLD'; font-size:36.23px;">
            {{ \App\CPU\translate('hint for selling') }}</h2>
        <div class="card __card">
            <div class="card-body">

                <ul>

                    <li>

                        <h2 style="font-family: 'BURBANKBIGCONDENSED-BLACK'; font-size:25px;">Don’t set the price too high</h2>
                        <p style="font-family: 'Poppins';">Even though you may have just bought a brand new uniform last month for $300, it hasn’t been
                            used,
                            and it’s never been out of the package, you will not get full price back. Probably, not even
                            close.
                            You have to think like a buyer. If you price it at $275, a buyer would rather pay the extra $25
                            and
                            get it from the manufacturer. Sports equipment is a lot like a car. It loses 50% of its value
                            once
                            it’s driven off the lot. </p>

                    </li>

                    <li>

                        <h2 style="font-family: 'BURBANKBIGCONDENSED-BLACK'; font-size:25px;">If it’s not selling, lower the price</h2>
                        <p style="font-family: 'Poppins';">Everyone is looking for a good deal. If your item hasn’t sold after a week or two, it may be that
                            the buyers don’t think it’s a good deal. Lower the price by 10%. You may have bought it for
                            $200, but it’s not selling for $150. $125. $100. $50 is better than nothing and it’s something
                            else out of your house.</p>

                    </li>
                    <li>

                        <h2 style="font-family: 'BURBANKBIGCONDENSED-BLACK'; font-size:25px;">Take good pictures</h2>
                        <p style="font-family: 'Poppins';">Make the pictures clear, clean, and without clutter around it. Highlight any stains, marks, or
                            other flaws. </p>

                    </li>

                    <li>
                        <h2 style="font-family: 'BURBANKBIGCONDENSED-BLACK'; font-size:25px;">
                            Ship promptly
                        </h2>
                        <p style="font-family: 'Poppins';"> You don’t want to be known as a bad or slow seller. The better you are at selling, the more
                            sales you’ll get.</p>
                    </li>

                    <li>
                        <h2 style="font-family: 'BURBANKBIGCONDENSED-BLACK'; font-size:25px;">
                            Respond to inquiries promptly
                        </h2>
                        <p style="font-family: 'Poppins';">You want to strike while the iron is hot. If you don’t respond right away, another seller will.
                        </p>

                    </li>
                    <li>
                        <h2 style="font-family: 'BURBANKBIGCONDENSED-BLACK'; font-size:25px;">
                            Be courteous
                        </h2>
                        <p style="font-family: 'Poppins';"> The customer is always right. Sort of. What’s more important? Making a sale or being right? If
                            someone is being rude, please report them. Don’t engage with disrespectful banter. Nobody wins
                            in a war of words.</p>
                    </li>
                    <li>
                        <h2 style="font-family: 'BURBANKBIGCONDENSED-BLACK'; font-size:25px;">
                         Do you have hints?
                        </h2 style="font-family: 'Poppins';">
                        <p>If you are a successful seller, please let us know some of your tricks and ideas for selling. We will be glad to post them and help our community. </p>
                    </li>
                </ul>


            </div>
        </div>
    </div>
@endsection
