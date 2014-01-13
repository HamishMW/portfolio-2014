<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

  <div id="content" class="wrapper">

      <section class="block-grid-work">
        <ul class="portfolio-grid small-block-grid-1 medium-block-grid-2 large-block-grid-3 xlarge-grid">

        <?php

        // The Query

        $the_query = new WP_Query( 'post_type=post&posts_per_page=12&category_name=portfolio' );

        // The Loop

        while ( $the_query->have_posts() ) : $the_query->the_post();

        echo '<li><a href="'; the_permalink(); echo'"><figure>';

        the_post_thumbnail();

        echo '<figcaption class="no-touch"><div class="figure-text">';
        echo '<h3><strong>'; the_title(); echo'</strong></h3><span>';
        
        $posttags = get_the_tags(); $sep = '';
        if ($posttags) {
          foreach($posttags as $tag) {
            echo $sep.$tag->name; $sep = ', ';
          }
        }

        echo '</span></div></figcaption></figure>';
        echo '</a></li>';
            
        endwhile;

        // Reset Post Data

        wp_reset_postdata();

        ?>

        </ul>
      </section>
  </div>

<?php get_footer(); ?>