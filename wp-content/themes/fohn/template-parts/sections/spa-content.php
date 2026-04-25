<?php
/**
 * Section: Spa & Wellness Content
 */
?>

<section class="relative py-24 overflow-hidden bg-white">
    <!-- Decorative Florals (Reusing from Amenities) -->
    <div class="absolute left-[-100px] top-[10%] w-[400px] opacity-15 pointer-events-none select-none">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
    </div>
    <div class="absolute right-[-100px] top-[10%] w-[400px] opacity-15 pointer-events-none select-none scale-x-[-1]">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
    </div>

    <div class="container relative z-10 mx-auto px-6 max-w-[1040px]">
        <!-- Intro Header -->
        <div class="text-center mb-24">
            <h2 class="text-brand-blue font-serif text-5xl tracking-[0.2em] mb-6 uppercase">Yên Spa & Wellness</h2>
            <div class="w-24 h-px bg-brand-orange mx-auto mb-10"></div>
            <p class="text-brand-black-700 font-sans text-lg leading-relaxed max-w-[850px] mx-auto mb-12">
                Inspired by the Vietnamese word “Yên,” meaning peace and calm, YÊN Spa is a sanctuary of quiet elegance designed to restore balance for body, mind, and soul. With its soothing atmosphere, YÊN Spa is designed as a sanctuary of balance, renewal, and quiet sophistication. Blending cultural rituals with contemporary well-being, our holistic offering invites guests to restore both body and mind through thoughtfully curated experiences.
            </p>
            <a href="#" class="inline-block bg-brand-orange text-white px-10 py-4 text-sm font-bold uppercase tracking-[0.2em] hover:bg-brand-blue transition-all">
                Contact Concierge
            </a>
        </div>

        <!-- Section 1: Spa Treatments (Image Left, Text Right) -->
        <div class="flex flex-col md:flex-row items-center gap-15 mb-30">
            <div class="w-full md:w-1/2">
                <div class="relative group">
                    <!-- Image Slider Mockup -->
                    <div class="swiper spa-slider-1 overflow-hidden">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide aspect-[4/3]">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" alt="Spa Treatments" class="w-full h-full object-cover shadow-2xl">
                            </div>
                            <!-- Added a clone for slider feel -->
                            <div class="swiper-slide aspect-[4/3] bg-brand-black-100">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" alt="Spa Treatments 2" class="w-full h-full object-cover opacity-80">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Navigation (Below Image as per mockup) -->
                    <div class="mt-6 flex justify-between items-center">
                        <div class="flex gap-6">
                            <button class="spa-prev-1 text-brand-orange hover:translate-x-[-4px] transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                            </button>
                            <button class="spa-next-1 text-brand-orange hover:translate-x-[4px] transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </button>
                        </div>
                        <div class="spa-pagination-1 text-xs font-bold text-brand-black-800 tracking-widest font-sans"></div>
                    </div>
                </div>
            </div>
            
            <div class="w-full md:w-1/2">
                <div class="pl-0 md:pl-8">
                    <h3 class="text-brand-blue font-serif text-3xl tracking-[0.15em] uppercase mb-4">Spa Treatments</h3>
                    <div class="w-16 h-px bg-brand-orange mb-8"></div>
                    <p class="text-brand-black-900 font-sans text-xl font-medium leading-relaxed mb-6">
                        A curated menu of therapies blends local Vietnamese culture with modern wellness rituals.
                    </p>
                    <p class="text-brand-black-500 font-sans text-base leading-loose">
                        Guests may choose from essential treatments such as massage, hydrotherapy, and body therapies, each thoughtfully designed and clearly presented with practical benefits. Delivered by skilled Vietnamese therapists with a deep understanding of traditional techniques and holistic care.
                    </p>
                </div>
            </div>
        </div>

        <!-- Section 2: Wellness Program (Text Left, Image Right) -->
        <div class="flex flex-col md:flex-row-reverse items-center gap-15">
            <div class="w-full md:w-1/2">
                <div class="relative group">
                    <!-- Image Slider Mockup -->
                    <div class="swiper spa-slider-2 overflow-hidden">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide aspect-[4/3]">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" alt="Wellness Program" class="w-full h-full object-cover shadow-2xl">
                            </div>
                            <div class="swiper-slide aspect-[4/3] bg-brand-black-100">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" alt="Wellness Program 2" class="w-full h-full object-cover opacity-80">
                            </div>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="mt-6 flex justify-between items-center">
                        <div class="flex gap-6">
                            <button class="spa-prev-2 text-brand-orange hover:translate-x-[-4px] transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                            </button>
                            <button class="spa-next-2 text-brand-orange hover:translate-x-[4px] transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </button>
                        </div>
                        <div class="spa-pagination-2 text-xs font-bold text-brand-black-800 tracking-widest font-sans"></div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2">
                <div class="pr-0 md:pr-8">
                    <h3 class="text-brand-blue font-serif text-3xl tracking-[0.15em] uppercase mb-4">Wellness Program</h3>
                    <div class="w-16 h-px bg-brand-orange mb-8"></div>
                    <p class="text-brand-black-900 font-sans text-xl font-medium leading-relaxed mb-6">
                        Immersive wellness journeys designed for balance, renewal, and modern self-care.
                    </p>
                    <p class="text-brand-black-500 font-sans text-base leading-loose">
                        Programs are tailored for both short-stay and long-stay guests, harmonizing traditional healing methods with actionable daily routines. Seasonal or rotating activities may be offered based on guest needs, while the core promise remains unwavering: thoughtful quality, personalized attention, and meaningful well-being.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof Swiper !== 'undefined') {
        new Swiper('.spa-slider-1', {
            loop: true,
            navigation: {
                nextEl: '.spa-next-1',
                prevEl: '.spa-prev-1',
            },
            pagination: {
                el: '.spa-pagination-1',
                type: 'fraction',
                renderFraction: function (currentClass, totalClass) {
                    return '<span class="' + currentClass + '"></span>' +
                           ' / ' +
                           '<span class="' + totalClass + '"></span>';
                }
            }
        });

        new Swiper('.spa-slider-2', {
            loop: true,
            navigation: {
                nextEl: '.spa-next-2',
                prevEl: '.spa-prev-2',
            },
            pagination: {
                el: '.spa-pagination-2',
                type: 'fraction',
                renderFraction: function (currentClass, totalClass) {
                    return '<span class="' + currentClass + '"></span>' +
                           ' / ' +
                           '<span class="' + totalClass + '"></span>';
                }
            }
        });
    }
});
</script>
