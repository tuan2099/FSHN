<?php
/**
 * Section: Gallery Content
 */

$intro_title = get_field('gallery_intro_title') ?: 'Gallery';
$intro_subtitle = get_field('gallery_intro_subtitle') ?: 'A living canvas of heritage & originality';
$intro_desc = get_field('gallery_intro_desc');
$gallery_items = get_field('gallery_items');
?>

<section class="relative py-24 overflow-hidden bg-white">
    <!-- Decorative Florals -->
    <div class="absolute left-[-100px] top-4 w-[400px] opacity-15 pointer-events-none select-none hidden md:block">
        <?php if (get_field('gallery_flower_left')): ?>
            <img src="<?php echo esc_url(get_field('gallery_flower_left')); ?>" alt="" class="w-full h-auto">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
        <?php endif; ?>
    </div>
    <div
        class="absolute right-[-100px] top-4 w-[400px] opacity-15 pointer-events-none select-none scale-x-[-1] hidden md:block">
        <?php if (get_field('gallery_flower_right')): ?>
            <img src="<?php echo esc_url(get_field('gallery_flower_right')); ?>" alt="" class="w-full h-auto">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
        <?php endif; ?>
    </div>

    <div class="container relative z-10 mx-auto px-6 max-w-[1040px]">
        <!-- Intro Header -->
        <div class="text-center mb-18">
            <h2 class="text-brand-blue font-serif text-[40px] font-semibold mb-6 uppercase">
                <?php echo esc_html($intro_title); ?>
            </h2>
            <div class="w-24 h-px bg-brand-orange mx-auto mb-10"></div>
            <?php if ($intro_subtitle): ?>
                <p class="text-brand-blue font-serif italic text-2xl mb-8">
                    <?php echo esc_html($intro_subtitle); ?>
                </p>
            <?php endif; ?>
            
            <?php if ($intro_desc): ?>
                <p class="text-brand-black-700 font-sans text-md leading-relaxed mx-auto mb-12">
                    <?php echo nl2br(esc_html($intro_desc)); ?>
                </p>
            <?php else: ?>
                <p class="text-brand-black-700 font-sans text-md leading-relaxed mx-auto mb-12">
                    Discover a collection of exclusive offers designed to elevate your stay at LÈGACY - A Fusion Original
                    Hanoi. Inspired by Hanoi’s heritage, the hotel’s design unfolds through the lobby, corridors, elevators,
                    and custom furnishings, drawing from the flowing Red River and the timeless beauty of the lotus. From
                    wellness-focused escapes and creative dining experiences to extended-stay privileges and seasonal
                    inspirations, each offer is thoughtfully crafted to immerse you in the city’s culture and the Original
                    spirit.
                </p>
            <?php endif; ?>
        </div>

        <!-- Filters -->
        <div
            class="flex flex-wrap justify-center gap-10 mb-18 font-serif text-sm tracking-[0.2em] uppercase text-brand-blue/60">
            <button class="gallery-filter-btn active text-brand-blue border-b-2 border-brand-orange pb-2 transition-all"
                data-target="all">All</button>
            <button class="gallery-filter-btn hover:text-brand-blue transition-all" data-target="rooms">Rooms</button>
            <button class="gallery-filter-btn hover:text-brand-blue transition-all" data-target="dining">Dining</button>
            <button class="gallery-filter-btn hover:text-brand-blue transition-all" data-target="spa">Spa</button>
            <button class="gallery-filter-btn hover:text-brand-blue transition-all"
                data-target="facilities">Facilities</button>
            <button class="gallery-filter-btn hover:text-brand-blue transition-all" data-target="others">Others</button>
        </div>

        <!-- Grid -->
        <div id="gallery-grid" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php if ($gallery_items): ?>
                <?php foreach ($gallery_items as $item): ?>
                    <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="<?php echo esc_attr($item['category']); ?>">
                        <a href="<?php echo esc_url($item['image']); ?>" class="glightbox block w-full h-full" data-gallery="gallery1">
                            <img src="<?php echo esc_url($item['image']); ?>" alt=""
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Row 1 -->
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="others">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-lobby.png" class="glightbox block w-full h-full" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-lobby.png" alt="Lobby"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="rooms">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/dining-main.png" class="glightbox block w-full h-full" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dining-main.png" alt="Dining"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="facilities">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/facility-pantry.png" class="glightbox block w-full h-full" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility-pantry.png" alt="Pantry"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>

                <!-- Row 2 -->
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="spa">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" class="glightbox block w-full h-full" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" alt="Spa"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="dining">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/dining-moc-loft.png" class="glightbox block w-full h-full" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dining-moc-loft.png" alt="Moc Loft"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="rooms">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/dining-main.png" class="glightbox block w-full h-full" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dining-main.png" alt="Dining 2"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>

                <!-- Row 3 -->
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="others">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-lobby.png" class="glightbox block w-full h-full" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-lobby.png" alt="Lobby 2"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="facilities">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/facility-pantry.png" class="glightbox block w-full h-full" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility-pantry.png" alt="Pantry 2"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="spa">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" class="glightbox block w-full h-full" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" alt="Spa 2"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize GLightbox
        const lightbox = GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            zoomable: true,
            draggable: true
        });

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
                    const link = item.querySelector('.glightbox');

                    if (target === 'all' || category === target) {
                        item.style.display = 'block';
                        link.setAttribute('data-glightbox', 'gallery1'); // Ensure it stays in the gallery group
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        }, 10);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.95)';
                        link.removeAttribute('data-glightbox'); // Remove from group when hidden
                        setTimeout(() => {
                            item.style.display = 'none';
                        }, 300);
                    }
                });

                // Refresh lightbox to update visible items in the slider
                setTimeout(() => {
                    lightbox.reload();
                }, 350);
            });
        });
    });
</script>


<style>
    .gallery-item {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
</style>