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
      <li><?php echo get_post_meta($post->ID, 'video', true); ?></li>
    </ul>
  <?php echo get_post_meta($post->ID, 'slider', true); ?>
  </div>

  <aside id="right-push" class="description-sticky right-description">
    <div id="right-text">
      <ul class="button-group post-nav">
        <li><a href="<?php echo get_settings('home'); ?>" class="button icon-th"><span class="screen-reader-text">portfolio grid</span></a></li>
        <li><a href="<?php $nextPost = get_next_post($in_same_cat = true);
        echo get_permalink($nextPost->ID);?> " 
        class="button icon-angle-left"><span class="screen-reader-text">previous</span></a></li>
        <li><a href="<?php $previousPost = get_previous_post($in_same_cat = true);
        echo get_permalink($previousPost->ID);?> " 
        class="button icon-angle-right"><span class="screen-reader-text">next</span></a></li>
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

      <?php endwhile; else: ?>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>
    </div> <!--end right text-->
  </aside>
</div> <!-- END WRAPPER -->

<?php get_footer(); ?>