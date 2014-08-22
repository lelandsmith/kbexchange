<?php
/** single.php
 *
 * The Template for displaying all single posts.
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 05.02.2012
 */

get_header(); ?>

<section id="primary" class="span12">
	
	<?php tha_content_before(); ?>
	<div id="content" role="main">
		<?php tha_content_top();

		while ( have_posts() ) {
			the_post();
			// get_template_part( '/partials/content', 'single' );
			// comments_template();
		} ?>


    <?php //  global $user_login; get_currentuserinfo(); if('admin' == $user_login) : ?>
      <!-- ~ display this only if admin is logged in ~ -->
    <?php // endif; ?>


      <?php while ( have_posts() ) : the_post(); ?>
        
        <section class="featured-image">
          <?php the_post_thumbnail(); ?>
            

          <div class="span-6 contact-form">
          <div class="row">
            <div class="col-md-12">
            <form role="form" action="" method="post" >
              <div class="col-lg-6">
              <h2>Contact</h2>
                <div class="form-group">
                  <label for="InputName">Your Name</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                </div>
                <div class="form-group">
                  <label for="InputEmail">Your Email</label>
                  <div class="input-group">
                    <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                </div>
                <div class="form-group">
                  <label for="InputMessage">Message</label>
                  <div class="input-group">
                    <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
              </div>
            </form>
          </div>

          </div>

        </section>
        
        <h2 style="float:left;"><?php the_title(); ?> - <i>Quick Facts</i></h2>      
        <section class="farmer-bios-section">
        <?php if( have_rows('officer_and_membership_information') ): while ( have_rows('officer_and_membership_information') ) : the_row();  ?>
          
              <div class="farmer-bio">
                <?php $image = get_sub_field('officers_image'); if( !empty($image) ): ?>
                    <img class="officers-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                 <?php endif; ?>

                 <h4 class="officers-name"><?php the_sub_field('name'); ?></h4>
                 <p class="officers-title"><b>Title:</b> <?php the_sub_field('title'); ?> </p>
                 <span class="officers-bio"><b>Bio:</b> <?php the_sub_field('officer_bio'); ?> </span>
              </div>          

        <?php endwhile; else : endif; ?>  
        </section>
  
        <table class="farmers-table table">
          <tr>
            <td class="col-1-farmers">Project Crop Capacity</td>
            <td><?php the_field('project_crop_capacity'); ?></td>
          </tr>
          <tr>
            <td class="col-1-farmers">Grade</td>
            <td><?php the_field('grade'); ?></td>
          </tr>
          <tr>
            <td class="col-1-farmers">History Of Group</td>
            <td><?php the_field('history_of_group'); ?></td>
          </tr>
          <tr>
            <td class="col-1-farmers">Documents Of Power</td>
            <td><?php the_field('documents_of_power'); ?></td>
          </tr>
          <tr>
            <td class="col-1-farmers">Group and Region</td>
            <td><?php the_field('group_and_region'); ?></td>
          </tr>
          <tr>
            <td class="col-1-farmers">Coffee Trees</td>
            <td>
              <?php if( have_rows('coffee_trees') ): while ( have_rows('coffee_trees') ) : the_row();  ?>
                <?php the_sub_field('type_of_trees'); ?> = <?php the_sub_field('number_of_trees'); ?>
                <br>
              <?php endwhile; else : endif; ?>      
            </td>
          </tr>

          <tr>
            <td class="col-1-farmers"> Officer and Membership information</td>
            <td class="bios">
<!--               
              <?php if( have_rows('officer_and_membership_information') ): while ( have_rows('officer_and_membership_information') ) : the_row();  ?>
                
                <?php $image = get_sub_field('officers_image'); if( !empty($image) ): ?>
                    <img class="officers-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                 <?php endif; ?>

                 <h3 class="officers-name"><?php the_sub_field('name'); ?></h3>
                 <p class="officers-title"><?php the_sub_field('title'); ?></p>
                <p class="officers-bio"><?php the_sub_field('officer_bio'); ?></p>

                <br>
                <br>

              <?php endwhile; else : endif; ?>  
                 -->
            </td>
          </tr>

        </table>

        <?php endwhile; ?>
		
		
		<?php tha_content_bottom(); ?>
	</div><!-- #content -->
	<?php tha_content_after(); ?>
</section><!-- #primary -->

<?php
// get_sidebar();
get_footer();


/* End of file index.php */
/* Location: ./wp-content/themes/the-bootstrap/single.php */