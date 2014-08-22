<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<style>
	.col-1-farmers {
		font-weight: bold;
	}
	table.farmers-table {
		width: 800px;
		margin: 0 auto;
	}

	table.farmers-table tr {}
	table.farmers-table tr td {
		padding: 10px;
	}

	.col-1-farmers {
		width: 170px;
	}

	.farmers-table .bios {}
	.farmers-table .bios img, p, h3{float:left;}
	.farmers-table .bios {clear:none;}
	.farmers-table .bios h3.officers-name{
		clear:none;
		width: 400px;
	}
	.farmers-table .bios p{
		width: 400px;
		margin: 0;
	}

	.farmers-table .bios p.title {
		font-weight: bold;
	}

	.officers-image {
		width: 130px;
		padding: 20px;
		border-radius: 130px;
		height: 140px;
		float: left;
		clear:left;
	}

</style>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php get_template_part( 'content', get_post_format() ); ?>

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
