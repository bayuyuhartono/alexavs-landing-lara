<?php

use Dom\HTMLDocument;

beforeEach(function () {
    config(['app.url' => 'https://production.example/']);
});

test('the sitemap lists only the canonical public pages as valid XML', function () {
    $response = $this->get('/sitemap.xml');

    $response->assertOk()
        ->assertHeader('Content-Type', 'application/xml; charset=UTF-8');

    $sitemap = simplexml_load_string($response->getContent());

    expect($sitemap)->not->toBeFalse();
    expect($sitemap->getNamespaces())->toBe(['' => 'http://www.sitemaps.org/schemas/sitemap/0.9']);
    expect(array_map(fn ($url): string => (string) $url->loc, iterator_to_array($sitemap->url, false)))
        ->toBe(['https://production.example/', 'https://production.example/portfolio']);
});

test('robots allows crawling and advertises the production sitemap', function () {
    $response = $this->get('/robots.txt');

    $response->assertOk()
        ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
        ->assertContent("User-agent: *\nDisallow:\n\nSitemap: https://production.example/sitemap.xml\n");

    expect(file_exists(public_path('robots.txt')))->toBeFalse();
});

test('public pages expose canonical metadata and valid structured data despite query parameters', function (string $path, string $canonical, string $title) {
    $response = $this->get($path.'?utm_source=google');

    $response->assertOk()
        ->assertSee('<title>'.$title.'</title>', false)
        ->assertSee('<link rel="canonical" href="'.$canonical.'">', false)
        ->assertSee('<meta property="og:url" content="'.$canonical.'">', false)
        ->assertSee('<meta name="robots" content="index, follow, max-image-preview:large">', false);

    $document = HTMLDocument::createFromString($response->getContent(), LIBXML_NOERROR);
    $metadata = $document->querySelectorAll('meta[name="description"]');
    $schema = json_decode($document->querySelector('script[type="application/ld+json"]')->textContent, true, flags: JSON_THROW_ON_ERROR);

    expect($metadata)->toHaveCount(1);
    expect($metadata[0]->getAttribute('content'))->not->toBeEmpty();
    expect($schema['@context'])->toBe('https://schema.org');
    expect($schema['@graph'][0]['name'])->toBe('Alexa Visual');
    expect($schema['@graph'][2]['url'])->toBe($canonical);
    expect($document->querySelectorAll('h1'))->toHaveCount(1);
})->with([
    'home' => ['/', 'https://production.example/', 'Alexa Visual — Film &amp; Video Production'],
    'portfolio' => ['/portfolio', 'https://production.example/portfolio', 'Video Production Portfolio — Alexa Visual'],
]);

test('unknown pages return a genuine not found response', function () {
    $this->get('/missing-page')->assertNotFound();
});
