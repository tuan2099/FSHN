<?php
/**
 * Section: Gallery Content
 */

$intro_title = get_field('gallery_intro_title') ?: 'Gallery';
$intro_subtitle = get_field('gallery_intro_subtitle') ?: 'A living canvas of heritage & originality';
$intro_desc = get_field('gallery_intro_desc');
$gallery_items = get_field('gallery_items');
?>

<section class="relative overflow-hidden bg-white" style="padding-top:5rem;padding-bottom:5rem">
    <!-- Decorative flower frame (shared helper) -->
    <?php fohn_render_flowers(get_field('gallery_flower_left'), get_field('gallery_flower_right')); ?>

    <div class="container relative z-10 mx-auto px-6 max-w-[1040px]">
        <!-- Intro Header -->
        <div class="text-center mb-18">
            <h2 class="text-brand-blue font-serif text-[40px] tracking-wide font-semibold mb-6 uppercase">
                <?php echo esc_html($intro_title); ?>
            </h2>
            <div class="w-[250px] h-px mx-auto mb-4 bg-brand-orange"></div>
            <?php if ($intro_subtitle): ?>
                <p class="mb-8 font-serif text-xl tracking-wide text-brand-blue">
                    <?php echo esc_html($intro_subtitle); ?>
                </p>
            <?php endif; ?>
            
            <?php if ($intro_desc): ?>
                <p class="mx-auto mb-8 font-sans leading-relaxed text-justify text-brand-black-700 text-md">
                    <?php echo nl2br(esc_html($intro_desc)); ?>
                </p>
            <?php else: ?>
                <p class="mx-auto mb-8 font-sans leading-relaxed text-justify text-brand-black-700 text-md">
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
            class="flex flex-wrap justify-center gap-10 mb-16 font-serif text-lg tracking-[0.2em] uppercase text-brand-blue">
            <button class="pb-2 transition-all border-b-2 gallery-filter-btn active text-brand-blue border-brand-orange"
                data-target="all"><?php pll_e('All'); ?></button>
            <button class="transition-all gallery-filter-btn hover:text-brand-blue" data-target="rooms"><?php pll_e('Rooms'); ?></button>
            <button class="transition-all gallery-filter-btn hover:text-brand-blue" data-target="dining"><?php pll_e('Dining'); ?></button>
            <button class="transition-all gallery-filter-btn hover:text-brand-blue" data-target="spa"><?php pll_e('Spa'); ?></button>
            <button class="transition-all gallery-filter-btn hover:text-brand-blue"
                data-target="facilities"><?php pll_e('Facilities'); ?></button>
            <button class="transition-all gallery-filter-btn hover:text-brand-blue" data-target="others"><?php pll_e('Others'); ?></button>
        </div>

        <!-- Grid -->
        <div id="gallery-grid" class="grid grid-cols-1 gap-6 md:grid-cols-3">
            <?php if ($gallery_items): ?>
                <?php foreach ($gallery_items as $item): ?>
                    <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="<?php echo esc_attr($item['category']); ?>">
                        <a href="<?php echo esc_url($item['image']); ?>" class="block w-full h-full glightbox" data-gallery="gallery1">
                            <img src="<?php echo esc_url($item['image']); ?>" alt=""
                                class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Row 1 -->
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="others">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-lobby.png" class="block w-full h-full glightbox" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-lobby.png" alt="Lobby"
                            class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="rooms">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/dining-main.png" class="block w-full h-full glightbox" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dining-main.png" alt="Dining"
                            class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="facilities">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/facility-pantry.png" class="block w-full h-full glightbox" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility-pantry.png" alt="Pantry"
                            class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>

                <!-- Row 2 -->
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="spa">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" class="block w-full h-full glightbox" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" alt="Spa"
                            class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="dining">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/dining-moc-loft.png" class="block w-full h-full glightbox" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dining-moc-loft.png" alt="Moc Loft"
                            class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="rooms">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/dining-main.png" class="block w-full h-full glightbox" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dining-main.png" alt="Dining 2"
                            class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>

                <!-- Row 3 -->
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="others">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-lobby.png" class="block w-full h-full glightbox" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-lobby.png" alt="Lobby 2"
                            class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="facilities">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/facility-pantry.png" class="block w-full h-full glightbox" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility-pantry.png" alt="Pantry 2"
                            class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                    </a>
                </div>
                <div class="gallery-item aspect-[4/3] overflow-hidden group" data-category="spa">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" class="block w-full h-full glightbox" data-gallery="gallery1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/spa-interior.png" alt="Spa 2"
                            class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
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