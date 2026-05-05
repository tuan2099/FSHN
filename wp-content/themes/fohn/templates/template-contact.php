<?php
/**
 * Template Name: Contact Page
 */

get_header();

// Get global theme options
$footer_address = get_field('footer_address', 'option') ?: '345 Doi Can, Ngoc Ha Ward, Ba Dinh, Hanoi City';
$footer_phone = get_field('footer_phone', 'option') ?: '+84 283 9101 000';
$footer_email = get_field('footer_email', 'option') ?: 'info@fusionhotelgroup.com';

// Contact Page Specific Fields
$contact_intro = get_field('contact_intro');
$form_shortcode = get_field('contact_form_shortcode');
$map_bg = get_field('contact_map_background'); // Image URL or ID
$logo_overlay = get_field('contact_logo_overlay'); // Image URL or ID
?>

<main id="primary" class="site-main">

    <?php get_template_part('template-parts/sections/hero'); ?>

    <section class="contact-map-section relative py-20 lg:py-32 bg-white overflow-hidden">
        
        <!-- Background Illustrative Map -->
        <?php if ($map_bg): ?>
            <div class="absolute inset-0 z-0 opacity-40 lg:opacity-100">
                <img src="<?php echo esc_url($map_bg); ?>" alt="Map Background" class="w-full h-full object-contain object-left lg:object-center">
            </div>
        <?php endif; ?>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-end">

                <!-- Form Container -->
                <div class="w-full lg:w-[500px] bg-white/80 lg:bg-transparent backdrop-blur-sm lg:backdrop-blur-none p-8 lg:p-0 rounded-3xl lg:rounded-none">
                    
                    <div class="text-center mb-12">
                        <h2 class="text-brand-blue font-serif text-3xl md:text-4xl tracking-widest uppercase mb-4 inline-block relative">
                            <?php pll_e('GET IN TOUCH'); ?>
                            <div class="w-2/3 h-1 bg-brand-orange mx-auto mt-2 rounded-full"></div>
                        </h2>
                    </div>

                    <div class="contact-form-wrapper">
                        <?php if ($form_shortcode): ?>
                            <div class="cf7-custom-styled">
                                <?php echo do_shortcode($form_shortcode); ?>
                            </div>
                        <?php else: ?>
                            <!-- Fallback Mockup Form matching the image -->
                            <div class="space-y-5">
                                <div class="relative">
                                    <label class="absolute left-6 top-4 text-xs font-medium text-brand-black-600"><?php pll_e('Name:'); ?></label>
                                    <input type="text" class="custom-input w-full pt-8 pb-3 px-6 border-2 border-slate-200 rounded-[20px] focus:border-brand-orange transition-all outline-none">
                                </div>
                                <div class="relative">
                                    <label class="absolute left-6 top-4 text-xs font-medium text-brand-black-600"><?php pll_e('Email:'); ?></label>
                                    <input type="email" class="custom-input w-full pt-8 pb-3 px-6 border-2 border-slate-200 rounded-[20px] focus:border-brand-orange transition-all outline-none">
                                </div>
                                <div class="relative">
                                    <label class="absolute left-6 top-4 text-xs font-medium text-brand-black-600"><?php pll_e('Phone:'); ?></label>
                                    <div class="flex items-center pt-8 pb-3 px-6 border-2 border-slate-200 rounded-[20px] bg-white">
                                        <span class="flex items-center gap-2 mr-2 text-sm border-r pr-3">
                                            <img src="https://flagcdn.com/w20/vn.png" width="20" alt="VN">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 9l-7 7-7-7"/></svg>
                                        </span>
                                        <input type="tel" class="w-full outline-none text-sm">
                                    </div>
                                </div>
                                <div class="relative">
                                    <label class="absolute left-6 top-4 text-xs font-medium text-brand-black-600"><?php pll_e('Write your requries:'); ?></label>
                                    <textarea rows="3" class="custom-input w-full pt-8 pb-3 px-6 border-2 border-slate-200 rounded-[20px] focus:border-brand-orange transition-all outline-none resize-none"></textarea>
                                </div>
                                
                                <div class="text-center pt-6">
                                    <button class="bg-brand-orange text-white px-16 py-3 rounded-md font-bold uppercase tracking-widest hover:bg-brand-blue transition-all shadow-lg text-sm">
                                        <?php pll_e('SEND'); ?>
                                    </button>
                                </div>
                                <p class="text-[10px] text-center text-brand-black-400 mt-4 italic">Note: Set 'contact_form_shortcode' for real CF7.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Traditional Map Section (Optional, if you still want it) -->
    <?php // get_template_part('template-parts/sections/map'); ?>

</main>

<style>
    /* Styling to match the rounded design in the image */
    .custom-input {
        background-color: #fff;
    }

    /* Scoped styling for Contact Form 7 to match the image precisely */
    .cf7-custom-styled .wpcf7-form-control-wrap {
        display: block;
        position: relative;
        margin-bottom: 1.25rem;
    }
    
    .cf7-custom-styled input:not([type="submit"]),
    .cf7-custom-styled textarea {
        width: 100% !important;
        background-color: #fff !important;
        border: 2px solid #E2E8F0 !important;
        border-radius: 20px !important;
        padding: 1.5rem 1.5rem 0.5rem 1.5rem !important;
        font-size: 0.875rem !important;
        transition: all 0.3s !important;
        outline: none !important;
    }

    .cf7-custom-styled input:focus,
    .cf7-custom-styled textarea:focus {
        border-color: #FDB078 !important;
    }

    /* Centered Submit Button */
    .cf7-custom-styled .wpcf7-form {
        display: flex;
        flex-direction: column;
    }

    .cf7-custom-styled .wpcf7-submit {
        align-self: center;
        background-color: #FDB078 !important;
        color: #fff !important;
        padding: 0.75rem 4rem !important;
        border-radius: 6px !important;
        font-size: 0.875rem !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.2em !important;
        border: none !important;
        cursor: pointer !important;
        transition: all 0.3s !important;
        margin-top: 1.5rem !important;
        box-shadow: 0 4px 14px 0 rgba(253, 176, 120, 0.39) !important;
    }

    .cf7-custom-styled .wpcf7-submit:hover {
        background-color: #002D52 !important;
        transform: translateY(-2px);
    }

    /* Label overlay logic if using standard CF7 labels */
    .cf7-custom-styled label {
        display: block;
        margin-bottom: -1.2rem;
        position: relative;
        z-index: 5;
        padding-left: 1.5rem;
        font-size: 11px;
        font-weight: 600;
        color: #64748b;
        text-transform: none;
    }

    .cf7-custom-styled br { display: none; }
</style>

<?php
get_footer();
