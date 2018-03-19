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
				
				<div class="row">
					<div class="col-md-1">
						<img class="size-full wp-image-45  img-responsive" style="float:right;" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/01/layers-2.png" alt="" width="100">
					</div>
					<div class="col-md-11">
						<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
						<h2>OpenHistoricalDataMap-Editor based on OpenLayers</h2>
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
												
												<div class="object-type-radio-content clearfix" id="object-type-radio">
													
													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-amenity" value="amenity">
														<label class="object-type-radio-label" for="ot-amenity">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/amenity.png" alt="" width="30">
															<p>EINRICHTUNG</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-building" value="building">
														<label class="object-type-radio-label" for="ot-building">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/building.png" alt="" width="30">
															<p>GEBÄUDE</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-shop" value="shop">
														<label class="object-type-radio-label" for="ot-shop">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/shop.png" alt="" width="30">
															<p>GESCHÄFT</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-craft" value="craft">
														<label class="object-type-radio-label" for="ot-craft">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/craft.png" alt="" width="30">
															<p>NIEDERLASSUNG</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-historical" value="historical">
														<label class="object-type-radio-label" for="ot-historical">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/historical.png" alt="" width="30">
															<p>HISTORISCHES OBJEKT</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-emergency" value="emergency">
														<label class="object-type-radio-label" for="ot-emergency">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/emergency.png" alt="" width="30">
															<p>NOTFALLEINRICHTUNG</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-manmade" value="manmade">
														<label class="object-type-radio-label" for="ot-manmade">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/manmade.png" alt="" width="30">
															<p>KUNSTLICHES OBJEKT</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-power" value="power">
														<label class="object-type-radio-label" for="ot-power">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/power.png" alt="" width="30">
															<p>KRAFTWERK</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-airport" value="airport">
														<label class="object-type-radio-label" for="ot-airport">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/airport.png" alt="" width="30">
															<p>FLUGHAFEN</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-leisure" value="leisure">
														<label class="object-type-radio-label" for="ot-leisure">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/leisure.png" alt="" width="30">
															<p>FREIZEITEINRICHTUNG</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-sport" value="sport">
														<label class="object-type-radio-label" for="ot-sport">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/sport.png" alt="" width="30">
															<p>SPORTANLAGE</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-military" value="military">
														<label class="object-type-radio-label" for="ot-military">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/military.png" alt="" width="30">
															<p>MILITÄRISCHEEINRICHTUNG</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-place" value="place">
														<label class="object-type-radio-label" for="ot-place">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/place.png" alt="" width="30">
															<p>ORT</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-landuse" value="landuse">
														<label class="object-type-radio-label" for="ot-landuse">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/landuse.png" alt="" width="30">
															<p>BODENNUTZUNG</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-natural" value="natural">
														<label class="object-type-radio-label" for="ot-natural">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/natural.png" alt="" width="30">
															<p>NATÜRLICHES GEBIET</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-tourism" value="tourism">
														<label class="object-type-radio-label" for="ot-tourism">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/tourism.png" alt="" width="30">
															<p>TOURISMUS GEBIET</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-geological" value="geological">
														<label class="object-type-radio-label" for="ot-geological">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/geological.png" alt="" width="30">
															<p>GEOLOGISCH</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-route" value="route">
														<label class="object-type-radio-label" for="ot-route">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/route.png" alt="" width="30">
															<p>WEG</p>
														</label>
													</div>
													
													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-highway" value="highway">
														<label class="object-type-radio-label" for="ot-highway">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/highway.png" alt="" width="30">
															<p>AUTOBAHN</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-public_transport" value="public_transport">
														<label class="object-type-radio-label" for="ot-public_transport">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/public_transport.png" alt="" width="30">
															<p>ÖFFENTLISCHE VERKEHRSMITTEL</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-railroad" value="railroad">
														<label class="object-type-radio-label" for="ot-railroad">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/railroad.png" alt="" width="30">
															<p>BAHN</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-water" value="water">
														<label class="object-type-radio-label" for="ot-water">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/water.png" alt="" width="30">
															<p>WASSERSTRASSE</p>
														</label>
													</div>

													<div class="object-type-radio">
														<input type="radio" name="object-type" id="ot-barrier" value="barrier">
														<label class="object-type-radio-label" for="ot-barrier">
															<img class="size-full wp-image-45 img-responsive" src="http://localhost/OI-OpenLayersEditor-with-Wordpress/wp-content/uploads/2018/03/barrier.png" alt="" width="30">
															<p>ABSPERRUNG</p>
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

											<button id="save-feature-properties" class="btn btn-success float-md-right">
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
							      		<div>
								      		<label>draw</label>
								      		<input type="radio" id="interaction_type_draw" name="interaction_type" value="draw">
							      		</div>
							      		<div>
									      	<label>modify</label>
									      	<input type="radio" id="interaction_type_modify" name="interaction_type" value="modify">
							      		</div>

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