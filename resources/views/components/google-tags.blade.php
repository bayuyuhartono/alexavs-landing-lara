@if (config('services.google.site_verification'))
    <meta name="google-site-verification" content="{{ config('services.google.site_verification') }}">
@endif

@if (config('services.google.analytics_id'))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ rawurlencode(config('services.google.analytics_id')) }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', {{ Illuminate\Support\Js::from(config('services.google.analytics_id')) }});
    </script>
@endif
