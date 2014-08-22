<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
      



      <?php
        // // Start the Loop.
        // while ( have_posts() ) : the_post();

        //   /*
        //    * Include the post format-specific template for the content. If you want to
        //    * use this in a child theme, then include a file called called content-___.php
        //    * (where ___ is the post format) and that will be used instead.
        //    */
        //   // get_template_part( 'content', get_post_format() );

        //   // Previous/next post navigation.
        //   twentyfourteen_post_nav();

        //   // If comments are open or we have at least one comment, load up the comment template.
        //   if ( comments_open() || get_comments_number() ) {
        //     comments_template();
        //   }
        // endwhile;
      ?>


      <?php while ( have_posts() ) : the_post(); ?>

        <table class="farmers-table">
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
            <td class="col-1-farmers"> Biographies of Officers</td>
            <td class="bios">
              
              <?php if( have_rows('biographies_of_officers') ): while ( have_rows('biographies_of_officers') ) : the_row();  ?>
                
                <?php $image = get_sub_field('officers_image'); if( !empty($image) ): ?>
                    <img class="officers-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                 <?php endif; ?>

                 <h3 class="officers-name"><?php the_sub_field('name'); ?></h3>
                 <p class="officers-title"><?php the_sub_field('title'); ?></p>
                <p class="officers-bio"><?php the_sub_field('officer_bio'); ?></p>

                <br>
                <br>

              <?php endwhile; else : endif; ?>  
                
            </td>
          </tr>

        </table>

        <?php endwhile; ?>


    </div><!-- #content -->
  </div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
