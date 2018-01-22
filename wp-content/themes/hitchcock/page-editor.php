<?php
/**
 * Template Name: OSM-Editor
 */

get_header();
?>

<div class="content section-inner">		

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<div <?php post_class( 'post single' ); ?>>
			
			<div class="post-container">

			<div class="post-header">
												
				<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
			
			</div>
			
			<div class="post-inner">
				    
			    <div class="post-content">
			    
					<?php 
					the_content();
					?>

				    <!-- <form class="form-inline">
				    	<label>Geometry type &nbsp;</label>
				    	<select id="geometry_type">
				        	<option value="Point" selected>Point</option>
				        	<option value="LineString">LineString</option>
				        	<option value="Polygon">Polygon</option>
				        	<option value="Circle">Circle</option>
				    	</select>
				    </form> -->

				    <div class="row">
					    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					    	<div id="map" class="map"></div>
					    </div>
					    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						    <div>
						    	<label>Interaction type:  &nbsp;</label>
						      	<label>draw</label>
						      	<input type="radio" id="interaction_type_draw" name="interaction_type" value="draw" checked>
						      	<label>modify</label>
						      	<input type="radio" id="interaction_type_modify" name="interaction_type" value="modify">
						    </div>
						    <div>
						      	<label>Geometry type</label>
						      	<select id="geom_type">
						        	<option value="Point" selected>Point</option>
						        	<option value="LineString">LineString</option>
						        	<option value="Polygon">Polygon</option>
						      	</select>
						    </div>
						    <div>
						      	<label>Data type</label>
						      	<select id="data_type">
						        	<option value="GeoJSON" selected>GeoJSON</option>
						        	<option value="KML">KML</option>
						        	<option value="GPX">GPX</option>
						      	</select>
						    </div>
						    <div id="delete" style="text-decoration:underline;cursor:pointer">
						      	Delete all features
						    </div>
						    <label>Data:</label>
						    <textarea id="data" rows="12" style="width:100%"></textarea>
					    </div>
				        <!-- <div id="location" class="marker"><span class="icon-flag"></div> -->
			        </div>

			    </div><!-- .post-content -->
			    
			    <div class="clear"></div>
			    
	
			</div><!-- .post-inner -->

			</div><!-- .post-container -->
		
		</div><!-- .post -->
		
	<?php 
	endwhile; 
	else: ?>
	
		<p><?php _e( "We couldn't find any posts that matched your query. Please try again.", "hitchcock" ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
	
</div><!-- .content -->

<?php 
get_footer(); 
?>