<? get_header(); ?>

<ul class="breadcrumb" style="background-color: #fff;">

    <?php if (function_exists('bcn_display')) {
        bcn_display();
    } ?>
</ul>
<section id="category" class="py-lg-7 mb-lg-0 position-relative bg-light">

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


<? get_footer(); ?>