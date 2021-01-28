<?php 
    get_header(); 
    get_template_part( 'partials/streamers/1-1-cta' );    
?>

    <section id="content" class="flex flex-col p-2 md:p-0 w-full max-w-full pt-12 pb-16 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl">
        <h2 class="mb-6 text-xl font-semibold leading-none uppercase sm:text-2xl md:text-3xl lg:text-6xl font-amiri w-full text-center mt-6"><?php the_title(); ?><h2><!-- Overskrift -->
        <p class=""><?php the_content(); ?></p>
        <?php 
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'event',
            'meta_key' => 'dato',
            'orderby' => 'meta_value',
            'order' => 'ASC',
        );
        $parent_query = new WP_Query($args);
        if ($parent_query->have_posts())
        {
        ?>
        <div class="flex w-full shadow-sm mt-12"
            x-data="{swiper: null}"
            x-init="swiper = new Swiper($refs.container, {
                loop: false,
                slidesPerView: 1,
                spaceBetween: 0,
                breakpoints: {
                    641: {
                    slidesPerView: 2,
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
            <div class="hidden md:flex flex-col items-center justify-start w-1/4">
                <h3 class="w-full mb-2 font-mono font-semibold leading-tight tracking-tight uppercase sm:text-lg md:text-xl lg:text-3xl">Arrangementer</h3>
                <div class="flex justify-start w-full">
                    <i id="prev" x-ref="prev" class="p-3 mx-4 text-4xl bg-secondary rounded-full cursor-pointer hover:text-white hover:bg-secondary-hover fa fa-arrow-left focus:outline-none"></i>
                    <i id="next" x-ref="next" class="p-3 mx-4 text-4xl bg-secondary rounded-full cursor-pointer hover:text-white hover:bg-secondary-hover fa fa-arrow-right focus:outline-none"></i>
                </div>
            </div><!-- Swiper.js -->
            <div class="w-full md:w-3/4 swiper-container" x-ref="container">
                <i x-ref="prev"
                    x-on:click="swiper.slidePrev()" 
                   class="absolute z-10 top-1/3 -left-2 md:hidden p-3 mx-4 text-4xl bg-secondary rounded-full cursor-pointer hover:text-white hover:bg-secondary-hover fa fa-arrow-left focus:outline-none"></i>
                <div class="w-full swiper-wrapper">
                    <?php
                        while($parent_query->have_posts()) {
                            $parent_query->the_post();
                    ?>
                    <!-- The Slide -->
                    <div class="flex flex-col px-4 swiper-slide overflow-hidden">
                        <a href="<?php the_permalink() ?>">
                            <div class="w-full px-4 mt-4 mb-6 h-60 card-small">
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
                <i x-on:click="swiper.slideNext()" x-ref="next" class="absolute z-10 top-1/3 -right-2 md:hidden p-3 mx-4 text-4xl bg-secondary rounded-full cursor-pointer hover:text-white hover:bg-secondary-hover fa fa-arrow-right focus:outline-none"></i>
            </div>
        </div>
        <?php
        } else {
            echo 'no posts';
        }
        wp_reset_postdata();
        ?>
    </section>

<script>
    var hand = document.getElementById('hand');
    var content = document.getElementById('content');
    hand.addEventListener('click', () => {
        content.scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>

<?php get_footer(); ?>