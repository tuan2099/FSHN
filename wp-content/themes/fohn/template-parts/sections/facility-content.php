<?php
/**
 * Section: Facilities Content
 */

$intro_title = get_field('facilities_intro_title') ?: 'Facilities';
$intro_desc = get_field('facilities_intro_desc');
$facility_blocks = get_field('facilities_blocks');
?>

<style>
    @media (min-width: 768px) {
        /* Slimmer blue box (was min-h 520 + pt/pb 16) */
        .facility-content-box {
            min-height: 440px;
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
        }

        /* Pull the box under the image so the image overlaps it */
        .facility-content-box.facility-overlap-left {
            margin-left: -130px;
            /* clear the 130px overlap + extra gap between image and text */
            padding-left: 185px;
        }

        .facility-content-box.facility-overlap-right {
            margin-right: -130px;
            padding-right: 185px;
        }
    }

    /* Override Swiper's default width:100% on the fraction — only for this section */
    .facility-blocks-list .swiper-pagination-fraction {
        position: static;
        width: auto;
    }

    /* Gap between facility blocks */
    .facility-block-gap {
        margin-bottom: 7rem;
    }
</style>

<section class="relative overflow-hidden bg-white" style="padding-top:5rem;padding-bottom:5rem">
    <!-- Decorative flower frame (shared helper) -->
    <?php fohn_render_flowers(get_field('facilities_flower_left'), get_field('facilities_flower_right')); ?>

    <div class="container relative z-10 px-6 mx-auto">
        <!-- Intro Header -->
        <div class="mb-20 text-center">
            <h2 class="text-brand-blue font-serif text-[40px] font-semibold  mb-6 uppercase">
                <?php echo esc_html($intro_title); ?>
            </h2>
            <div class="w-24 h-px mx-auto mb-10 bg-brand-orange"></div>
            <?php if ($intro_desc): ?>
                <p class="mx-auto font-sans leading-relaxed text-brand-black-700 text-md">
                    <?php echo nl2br(esc_html($intro_desc)); ?>
                </p>
            <?php else: ?>
                <p class="mx-auto font-sans leading-relaxed text-brand-black-700 text-md">
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
                    // Negative overlap so the image sits on top of the blue box (handled in <style> below)
                    $overlap_margin = $is_reversed ? 'facility-overlap-right' : 'facility-overlap-left';
                    $text_padding = $is_reversed ? 'md:pr-28 md:pl-10 lg:pr-36 lg:pl-14' : 'md:pl-28 md:pr-10 lg:pl-36 lg:pr-14';
                    ?>
                    <div
                        class="relative flex flex-col <?php echo $row_class; ?> items-center justify-center <?php echo $counter < count($facility_blocks) - 1 ? 'facility-block-gap' : ''; ?>">
                        <!-- Image Side -->
                        <div class="w-full md:w-[550px] z-20 relative flex-shrink-0" style="margin-top: -70px;">
                            <div class="swiper facility-slider-<?php echo $counter; ?> overflow-hidden shadow-2xl">
                                <div class="swiper-wrapper">
                                    <?php if ($gallery): ?>
                                        <?php foreach ($gallery as $img_url): ?>
                                            <div class="swiper-slide aspect-[16/11]">
                                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>"
                                                    class="object-cover w-full h-full">
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div
                                            class="swiper-slide aspect-[16/11] bg-brand-black-100 flex items-center justify-center italic text-brand-black-300">
                                            <?php pll_e('No Images'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Navigation & Pagination below image -->
                            <?php
                            // Keep the nav within the visible part of the image (clear the 130px overlap)
                            $nav_alignment_class = $is_reversed ? 'md:ml-[130px]' : 'md:mr-[130px]';
                            ?>
                            <div
                                class="mt-4 mb-12 md:mb-0 flex justify-between items-center pr-4 <?php echo $nav_alignment_class; ?>">
                                <div class="flex gap-10">
                                    <button
                                        class="facility-prev-<?php echo $counter; ?> hover:translate-x-[-4px] transition-transform">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (5).png"
                                            alt="Prev" class="object-contain w-10 h-5">
                                    </button>
                                    <button
                                        class="facility-next-<?php echo $counter; ?> hover:translate-x-[4px] transition-transform">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector (6).png"
                                            alt="Next" class="object-contain w-10 h-5">
                                    </button>
                                </div>
                                <div
                                    class="facility-pagination-<?php echo $counter; ?> text-sm font-bold text-brand-black-900 tracking-widest font-sans text-center">
                                </div>
                            </div>
                        </div>

                        <!-- Content Side (Overlapping Box) -->
                        <div
                            class="facility-content-box w-full md:w-[550px] bg-[#2B3B52] p-10 <?php echo $text_padding; ?> <?php echo $overlap_margin; ?> z-10 text-white shadow-xl relative flex flex-col justify-center">
                            <div class="relative z-10">
                                <h3 class="font-serif text-2xl tracking-[0.1em] uppercase mb-6 leading-tight">
                                    <?php echo esc_html($title); ?>
                                </h3>
                                <div class="w-16 h-px mb-2 bg-brand-orange"></div>
                                <p class="font-sans text-base opacity-90">
                                    <?php echo nl2br(esc_html($desc)); ?>
                                </p>
                                <div class="pt-4 font-sans text-lg font-bold tracking-wide">
                                    <?php pll_e('Operation Hours:'); ?> <?php echo esc_html(pll__($hours)); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $counter++; endforeach; ?>
            <?php else: ?>
                <div class="py-20 italic text-center bg-brand-black-50 text-brand-black-400">
                    <?php pll_e('Please add facility blocks in the page editor.'); ?>
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