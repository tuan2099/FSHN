<?php
/**
 * The template for displaying the footer
 */

// Footer Options
// Text values are wrapped in pll__() so they can be translated via
// Polylang > String translations (registered in inc/polylang.php).
$loyalty_title = pll__(get_field('footer_loyalty_title', 'option') ?: 'fusionlife');
$loyalty_desc = pll__(get_field('footer_loyalty_desc', 'option') ?: 'Join our loyalty program and book direct to take advantage of all our rewards and benefits.');
$loyalty_btn_text = pll__(get_field('footer_loyalty_btn_text', 'option') ?: 'Join Now');
$loyalty_btn_link = get_field('footer_loyalty_btn_link', 'option') ?: '#';

$footer_logo = get_field('footer_logo', 'option');
$footer_desc = pll__(get_field('footer_description', 'option') ?: 'LÈGACY - A FUSION ORIGINAL HA NOI');
$footer_address = pll__(get_field('footer_address', 'option') ?: '349 Doi Can, Ngoc Ha Ward, Hanoi, Vietnam');
$footer_phone = pll__(get_field('footer_phone', 'option') ?: '+84 24 3816 5555');
$footer_email = get_field('footer_email', 'option') ?: 'res.fohn@fusionhotelgroup.com';
$footer_socials = get_field('footer_socials', 'option');
$footer_copyright = get_field('footer_copyright', 'option') ?: 'Fusion Hotel Group &copy; ' . date('Y');
?>

<style>
    /* fusionlife loyalty bar: stack + left-align up to 1024/tablet,
       only switch to a side-by-side row on xl (>=1280px) screens. */
    @media (min-width: 1280px) {
        .fusionlife-inner {
            flex-direction: row;
            align-items: center;
        }
    }
</style>

<footer id="colophon" class="pt-0 bg-white site-footer">
    <!-- Top Dark Bar -->
    <div class="py-10 bg-brand-blue lg:py-15" data-aos="fade-up">
        <div class="container fusionlife-inner flex flex-col items-start justify-between gap-8 px-6 mx-auto">
            <div class="max-w-2xl text-white">
                <div class="mb-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo fslife.png"
                        alt="FusionLife Logo" class="w-auto h-8 lg:h-12">
                </div>
                <p class="text-sm text-brand-black-100/80 ">
                    <?php echo esc_html($loyalty_desc); ?>
                </p>
            </div>
            <div>
                <a href="<?php echo esc_url($loyalty_btn_link); ?>"
                    class="inline-block px-10 py-3 text-sm font-bold uppercase whitespace-nowrap transition-all bg-white rounded-full shadow-lg text-brand-blue hover:bg-brand-orange hover:text-white active:scale-95">
                    <?php echo esc_html($loyalty_btn_text); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Footer Info -->
    <div class="container px-6 mx-auto pt-15">
        <div class="grid grid-cols-1 gap-12 md:grid-cols-3 lg:gap-18">
            <!-- Group Info -->
            <div class="info-column" data-aos="fade-up" data-aos-delay="100">
                <div class="mb-6">
                    <?php if ($footer_logo): ?>
                        <img src="<?php echo esc_url($footer_logo); ?>" alt="Footer Logo" class="w-auto h-12 mb-4">
                    <?php endif; ?>
                    <p class="text-[12px] font-medium uppercase text-brand-black-400">
                        <?php echo esc_html($footer_desc); ?>
                    </p>
                </div>
                <div class="space-y-4 text-base leading-relaxed text-brand-black-700">
                    <p><?php echo nl2br(esc_html($footer_address)); ?></p>
                    <p>
                        <?php pll_e('T.'); ?> <?php echo esc_html($footer_phone); ?><br>
                        E. <?php echo esc_html($footer_email); ?>
                    </p>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="newsletter-column" data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-brand-black-500 text-base uppercase font-bold mb-6">
                    <?php pll_e('Sign up for Newsletter'); ?>
                </h3>
                <div class="relative max-w-sm">
                    <input type="email"
                        class="w-full py-2 pr-10 text-base transition-colors bg-transparent border-b border-brand-black-100 focus:outline-none focus:border-brand-orange"
                        placeholder="<?php echo esc_attr(pll__('Your email address')); ?>">
                    <button
                        class="absolute right-0 transition-colors bottom-2 text-brand-black-500 hover:text-brand-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rotate-45" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Social -->
            <div class="social-column" data-aos="fade-up" data-aos-delay="300">
                <h3 class="text-brand-black-500 text-base uppercase font-bold tracking-[0.2em] mb-6">
                    <?php pll_e('Follow Us'); ?>
                </h3>
                <div class="flex gap-4">
                    <?php if ($footer_socials): ?>
                        <?php foreach ($footer_socials as $social): ?>
                            <a href="<?php echo esc_url($social['url']); ?>" target="_blank"
                                class="flex items-center justify-center w-10 h-10 text-white transition-all rounded-full bg-brand-black-400 hover:bg-brand-blue">
                                <span class="sr-only"><?php echo esc_html($social['platform']); ?></span>
                                <?php
                                $platform = strtolower(trim($social['platform']));
                                if ($platform == 'facebook')
                                    echo '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg>';
                                elseif ($platform == 'instagram')
                                    echo '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"></path></svg>';
                                elseif ($platform == 'youtube')
                                    echo '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"></path></svg>';
                                elseif ($platform == 'linkedin')
                                    echo '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path><circle cx="4" cy="4" r="2"></circle></svg>';
                                else
                                    echo '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><path d="M3 12h18"></path><path d="M12 3a15 15 0 0 1 0 18 15 15 0 0 1 0-18z"></path></svg>';
                                ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Brand Logos -->
        <div class="pt-10 border-brand-black-100">
            <?php
            $brand_logos = get_field('footer_brand_logos', 'option');
            if ($brand_logos):
                ?>
                <div
                    class="grid items-center w-full grid-cols-2 gap-8 md:grid-cols-3 lg:flex lg:flex-nowrap justify-items-center lg:justify-between lg:gap-4">
                    <?php foreach ($brand_logos as $logo):
                        // Repeater row (image + link); fall back to plain URL for legacy gallery data.
                        $logo_url = is_array($logo) ? (isset($logo['image']) ? $logo['image'] : '') : $logo;
                        $logo_link = is_array($logo) && !empty($logo['link']) ? $logo['link'] : '';
                        if (!$logo_url) continue;
                        $logo_box_class = 'text-center h-16 lg:h-32 w-full flex items-center justify-center lg:flex-1 opacity-50 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-500 cursor-pointer';
                        ?>
                        <?php if ($logo_link): ?>
                            <a href="<?php echo esc_url($logo_link); ?>" target="_blank" rel="noopener"
                                class="<?php echo $logo_box_class; ?>">
                                <img src="<?php echo esc_url($logo_url); ?>" alt="Brand Logo"
                                    class="max-h-full max-w-[80%] lg:max-w-full w-auto object-contain">
                            </a>
                        <?php else: ?>
                            <div class="<?php echo $logo_box_class; ?>">
                                <img src="<?php echo esc_url($logo_url); ?>" alt="Brand Logo"
                                    class="max-h-full max-w-[80%] lg:max-w-full w-auto object-contain">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div
                    class="grid items-center w-full grid-cols-2 transition-all duration-500 md:grid-cols-3 lg:flex lg:flex-nowrap justify-items-center lg:justify-between gap-y-10 gap-x-4 lg:gap-18 opacity-40 grayscale hover:grayscale-0 text-brand-black-800">
                    <div class="text-center"><span class="text-[14px] lg:text-lg  tracking-tighter">fusionresorts</span>
                    </div>
                    <div class="text-center"><span class="text-[14px] lg:text-lg  tracking-tighter">fusionoriginals</span>
                    </div>
                    <div class="text-center"><span
                            class="text-[14px] lg:text-lg  tracking-tighter italic">fusion</span><br><span
                            class="text-[6px] lg:text-[8px] uppercase tracking-widest">collection</span></div>
                    <div class="text-center"><span class="text-[14px] lg:text-lg  tracking-tighter">fusionsuites</span>
                    </div>
                    <div class="text-center lg:border-l lg:border-brand-black-300 lg:pl-4"><span
                            class="text-[14px] lg:text-lg  tracking-widest">HIIVE</span></div>
                    <div class="text-center lg:pl-4"><span class="text-[14px] lg:text-lg  tracking-[0.4em]">GLOW</span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <div class="py-6 border-t border-b border-brand-black-100">
        <div class="container px-6 mx-auto">
            <ul
                class="flex flex-wrap lg:flex-nowrap justify-center lg:justify-between items-center gap-x-4 lg:gap-x-3 gap-y-4 text-[14px] lg:text-[13px] uppercase tracking-widest lg:tracking-wide text-brand-black-500 text-center whitespace-nowrap">
                <?php
                $bottom_nav = get_field('footer_bottom_nav', 'option');
                if ($bottom_nav):
                    foreach ($bottom_nav as $nav_item):
                        ?>
                        <li><a href="<?php echo esc_url($nav_item['url']); ?>"
                                class="transition-colors hover:text-brand-orange"><?php echo esc_html(pll__($nav_item['label'])); ?></a>
                        </li>
                        <?php
                    endforeach;
                else:
                    ?>
                    <li><a href="#" class="transition-colors hover:text-brand-orange"><?php pll_e('Careers'); ?></a></li>
                    <li><a href="#" class="transition-colors hover:text-brand-orange"><?php pll_e('Our Story'); ?></a></li>
                    <li><a href="#" class="transition-colors hover:text-brand-orange"><?php pll_e('Contact Us'); ?></a></li>
                    <li><a href="#" class="transition-colors hover:text-brand-orange"><?php pll_e('News'); ?></a></li>
                    <li><a href="#" class="transition-colors hover:text-brand-orange"><?php pll_e('General Policy'); ?></a>
                    </li>
                    <li><a href="#" class="transition-colors hover:text-brand-orange"><?php pll_e('Privacy Policy'); ?></a>
                    </li>
                    <li><a href="#" class="transition-colors hover:text-brand-orange"><?php pll_e('Payment Policy'); ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <!-- Copyright -->
    <div class="py-8">
        <div class="container px-6 mx-auto text-center">
            <p class="text-[14px] uppercase tracking-widest text-brand-black-500">
                <?php echo wp_kses_post($footer_copyright); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
<!-- AOS Initialization & Failsafe -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to init AOS
        function initAOS() {
            if (typeof AOS !== 'undefined') {
                console.log('AOS Initializing...');
                AOS.init({
                    duration: 1000,
                    once: true,
                    offset: 50,
                    easing: 'ease-in-out-sine',
                    disable: 'mobile' // Optional: disable on mobile if it causes issues
                });
            } else {
                console.error('AOS Library not loaded yet.');
            }
        }

        // Try to init immediately
        initAOS();

        // Failsafe: If elements are still invisible after 3 seconds, force them to show
        setTimeout(function () {
            const aosElements = document.querySelectorAll('[data-aos]');
            aosElements.forEach(el => {
                if (window.getComputedStyle(el).opacity === "0") {
                    console.warn('AOS Failsafe triggered: Forcing element visibility');
                    el.style.opacity = "1";
                    el.style.transform = "none";
                    el.style.visibility = "visible";
                }
            });
        }, 3000);
    });
</script>
<!-- Header Scroll Logic moved to header.php to avoid conflicts -->

</body>

</html>