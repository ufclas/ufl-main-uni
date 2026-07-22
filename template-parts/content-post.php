<?php
$post_ID = get_the_ID();
$thumbnail_id = get_post_thumbnail_id( $post_ID );
$featured_img_url = get_the_post_thumbnail_url($post_ID, 'full');
$featured_img_alt = get_post_meta ( $thumbnail_id, '_wp_attachment_image_alt', true );
$post_date = get_the_date('l F j, Y');
$filter_date = get_the_date('Y');
$categories = get_the_category();
?>

<div class="col-sm-6 col-lg-4 mb-4 news-col <?php if (!empty($categories)) {
} ?> <?= 'year-'.$filter_date; ?>">
    <div class="card news-card">
        <a href="<?php the_permalink(); ?>" class="news-card-link" >
            <?php if ($featured_img_url) { ?>
                <img src="<?= $featured_img_url ?>" class="card-img-top" alt="<?php echo $featured_img_alt; ?>">
            <?php } ?>
            <div class="card-body">
                <h3 class="card-title"><?php the_title(); ?></h3>			
				<p class="card-date"><?php echo $post_date; ?></p>
                <p class="card-text"><?php the_excerpt(); ?></p>
            </div>
        </a>
    </div>
</div>
