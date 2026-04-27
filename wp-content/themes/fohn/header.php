<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header id="masthead" class="site-header fixed top-0 left-0 w-full z-50 transition-all duration-500 py-6 lg:py-8">
        <div class="container mx-auto px-6 flex justify-between items-start">
            <!-- Left: Hamburger Menu -->
            <div class="header-left flex-1">
                <button
                    class="menu-toggle text-white hover:text-brand-orange transition-colors focus:outline-none group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-10 md:w-10" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h24M4 16h24" />
                    </svg>
                </button>
            </div>

            <!-- Center: Logo -->
            <div class="header-center flex-1 flex justify-center">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Lègacy Logo_white 2.png"
                        alt="<?php bloginfo('name'); ?>" class="h-12 md:h-28 w-auto">
                </a>
            </div>

            <!-- Right: Action Button -->
            <div class="header-right flex-1 flex justify-end">
                <a href="#"
                    class="bg-brand-orange text-white px-8 py-2 md:px-10 md:py-3 text-[10px] md:text-xs font-bold uppercase tracking-widest hover:bg-white hover:text-brand-blue transition-all shadow-xl">
                    BOOK A STAY
                </a>
            </div>
        </div>
    </header>

    <!-- Off-canvas Menu Overlay -->
    <div id="side-menu" class="fixed inset-0 z-[100] invisible pointer-events-none transition-all duration-500">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-brand-black-900/50 opacity-0 transition-opacity duration-500 menu-backdrop">
        </div>

        <!-- Menu Content -->
        <div
            class="absolute top-0 left-0 h-full w-full md:w-1/3 bg-white translate-x-[-100%] transition-transform duration-500 shadow-2xl p-12 lg:p-20 flex flex-col menu-content">
            <!-- Close Button -->
            <button class="menu-close absolute top-8 right-8 text-brand-blue hover:text-brand-orange transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Menu Grid -->
            <div class="flex-grow">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-12 gap-x-8 mb-20">
                    <a href="#"
                        class="text-sm font-bold text-brand-blue uppercase tracking-widest hover:text-brand-orange transition-colors">Hotels</a>
                    <a href="#"
                        class="text-sm font-bold text-brand-blue uppercase tracking-widest hover:text-brand-orange transition-colors">Dining</a>
                    <a href="#"
                        class="text-sm font-bold text-brand-blue uppercase tracking-widest hover:text-brand-orange transition-colors">Residences</a>
                    <a href="#"
                        class="text-sm font-bold text-brand-blue uppercase tracking-widest hover:text-brand-orange transition-colors">Yên
                        Spa & Wellness</a>
                    <a href="#"
                        class="text-sm font-bold text-brand-blue uppercase tracking-widest hover:text-brand-orange transition-colors">Offers</a>
                    <a href="#"
                        class="text-sm font-bold text-brand-blue uppercase tracking-widest hover:text-brand-orange transition-colors">Facilities</a>
                    <a href="#"
                        class="text-sm font-bold text-brand-blue uppercase tracking-widest hover:text-brand-orange transition-colors">Features</a>
                    <a href="#"
                        class="text-sm font-bold text-brand-blue uppercase tracking-widest hover:text-brand-orange transition-colors">Gallery</a>
                    <a href="#"
                        class="text-sm font-bold text-brand-blue uppercase tracking-widest hover:text-brand-orange transition-colors">Contact
                        Us</a>
                </div>

                <!-- Language Switcher -->
                <div class="text-sm font-bold uppercase tracking-widest flex items-center gap-2">
                    <a href="#" class="text-brand-blue">EN</a>
                    <span class="text-brand-black-200">|</span>
                    <a href="#" class="text-brand-black-300 hover:text-brand-blue transition-colors">VI</a>
                </div>
            </div>

            <!-- Footer Info -->
            <div class="pt-12 border-t border-brand-black-100">
                <h4 class="text-xs font-bold text-brand-blue uppercase tracking-widest mb-4 italic font-serif">LÈGACY -
                    A FUSION ORIGINAL HA NOI</h4>
                <p class="text-[10px] text-brand-black-400 font-medium tracking-widest">345 Doi Can, Ngoc Ha Ward, Hanoi
                    City</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sideMenu = document.getElementById('side-menu');
            const menuContent = sideMenu.querySelector('.menu-content');
            const backdrop = sideMenu.querySelector('.menu-backdrop');
            const toggleBtn = document.querySelector('.menu-toggle');
            const closeBtn = document.querySelector('.menu-close');
            const header = document.getElementById('masthead');

            // Scroll Header effect
            function handleScroll() {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            }

            window.addEventListener('scroll', handleScroll);
            handleScroll(); // Initial check

            function openMenu() {
                sideMenu.classList.remove('invisible', 'pointer-events-none');
                backdrop.classList.add('opacity-100');
                menuContent.classList.remove('translate-x-[-100%]');
                document.body.classList.add('overflow-hidden');
            }

            function closeMenu() {
                backdrop.classList.remove('opacity-100');
                menuContent.classList.add('translate-x-[-100%]');
                document.body.classList.remove('overflow-hidden');
                setTimeout(() => {
                    sideMenu.classList.add('invisible', 'pointer-events-none');
                }, 500);
            }

            toggleBtn.addEventListener('click', openMenu);
            closeBtn.addEventListener('click', closeMenu);
            backdrop.addEventListener('click', closeMenu);
        });
    </script>