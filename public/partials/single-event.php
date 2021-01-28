<?php 
$query = new WP_Query(array(
    'post_type' => 'page',
    'name' => 'events',
    'posts_per_page' => 1,
));
    while($query->have_posts()){
    $query->the_post();
    get_header();

    } 
wp_reset_postdata();
?>
    
    <section class="flex w-full max-w-full pt-12 pb-16 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl">
        <div class="card card-parent">
            <div class="card-image">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
            </div>
            <div class="card-content relative overflow-hidden">
                <?php if( has_category('Udsolgt')) { ?>
                    <div class="corner-ribbon top-left bg-yellow-300 text-white font-bold shadow-lg">Udsolgt</div>
                <?php } ?>
                <a href="javascript:history.back()" class="card-back">
                    <i class="fas fa-arrow-left fa-lg fa-fw"></i>
                    <span class="ml-2 text-lg font-bold tracking-tight uppercase">Tilbage</span>
                </a>
                <div class="card-header">
                <h2>
                    <?php the_title(); ?>
                </h2>
                </div>
                <p class="h-full">
                    <?php the_content(); ?> 
                </p>
                <hr class="mt-6 mb-2">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex flex-col items-center w-1/3">
                        <i class="fas fa-wallet fa-2x fa-fw"></i>
                        <h6 class="text-base card-header-small">Pris: <?php the_field('samlet_pris'); ?>,-</h6>
                    </div>
                    <div class="flex flex-col items-center w-1/3">
                        <i class="far fa-calendar-alt fa-2x fa-fw"></i>
                        <h6 class="card-header-small"><?php the_field('dato'); ?></h6>
                    </div>
                    <div class="flex flex-col items-center w-1/3">
                        <i class="fas fa-clock fa-2x fa-fw"></i>
                        <h6 class="card-header-small"><?php the_field('start_tidspunkt'); ?> - <?php the_field('slut_tidspunkt'); ?></h6>
                    </div>
                </div>
                <div class="flex items-start justify-end m-12">
                    <a href="<?php the_field('reserver_link') ?>" class="btn btn-secondary"><?php the_field('reserver_text') ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="flex w-full max-w-full pt-12 pb-16 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl">
        <div class="card card-parent card-mirror">
            <div class="card-image">
                <img src="<?php the_field('event_secondary_image'); ?>" />
            </div>
            <div class="card-content">                
                <div class="card-header">
                    <h2>
                        Menu 
                    </h2>
                </div>
                <p>
                <?php the_field('menu'); ?> 
                </p>
                <hr class="mt-6 mb-2">
                <div class="flex items-start justify-end m-12">
                    <a href="<?php the_field('reserver_link') ?>" class="btn btn-secondary"><?php the_field('reserver_text') ?></a>
                </div>
            </div>
        </div>
    </section>

    <section id="content" class="hidden md:flex flex-col w-full max-w-full pt-12 pb-16 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl">
        <?php  
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'event',
            'meta_key' => 'dato',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'post__not_in' => array(get_the_ID())
            
        );
        $menu = new WP_Query($args);
        if ($menu->have_posts())
        {
        ?>
        <div class="flex w-full mt-12 shadow-sm"
            x-data="{swiper: null}"
            x-init="swiper = new Swiper($refs.container, {
                loop: false,
                slidesPerView: 1,
                spaceBetween: 0,
                breakpoints: {
                    641: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    },
                    1025: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                    },
                    1281: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                    },
                },
                navigation: {
                    nextEl: '#next',
                    prevEl: '#prev',
                },
                })
                ">
            <div class="flex flex-col items-center justify-start w-1/4">
                <h3 class="w-full mb-2 font-mono font-semibold leading-tight tracking-tight uppercase sm:text-lg md:text-xl lg:text-3xl">Se også</h3>
                <div class="flex justify-start w-full">
                    <i id="prev" x-ref="prev" class="p-3 mx-4 text-4xl rounded-full cursor-pointer bg-secondary hover:text-white hover:bg-secondary-hover fa fa-arrow-left focus:outline-none"></i>
                    <i id="next" x-ref="next" class="p-3 mx-4 text-4xl rounded-full cursor-pointer bg-secondary hover:text-white hover:bg-secondary-hover fa fa-arrow-right focus:outline-none"></i>
                </div>
            </div><!-- Swiper.js -->
            <div class="w-3/4 swiper-container" x-ref="container">
                <div class="w-full swiper-wrapper">
                    <?php
                        while($menu->have_posts()) {
                            $menu->the_post();
                    ?>
                    <!-- The Slide -->
                    <div class="flex flex-col px-4 swiper-slide overflow-hidden">
                        <a href="<?php the_permalink() ?>">
                            <div class="w-full px-4 mt-4 mb-6 h-60 card-small"> <!-- card DATA fra Menuer uden parents -->            
                                <img src="<?php the_post_thumbnail_url(); ?>" 
                                        alt="<?php the_post_thumbnail_caption() ?>" 
                                        class="object-cover object-center h-full min-w-full rounded-lg shadow-md">                
                                <div class="relative pl-4 -mt-40 -mr-8">
                                    <div class="p-6 bg-white rounded-lg shadow-lg">                    
                                        <div class="mt-1">
                                            <h4 class="mb-1 text-xl font-semibold leading-tight truncate"><?php the_title(); ?></h4>                                            
                                            <p class="mb-1 text-xs italic capitalize">
                                                <?php the_field('dato'); ?><br> klokken <?php the_field('start_tidspunkt'); ?>
                                            </p>
                                            <p class="mb-1 text-xs italic">
                                                fra <?php the_field('samlet_pris'); ?>,- per person
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php if( has_category('Udsolgt')) { ?>
                                        <div class="small-ribbon top-left bg-yellow-300 text-white font-bold shadow-lg">Udsolgt</div>
                                <?php } ?>
                            </div>
                        </a>                
                    </div>
                    <!-- end slide -->
                    <?php } ?>                    
                </div>
            </div>
        </div>
        <?php
        }
        wp_reset_postdata();
        ?>
    </section> 

</main>
<?php get_footer( ); ?> 