<?php
/**
 * The template for displaying the footer
 */

// Footer Options
$loyalty_title = get_field('footer_loyalty_title', 'option') ?: 'fusionlife';
$loyalty_desc = get_field('footer_loyalty_desc', 'option') ?: 'Join our loyalty program and book direct to take advantage of all our rewards and benefits.';
$loyalty_btn_text = get_field('footer_loyalty_btn_text', 'option') ?: 'Join Now';
$loyalty_btn_link = get_field('footer_loyalty_btn_link', 'option') ?: '#';

$footer_logo = get_field('footer_logo', 'option');
$footer_desc = get_field('footer_description', 'option') ?: 'LÈGACY - A FUSION ORIGINAL HA NOI';
$footer_address = get_field('footer_address', 'option') ?: '345 Doi Can, Ngoc Ha Ward, Ba Dinh, Hanoi City';
$footer_phone = get_field('footer_phone', 'option') ?: '+84 283 9101 000';
$footer_email = get_field('footer_email', 'option') ?: 'info@fusionhotelgroup.com';
$footer_socials = get_field('footer_socials', 'option');
$footer_copyright = get_field('footer_copyright', 'option') ?: 'Fusion Hotel Group &copy; ' . date('Y');
?>

<footer id="colophon" class="site-footer bg-white pt-0">
    <!-- Top Dark Bar -->
    <div class="bg-brand-blue py-10 lg:py-15">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="text-white max-w-2xl">
                <h2 class="text-4xl lg:text-5xl font-bold mb-4 tracking-tighter">
                    <?php echo esc_html($loyalty_title); ?>
                </h2>
                <p class="text-brand-black-100/80 text-sm md:text-base font-medium">
                    <?php echo esc_html($loyalty_desc); ?>
                </p>
            </div>
            <div>
                <a href="<?php echo esc_url($loyalty_btn_link); ?>"
                    class="bg-white text-brand-blue px-10 py-3 rounded-full font-bold text-sm uppercase tracking-wide hover:bg-brand-orange hover:text-white transition-all shadow-lg active:scale-95">
                    <?php echo esc_html($loyalty_btn_text); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Footer Info -->
    <div class="container mx-auto px-6 pt-15">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 lg:gap-18">
            <!-- Group Info -->
            <div class="info-column">
                <div class="mb-6">
                    <?php if ($footer_logo): ?>
                        <img src="<?php echo esc_url($footer_logo); ?>" alt="Footer Logo" class="h-12 w-auto mb-4">
                    <?php endif; ?>
                    <h3 class="text-brand-black-500 text-[10px] uppercase font-bold tracking-[0.2em]">
                        <?php echo esc_html($footer_desc); ?>
                    </h3>
                </div>
                <div class="text-brand-black-700 text-sm leading-relaxed space-y-4">
                    <p><?php echo nl2br(esc_html($footer_address)); ?></p>
                    <p>
                        T. <?php echo esc_html($footer_phone); ?><br>
                        E. <?php echo esc_html($footer_email); ?>
                    </p>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="newsletter-column">
                <h3 class="text-brand-black-500 text-[10px] uppercase font-bold tracking-[0.2em] mb-6"><?php pll_e('Sign up for Newsletter'); ?></h3>
                <div class="relative max-w-sm">
                    <input type="email"
                        class="w-full border-0 border-b border-brand-black-300 py-2 pr-10 focus:ring-0 focus:border-brand-blue text-sm transition-all bg-transparent"
                        placeholder="<?php echo esc_attr(pll__('Your email address')); ?>">
                    <button
                        class="absolute right-0 bottom-2 text-brand-black-500 hover:text-brand-blue transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Social -->
            <div class="social-column">
                <h3 class="text-brand-black-500 text-[10px] uppercase font-bold tracking-[0.2em] mb-6"><?php pll_e('Follow Us'); ?></h3>
                <div class="flex gap-4">
                    <?php if ($footer_socials): ?>
                        <?php foreach ($footer_socials as $social): ?>
                            <a href="<?php echo esc_url($social['url']); ?>" target="_blank"
                                class="w-10 h-10 rounded-full bg-brand-black-400 flex items-center justify-center text-white hover:bg-brand-blue transition-all">
                                <span class="sr-only"><?php echo esc_html($social['platform']); ?></span>
                                <?php
                                $platform = $social['platform'];
                                if ($platform == 'facebook')
                                    echo '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg>';
                                elseif ($platform == 'instagram')
                                    echo '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>';
                                elseif ($platform == 'youtube')
                                    echo '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 00-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 00-1.94 2A29 29 0 001 11.75a29 29 0 00.46 5.33 2.78 2.78 0 001.94 2c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 001.94-2 29 29 0 00.46-5.33 29 29 0 00-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>';
                                elseif ($platform == 'linkedin')
                                    echo '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path><circle cx="4" cy="4" r="2"></circle></svg>';
                                ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Brand Logos -->
        <div class="mt-18 pt-10 border-t border-brand-black-100">
            <?php
            $brand_logos = get_field('footer_brand_logos', 'option');
            if ($brand_logos):
                ?>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:flex lg:flex-nowrap justify-items-center lg:justify-between items-center gap-8 lg:gap-4 w-full">
                    <?php foreach ($brand_logos as $logo_url): ?>
                        <div class="text-center h-16 lg:h-32 w-full flex items-center justify-center lg:flex-1 opacity-50 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-500 cursor-pointer">
                            <img src="<?php echo esc_url($logo_url); ?>" alt="Brand Logo"
                                class="max-h-full max-w-[80%] lg:max-w-full w-auto object-contain">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:flex lg:flex-nowrap justify-items-center lg:justify-between items-center gap-y-10 gap-x-4 lg:gap-18 opacity-40 grayscale hover:grayscale-0 transition-all duration-500 text-brand-black-800 w-full">
                    <div class="text-center"><span class="text-[12px] lg:text-lg font-bold tracking-tighter">fusionresorts</span></div>
                    <div class="text-center"><span class="text-[12px] lg:text-lg font-bold tracking-tighter">fusionoriginals</span></div>
                    <div class="text-center"><span class="text-[12px] lg:text-lg font-bold tracking-tighter italic">fusion</span><br><span
                            class="text-[6px] lg:text-[8px] uppercase tracking-widest">collection</span></div>
                    <div class="text-center"><span class="text-[12px] lg:text-lg font-bold tracking-tighter">fusionsuites</span></div>
                    <div class="text-center lg:border-l lg:border-brand-black-300 lg:pl-4"><span
                            class="text-[12px] lg:text-lg font-bold tracking-widest">HIIVE</span></div>
                    <div class="text-center lg:pl-4"><span class="text-[12px] lg:text-lg font-bold tracking-[0.4em]">GLOW</span></div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <div class="border-t border-b border-brand-black-100 py-6">
        <div class="container mx-auto px-6">
            <ul class="flex flex-wrap justify-center lg:justify-between items-center gap-x-12 gap-y-6 text-[10px] font-bold uppercase tracking-widest text-brand-black-700 text-center">
                <?php 
                $bottom_nav = get_field('footer_bottom_nav', 'option');
                if ($bottom_nav): 
                    foreach ($bottom_nav as $nav_item):
                ?>
                    <li><a href="<?php echo esc_url($nav_item['url']); ?>" class="hover:text-brand-orange transition-colors"><?php echo esc_html($nav_item['label']); ?></a></li>
                <?php 
                    endforeach;
                else: 
                ?>
                    <li><a href="#" class="hover:text-brand-orange transition-colors"><?php pll_e('Careers'); ?></a></li>
                    <li><a href="#" class="hover:text-brand-orange transition-colors"><?php pll_e('Our Story'); ?></a></li>
                    <li><a href="#" class="hover:text-brand-orange transition-colors"><?php pll_e('Contact Us'); ?></a></li>
                    <li><a href="#" class="hover:text-brand-orange transition-colors"><?php pll_e('News'); ?></a></li>
                    <li><a href="#" class="hover:text-brand-orange transition-colors"><?php pll_e('General Policy'); ?></a></li>
                    <li><a href="#" class="hover:text-brand-orange transition-colors"><?php pll_e('Privacy Policy'); ?></a></li>
                    <li><a href="#" class="hover:text-brand-orange transition-colors"><?php pll_e('Payment Policy'); ?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <!-- Copyright -->
    <div class="py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="text-[10px] font-bold uppercase tracking-widest text-brand-black-500">
                <?php echo wp_kses_post($footer_copyright); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
<!-- Logo Switcher & Header Scroll Handler -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const masthead = document.getElementById('masthead');
    const logoImg = masthead ? masthead.querySelector('.site-logo img') : null;
    const toggleBtn = masthead ? masthead.querySelector('.menu-toggle') : null;
    
    if (masthead && logoImg) {
        // Cache image sources
        const whiteLogo = '<?php echo get_template_directory_uri(); ?>/assets/images/Lègacy Logo_white 2.png';
        const scrollLogo = '<?php echo get_template_directory_uri(); ?>/assets/images/LG_scroll.png';
        
        function updateHeaderState() {
            const container = masthead.querySelector('.container');
            if (window.scrollY > 50) {
                masthead.classList.add('bg-white', 'shadow-md', 'py-4');
                masthead.classList.remove('py-6', 'lg:py-8');
                logoImg.src = scrollLogo;
                
                // Make logo smaller when scrolled
                logoImg.classList.add('h-10', 'md:h-16');
                logoImg.classList.remove('h-12', 'md:h-28');
                
                // Align items: center when scrolled
                if (container) {
                    container.classList.add('items-center');
                    container.classList.remove('items-start');
                }

                if (toggleBtn) {
                    toggleBtn.classList.remove('text-white');
                    toggleBtn.classList.add('text-brand-blue');
                    toggleBtn.style.color = '#2B3C54';
                }
            } else {
                masthead.classList.remove('bg-white', 'shadow-md', 'py-4');
                masthead.classList.add('py-6', 'lg:py-8');
                logoImg.src = whiteLogo;
                
                // Revert to original logo size
                logoImg.classList.add('h-12', 'md:h-28');
                logoImg.classList.remove('h-10', 'md:h-16');
                
                // Align items: start when at the top
                if (container) {
                    container.classList.add('items-start');
                    container.classList.remove('items-center');
                }

                if (toggleBtn) {
                    toggleBtn.style.color = '';
                    toggleBtn.classList.add('text-white');
                    toggleBtn.classList.remove('text-brand-blue');
                }
            }
        }
        
        window.addEventListener('scroll', updateHeaderState);
        updateHeaderState(); // Apply state immediately
    }
});
</script>

</body>

</html>