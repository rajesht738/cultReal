@if(is_plugin_active('newsletter'))
<div class="row footer-widget newsletter widget_newsletter d-flex align-items-center justify-content-center">
    <div class="col-lg-5 col-md-6" style="padding-left: 10%"><div class="header-title-2">
        <h4 class="widget-title">
            <span>{{ $config['name'] }}</span>
        </h4>
        @if (!empty($config['subname']))
            <h3 class="font-heading" style="color: white">{{ $config['subname'] }}</h3>
        @endif
    </div></div>
    <div class="col-lg-7 col-md-6" style="padding-right: 10%">
        <form class="form-subcriber newsletter-form mt-30" action="{{ route('public.newsletter.subscribe') }}" method="post">
            @csrf
            <div class="form-group d-flex">
                <input type="email" name="email" class="form-control bg-white font-small" placeholder="{{ __('Enter your email') }}">
                <button class="btn bg-dark text-white" type="submit">{{ __('Subscribe') }}</button>
            </div>
            @if (setting('enable_captcha') && is_plugin_active('captcha'))
                <div class="form-group">
                    {!! Captcha::display() !!}
                </div>
            @endif
        </form>
    </div>


</div>
@endif
{{-- @if(is_plugin_active('newsletter'))
<div class="footer-widget newsletter widget_newsletter">
    <div class="header-title-2">
        <h4 class="widget-title">
            <span>{{ $config['name'] }}</span>
        </h4>
        @if (!empty($config['subname']))
            <h3 class="font-heading">{{ $config['subname'] }}</h3>
        @endif
    </div>
    <form class="form-subcriber newsletter-form mt-30" action="{{ route('public.newsletter.subscribe') }}" method="post">
        @csrf
        <div class="form-group d-flex">
            <input type="email" name="email" class="form-control bg-white font-small" placeholder="{{ __('Enter your email') }}">
            <button class="btn bg-dark text-white" type="submit">{{ __('Subscribe') }}</button>
        </div>
        @if (setting('enable_captcha') && is_plugin_active('captcha'))
            <div class="form-group">
                {!! Captcha::display() !!}
            </div>
        @endif
    </form>
</div>
@endif --}}
