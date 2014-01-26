<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

  <div id="content" class="wrapper">

      <section id="masonry">

        <?php

        // The Query

        $the_query = new WP_Query( 'post_type=post&posts_per_page=12&category_name=portfolio' );

        // The Loop

        while ( $the_query->have_posts() ) : $the_query->the_post();

        echo '<a href="'; the_permalink(); echo'"><div class="item">';

        the_post_thumbnail('full');

        echo '<div class="fcaption"><span class="mask"></span><div class="figure-text hide">';
        echo '<h3><strong>'; the_title(); echo'</strong></h3><span>';
        
        $posttags = get_the_tags(); $sep = '';
        if ($posttags) {
          foreach($posttags as $tag) {
            echo $sep.$tag->name; $sep = ', ';
          }
        }

        echo '</span>'; 
        echo'<a href="'; the_permalink(); echo'" class="button proj-button">View project</a>';
        echo '</div></div></div></a>';
            
        endwhile;

        // Reset Post Data

        wp_reset_postdata();

        ?>

      </section>
  </div>

<?php get_footer(); ?>