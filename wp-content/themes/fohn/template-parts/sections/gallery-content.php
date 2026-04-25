<?php
/**
 * Section: Gallery Content
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
        <div class="text-center mb-18">
            <h2 class="text-brand-blue font-serif text-5xl tracking-[0.2em] mb-6 uppercase">Gallery</h2>
            <div class="w-24 h-px bg-brand-orange mx-auto mb-10"></div>
            <p class="text-brand-blue font-serif italic text-2xl mb-8">
                A living canvas of heritage & originality
            </p>
            <p class="text-brand-black-700 font-sans text-lg leading-relaxed max-w-[850px] mx-auto mb-12">
                Discover a collection of exclusive offers designed to elevate your stay at LÈGACY - A Fusion Original Hanoi. Inspired by Hanoi’s heritage, the hotel’s design unfolds through the lobby, corridors, elevators, and custom furnishings, drawing from the flowing Red River and the timeless beauty of the lotus. From wellness-focused escapes and creative dining experiences to extended-stay privileges and seasonal inspirations, each offer is thoughtfully crafted to immerse you in the city’s culture and the Original spirit.
            </p>
        </div>

        <!-- Filters -->
        <div class="flex flex-wrap justify-center gap-10 mb-18 font-serif text-sm tracking-[0.2em] uppercase text-brand-blue/60">
            <button class="gallery-filter-btn active text-brand-blue border-b-2 border-brand-orange pb-2 transition-all" data-target="all">All</button>
            <button class="gallery-filter-btn hover:text-brand-blue transition-all" data-target="rooms">Rooms</button>
            <button class="gallery-filter-btn hover:text-brand-blue transition-all" data-target="dining">Dining</button>
            <button class="gallery-filter-btn hover:text-brand-blue transition-all" data-target="spa">Spa</button>
            <button class="gallery-filter-btn hover:text-brand-blue transition-all" data-target="facilities">Facilities</button>
            <button class="gallery-filter-btn hover:text-brand-blue transition-all" data-target="others">Others</button>
        </div>

        <!-- Grid -->
        <div id="gallery-grid" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Row 1 -->
            <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="others">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-lobby.png" alt="Lobby" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            </div>
            <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="rooms">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dining-main.png" alt="Dining" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            </div>
            <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="facilities">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility-pantry.png" alt="Pantry" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            </div>

            <!-- Row 2 -->
            <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="spa">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" alt="Spa" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            </div>
            <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="dining">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dining-moc-loft.png" alt="Moc Loft" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            </div>
            <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="rooms">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dining-main.png" alt="Dining 2" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            </div>

            <!-- Row 3 -->
            <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="others">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-lobby.png" alt="Lobby 2" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            </div>
            <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="facilities">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility-pantry.png" alt="Pantry 2" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            </div>
            <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="spa">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" alt="Spa 2" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.gallery-filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update active state
            filterBtns.forEach(b => {
                b.classList.remove('active', 'text-brand-blue', 'border-b-2', 'border-brand-orange', 'pb-2');
                b.classList.add('text-brand-blue/60');
            });
            btn.classList.add('active', 'text-brand-blue', 'border-b-2', 'border-brand-orange', 'pb-2');
            btn.classList.remove('text-brand-blue/60');

            const target = btn.getAttribute('data-target');

            galleryItems.forEach(item => {
                const category = item.getAttribute('data-category');
                
                if (target === 'all' || category === target) {
                    item.style.display = 'block';
                    // Trigger reflow for animation if needed
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
});
</script>

<style>
.gallery-item {
    transition: opacity 0.3s ease, transform 0.3s ease;
}
</style>
