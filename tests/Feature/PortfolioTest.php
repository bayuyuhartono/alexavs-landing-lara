<?php

test('visitors can browse videos from the shared Drive collection', function () {
    $response = $this->get('/portfolio');

    $response->assertOk()
        ->assertViewIs('portfolio')
        ->assertSeeText('ADARO INDONESIA')
        ->assertSeeText('COMPRO KOPELINDO')
        ->assertSeeText('BYD GIIAS SURABAYA')
        ->assertSeeText('SARA FAJIRA - I MISS U')
        ->assertSeeText('ALEXA - BERBAKTI SERIES TS')
        ->assertSee('data-video-id="103KJ01Rr8HtsgfJuTdsPMtMCRNC9mOSc"', false)
        ->assertSee('data-video-id="1xA5tVOoDYqa4Zt0lZYVAPyz-itDzSOaz"', false)
        ->assertDontSee('href="https://drive.google.com', false)
        ->assertDontSeeText('Open on Google Drive')
        ->assertDontSee('src="https://drive.google.com/file/d/', false);
});

test('the landing page links to the portfolio and the correct partner accounts', function () {
    $response = $this->get('/');

    $response->assertOk()
        ->assertSee('href="'.route('portfolio').'"', false)
        ->assertSee('href="https://www.instagram.com/alexavisualbroadcast/"', false)
        ->assertSee('href="https://www.instagram.com/lyn.rent/"', false)
        ->assertSee('href="https://www.instagram.com/alxvsl.id/"', false)
        ->assertSee('href="https://wa.me/6281615592989"', false);
});
