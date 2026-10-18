<!DOCTYPE html>
<html lang="en" class="scroll-smooth motion-reduce:scroll-auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#000000">
        <meta name="description" content="Alexa Visual — company profiles, film and storytelling, video production, event documentary, and live streaming.">
        <title>Alexa Visual — Film &amp; Production</title>
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
        <link rel="preload" href="{{ asset('fonts/atkinson-mono-regular.ttf') }}" as="font" type="font/ttf" crossorigin>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-black font-mono text-white antialiased">
        <a href="#services" class="skip-link">Skip to services</a>
        <main id="home" class="page-shell mx-auto overflow-clip">
            <section class="hero relative overflow-hidden" aria-label="Alexa Visual">
                <img src="{{ asset('images/alexa/hero.gif') }}" alt="Mining truck on location at sunset" width="1003" height="568" fetchpriority="high" class="absolute inset-0 size-full object-cover">
                <h1 class="hero-logo absolute overflow-hidden">
                    <span class="sr-only">Alexa Visual</span>
                    <img src="{{ asset('images/alexa/alexa-logo.png') }}" alt="" class="absolute max-w-none" width="414" height="535">
                </h1>
                <a href="#services" aria-label="Explore our services" class="scroll-cue absolute bottom-0 left-1/2 flex -translate-x-1/2 items-end justify-center"><span class="block bg-[#d9d9d9]"></span></a>
            </section>

            <section id="services" class="services relative isolate overflow-hidden" aria-labelledby="services-title">
                <img src="{{ asset('images/alexa/services-background.png') }}" alt="" width="1028" height="557" class="services-background absolute inset-y-0 left-0 -z-10 h-full max-w-none object-cover" loading="lazy">
                <div class="services-content relative flex flex-col">
                    <h2 id="services-title" class="text-center font-normal">OUR SERVICE</h2>
                    <ul class="service-list list-disc">
                        <li>Company Profile</li>
                        <li>Film &amp; Storytelling</li>
                        <li>Video Safety K3</li>
                        <li>Event Documentary</li>
                        <li>Tvc &amp; Video Ads</li>
                        <li>Broadcast System/Live Streaming</li>
                        <li>Music Video</li>
                        <li>Podcast</li>
                    </ul>
                    <a href="#portfolio" class="portfolio-link relative self-center text-center font-bold tracking-[1px] text-[#fef3f3] transition-[filter] hover:brightness-125">
                        <img src="{{ asset('images/alexa/portfolio-button.svg') }}" alt="" width="375" height="86.2832" class="portfolio-decoration absolute max-w-none" aria-hidden="true">
                        <span class="relative">PORTOFOLIO</span>
                    </a>
                </div>
            </section>

            <section id="clients" class="clients relative isolate overflow-hidden" aria-labelledby="clients-title">
                <div class="clients-photo absolute inset-0 -z-10 overflow-hidden">
                    <img src="{{ asset('images/alexa/clients-background.png') }}" alt="Documenting an Adaro industrial site" class="absolute max-w-none" loading="lazy">
                </div>
                <h2 id="clients-title" class="clients-title absolute font-bold tracking-[1px]">OUR<br>CLIENT</h2>
                <img src="{{ asset('images/alexa/client-logos.png') }}" alt="Our clients include FIM, Grab, PUPR, Jasa Raharja, Proteamp, PON, DJP, Honda, ESE, Avian, KAI, Pelindo, Adaro, Telkomsel, and Güntner" class="client-logos absolute max-w-none object-cover" loading="lazy">
            </section>

            <section id="partners" class="partners relative isolate overflow-hidden" aria-labelledby="partners-title">
                <div class="partners-photo absolute inset-0 -z-10 overflow-hidden">
                    <img src="{{ asset('images/alexa/partners-background.png') }}" alt="Alexa production crew filming on location" class="absolute max-w-none" loading="lazy">
                </div>
                <h2 id="partners-title" class="partners-title font-extrabold">PART OF<br>US</h2>
                <div class="partner-grid grid grid-cols-3">
                    <div class="partner-card relative overflow-hidden shadow-md"><img src="{{ asset('images/alexa/alexa-virtual-band.png') }}" alt="AVB — Alexa Visual Broadcast" class="absolute max-w-none" loading="lazy"></div>
                    <div class="partner-card partner-rental relative overflow-hidden"><img src="{{ asset('images/alexa/lyn-rent.png') }}" alt="Lyn Rent — production equipment rental" class="absolute max-w-none" loading="lazy"></div>
                    <div class="partner-card relative overflow-hidden"><img src="{{ asset('images/alexa/ples-creative.png') }}" alt="ALX VSL.ID — creative production" class="absolute max-w-none" loading="lazy"></div>
                </div>
            </section>

            <section id="portfolio" class="studio relative overflow-hidden" aria-label="Portfolio — behind the scenes at Alexa Visual" tabindex="-1">
                <img src="{{ asset('images/alexa/studio.png') }}" alt="Camera operator filming in a purple-lit production studio" class="absolute max-w-none" loading="lazy">
            </section>

            <footer id="contact" class="contact-footer bg-[#252525]">
                <div class="contact-grid grid grid-cols-3">
                    <div class="flex flex-col items-start">
                        <h2>CONTACT US</h2>
                        <div class="contact-details flex flex-col gap-1.5">
                            <a href="#" class="hover:underline">0816 1559 2989</a>
                            <a href="#" class="hover:underline">halo.alexavisual@gmail.com</a>
                        </div>
                    </div>
                    <div><h2>OUR LOCATION</h2></div>
                    <div><h2>FOLLOW US</h2></div>
                </div>
                <nav class="footer-links flex flex-wrap items-center justify-center" aria-label="Ples Creative resources">
                    @foreach (['Directory', 'About us', 'Artist Resources', 'Newsroom', 'Topics', 'Jobs', 'Developers', 'Help', 'Legal', 'Privacy', 'Cookie Policy', 'Cookie Manager', 'Imprint', 'Charts', 'Transparency Reports'] as $label)
                        <a href="#" class="underline underline-offset-2 hover:text-white/70">{{ $label }}</a>
                        @unless ($loop->last)<span aria-hidden="true">·</span>@endunless
                    @endforeach
                </nav>
            </footer>
        </main>
    </body>
</html>
