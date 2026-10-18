<!DOCTYPE html>
<html lang="en" class="scroll-smooth motion-reduce:scroll-auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#0f0f0f">
        <meta name="description" content="Watch the Alexa Visual portfolio. Explore company profiles, event films, music videos, short films, and series.">
        <title>Portfolio — Alexa Visual</title>
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="portfolio-page bg-[#0f0f0f] text-white antialiased" data-portfolio>
        <a href="#video-library" class="skip-link">Skip to videos</a>
        <header class="portfolio-header sticky top-0 z-30 flex items-center gap-5 border-b border-white/10 bg-[#0f0f0f]/95 px-5 backdrop-blur-md md:px-8">
            <a href="{{ route('home') }}" class="portfolio-brand relative shrink-0 overflow-hidden" aria-label="Alexa Visual home">
                <img src="{{ asset('images/alexa/alexa-logo.png') }}" alt="Alexa Visual" class="absolute max-w-none">
            </a>
            <span class="hidden border-l border-white/20 pl-5 text-xs tracking-[.18em] text-white/45 lg:block">PORTFOLIO</span>
            <form role="search" class="portfolio-search relative mx-auto flex w-full max-w-xl" data-search-form>
                <label for="video-search" class="sr-only">Search videos</label>
                <input id="video-search" type="search" placeholder="Search our work" autocomplete="off" class="min-w-0 flex-1 rounded-l-full border border-white/15 bg-[#121212] px-5 py-2.5 text-sm outline-none placeholder:text-white/40 focus:border-white/50" data-video-search>
                <button type="submit" aria-label="Search videos" class="flex w-14 shrink-0 items-center justify-center rounded-r-full border border-l-0 border-white/15 bg-white/5 hover:bg-white/10">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 5 5"/></svg>
                </button>
            </form>
        </header>

        <div class="portfolio-layout">
            <main id="video-library" class="min-w-0 px-5 pt-6 pb-28 md:px-8 md:pt-8">
                <div class="portfolio-banner relative isolate overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/alexa/studio.png') }}" alt="" class="absolute inset-0 -z-20 size-full object-cover object-center">
                    <div class="absolute inset-0 -z-10 bg-linear-to-r from-black/95 via-black/70 to-black/10"></div>
                    <div class="relative flex h-full flex-col justify-center px-7 md:px-10">
                        <p class="mb-3 flex items-center gap-2 text-[10px] font-semibold tracking-[.22em] text-white/65"><span class="size-1.5 rounded-full bg-red-500"></span> THE ALEXA VISUAL COLLECTION</p>
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-4 py-7">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('favicon.svg') }}" alt="" width="56" height="56" class="rounded-full border border-white/15">
                        <div>
                            <h1 class="text-xl font-semibold tracking-tight md:text-2xl">Alexa Visual <span class="ml-1 text-sm text-white/40" aria-label="Video portfolio">✦</span></h1>
                            <p class="mt-1 text-xs text-white/45">{{ count($videos) }} videos</p>
                        </div>
                    </div>
                </div>

                <div class="portfolio-filters flex items-center gap-2 overflow-x-auto border-t border-white/10 pt-5 pb-4" role="group" aria-label="Filter videos by category">
                    @foreach (['All', 'Featured', 'Company Profile', 'Event', 'Music Video', 'Short Film / Series'] as $category)
                        <button type="button" class="category-chip shrink-0 rounded-lg px-4 py-2 text-xs font-medium transition-colors" data-category="{{ $category }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $category }}</button>
                    @endforeach
                </div>
                <div class="flex items-center justify-between gap-3 pt-2 pb-5">
                    <h2 class="text-sm font-medium">Selected work <span class="ml-2 text-xs font-normal text-white/35" data-result-count aria-live="polite">{{ count($videos) }} videos</span></h2>
                    <label class="flex items-center gap-2 text-xs text-white/45">Sort by
                        <select data-video-sort class="rounded-md border border-white/10 bg-[#181818] px-2 py-1.5 text-white outline-none focus:border-white/50">
                            <option value="default">Collection order</option>
                            <option value="title">Title A–Z</option>
                        </select>
                    </label>
                </div>

                <div class="video-grid grid grid-cols-1 gap-x-5 gap-y-8 sm:grid-cols-2 xl:grid-cols-3" data-video-grid>
                    @foreach ($videos as $video)
                        <article class="video-card min-w-0" data-video-card data-category="{{ $video['category'] }}" data-title="{{ $video['title'] }}" data-order="{{ $loop->index }}">
                            <button type="button" data-play-video data-video-id="{{ $video['id'] }}" data-video-title="{{ $video['title'] }}" data-video-category="{{ $video['category'] }}" class="group block w-full text-left" aria-label="Watch {{ $video['title'] }}">
                                <span class="video-thumbnail relative block aspect-video overflow-hidden rounded-xl bg-[#202020]">
                                    <img src="{{ asset('images/portfolio/'.$video['id'].'.jpg') }}" alt="" width="640" height="360" loading="{{ $loop->index < 3 ? 'eager' : 'lazy' }}" class="size-full object-cover transition-transform duration-300 motion-safe:group-hover:scale-105">
                                    <span class="absolute inset-0 flex items-center justify-center bg-black/10 transition-colors group-hover:bg-black/30">
                                        <span class="video-play flex h-10 w-14 items-center justify-center rounded-xl bg-black/70 text-white transition-colors group-hover:bg-red-600" aria-hidden="true"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="m8 4 13 8-13 8Z"/></svg></span>
                                    </span>
                                    <span class="absolute right-2 bottom-2 rounded bg-black/80 px-2 py-1 text-[10px] font-medium">{{ $video['category'] }}</span>
                                </span>
                                <span class="mt-3 flex items-start gap-3">
                                    <span class="mt-0.5 flex size-8 shrink-0 items-center justify-center rounded-full border border-white/10 bg-white/5 text-[9px] font-semibold tracking-tight" aria-hidden="true">AV</span>
                                    <span class="min-w-0">
                                        <span class="line-clamp-2 block text-sm font-semibold leading-snug text-white/90 group-hover:text-white">{{ $video['title'] }}</span>
                                        <span class="mt-1.5 block text-xs text-white/40">Alexa Visual <span aria-hidden="true">·</span> {{ $video['category'] }}</span>
                                    </span>
                                </span>
                            </button>
                        </article>
                    @endforeach
                </div>
                <div class="py-20 text-center" data-empty-state hidden>
                    <p class="text-lg font-medium">No videos found</p>
                    <p class="mt-2 text-sm text-white/45">Try another title or explore a different category.</p>
                    <button type="button" data-reset-filters class="mt-5 rounded-full bg-white px-5 py-2.5 text-sm font-medium text-black hover:bg-white/80">Show all videos</button>
                </div>
                <noscript><p class="mt-8 text-sm text-white/60">Enable JavaScript to search and play videos here.</p></noscript>
                <p class="mt-12 border-t border-white/10 pt-6 text-[10px] tracking-[.18em] text-white/25">ALEXA VISUAL <span class="mx-2" aria-hidden="true">/</span> STORIES IN MOTION</p>
            </main>
        </div>

        <dialog class="video-dialog rounded-2xl border border-white/10 bg-[#181818] p-0 text-white" data-video-dialog aria-labelledby="player-title">
            <div class="flex items-center justify-between gap-4 border-b border-white/10 px-5 py-4">
                <p class="text-[10px] font-medium tracking-[.18em] text-white/50">ALEXA VISUAL <span class="mx-2" aria-hidden="true">/</span> NOW PLAYING</p>
                <button type="button" data-close-video class="flex size-9 shrink-0 items-center justify-center rounded-full bg-white/5 text-xl hover:bg-white/15" aria-label="Close video">×</button>
            </div>
            <div class="aspect-video bg-black">
                <iframe data-video-player title="Portfolio video player" class="size-full border-0" allow="autoplay; fullscreen; encrypted-media; picture-in-picture" allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <div class="px-5 py-5 md:px-7">
                <p class="mb-2 text-xs text-white/45" data-player-category></p>
                <h2 id="player-title" class="text-lg font-semibold md:text-xl"></h2>
                <div class="mt-5 flex flex-wrap items-center justify-between gap-4 border-t border-white/10 pt-4">
                    <p class="text-sm text-white/50">Alexa Visual</p>
                </div>
            </div>
        </dialog>
        <x-whatsapp />
    </body>
</html>
