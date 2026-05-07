<?php
/**
 * Section: Facilities Content
 */

$intro_title = get_field('facilities_intro_title') ?: 'Facilities';
$intro_desc = get_field('facilities_intro_desc');
$facility_blocks = get_field('facilities_blocks');
?>

<section class="relative py-24 overflow-hidden bg-white">
    <!-- Decorative Florals -->
    <div class="absolute left-[-100px] top-4 w-[400px] pointer-events-none select-none hidden md:block">
        <?php if (get_field('facilities_flower_left')): ?>
            <img src="<?php echo esc_url(get_field('facilities_flower_left')); ?>" alt="" class="w-full h-auto">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
        <?php endif; ?>
    </div>
    <div class="absolute right-[-100px] top-4 w-[400px] pointer-events-none select-none scale-x-[-1] hidden md:block">
        <?php if (get_field('facilities_flower_right')): ?>
            <img src="<?php echo esc_url(get_field('facilities_flower_right')); ?>" alt="" class="w-full h-auto">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lotus-bg.png" alt="" class="w-full h-auto">
        <?php endif; ?>
    </div>

    <div class="container relative z-10 mx-auto px-6">
        <!-- Intro Header -->
        <div class="text-center mb-24">
            <h2 class="text-brand-blue font-serif text-[40px] font-semibold  mb-6 uppercase">
                <?php echo esc_html($intro_title); ?>
            </h2>
            <div class="w-24 h-px bg-brand-orange mx-auto mb-10"></div>
            <?php if ($intro_desc): ?>
                <p class="text-brand-black-700 font-sans text-md leading-relaxed  mx-auto">
                    <?php echo nl2br(esc_html($intro_desc)); ?>
                </p>
            <?php else: ?>
                <p class="text-brand-black-700 font-sans text-md leading-relaxed  mx-auto">
                    Our facilities are crafted to enrich every moment of your stay. Wellness, dining, social spaces, and
                    creative venues come together through thoughtful design and cultural storytelling, offering guests a
                    harmonious blend of comfort, inspiration, and modern Vietnamese hospitality.
                </p>
            <?php endif; ?>
        </div>

        <!-- Facility Blocks (Repeater) -->
        <div class="facility-blocks-list">
            <?php if ($facility_blocks): ?>
                <?php $counter = 0;
                foreach ($facility_blocks as $block):
                    $title = $block['title'];
                    $desc = $block['description'];
                    $hours = $block['hours'] ?: 'All-day';
                    $gallery = $block['gallery'];

                    $is_reversed = $counter % 2 !== 0;
                    $row_class = $is_reversed ? 'md:flex-row-reverse' : 'md:flex-row';
                    $overlap_margin = $is_reversed ? 'md:mr-[130px]' : 'md:ml-[130px]';
                    $text_padding = $is_reversed ? 'md:pr-28 md:pl-10 lg:pr-36 lg:pl-14' : 'md:pl-28 md:pr-10 lg:pl-36 lg:pr-14';
                    ?>
                    <div
                        class="relative flex flex-col <?php echo $row_class; ?> items-center justify-center <?php echo $counter < count($facility_blocks) - 1 ? 'mb-40' : ''; ?>">
                        <!-- Image Side -->
                        <div class="w-full md:w-[600px] z-20 relative flex-shrink-0">
                            <div class="swiper facility-slider-<?php echo $counter; ?> overflow-hidden shadow-2xl">
                                <div class="swiper-wrapper">
                                    <?php if ($gallery): ?>
                                        <?php foreach ($gallery as $img_url): ?>
                                            <div class="swiper-slide aspect-[16/11]">
                                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>"
                                                    class="w-full h-full object-cover">
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div
                                            class="swiper-slide aspect-[16/11] bg-brand-black-100 flex items-center justify-center italic text-brand-black-300">
                                            No Images
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Navigation & Pagination below image -->
                            <?php
                            // Adjust navigation alignment to avoid the overlapping blue box
                            $nav_alignment_class = $is_reversed ? 'md:ml-[120px]' : 'md:mr-[120px]';
                            ?>
                            <div
                                class="mt-8 mb-12 md:mb-0 flex justify-between items-center pr-4 <?php echo $nav_alignment_class; ?>">
                                <div class="flex gap-10">
                                    <button
                                        class="facility-prev-<?php echo $counter; ?> hover:translate-x-[-4px] transition-transform">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (5).png"
                                            alt="Prev" class="w-10 h-5 object-contain">
                                    </button>
                                    <button
                                        class="facility-next-<?php echo $counter; ?> hover:translate-x-[4px] transition-transform">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (6).png"
                                            alt="Next" class="w-10 h-5 object-contain">
                                    </button>
                                </div>
                                <div
                                    class="facility-pagination-<?php echo $counter; ?> text-sm font-bold text-brand-black-900 tracking-widest font-sans text-center">
                                </div>
                            </div>
                        </div>

                        <!-- Content Side (Overlapping Box) -->
                        <div
                            class="w-full md:w-[600px] bg-[#2B3B52] p-10 md:pt-16 md:pb-16 <?php echo $text_padding; ?> <?php echo $overlap_margin; ?> z-10 text-white shadow-xl relative min-h-[520px] flex flex-col justify-center">
                            <div class="relative z-10">
                                <h3 class="font-serif text-2xl tracking-[0.1em] uppercase mb-6 leading-tight">
                                    <?php echo esc_html($title); ?>
                                </h3>
                                <div class="w-16 h-px bg-brand-orange mb-2"></div>
                                <p class="font-sans text-base leading-loose opacity-90">
                                    <?php echo nl2br(esc_html($desc)); ?>
                                </p>
                                <div class="font-sans font-bold text-lg tracking-wide pt-4">
                                    Operation Hours: <?php echo esc_html($hours); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $counter++; endforeach; ?>
            <?php else: ?>
                <div class="text-center py-20 bg-brand-black-50 italic text-brand-black-400">
                    Please add facility blocks in the page editor.
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if ($facility_blocks): ?>
            <?php foreach (array_keys($facility_blocks) as $index): ?>
                new Swiper('.facility-slider-<?php echo $index; ?>', {
                    loop: true,
                    speed: 800,
                    navigation: {
                        nextEl: '.facility-next-<?php echo $index; ?>',
                        prevEl: '.facility-prev-<?php echo $index; ?>',
                    },
                    pagination: {
                        el: '.facility-pagination-<?php echo $index; ?>',
                        type: 'fraction',
                        renderFraction: function (currentClass, totalClass) {
                            return '<span class="' + currentClass + '"></span>' +
                                ' / ' +
                                '<span class="' + totalClass + '"></span>';
                        }
                    }
                });
            <?php endforeach; ?>
        <?php endif; ?>
    });
</script>