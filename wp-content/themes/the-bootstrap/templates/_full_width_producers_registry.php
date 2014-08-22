<?php
/** _full_width.php
 *
 * Template Name: Producers Registry
 *
 * @author 	Konstantin Obenland
 * @package The Bootstrap
 * @since	1.3.0	- 29.04.2012
 */

get_header(); ?>

<section id="primary" class="span12">
	<?php tha_content_before(); ?>
	<div id="content" role="main">
	<?php get_template_part( '/partials/content', 'page' ); ?>
	
	<!-- <section class="producers-registry-farmer-groups"> -->

	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>


<div class="container producers-registry-farmer-groups">
	<div class="row">
        <div class="col-md-3">
            <form action="#" method="get">
                <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
		<div class="col-md-9">
    	 
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
                        <th>Lot Number </th>
                        <th>Name </th>
                        <th>Country </th>
                        <th>Origin location </th>
                        <th>Process </th>
                        <th>Cupping-CQI notes</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $loop = new WP_Query( array( 'post_type' => 'farmer_group', 'posts_per_page' => -1 ) ); ?>
                    		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    			
                    			<tr>
                    				<td><a style="color:#000;" href="<?php the_permalink();?>"><?php the_field('lot_number'); ?></a></td>
                    				<td><a style="color:#000;" href="<?php the_permalink();?>"><?php the_title(); ?></a></td> 
                    				<td><?php the_field('country'); ?></td>
                    				<td><?php the_field('location'); ?></td>
                    				<td><?php the_field('Process'); ?></td>
                    				<td><?php the_field('cupping_notes'); ?></td>
                    			</tr>
                    <?php endwhile; wp_reset_query(); ?>
                    </tbody>
                </table>   
		</div>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    //something is entered in search form
    $('#system-search').keyup( function() {
       var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Searching for: "'
                    + $(that).val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>');
        }
    });
});</script>


		<?php tha_content_top();
		
		the_post();
		comments_template( '', true );
		
		tha_content_bottom(); ?>
		


	</div><!-- #content -->
	<?php tha_content_after(); ?>
</section><!-- #primary -->

<?php
get_footer();


/* End of file _full_width.php */
/* Location: ./wp-content/themes/the-bootstrap/_full_width.php */