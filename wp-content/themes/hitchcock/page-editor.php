<?php
/**
 * Template Name: OSM-Editor
 */

get_header();
?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	
    	<div class="modal-content">
      		
      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
	  		
	  		<div class="modal-body">
	        ...
	      	</div>
      		
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary">Save changes</button>
    		</div>

    	</div>

	</div>
</div>

<div class="content section-inner">		

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<div <?php post_class( 'post single' ); ?>>
			
			<div class="post-container">

			<div class="post-header">
				
				<div class="row">
					<div class="col-md-1">
						<img class="size-full wp-image-45  img-responsive" style="float:right;" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/layers-2.png" alt="" width="100">
					</div>
					<div class="col-md-11">
						<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
						<h2>OpenStreetMap-Editor based on OpenLayers</h2>
					</div>
				</div>	
			
			</div>
			
			<div class="post-inner">
				    
			    <div class="post-content">

				    <div id="editor-wrapper">
					    
					    <div class="row">
						    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
						    	
						    	<div id="map" class="map"></div>
						    	
						    	<div id="popup" class="ol-popup">
							    	<a href="#" id="popup-closer" class="ol-popup-closer"></a>
							    	<div id="popup-content" class="editor-popup-content">
							    		<form>
											
											<hr class="top-line" />

											<div class="form-group">
												<div class="editor-popup-label clearfix">
													<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/map-location.png" alt="" width="30">

													<label for="object-type">OBJECT TYPE:</label>
												</div>
												
												<div class="object-type-radio-content clearfix" id="object-type-radio-Point">
													
													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-cafe" value="cafe">
														<label class="object-type-radio-label" for="ot-cafe">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/cafe.png" alt="" width="30">
															<p>CAFE</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-restaurant" value="restaurant">
														<label class="object-type-radio-label" for="ot-restaurant">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/restaurant.png" alt="" width="30">
															<p>RESTAURANT</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-bar" value="bar">
														<label class="object-type-radio-label" for="ot-bar">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/bar.png" alt="" width="30">
															<p>BAR</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-fastfood" value="fastfood">
														<label class="object-type-radio-label" for="ot-fastfood">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/fastfood.png" alt="" width="30">
															<p>FAST FOOD</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-supermarket" value="supermarket">
														<label class="object-type-radio-label" for="ot-supermarket">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/supermarket.png" alt="" width="30">
															<p>SUPERMARKT</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-park" value="park">
														<label class="object-type-radio-label" for="ot-park">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/park.png" alt="" width="30">
															<p>PARK</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-hospital" value="hospital">
														<label class="object-type-radio-label" for="ot-hospital">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/hospital.png" alt="" width="30">
															<p>KRANKENHAUS</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-bank" value="bank">
														<label class="object-type-radio-label" for="ot-bank">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/bank.png" alt="" width="30">
															<p>BANK</p>
														</label>
													</div>

												</div>

												<div class="object-type-radio-content clearfix" id="object-type-radio-LineString">
													
													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-road" value="road">
														<label class="object-type-radio-label" for="ot-road">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/road.png" alt="" width="30">
															<p>AUTOBAHN</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-railroad" value="railroad">
														<label class="object-type-radio-label" for="ot-railroad">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/railroad.png" alt="" width="30">
															<p>U-BAHN</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-street" value="street">
														<label class="object-type-radio-label" for="ot-street">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/street.png" alt="" width="30">
															<p>STRASSE</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-bike" value="bike">
														<label class="object-type-radio-label" for="ot-bike">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/bike.png" alt="" width="30">
															<p>FAHRRADWEG</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-pedestrian" value="pedestrian">
														<label class="object-type-radio-label" for="ot-pedestrian">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/pedestrian.png" alt="" width="30">
															<p>FUßG.WEG</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-river" value="river">
														<label class="object-type-radio-label" for="ot-river">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/river.png" alt="" width="30">
															<p>FLUSS</p>
														</label>
													</div>

												</div>

												<div class="object-type-radio-content clearfix" id="object-type-radio-Polygon">
													
													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-building" value="building">
														<label class="object-type-radio-label" for="ot-building">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/building.png" alt="" width="30">
															<p>GEBÄUDE</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-factory" value="factory">
														<label class="object-type-radio-label" for="ot-factory">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/factory.png" alt="" width="30">
															<p>FABRIK</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-forest" value="forest">
														<label class="object-type-radio-label" for="ot-forest">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/forest.png" alt="" width="30">
															<p>WALD</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-mountain" value="mountain">
														<label class="object-type-radio-label" for="ot-mountain">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/mountain.png" alt="" width="30">
															<p>GEBIRGE</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-sea" value="sea">
														<label class="object-type-radio-label" for="ot-sea">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/sea.png" alt="" width="30">
															<p>GEWÄSSER</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-tractor" value="tractor">
														<label class="object-type-radio-label" for="ot-tractor">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/tractor.png" alt="" width="30">
															<p>ACKERLAND</p>
														</label>
													</div>

												</div>
												
												<small id="object-type-help" class="form-text text-muted">
													Bitte wählen Sie aus, um was für ein Object es sich handelt (Z.B. Starße, Gebäude, Grünanlage)
												</small>
											</div>

											<hr />

											<div class="form-group">
												<div class="editor-popup-label clearfix">
													<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/track.png" alt="" width="30">

													<label for="exampleInputPassword1">OBJECT NAME:</label>
												</div>
												
												<input type="text" class="form-control" id="object-name" aria-describedby="object-type-help" placeholder="Object Name">
												<small id="object-type-name" class="form-text text-muted">
													Bitte geben Sie an, wie das Objekt heisst.
												</small>
											</div>

											<hr />

											<button type="submit" class="btn btn-success float-md-right">
												<span class="glyphicon glyphicon-map-marker"></span>
												Objekt Speichern
											</button>

										</form>
							    	</div>
							    </div>

						    </div>
						    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 editor-right-section">
							    <div>
							    	<div class="editor-label clearfix">
							    		<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/drawing-1.png" alt="" width="30">
							    		
							    		<p>Interaction type:</p>
							    	</div>
							      	<div class="editor-content">
								      	<label>draw</label>
								      	<input type="radio" id="interaction_type_draw" name="interaction_type" value="draw">
								      	<label>modify</label>
								      	<input type="radio" id="interaction_type_modify" name="interaction_type" value="modify">

							      		<hr />
							      	</div>
							    </div>
							    <div>
							    	<div class="editor-label clearfix">
							    		<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/cube-1.png" alt="" width="30">

							      		<p>Geometry type</p>
							    	</div>
							    	<div class="editor-content">
								      	<select id="geom_type">
								        	<option value="Point" selected>Point</option>
								        	<option value="LineString">LineString</option>
								        	<option value="Polygon">Polygon</option>
								      	</select>

								      	<hr />
							    	</div>
							    </div>
							    <div>
							    	<div class="editor-label clearfix">
							    		<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/map-2.png" alt="" width="30">

							      		<p>Data type</p>
							    	</div>
							      	<div class="editor-content">
								      	<select id="data_type">
								        	<option value="GeoJSON" selected>GeoJSON</option>
								        	<option value="KML">KML</option>
								        	<option value="GPX">GPX</option>
								      	</select>

								      	<hr />
							      	</div>
							    </div>
							    <button type="button" id="delete" class="btn btn-danger btn-block">
							    	<span class="glyphicon glyphicon-trash"></span> DELETE FEATURES
							    </button>
						    </div>
					        <!-- <div id="location" class="marker"><span class="icon-flag"></div> -->
				        </div>
				        
				        <div class="row editor-bottom-section">
				        	<div class="col-md-12">
				        		<div>
							    	<div class="editor-label clearfix">
							    		<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/coding-1.png" alt="" width="30">

							      		<p class="data-label">Data</p>
							    	</div>
							    	<textarea id="data" style="height:200px"></textarea>
								</div>
				        	</div>
				        </div>

				    </div>

			        <?php 
					the_content();
					?>
					
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