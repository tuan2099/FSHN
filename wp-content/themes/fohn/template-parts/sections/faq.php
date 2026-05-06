<?php
/**
 * Section: FAQ
 */

// ACF Fields (Now from the page, not the block)
// We'll use get_field for top-level fields on the page.
$sub_heading = get_field('faq_sub_heading') ?: 'EXPLORE THIS AREA';
$main_heading = get_field('faq_main_heading') ?: 'FREQUENTLY ASKED QUESTIONS';
$faqs = get_field('faq_items');

?>
<section class="faq-section pb-24 bg-white overflow-hidden">
    <div class="container mx-auto px-6">
        <!-- Subheading -->
        <div class="flex justify-center mb-18">
            <div class="text-center">
                <span
                    class=" font-serif text-[16px] text-brand-black-500 uppercase font-bold tracking-[0.3em] block mb-2">
                    <?php echo esc_html($sub_heading); ?>
                </span>
                <div class="w-1/2 h-0.5 bg-brand-orange mx-auto"></div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-12 lg:gap-24">
            <!-- Left Side: Main Heading -->
            <div class="lg:w-1/3" data-aos="fade-right">
                <h2
                    class=" font-serif text-2xl lg:text-3xl font-bold text-brand-blue uppercase leading-tight tracking-tighter">
                    <?php echo wp_kses_post($main_heading); ?>
                </h2>
            </div>

            <!-- Right Side: Accordion -->
            <div class="lg:w-2/3" data-aos="fade-left" data-aos-delay="200">
                <div class="faq-accordion space-y-0">
                    <?php if ($faqs): ?>
                        <?php foreach ($faqs as $index => $faq): ?>
                            <div class="faq-item border-b border-brand-black-300">
                                <button class="faq-trigger w-full py-6 flex justify-between items-center text-left group">
                                    <span
                                        class="text-sm font-bold text-brand-black-800 uppercase tracking-widest group-hover:text-brand-orange transition-colors">
                                        <?php echo esc_html($faq['question']); ?>
                                    </span>
                                    <span class="faq-icon transform transition-transform duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-blue" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="faq-content hidden overflow-hidden transition-all duration-500">
                                    <div class="pb-8 text-brand-black-600 text-sm leading-relaxed">
                                        <?php echo wp_kses_post($faq['answer']); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include standard JS for accordions in the common JS file or here if needed -->
<script>
    (function () {
        const initFAQ = () => {
            const triggers = document.querySelectorAll('.faq-trigger');
            triggers.forEach(trigger => {
                trigger.addEventListener('click', function () {
                    const item = this.parentElement;
                    const content = item.querySelector('.faq-content');
                    const icon = this.querySelector('.faq-icon');
                    content.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');

                    triggers.forEach(otherTrigger => {
                        if (otherTrigger !== this) {
                            otherTrigger.parentElement.querySelector('.faq-content').classList.add('hidden');
                            otherTrigger.querySelector('.faq-icon').classList.remove('rotate-180');
                        }
                    });
                });
            });
        };

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFAQ);
        } else {
            initFAQ();
        }
    })();
</script>