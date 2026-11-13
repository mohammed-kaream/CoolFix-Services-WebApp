@extends('perblad.layout')
@section('title', __('Pricing') . ' | COOLFIX')
@section('content')
    <section class="section-top">
        <div class="container">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                    <h1>{{ __('Pricing') }}</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                        <li> {{ __('/ Pricing') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    </div><!-- END TOP HEADER CLASS -->

    <div class="pricing-area section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h4>{{ __('Clear, Upfront Pricing') }}</h4>
                <h1>{{ __('Choose the Service Package You Need.') }}</h1>
            </div>
            <div class="row justify-content-center">
                @foreach ($pricings as $pricing)
                    <div class="col-lg-4 col-md-6 mb-4 home-stagger-item">
                        <div class="single-pricing-card">
                            <h3>{{ __($pricing->name) }}</h3>
                            <p>{{ __($pricing->description) }}</p>
                            <h1>₪{{ $pricing->price }} <sub>{{ __($pricing->billing_period) }}</sub></h1>

                            <ul class="list-unstyled ps-0 list">
                                @foreach ($pricing->features as $feature)
                                    <li class="d-flex align-items-center">
                                        <i class="ti-check"></i>
                                        {{ __($feature->feature_name) }}
                                    </li>
                                @endforeach
                            </ul>

                            <a href="{{ route('about') }}" class="cta">
                                <span>{{ __($pricing->button_text) }}</span>
                                <svg width="13px" height="10px" viewBox="0 0 13 10">
                                    <path d="M1,5 L11,5"></path>
                                    <polyline points="8 1 12 5 8 9"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" style="margin-top:20px;">
                    <p style="font-size:15px;">{!! __('Prices shown are starting points for the most common jobs. Compressor replacement, commercial units, and unusual cases are quoted after a free on-site inspection. Call <strong>059 892 4040</strong> for an exact quote.') !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
