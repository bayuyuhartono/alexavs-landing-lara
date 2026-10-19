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
                    <a href="{{ route('portfolio') }}" class="portfolio-link relative self-center text-center font-bold tracking-[1px] text-[#fef3f3] transition-[filter] hover:brightness-125">
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
                    <a href="https://www.instagram.com/alexavisualbroadcast/" target="_blank" rel="noopener noreferrer" aria-label="Alexa Visual Broadcast on Instagram (opens in a new tab)" class="partner-card relative overflow-hidden shadow-md transition-[filter] hover:brightness-125"><img src="{{ asset('images/alexa/alexa-virtual-band.png') }}" alt="AVB — Alexa Visual Broadcast" class="absolute max-w-none" loading="lazy"></a>
                    <a href="https://www.instagram.com/lyn.rent/" target="_blank" rel="noopener noreferrer" aria-label="Lyn Rent on Instagram (opens in a new tab)" class="partner-card partner-rental relative overflow-hidden transition-[filter] hover:brightness-125"><img src="{{ asset('images/alexa/lyn-rent.png') }}" alt="Lyn Rent — production equipment rental" class="absolute max-w-none" loading="lazy"></a>
                    <a href="https://www.instagram.com/alxvsl.id/" target="_blank" rel="noopener noreferrer" aria-label="ALXVSL.ID on Instagram (opens in a new tab)" class="partner-card relative overflow-hidden transition-[filter] hover:brightness-125"><img src="{{ asset('images/alexa/ples-creative.png') }}" alt="ALX VSL.ID — creative production" class="absolute max-w-none" loading="lazy"></a>
                </div>
            </section>

            <footer id="contact" class="contact-footer relative isolate overflow-hidden" aria-labelledby="contact-title">
                <img src="{{ asset('images/alexa/studio.png') }}" alt="" class="absolute inset-0 -z-10 size-full object-cover" loading="lazy">
                <h2 id="contact-title" class="contact-title absolute font-bold">CONTACT<br>US</h2>
                <div class="contact-actions absolute flex flex-col">
                    <a href="https://wa.me/6281615592989" target="_blank" rel="noopener noreferrer" class="contact-action contact-whatsapp rounded-full text-center font-bold transition-[filter] hover:brightness-110" aria-label="Chat with Alexa Visual on WhatsApp (opens in a new tab)">Whatsapp</a>
                    <a href="https://www.instagram.com/alexavisual?srtk=MWJkY3kwMXJzaWV3bQ==" target="_blank" rel="noopener noreferrer" class="contact-action contact-instagram rounded-full text-center font-bold transition-[filter] hover:brightness-110" aria-label="Alexa Visual on Instagram (opens in a new tab)">Instagram</a>
                </div>
            </footer>
        </main>
        <x-whatsapp />
    </body>
</html>
