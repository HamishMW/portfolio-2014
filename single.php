<?php get_header(); ?>

<div class="wrapper">
    
      <div class="portfolio-images">
        <ul class="no-bullet">
   
        <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
        <?php
        // Set the post content to a variable
        $szPostContent = $post->post_content;
        // Define the pattern to search
        $szSearchPattern = '~<img [^\>]*\ />~';
        // Run preg_match_all to grab all the images and save the results in $aPics
        preg_match_all( $szSearchPattern, $szPostContent, $aPics );
        // Count the results
         $iNumberOfPics = count($aPics[0]);
        // Check to see if we have at least 1 image
        if ( $iNumberOfPics > 0 )
        {
             // Now here you would do whatever you need to do with the images
             // For this example I'm just going to echo them
             for ( $i=0; $i < $iNumberOfPics ; $i++ )
             {
                  echo '<li>';
                  echo $aPics[0][$i];
                  echo '</li>';
             };
        };
        ?>
        </ul>
      </div>

      <aside id="right-push" class="description-sticky right-description">
        <div id="right-text">
          <ul class="button-group post-nav">
            <li><a href="<?php echo get_settings('home'); ?>" class="button icon-th"></a></li>
            <li><a href="<?php $nextPost = get_next_post($in_same_cat = true);
                          echo get_permalink($nextPost->ID);?> " 
                          class="button icon-angle-left"></a></li>
            <li><a href="<?php $previousPost = get_previous_post($in_same_cat = true);
                          echo get_permalink($previousPost->ID);?> " 
                          class="button icon-angle-right"></a></li>
          </ul>
          <h1><?php the_title(); ?></h1>
            <?php
              // This time we replace/remove the images from the content
              $szDescription = preg_replace( $szSearchPattern, '' , $szPostContent);
              // Apply filters for correct content display
              $szDescription = apply_filters('the_content', $szDescription);
              // Echo the Content
              echo $szDescription;
            ?>

          <div id="dd" class="wrapper-dropdown">
            <a class="button icon-link-ext share-links"></a>
              <ul class="share-dropdown button-group post-nav">
                <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank" class="button icon-facebook"></a></li>
                <li><a href="https://plus.google.com/share?url=<?php the_permalink();?>" class="button icon-gplus"></a></li>
                <li><a href="http://twitter.com/share?text=<?php echo urlencode(the_title()); ?>&url=<?php echo urlencode(the_permalink()); ?>&via=HamishMW&related=<?php echo urlencode("Hamish Williams – Graphic artist & designer"); ?>" title="Share on Twitter" rel="nofollow" target="_blank" class="button icon-twitter"></a></li>
              </ul>
            </div>

          <?php endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
          <?php endif; ?>
        </div> <!--end right text-->
      </aside>
</div> <!-- END WRAPPER -->

<?php get_footer(); ?>