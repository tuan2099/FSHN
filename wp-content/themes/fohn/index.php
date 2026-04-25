<?php get_header(); ?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

        <div class="container mx-auto px-6 py-12">
            <header class="page-header mb-12 border-l-8 border-brand-orange pl-6">
                <h1 class="text-4xl font-extrabold text-brand-black-900 mb-2">
                    <?php if ( is_home() && ! is_front_page() ) : ?>
                        <?php single_post_title(); ?>
                    <?php else : ?>
                        Blog & News
                    <?php endif; ?>
                </h1>
                <p class="text-brand-black-500 font-medium italic">Khám phá những xu hướng công nghệ mới nhất cùng FOHN.</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="aspect-video overflow-hidden">
                                <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-700' ) ); ?>
                            </div>
                        <?php else: ?>
                            <div class="aspect-video bg-gradient-to-br from-brand-black-100 to-brand-black-300 flex items-center justify-center">
                                <span class="text-brand-black-400 font-bold text-lg opacity-50 uppercase tracking-widest">FOHN Image</span>
                            </div>
                        <?php endif; ?>

                        <div class="p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="bg-brand-black-100 text-brand-blue text-xs font-bold px-3 py-1 rounded-full uppercase tracking-tighter">
                                    <?php the_category(', '); ?>
                                </span>
                                <time class="text-brand-black-400 text-xs font-medium">
                                    <?php echo get_the_date(); ?>
                                </time>
                            </div>
                            
                            <h2 class="text-2xl font-bold mb-4 line-clamp-2 leading-snug">
                                <a href="<?php the_permalink(); ?>" class="text-brand-black-900 hover:text-brand-orange transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            
                            <div class="text-brand-black-700 text-sm mb-6 line-clamp-3 leading-relaxed">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-brand-blue font-bold text-sm tracking-wide hover:gap-4 transition-all hover:text-brand-orange">
                                Xem chi tiết 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <div class="pagination mt-20 flex justify-center">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '<span class="px-4 py-2 border rounded-full hover:bg-brand-blue hover:text-white transition-all">Trước</span>',
                    'next_text' => '<span class="px-4 py-2 border rounded-full hover:bg-brand-blue hover:text-white transition-all">Sau</span>',
                ) );
                ?>
            </div>
        </div>

    <?php else : ?>
        <div class="container mx-auto px-6 py-24 text-center">
            <h2 class="text-3xl font-bold text-slate-800 mb-4">Không tìm thấy nội dung</h2>
            <p class="text-slate-500 mb-8">Rất tiếc, dường như nội dung bạn đang tìm kiếm không tồn tại.</p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="bg-indigo-600 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-indigo-200 transition-all">
                Quay về trang chủ
            </a>
        </div>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
