<? get_header(); ?>
<? $lang = pll_current_language();

$terms = get_the_terms($post->ID, 'toys');
foreach ($terms  as $term) {
    $term_slug = $term->slug;
    break;
}

?>
<section class="hero-section d-flex align-items-center text-center justify-content-center bg-linear">
    <div class="hero-content">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-3 text-dark"><? the_title(); ?></h1>
                    <ul class="breadcrumb">

                        <?php if (function_exists('bcn_display')) {
                            bcn_display();
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?

?>

<div id="scroll-top-btn" class="bg-light rounded-pill text-primary position-fixed">
    <svg class="teddybear" width="50" height="50">
        <use xlink:href="#teddybear"></use>
    </svg>
</div>
<section id="selling-product" class="single-product overflow-hidden py-lg-7">
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="product-preview mb-3">
                    <?php the_post_thumbnail("large", array("alt" => get_the_title(), "class" => "img-fluid")); ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <div class="product-info">
                    <div class="product-header">
                        <h3 itemprop="name" class="product-title display-4"><? the_title(); ?></h3>
                    </div>
                    <div class="product-price">
                        <strong class="text-primary fs-3">
                            <span class="price"><?= number_format((float)get_field('new_price'), 2, ',', ' '); ?></span> <?php echo $lang === 'ru' ? 'KZT' : 'USD'; ?>
                        </strong>

                    </div>
                    <div class="cart-wrap">
                        <?php if (get_field('color')) { ?><div class="color-options product-select">
                                <div class="color-toggle d-flex align-items-baseline" data-option-index="0">
                                    <h4 class="fs-4 text-dark pe-2"><?php echo $lang === 'ru' ? 'Цвет' : 'Color'; ?>:</h4>
                                    <ul class="select-list list-unstyled d-flex">
                                        <li class="select-item pe-2" data-val="Green" title="Green">
                                            <? the_field('color'); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div><? } ?>
                        <?php if (get_field('age')) { ?><div class="swatch product-select d-flex align-items-baseline" data-option-index="1">
                                <h4 class="fs-4 text-dark pe-2"><?php echo $lang === 'ru' ? 'Возраст' : 'Age'; ?>:</h4>
                                <ul class="select-list list-unstyled d-flex">
                                    <li data-value="S" class="select-item pe-2">
                                        <? the_field('age'); ?>
                                    </li>
                                </ul>
                            </div><? } ?>
                        <div class="product-quantity">
                            <div class="stock-button-wrap d-flex flex-wrap">
                                <div class="input-group product-qty me-3 align-items-center" style="max-width: 150px;">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-light btn-number border" data-type="minus" data-field=""> - </button>
                                    </span>
                                    <div id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">1</div>
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-light btn-number border" data-type="plus" data-field=""> + </button>
                                    </span>
                                </div>
                                <button type="submit" name="add-to-cart" value="1000" class="btn btn-dark btn-md rounded-0 text-uppercase buy"><?php echo $lang === 'ru' ? 'Купить' : 'Buy'; ?></button>
                            </div>
                        </div>
                    </div>
                    <div class="meta-product mt-3">

                        <?php if (get_field('category')) { ?><div class="meta-item d-flex align-items-baseline">
                                <h4 class="fs-4 text-dark pe-2"><?php echo $lang === 'ru' ? 'Категория' : 'Category'; ?>:</h4>
                                <ul class="select-list list-unstyled d-flex">
                                    <li data-value="S" class="select-item pe-2">
                                        <? the_field('category'); ?>
                                    </li>
                                </ul>
                            </div><? } ?>
                        <?php if (get_field('material')) { ?><div class="meta-item d-flex align-items-baseline">
                                <h4 class="fs-4 text-dark pe-2"><?php echo $lang === 'ru' ? 'Материал' : 'Material'; ?>:</h4>
                                <ul class="select-list list-unstyled d-flex">
                                    <li data-value="S" class="select-item pe-2">
                                        <? the_field('material'); ?>
                                    </li>
                                </ul>
                            </div><? } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="product-tabs">
    <div class="container-lg">
        <div class="row">
            <div class="tabs-listing">
                <nav>
                    <div class="nav nav-tabs d-flex flex-wrap justify-content-center border-0" id="nav-tab" role="tablist">
                        <button class="nav-link active text-capitalize text-dark fs-4" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo $lang === 'ru' ? 'Описание' : 'Description'; ?></button>

                    </div>
                </nav>
                <div class="tab-content bg-light" id="nav-tabContent">
                    <div class="tab-pane fade show active border-top p-5 border" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <? the_content(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<section id="featured-product" class="py-lg-11 position-relative">
    <div class="container-lg">
        <div class="row">
            <div class="display-header text-center position-relative">
                <h2 class="display-2"><?php echo $lang === 'ru' ? 'Похожие товары' : 'Related Products'; ?></h2>
                <div class="icon-overlay position-absolute">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star-icon-overlay.png" alt="icon overlay">
                </div>
            </div>
            <div class="row">


                <?php
                $args = array(
                    'post_type' => 'products',
                    'posts_per_page'    => 4,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'toys',
                            'field'    => 'slug',
                            'terms'    => $term_slug,
                        ),
                    ),
                );

                $post_query = new WP_Query($args);

                if (($post_query->have_posts())) {

                    while ($post_query->have_posts()) {
                        $post_query->the_post();
                        $post_query->post;



                ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="product-item product-item_main">
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
                                        <div class="product-price text-primary"><?= number_format((float)get_field('new_price'), 2, ',', ' '); ?><?php echo $lang === 'ru' ? 'KZT' : 'USD'; ?></div>

                                    </div>
                                </div>
                                <a href="#" class="btn btn-outline-gray text-capitalize rounded-pill mt-4 btn-sm" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart"><?php echo $lang === 'ru' ? 'Купить' : 'Buy'; ?> <svg class="cart" width="18" height="18">
                                        <use xlink:href="#cart"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>


                    <? } ?>

                <? }

                wp_reset_postdata();
                ?>



            </div>
        </div>
    </div>
</section>


<? get_footer(); ?>