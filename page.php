<?php get_header(); ?>

<div class="wrapper">
    
      <div class="portfolio-images">
        <ul class="no-bullet">
   
        		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php echo '<li>'; the_content(); echo "</li>";?>
				<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
        </ul>
      </div>

      <aside id="right-push" class="description-sticky right-description">
          <ul class="button-group post-nav">
            <li><a href="index.html" class="button icon-th"></a></li>
            <li><a href="#" class="button icon-angle-left"></a></li>
            <li><a href="#" class="button icon-angle-right"></a></li>
          </ul>
          <h1>Fox Card</h1>
          <p>Nano space film monofilament sub-orbital bomb boy gang rebar numinous marketing sensory shrine footage. Systemic decay assassin realism render-farm jeans drone ablative market soul-delay spook singularity dolphin neural.</p> <hr>
          <p>Chrome rain carbon fetishism knife Tokyo market geodesic post-drugs city bomb decay assault. Market military-grade drone katana</p>

          <div id="dd" class="wrapper-dropdown">
            <a class="button icon-link-ext share-links"></a>
              <ul class="share-dropdown button-group post-nav">
                <li><a href="#" class="button icon-facebook"></a></li>
                <li><a href="#" class="button icon-gplus"></a></li>
                <li><a href="#" class="button icon-twitter"></a></li>
                <!-- <li><a href="#" class="button icon-angle-right"></a></li> -->
              </ul>
            </div>
      </aside>
</div> <!-- END WRAPPER -->

<?php get_footer(); ?>