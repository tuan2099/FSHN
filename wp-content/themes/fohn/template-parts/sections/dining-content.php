<?php
/**
 * Section: Dining Content
 */
?>

<section class="relative py-24 overflow-hidden bg-white">
    <!-- Decorative Florals -->
    <div class="absolute left-[-100px] top-[10%] w-[400px] opacity-15 pointer-events-none select-none">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
    </div>
    <div class="absolute right-[-100px] top-[10%] w-[400px] opacity-15 pointer-events-none select-none scale-x-[-1]">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
    </div>

    <div class="container relative z-10 mx-auto px-6 max-w-[1040px]">
        <!-- Intro Header -->
        <div class="text-center mb-18">
            <h2 class="text-brand-blue font-serif text-5xl tracking-[0.2em] mb-6 uppercase">Dining</h2>
            <div class="w-24 h-px bg-brand-orange mx-auto mb-10"></div>
            <p class="text-brand-blue font-serif italic text-2xl mb-8">
                Where Flavors, Culture, and Creativity Meet Above Hanoi
            </p>
            <p class="text-brand-black-700 font-sans text-lg leading-relaxed max-w-[850px] mx-auto mb-12">
                Located on the 24th floor, our dining and social spaces reimagine Vietnamese hospitality through modern flavors, artistic energy, and panoramic views of Hanoi's skyline. The all-day dining restaurant, bar, and VIP Room create a seamless journey from casual daytime gatherings to vibrant, elevated evenings. Guests can also enjoy 24/7 in-room dining, bringing curated dishes and crafted comfort directly to their room.
            </p>
            
            <div class="flex flex-wrap justify-center gap-12 font-serif text-lg tracking-[0.1em] uppercase text-brand-blue">
                <a href="#" class="border-b border-brand-orange pb-1 hover:text-brand-orange transition-colors">All-Day Dining Menu</a>
                <a href="#" class="border-b border-brand-orange pb-1 hover:text-brand-orange transition-colors">Lounge / Terrace Menu</a>
            </div>
        </div>
    </div>

    <!-- Main Dining Slider -->
    <div class="relative py-12 px-0 md:px-12 mb-24 overflow-hidden">
        <div class="swiper dining-main-slider !overflow-visible">
            <div class="swiper-wrapper">
                <div class="swiper-slide h-auto max-w-[80vw] md:max-w-[700px] transition-opacity duration-300">
                    <div class="relative group aspect-[16/9]">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dining-main.png" alt="Dining Main" class="w-full h-full object-cover">
                        <div class="absolute inset-0 border-[3px] border-transparent transition-colors duration-300 group-[.swiper-slide-active]:border-[#8b5cf6]"></div>
                    </div>
                </div>
                <div class="swiper-slide h-auto max-w-[80vw] md:max-w-[700px]">
                    <div class="relative group aspect-[16/9]">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dining-moc-loft.png" alt="Dining 2" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="swiper-slide h-auto max-w-[80vw] md:max-w-[700px]">
                    <div class="relative group aspect-[16/9]">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dining-main.png" alt="Dining 3" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Custom Navigation Buttons -->
            <button class="dining-prev absolute left-[5%] md:left-[15%] top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-transparent border border-brand-orange rounded-full flex items-center justify-center text-brand-orange hover:bg-brand-orange hover:text-white transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            <button class="dining-next absolute right-[5%] md:right-[15%] top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-transparent border border-brand-orange rounded-full flex items-center justify-center text-brand-orange hover:bg-brand-orange hover:text-white transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </button>
        </div>

        <div class="text-center mt-12">
            <a href="#" class="inline-block bg-brand-orange text-white px-10 py-4 text-sm font-bold uppercase tracking-[0.2em] hover:bg-brand-blue transition-all">
                Make a Reservation
            </a>
        </div>
    </div>

    <!-- Section 2: MOC LOFT RESTAURANT -->
    <div class="container relative z-10 mx-auto px-6 max-w-[1040px]">
        <div class="flex flex-col md:flex-row items-center gap-15">
            <div class="w-full md:w-1/2">
                <div class="pr-0 md:pr-12">
                    <h3 class="text-brand-blue font-serif text-5xl tracking-[0.1em] uppercase mb-4">Moc Loft Restaurant</h3>
                    <p class="text-brand-orange font-serif italic text-xl mb-12">"MỘC LOFT" All-Day Dining Inspirations</p>
                    
                    <p class="text-brand-black-700 font-sans text-base leading-loose mb-12">
                        Perched on the 24th floor, our all-day dining restaurant, MỘC LOFT, presents a thoughtfully curated menu of international cuisine alongside Vietnamese influences. Designed as a destination in its own right, the space brings together a clear culinary vision, warm yet refined service, and a distinct sense of place inspired by Hanoi’s culture and creative spirit.
                    </p>
                    
                    <div class="flex gap-6">
                        <a href="#" class="bg-brand-orange text-white px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-brand-blue transition-all">
                            Book Now
                        </a>
                        <a href="#" class="border border-brand-blue text-brand-blue px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-brand-blue hover:text-white transition-all">
                            Menu
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="w-full md:w-1/2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dining-moc-loft.png" alt="Moc Loft Restaurant" class="w-full h-auto shadow-2xl">
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof Swiper !== 'undefined') {
        new Swiper('.dining-main-slider', {
            slidesPerView: 'auto',
            centeredSlides: true,
            spaceBetween: 40,
            loop: true,
            navigation: {
                nextEl: '.dining-next',
                prevEl: '.dining-prev',
            },
        });
    }
});
</script>
