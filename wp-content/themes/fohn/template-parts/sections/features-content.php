<?php
/**
 * Section: Features Content
 */

$intro_title = get_field('features_intro_title') ?: 'FEATURES';
$intro_subtitle = get_field('features_intro_subtitle') ?: 'Discover Our Unique Amenities';
$intro_desc = get_field('features_intro_desc');
$features_list = get_field('features_list');
?>

<section class="features-section relative bg-[#FBF9F6] overflow-hidden" style="padding-top:5rem;padding-bottom:5rem">
    <!-- Decorative flower frame (shared helper) -->
    <?php fohn_render_flowers(get_field('features_flower_left'), get_field('features_flower_right')); ?>
    <!-- Intro Header -->
    <div class="container px-6 mx-auto mb-16 text-center">
        <h2 class="text-brand-blue font-serif text-[40px] font-semibold  tracking-[0.1em] uppercase mb-6">
            <?php echo esc_html($intro_title); ?>
        </h2>
        <div class="w-[250px] h-px bg-[#FDB078] mx-auto mb-6"></div>
        <?php if ($intro_desc): ?>
            <p class="mx-auto font-sans text-sm leading-loose text-brand-black-700 md:text-base">
                <?php echo nl2br(esc_html($intro_desc)); ?>
            </p>
        <?php endif; ?>
    </div>

    <style>
        /* Flex grid so an incomplete last row is centered (1/2/3 per row) */
        .features-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 3rem 1rem;
        }
        .features-grid .feature-item {
            width: 100%;
        }
        @media (min-width: 768px) {
            .features-grid .feature-item {
                width: calc((100% - 1rem) / 2);
            }
        }
        @media (min-width: 1024px) {
            .features-grid .feature-item {
                width: calc((100% - 2rem) / 3);
            }
        }
    </style>

    <!-- Features Grid -->
    <div class="container px-6 mx-auto features-list">
        <?php if ($features_list): ?>
            <div class="features-grid">
                <?php foreach ($features_list as $feature):
                    $title = $feature['title'];
                    $desc = $feature['description'];
                    $image = $feature['image'];
                    $link = $feature['link'];
                    ?>
                    <div class="flex flex-col text-center feature-item">

                        <!-- Title -->
                        <h3 class="mb-6 font-serif text-xl italic font-semibold tracking-wide text-brand-blue">
                            <?php echo esc_html($title); ?>
                        </h3>

                        <!-- Image -->
                        <div class="relative aspect-[16/9] w-full overflow-hidden shadow-md mb-6">
                            <?php if ($image): ?>
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>"
                                    class="object-cover w-full h-full transition-transform duration-700 hover:scale-105">
                            <?php else: ?>
                                <div class="flex items-center justify-center w-full h-full bg-brand-black-100">
                                    <span class="italic text-brand-black-300">Feature Image</span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Description -->
                        <p class="flex-grow px-2 font-sans text-sm leading-relaxed js-readmore text-brand-black-700 md:px-0" data-limit="120">
                            <?php echo nl2br(esc_html($desc)); ?>
                        </p>

                        <!-- Optional Link -->
                        <?php if ($link): ?>
                            <div class="mt-6">
                                <a href="<?php echo esc_url($link); ?>"
                                    class="inline-block border-b-2 border-brand-orange text-brand-orange text-xs font-bold uppercase tracking-[0.2em] hover:text-brand-blue hover:border-brand-blue transition-colors pb-1">
                                    Learn More
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Placeholder if no features added -->
            <div class="container px-6 py-20 mx-auto text-center text-brand-black-400">
                <p>Please add features via the WordPress Admin dashboard.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    // Read more / less for feature descriptions
    document.addEventListener('DOMContentLoaded', function () {
        var moreLabel = '<?php echo esc_js(pll__('more')); ?>';
        var lessLabel = '<?php echo esc_js(pll__('less')); ?>';

        document.querySelectorAll('.features-section .js-readmore').forEach(function (el) {
            var fullHTML = el.innerHTML.trim();
            var text = el.textContent.trim();
            var limit = parseInt(el.getAttribute('data-limit') || '120', 10);

            if (text.length <= limit) return;

            var cut = text.lastIndexOf(' ', limit);
            if (cut < 0) cut = limit;
            var shortText = text.slice(0, cut).replace(/[\s.,;:]+$/, '');
            var expanded = false;

            function render() {
                if (expanded) {
                    el.innerHTML = fullHTML +
                        ' <a href="#" class="font-semibold readmore-toggle text-brand-orange whitespace-nowrap">' + lessLabel + '</a>';
                } else {
                    el.innerHTML = shortText +
                        '… <a href="#" class="font-semibold readmore-toggle text-brand-orange whitespace-nowrap">' + moreLabel + '</a>';
                }
                el.querySelector('.readmore-toggle').addEventListener('click', function (e) {
                    e.preventDefault();
                    expanded = !expanded;
                    render();
                });
            }

            render();
        });
    });
</script>