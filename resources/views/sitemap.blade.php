{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach (['home', 'portfolio'] as $page)
        <url>
            <loc>{{ $baseUrl.route($page, [], false) }}</loc>
        </url>
    @endforeach
</urlset>
