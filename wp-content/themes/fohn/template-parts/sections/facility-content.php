<?php
/**
 * Section: Facilities Content
 */
?>

<section class="relative py-24 overflow-hidden bg-white">
    <!-- Decorative Florals -->
    <div class="absolute left-[-100px] top-[5%] w-[400px] opacity-15 pointer-events-none select-none">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
    </div>
    <div class="absolute right-[-100px] top-[5%] w-[400px] opacity-15 pointer-events-none select-none scale-x-[-1]">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
    </div>

    <div class="container relative z-10 mx-auto px-6 max-w-[1040px]">
        <!-- Intro Header -->
        <div class="text-center mb-24">
            <h2 class="text-brand-blue font-serif text-5xl tracking-[0.2em] mb-6 uppercase">Facilities</h2>
            <div class="w-24 h-px bg-brand-orange mx-auto mb-10"></div>
            <p class="text-brand-black-700 font-sans text-lg leading-relaxed max-w-[850px] mx-auto">
                Our facilities are crafted to enrich every moment of your stay. Wellness, dining, social spaces, and creative venues come together through thoughtful design and cultural storytelling, offering guests a harmonious blend of comfort, inspiration, and modern Vietnamese hospitality.
            </p>
        </div>

        <!-- Section 1: Original Reload Pantry -->
        <div class="relative flex flex-col md:flex-row items-end">
            <!-- Image Side -->
            <div class="w-full md:w-[65%] z-20">
                <div class="swiper facility-slider overflow-hidden">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide aspect-[4/3]">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility-pantry.png" alt="Reload Pantry" class="w-full h-full object-cover shadow-xl">
                        </div>
                        <div class="swiper-slide aspect-[4/3]">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility-pantry.png" alt="Reload Pantry 2" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                <!-- Navigation below image -->
                <div class="mt-6 flex justify-between items-center max-w-full">
                    <div class="flex gap-6">
                        <button class="facility-prev text-brand-orange hover:translate-x-[-4px] transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                        </button>
                        <button class="facility-next text-brand-orange hover:translate-x-[4px] transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </button>
                    </div>
                    <div class="facility-pagination text-xs font-bold text-brand-black-800 tracking-widest font-sans"></div>
                </div>
            </div>

            <!-- Content Side (Overlapping Box) -->
            <div class="w-full md:w-[45%] bg-brand-blue p-12 md:p-18 md:ml-[-10%] md:mb-[-5%] z-10 text-white shadow-2xl">
                <h3 class="font-serif text-3xl md:text-4xl tracking-[0.1em] uppercase mb-6 leading-tight">
                    Original Reload Pantry
                </h3>
                <div class="w-16 h-px bg-brand-orange mb-8 opacity-50"></div>
                <p class="font-sans text-base leading-loose mb-10 opacity-90">
                    The Reload Pantry keeps everyday comfort close at hand, turning guest corridor spaces into thoughtful refreshment stations. Stocked daily with snacks, fruits, pastries, drinks, and coffee & tea amenities, it offers grab-and-go convenience or a quick pause for refreshment at any time of day.
                </p>
                <div class="font-sans font-bold text-lg tracking-wide border-t border-white/10 pt-8 mt-auto">
                    Operation Hours: All-day
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof Swiper !== 'undefined') {
        new Swiper('.facility-slider', {
            loop: true,
            navigation: {
                nextEl: '.facility-next',
                prevEl: '.facility-prev',
            },
            pagination: {
                el: '.facility-pagination',
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
