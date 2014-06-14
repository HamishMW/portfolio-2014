<?php
/*
Template Name: Details
*/
?>

<?php get_header(); ?>

<div class="wrapper">

 
  <section id="hero1" class="hero parallax-trigger">
    <div class="inner">
      <div class="row content-page parallax-top">
        <div id="hero-text" class="large-12 columns head-description">
          <h3>Details</h3>
          <h1><strong>Through research, ideation, and design, I create kick-ass media.</strong></h1>
          <h4>I synthesise illustration, animation, typography, and code to create a diverse range of solutions.</h4>
        </div>
      </div>
    </div>
  </section>

  <section class="row profile content-page">
    <div class="large-4 columns img-centerer">
      <img src="<?php echo get_template_directory_uri(); ?>/img/profile.png" alt="profile picture" />
    </div>
    <div class="large-8 columns">
      <h4>Profile</h4>
      <p>Hi, I'm Hamish Williams. I am an alumnus of The University of Waikato's <a href="http://www.waikato.ac.nz/study/qualifications/bcgd.shtml">Bachelor of Computer Graphic Design</a> – a comprehensive degree that combines both technical and creative skills.  I worked as a graphic designer in New Zealand for a year before moving to Sydney, where I now work as a digital designer at <a href="https://www.smartsparrow.com/">Smart Sparrow</a>. Drop me a message and we can grab sushi sometime.</p>
      <div class="details-buttons"><a href="<?php echo get_template_directory_uri(); ?>/img/library/CV2014-Hamish-Williams.pdf" class="button btn-border cv-btn icon-download"> Download CV</a>
      <a class="button btn-border cv-btn icon-mail" data-reveal-id="contactModal"> Contact me</a></div>
    </div>
  </section>
    
  <section class="row approach content-page"> 
    <div class="large-4 columns">
      <h4>Approach</h4>
      <p>Although I'm a massive design nerd and love every bit of the latest technology in the industry, I like to take things back to old-school pencil, ink, and paper when laying down concepts for a new project. This approach allows for the rapid research and development of a diversity of ideas that can be easily developed or iterated on digitally. </p>
    </div>
    <div class="large-8 columns">
      <h4>Skills &amp; Technology</h4>
      <ul class="skill-list">
        <li>Adobe Creative Suite</li>
        <li>Motion Graphics</li>
        <li>Illustration</li>
        <li>Maya, 3DS Max, Blender</li> 
      </ul>
      <ul class="skill-list">
        <li>UX &amp; Interaction Design</li>
        <li>HTML5, CSS3, SASS &amp; Compass</li>
        <li>Javascript/jQuery</li>
        <li>Flash/Actionscript 3</li>
      </ul>
    </div>
  </section>

</div> <!-- wrapper -->

<?php get_footer(); ?>
