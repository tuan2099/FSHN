<?php
/**
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero-block ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$sub_title   = get_field('sub_title') ?: 'Chào mừng đến với FOHN';
$main_title  = get_field('main_title') ?: 'Sáng Tạo Không Giới Hạn';
$description = get_field('description');
$button_text = get_field('button_text');
$button_link = get_field('button_link');
$hero_image  = get_field('hero_image');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> relative py-24 lg:py-32 overflow-hidden bg-white">
    <!-- Background Accents -->
    <div class="absolute top-0 right-0 -translate-y-1/4 translate-x-1/4 w-96 h-96 bg-brand-blue/5 rounded-full blur-3xl opacity-60"></div>
    <div class="absolute bottom-0 left-0 translate-y-1/4 -translate-x-1/4 w-96 h-96 bg-brand-orange/5 rounded-full blur-3xl opacity-60"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2">
                <span class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-widest text-brand-orange uppercase bg-brand-orange/10 rounded-full border border-brand-orange/20">
                    <?php echo esc_html($sub_title); ?>
                </span>
                
                <h1 class="text-5xl lg:text-7xl font-extrabold text-brand-blue leading-[1.1] mb-8 tracking-tight">
                    <?php echo wp_kses_post($main_title); ?>
                </h1>
                
                <?php if ($description): ?>
                    <p class="text-xl text-brand-black-700 leading-relaxed mb-10 max-w-xl">
                        <?php echo esc_html($description); ?>
                    </p>
                <?php endif; ?>

                <div class="flex flex-wrap gap-4">
                    <?php if ($button_text && $button_link): ?>
                        <a href="<?php echo esc_url($button_link); ?>" class="bg-brand-orange text-white px-8 py-4 rounded-full font-bold text-lg shadow-xl shadow-brand-orange/20 hover:bg-brand-orange/90 hover:-translate-y-1 transition-all duration-300">
                            <?php echo esc_html($button_text); ?>
                        </a>
                    <?php endif; ?>
                    
                    <a href="#features" class="px-8 py-4 rounded-full font-bold text-lg text-brand-black-800 hover:bg-brand-black-100 transition-all border border-brand-black-300">
                        Tìm hiểu thêm
                    </a>
                </div>

                <!-- Trusted By or Stats -->
                <div class="mt-12 flex items-center gap-6">
                    <div class="flex -space-x-3">
                        <img src="https://i.pravatar.cc/100?u=1" class="w-10 h-10 rounded-full border-2 border-white shadow-sm" alt="User">
                        <img src="https://i.pravatar.cc/100?u=2" class="w-10 h-10 rounded-full border-2 border-white shadow-sm" alt="User">
                        <img src="https://i.pravatar.cc/100?u=3" class="w-10 h-10 rounded-full border-2 border-white shadow-sm" alt="User">
                    </div>
                    <p class="text-sm text-brand-black-500 font-medium">
                        Tham gia cùng <span class="text-brand-orange font-bold">1,000+</span> doanh nghiệp đang phát triển.
                    </p>
                </div>
            </div>

            <div class="lg:w-1/2 relative">
                <?php if ($hero_image): ?>
                    <div class="relative z-10 rounded-4xl overflow-hidden shadow-2xl border-8 border-white group">
                        <img src="<?php echo esc_url($hero_image); ?>" alt="Hero Image" class="w-full h-auto group-hover:scale-105 transition-transform duration-1000">
                    </div>
                <?php else: ?>
                    <div class="relative z-10 bg-gradient-to-br from-brand-blue to-brand-black-900 rounded-4xl aspect-[4/3] flex items-center justify-center p-12 shadow-2xl overflow-hidden">
                        <!-- Abstract UI Mockup -->
                        <div class="bg-white/10 backdrop-blur-md rounded-2xl w-full h-full border border-white/20 flex flex-col p-6 space-y-4">
                            <div class="h-4 w-1/3 bg-white/20 rounded-full"></div>
                            <div class="h-8 w-2/3 bg-white/40 rounded-lg"></div>
                            <div class="grid grid-cols-2 gap-4 mt-auto">
                                <div class="h-24 bg-white/10 rounded-xl"></div>
                                <div class="h-24 bg-brand-orange/30 rounded-xl"></div>
                            </div>
                        </div>
                        <!-- Floating Circles -->
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-brand-orange/20 rounded-full blur-xl"></div>
                    </div>
                <?php endif; ?>
                
                <!-- Floating Card -->
                <div class="absolute -bottom-10 -left-10 bg-white p-6 rounded-3xl shadow-xl border border-brand-black-100 hidden md:block animate-bounce-slow">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-orange-100 rounded-2xl flex items-center justify-center text-brand-orange">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-brand-black-400 font-bold uppercase tracking-wider">Hiệu suất</p>
                            <p class="text-xl font-bold text-brand-black-900">+99% Tối ưu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    .animate-bounce-slow {
        animation: bounce-slow 4s ease-in-out infinite;
    }
    .rounded-4xl { border-radius: 3rem; }
</style>
