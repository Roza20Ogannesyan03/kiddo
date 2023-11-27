<?php get_header(); ?>
<? $lang = pll_current_language(); ?>

<section id="intro" class="bg-linear">
    <div class="container-lg">
        <div class="swiper main-swiper pt-5">
            <div class="swiper-wrapper">
                <?php
                $slider = get_field('slider');
                foreach ($slider as $slide) {
                ?>

                    <div class="swiper-slide">
                        <div class="banner-item d-flex text-center align-items-center">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="image-holder mb-lg-0 mb-md-2">
                                        <? if ($slide['slide_img']) { ?>
                                            <img src="<?= $slide['slide_img']; ?>" alt="product" class="img-fluid rounded-4 banner-image" />
                                        <? } ?>

                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-11 col-sm-10 mx-auto">
                                    <div class="banner-content w-100 h-100 position-relative bg-light border rounded-4 mx-auto d-flex align-items-center">
                                        <div class="col-lg-9 col-md-6 col-sm-8 text-center mx-auto py-lg-6">
                                            <h1 class="display-2">
                                                <?= $slide['slide_title']; ?>
                                                <span class="display-4 text-secondary d-block"><?= $slide['slide_subtitle']; ?></span>
                                            </h1>
                                            <p>
                                                <?= $slide['slide_text']; ?>
                                            </p>
                                            <div class="btn-center mt-4">
                                                <a href="/products/" class="btn btn-primary btn-md text-uppercase rounded-0"><?php echo $lang === 'ru' ? 'Делайте покупки прямо сейчас' : 'Shop Now'; ?></a>
                                            </div>
                                        </div>
                                        <div class="bg-pattern-overlay position-absolute">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pattern-overlay1.png" alt="pattern" class="img-fluid pattern-overlay" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="swiper-arrow-wrap position-absolute d-flex align-items-center">
                <div class="swiper-arrow swiper-arrow-prev position-absolute bg-gray-1 p-3">
                    <svg class="chevron-left" width="25" height="25">
                        <use xlink:href="#chevron-left" />
                    </svg>
                </div>
                <div class="swiper-arrow swiper-arrow-next position-absolute bg-gray-1 p-3">
                    <svg class="chevron-right" width="25" height="25">
                        <use xlink:href="#chevron-right" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="category" class="my-lg-12 py-lg-7 mb-lg-0 position-relative bg-light">
    <div class="cloud-overlay position-absolute overflow-x-hidden w-100">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cloud-pattern-overlay.png" alt="icon overlay" />
    </div>
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="display-header text-center position-relative">
                <h2 class="display-2"><?php echo $lang === 'ru' ? 'Категории' : 'Category'; ?></h2>
                <div class="icon-overlay position-absolute">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star-icon-overlay.png" alt="icon overlay" />
                </div>
            </div>
        </div>
        <div class="row">


            <?
            $terms =  get_terms('toys', ['hide_empty' => false]);


            foreach ($terms as $term) {
            ?>

                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="image-holder position-relative">
                        <img src="<? the_field('catalog_img', $term); ?>" alt="icon overlay" />
                        <div class="btn-wrap position-absolute d-flex align-items-center justify-content-center">
                            <a href="/toys/<?= $term->slug;  ?>/" class="btn btn-md btn-light text-uppercase rounded-0"><?= $term->name ?></a>
                        </div>
                    </div>
                </div>
            <? }

            ?>


        </div>
    </div>
</section>


<div id="scroll-top-btn" class="bg-light rounded-pill text-primary position-fixed">
    <svg class="teddybear" width="50" height="50">
        <use xlink:href="#teddybear"></use>
    </svg>
</div>
<section id="featured-product" class="py-lg-6 bg-linear position-relative">
    <div class="container-lg">
        <div class="display-header text-center position-relative">
            <div class="icon-overlay">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star-icon-overlay.png" alt="icon overlay" />
            </div>
            <h2 class="display-2 mt-0"><?php echo $lang === 'ru' ? 'Рекомендуемые продукты' : 'Featured Products'; ?></h2>
        </div>
        <div class="swiper product-swiper">
            <div class="swiper-wrapper">
                <?php
                $args = array(
                    'post_type' => 'products',
                    'posts_per_page'    => -1,
                    'meta_query' => array(
                        array(
                            'key' => 'toys_main', // name of custom field
                            'value' => '"main"', // matches exactly "red"
                            'compare' => 'LIKE'
                        )
                    )
                );

                $post_query = new WP_Query($args);

                if (($post_query->have_posts())) {

                    while ($post_query->have_posts()) {
                        $post_query->the_post();
                        $post_query->post;
                ?>


                        <div class="swiper-slide">

                            <div class="product-item product-item_main">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="image-holder text-center p-3 mb-4 border rounded-4">
                                        <?php the_post_thumbnail("large", array("alt" => get_the_title(), "class" => "img-fluid")); ?>
                                    </div>
                                </a>
                                <div class="product-info ps-2">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="m-0">
                                            <a href="single-product.html" class="text-secondary"><?php the_title(); ?></a>
                                        </h3>
                                    </a>
                                    <div class="product-price text-primary"><?= number_format((float)get_field('new_price'), 2, ',', ' '); ?><?php echo $lang === 'ru' ? 'KZT' : 'USD'; ?></div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-outline-gray text-capitalize rounded-pill mt-4 btn-sm buy" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart"><?php echo $lang === 'ru' ? 'Купить' : 'Buy'; ?>
                                        <svg class="cart" width="18" height="18">
                                            <use xlink:href="#cart"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>



                <? }
                    wp_reset_postdata();
                }
                ?>


            </div>
        </div>
        <div class="arrow-wrap">
            <div class="swiper-arrow chevron-arrow-left position-absolute d-flex align-items-center border bg-light rounded-pill justify-content-center p-3">
                <svg class="chevron-left" width="25" height="25">
                    <use xlink:href="#chevron-left"></use>
                </svg>
            </div>
            <div class="swiper-arrow chevron-arrow-right position-absolute d-flex align-items-center border bg-light rounded-pill justify-content-center p-3">
                <svg class="chevron-right" width="25" height="25">
                    <use xlink:href="#chevron-right"></use>
                </svg>
            </div>
        </div>
    </div>
</section>



<section id="new-arrival" class="py-lg-6 my-lg-8 mb-lg-0 bg-light position-relative">
    <div class="cloud-overlay position-absolute overflow-x-hidden w-100">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cloud-pattern-overlay.png" alt="icon overlay" />
    </div>
    <div class="container-lg">
        <div class="display-header text-center position-relative">
            <h2 class="display-2"><?php echo $lang === 'ru' ? 'Новое поступление' : 'Newly Arrived'; ?></h2>
            <div class="icon-overlay position-absolute">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star-icon-overlay.png" alt="icon overlay" />
            </div>
        </div>
        <div class="swiper product-swiper">
            <div class="swiper-wrapper">

                <?php
                $args = array(
                    'post_type' => 'products',
                    'posts_per_page'    => -1,
                    'meta_query' => array(
                        array(
                            'key' => 'toys_main', // name of custom field
                            'value' => '"new"', // matches exactly "red"
                            'compare' => 'LIKE'
                        )
                    )
                );

                $post_query = new WP_Query($args);

                if (($post_query->have_posts())) {

                    while ($post_query->have_posts()) {
                        $post_query->the_post();
                        $post_query->post;
                ?>

                        <div class="swiper-slide">
                            <div class="product-item product-item_main">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="image-holder text-center p-3 mb-4 border rounded-4">
                                        <?php the_post_thumbnail("large", array("alt" => get_the_title(), "class" => "img-fluid")); ?>
                                    </div>
                                </a>
                                <div class="product-info ps-2">

                                    <h3 class="m-0">
                                        <a href="<?php the_permalink(); ?>" class="text-secondary"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="product-price text-primary"><?= number_format((float)get_field('new_price'), 2, ',', ' '); ?><?php echo $lang === 'ru' ? 'KZT' : 'USD'; ?></div>
                                    <a href="cart.html" class="btn btn-outline-gray text-capitalize rounded-pill mt-4 btn-sm buy" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart"><?php echo $lang === 'ru' ? 'Купить' : 'Buy'; ?>
                                        <svg class="cart" width="18" height="18">
                                            <use xlink:href="#cart"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>



                <? }
                    wp_reset_postdata();
                }
                ?>

            </div>
        </div>
        <div class="arrow-wrap">
            <div class="swiper-arrow chevron-arrow-left position-absolute d-flex align-items-center border rounded-pill justify-content-center p-3">
                <svg class="chevron-left" width="25" height="25">
                    <use xlink:href="#chevron-left"></use>
                </svg>
            </div>
            <div class="swiper-arrow chevron-arrow-right position-absolute d-flex align-items-center border rounded-pill justify-content-center p-3">
                <svg class="chevron-right" width="25" height="25">
                    <use xlink:href="#chevron-right"></use>
                </svg>
            </div>
        </div>
    </div>
</section>


<section id="collection" style="
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/bg-pattern.png');
        background-repeat: no-repeat;
        background-position: center;
        width: 100%;
        height: 810px;" class="d-flex align-items-center bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-10 text-center">
                <div class="text-content">
                    <div class="display-header">
                        <h2><?php echo $lang === 'ru' ? 'Коллекции милых игрушек' : 'Cute Toys Collections'; ?></h2>
                        <p class="mx-auto">
                            <?php echo $lang === 'ru' ? 'Ищете мягкую игрушку, которая принесет радость и уют как
детям, так и взрослым? Не заглядывайте дальше нашей коллекции игрушек
это здорово.' : 'Looking for a soft toy that will bring joy and comfort to both
                            kids and adults? Look no further than our collection of toys
                            is great.'; ?>

                        </p>
                    </div>
                    <a href="/products/" class="btn btn-primary btn-md text-uppercase mt-4"><?php echo $lang === 'ru' ? 'Делайте покупки прямо сейчас' : 'Shop Now'; ?></a>
                </div>
            </div>
        </div>
    </div>
</section>




<? get_footer(); ?>