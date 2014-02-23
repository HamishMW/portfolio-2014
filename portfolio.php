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

        ?>

        <a href="<?php the_permalink(); ?>">
          <div class="item">

            <?php the_post_thumbnail('full'); ?>

            <div class="fcaption">
              <span class="mask"></span>
              <div class="figure-text hide">
                <h3><strong><?php the_title(); ?></strong></h3>
                <?php
                echo "<span>";
                $posttags = get_the_tags(); $sep = '';
                if ($posttags) {
                  foreach($posttags as $tag) {
                    echo $sep.$tag->name; $sep = ', ';
                  }
                }
                echo "</span>";
                ?>

                <span class="button proj-button">View project</span>
              </div>
            </div>
          </div>
        </a>
        
        <?php

        endwhile;

        // Reset Post Data

        wp_reset_postdata();

        ?>

      </section>
  </div>

<?php get_footer(); ?>