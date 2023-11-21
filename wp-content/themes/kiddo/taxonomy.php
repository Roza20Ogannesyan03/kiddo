<? get_header();
$qo = get_queried_object();
?>

<ul class="breadcrumb" style="background-color: #fff;">

    <?php if (function_exists('bcn_display')) {
        bcn_display();
    } ?>
</ul>
<section id="featured-product" class="py-lg-6 bg-linear position-relative">
    <div class="container-lg">
        <div class="display-header text-center position-relative">
            <div class="icon-overlay">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star-icon-overlay.png" alt="icon overlay" />
            </div>

        </div>
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'products',
            'posts_per_page' => 5,
            'paged' => $paged,
            'tax_query'      => array(
                array(
                    'taxonomy' => 'toys',
                    'field'    => 'slug',
                    'terms'    => $qo->slug,
                ),
            ),
        );
        ?>
        <div class="products_list" id="productsResponse">
            <?
            $post_query = new WP_Query($args);

            if ($post_query->have_posts()) {

                while ($post_query->have_posts()) {
                    $post_query->the_post();
                    $post_query->post;
                    // echo '<pre>';
                    // var_dump(has_term('table', 'toys', $post));
                    // echo '</pre>';
                    //if (has_term('table', 'toys', $post)) {


            ?>

                    <div class="product-item">
                        <div>
                            <a href="<?php the_permalink(); ?>">
                                <div class="image-holder text-center p-3 mb-4 border rounded-4">
                                    <?php the_post_thumbnail("large", array("alt" => get_the_title(), "class" => "img-fluid")); ?>
                                </div>
                            </a>
                            <div class="product-info ps-2">

                                <h3 class="m-0">
                                    <a href="<?php the_permalink(); ?>" class="text-secondary"><?php the_title(); ?></a>
                                </h3>
                                <div class="product-price text-primary"><?php the_excerpt(); ?></div>

                            </div>
                        </div>
                        <a href="cart.html" class="btn btn-outline-gray text-capitalize rounded-pill mt-4 btn-sm buy" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart"><?php echo $lang === 'ru' ? 'Купить' : 'Buy'; ?>
                            <svg class="cart" width="18" height="18">
                                <use xlink:href="#cart"></use>
                            </svg>
                        </a>
                    </div>

                <? } ?>
            <?
                //  }
                wp_reset_postdata();
            }
            ?>
        </div>

        <?php if (function_exists('wp_pagenavi')) {
            wp_pagenavi(array('query' => $post_query));
        } ?>


    </div>

</section>



<? get_footer(); ?>