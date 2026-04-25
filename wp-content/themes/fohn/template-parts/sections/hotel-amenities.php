<?php
/**
 * Section: Hotel Amenities
 */
?>

<section class="relative py-24 overflow-hidden bg-white">
    <!-- Decorative Florals -->
    <div class="absolute left-[-100px] top-1/2 -translate-y-1/2 w-[400px] opacity-20 pointer-events-none select-none">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
    </div>
    <div class="absolute right-[-100px] top-1/2 -translate-y-1/2 w-[400px] opacity-20 pointer-events-none select-none scale-x-[-1]">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
    </div>

    <div class="container relative z-10 mx-auto px-6 max-w-[1040px]">
        <!-- Title & description -->
        <div class="text-center mb-15">
            <h2 class="text-brand-blue font-serif text-5xl tracking-[0.2em] mb-6 uppercase">Hotels</h2>
            <div class="w-24 h-px bg-brand-orange mx-auto mb-10"></div>
            <p class="text-brand-black-700 font-sans text-lg leading-relaxed max-w-[850px] mx-auto">
                Nestled in the heart of Hanoi, just a five-minute walk from West Lake, the hotel seamlessly blends contemporary design with the city’s rich cultural heritage, offering an immersive experience where art, architecture, and storytelling come to life. Designed as a living gallery, the lobby, lounges, restaurants, corridors, and guest rooms are adorned with curated artworks and décor inspired by motifs such as lotus flowers, cranes, and the mountains and forests of Vietnam.
            </p>
        </div>

        <!-- Amenities Bar -->
        <div class="bg-brand-blue py-4 mb-15">
            <h3 class="text-white font-serif text-xl tracking-[0.3em] text-center uppercase">Amenities</h3>
        </div>

        <!-- Amenities Grid -->
        <div class="grid grid-cols-2 md:grid-cols-6 gap-x-8 gap-y-12">
            <!-- Item 1 -->
            <div class="flex flex-col items-center text-center group">
                <div class="mb-5 text-brand-blue transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8h1a4 4 0 1 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/><line x1="6" y1="2" x2="6" y2="4"/><line x1="10" y1="2" x2="10" y2="4"/><line x1="14" y1="2" x2="14" y2="4"/></svg>
                </div>
                <span class="text-brand-black-700 font-sans text-sm font-medium leading-tight">Espresso coffee machine</span>
            </div>

            <!-- Item 2 -->
            <div class="flex flex-col items-center text-center group">
                <div class="mb-5 text-brand-blue transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 2h14a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2Z"/><line x1="3" y1="10" x2="21" y2="10"/><line x1="7" y1="6" x2="7" y2="6.01"/><line x1="7" y1="14" x2="7" y2="14.01"/></svg>
                </div>
                <span class="text-brand-black-700 font-sans text-sm font-medium leading-tight">Minibar cabinet</span>
            </div>

            <!-- Item 3 -->
            <div class="flex flex-col items-center text-center group">
                <div class="mb-5 text-brand-blue transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23Z"/><path d="m9 10 3 3 3-3"/></svg>
                </div>
                <span class="text-brand-black-700 font-sans text-sm font-medium leading-tight">Plush bathrobes, slippers</span>
            </div>

            <!-- Item 4 -->
            <div class="flex flex-col items-center text-center group">
                <div class="mb-5 text-brand-blue transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><path d="M6 8v9"/></svg>
                </div>
                <span class="text-brand-black-700 font-sans text-sm font-medium leading-tight">Premium bedding</span>
            </div>

            <!-- Item 5 -->
            <div class="flex flex-col items-center text-center group">
                <div class="mb-5 text-brand-blue transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="15" x="2" y="7" rx="2" ry="2"/><polyline points="17 2 12 7 7 2"/></svg>
                </div>
                <span class="text-brand-black-700 font-sans text-sm font-medium leading-tight">Smart TV with streaming</span>
            </div>

            <!-- Item 6 -->
            <div class="flex flex-col items-center text-center group">
                <div class="mb-5 text-brand-blue transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="M9 4v16"/><path d="M15 4v16"/><path d="M4 10h16"/><path d="M4 15h16"/></svg>
                </div>
                <span class="text-brand-black-700 font-sans text-sm font-medium leading-tight">Blackout drapes</span>
            </div>

            <!-- Item 7 -->
            <div class="flex flex-col items-center text-center group">
                <div class="mb-5 text-brand-blue transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m4 12 6.5-6.5C11.3 4.7 12 4 13.5 4s2.5.7 3.3 1.5c1 1 1.7 1.5 2.7 1.5 1.5 0 2.5-1 4.5-1"/><path d="M3 15h13a5 5 0 0 1 5 5H3s0-5 0-5Z"/><path d="M16 15v5"/><path d="m6 15 2-6h6l2 6"/></svg>
                </div>
                <span class="text-brand-black-700 font-sans text-sm font-medium leading-tight">Iron & Iron board</span>
            </div>

            <!-- Item 8 -->
            <div class="flex flex-col items-center text-center group">
                <div class="mb-5 text-brand-blue transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23Z"/><path d="m9 10 3 3 3-3"/></svg>
                </div>
                <span class="text-brand-black-700 font-sans text-sm font-medium leading-tight">Dry-clean and pressing service</span>
            </div>

            <!-- Item 9 -->
            <div class="flex flex-col items-center text-center group">
                <div class="mb-5 text-brand-blue transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                </div>
                <span class="text-brand-black-700 font-sans text-sm font-medium leading-tight">In-room telephone for assistance</span>
            </div>

            <!-- Item 10 -->
            <div class="flex flex-col items-center text-center group">
                <div class="mb-5 text-brand-blue transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/><circle cx="12" cy="16" r="1"/></svg>
                </div>
                <span class="text-brand-black-700 font-sans text-sm font-medium leading-tight">Safety box</span>
            </div>

            <!-- Item 11 -->
            <div class="flex flex-col items-center text-center group">
                <div class="mb-5 text-brand-blue transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><line x1="12" y1="20" x2="12.01" y2="20"/></svg>
                </div>
                <span class="text-brand-black-700 font-sans text-sm font-medium leading-tight">Wi-Fi access</span>
            </div>

            <!-- Item 12 -->
            <div class="flex flex-col items-center text-center group">
                <div class="mb-5 text-brand-blue transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>
                </div>
                <span class="text-brand-black-700 font-sans text-sm font-medium leading-tight">Instant mobile service</span>
            </div>
        </div>

        <!-- Footer Text -->
        <div class="mt-24 text-center">
            <p class="text-brand-black-500 font-sans italic text-sm leading-loose max-w-[600px] mx-auto">
                We believe that comfort comes from thoughtful details. <br>
                Our amenities are designed to support your every mood whether you're here to recharge
            </p>
        </div>
    </div>
</section>
