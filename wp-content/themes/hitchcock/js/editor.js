/**
 * ------------------------------------------------
 * 	Main editor javascript file
 * ------------------------------------------------
 *
 *
 *
 * ------------------------------------------------
 */
jQuery(document).on('ready', function()
{
	// var raster = new ol.layer.Tile(
	// {
	// 	source: new ol.source.OSM()
	// });

	// var source = new ol.source.Vector();
	
	// var vector = new ol.layer.Vector(
	// {
	// 	source: source,
	// 	style: new ol.style.Style(
	// 	{
	// 	  	fill: new ol.style.Fill(
	// 	  	{
	// 	    	color: 'rgba(255, 255, 255, 0.2)'
	// 	  	}),
			
	// 		stroke: new ol.style.Stroke(
	// 		{
	// 	    	color: '#ffcc33',
	// 	    	width: 2
	// 	  	}),

	//   		image: new ol.style.Circle(
	//   		{
	//     		radius: 7,
	//     		fill: new ol.style.Fill(
	//     		{
	//       			color: '#ffcc33'
	//     		})
	//   		})
	// 	})
	// });

	// var map = new ol.Map(
	// {
	// 	layers: [raster, vector],
	// 	target: 'map',
		
	// 	view: new ol.View(
	// 	{
	//   		center: [-11000000, 4600000],
	//   		zoom: 4
	// 	})
	// });

	// var modify = new ol.interaction.Modify({source: source});
     
 //    map.addInteraction(modify);

 //  	var draw, snap; // global so we can remove them later
 //  	var typeSelect = jQuery('#geometry_type');

 //  	function addInteractions() 
 //  	{
 //  		console.log(typeSelect.val())
 //        draw = new ol.interaction.Draw(
 //        {
 //        	source: source,
 //        	type: typeSelect.val()
 //        });
        
 //        map.addInteraction(draw);
 //        snap = new ol.interaction.Snap({source: source});
 //        map.addInteraction(snap);
 // 	}

	// /**
	// * Handle change event.
	// */
	// jQuery('#geometry_type').on('change', function()
	// {
	// 	map.removeInteraction(draw);
	// 	map.removeInteraction(snap);
	// 	addInteractions();
	// });	

	// addInteractions();



	/**
	 *================================================================
	 *================================================================
	 */

	// create a vector layer used for editing
	var vector_layer = new ol.layer.Vector(
	{
  		name: 'my_vectorlayer',
  		source: new ol.source.Vector(),
  		style: new ol.style.Style(
  		{
	    	fill: new ol.style.Fill(
	    	{
	      		color: 'rgba(255, 255, 255, 0.2)'
	    	}),
	    
	    	stroke: new ol.style.Stroke(
	    	{
	      		color: '#ffcc33',
	      		width: 2
	    	}),
	    	
	    	image: new ol.style.Circle(
	    	{
	      		radius: 7,
	      		fill: new ol.style.Fill(
	      		{
	        		color: '#ffcc33'
	      		})
	    	})
  		})
	});

  	var berlin = ol.proj.transform([13.40495, 52.52001], 'EPSG:4326', 'EPSG:3857');

  	var view = new ol.View(
  	{
        center: berlin,
        zoom: 12
    });

	// Create a map
	var map = new ol.Map(
	{
  		target: 'map',
	  	layers: [
	    	new ol.layer.Tile(
	    	{
	      		source: new ol.source.OSM()
	    	}),
    		vector_layer
  		],
  		view: view
	});

	// // create an Overlay using the div with id location.
 //    var marker = new ol.Overlay(
 //    {
 //    	element: document.getElementById('location'),
 //        positioning: 'bottom-left',
 //        stopEvent: false
 //  	});

 //  	// add it to the map
 //    map.addOverlay(marker);

 //    // create a Geolocation object setup to track the position of the device
	// var geolocation = new ol.Geolocation(
	// {
	// 	tracking: true
	// });

	// // bind the projection to the View so that positions are reported in the
	// // projection of the view
	// // geolocation.bindTo('projection', view);

	// // bind the marker's position to the geolocation object, the marker will
	// // move automatically when the GeoLocation API provides position updates
	// // marker.bindTo('position', geolocation);

	// // when the GeoLocation API provides a position update, center the view
	// // on the new position
	// geolocation.on('change:position', function() 
	// {
	// 	var p = geolocation.getPosition();
	// 	console.log(p[0] + ' : ' + p[1]);
	// 	view.setCenter([parseFloat(p[0]), parseFloat(p[1])]);
	// });

	// make interactions global so they can later be removed
	var select_interaction, draw_interaction, modify_interaction;

	// get the interaction type
	var $interaction_type = jQuery('[name="interaction_type"]');

	// rebuild interaction when changed
	$interaction_type.on('click', function(e) 
	{
  		// add new interaction
  		if (this.value === 'draw') 
  		{
    		addDrawInteraction();
  		} 
  		else 
  		{
    		addModifyInteraction();
  		}
	});

	// get geometry type
	var $geom_type = jQuery('#geom_type');
	
	// rebuild interaction when the geometry type is changed
	$geom_type.on('change', function(e) 
	{
  		map.removeInteraction(draw_interaction);
  		addDrawInteraction();
	});

	// get data type to save in
	$data_type = jQuery('#data_type');
	
	// clear map and rebuild interaction when changed
	$data_type.onchange = function() 
	{
  		clearMap();
  		map.removeInteraction(draw_interaction);
  		addDrawInteraction();
	};

	// build up modify interaction
	// needs a select and a modify interaction working together
	function addModifyInteraction() 
	{
  		// remove draw interaction
  		map.removeInteraction(draw_interaction);
  
  		// create select interaction
  		select_interaction = new ol.interaction.Select(
  		{
    		// make sure only the desired layer can be selected
	    	layers: function(vector_layer) 
	    	{
	      		return vector_layer.get('name') === 'my_vectorlayer';
	    	}
  		});

	  	map.addInteraction(select_interaction);
	  
	  	// grab the features from the select interaction to use in the modify interaction
	  	var selected_features = select_interaction.getFeatures();
	  
	  	// when a feature is selected...
	  	selected_features.on('add', function(event) 
	  	{
		    // grab the feature
		    var feature = event.element;
		    
		    // ...listen for changes and save them
		    feature.on('change', saveData);
		    
		    // listen to pressing of delete key, then delete selected features
		    jQuery(document).on('keyup', function(event) 
		    {
		    	if (event.keyCode == 46) 
		    	{
		        	// remove all selected features from select_interaction and my_vectorlayer
		        	selected_features.forEach(function(selected_feature) 
		        	{
		        		var selected_feature_id = selected_feature.getId();
		          
		          		// remove from select_interaction
		          		selected_features.remove(selected_feature);
		          		
		          		// features aus vectorlayer entfernen
		          		var vectorlayer_features = vector_layer.getSource().getFeatures();
		          		
		          		vectorlayer_features.forEach(function(source_feature) 
		          		{
		            		var source_feature_id = source_feature.getId();
		            		
		            		if (source_feature_id === selected_feature_id) 
		            		{
		              			// remove from my_vectorlayer
		              			vector_layer.getSource().removeFeature(source_feature);
		              
		              			// save the changed data
		              			saveData();
		            		}
		          		});
		        	});
		        
		        	// remove listener
		        	jQuery(document).off('keyup');
		      	}
		    });
	  	});

	  	// create the modify interaction
	  	modify_interaction = new ol.interaction.Modify(
	  	{
	    	features: selected_features,
	    
	    	// delete vertices by pressing the SHIFT key
	    	deleteCondition: function(event) 
	    	{
	      		return ol.events.condition.shiftKeyOnly(event) && ol.events.condition.singleClick(event);
	    	}
	  	});

	  	// add it to the map
	  	map.addInteraction(modify_interaction);
	}

	// creates a draw interaction
	function addDrawInteraction() 
	{
  		// remove other interactions
  		map.removeInteraction(select_interaction);
  		map.removeInteraction(modify_interaction);
  
  		// create the interaction
  		draw_interaction = new ol.interaction.Draw(
  		{
    		source: vector_layer.getSource(),
    		type: /** @type {ol.geom.GeometryType} */ ($geom_type.val())
  		});

		// add it to the map
  		map.addInteraction(draw_interaction);
  
  		// when a new feature has been drawn...
  		draw_interaction.on('drawend', function(event) 
  		{
    		// create a unique id
    		// it is later needed to delete features
    		var id = uid();

    		// give the feature this id
    		event.feature.setId(id);

    		// save the changed data
    		saveData(); 
  		});
	}

	// add the draw interaction when the page is first shown
	addDrawInteraction();

	// shows data in textarea
	// replace this function by what you need
	function saveData() 
	{
  		// get the format the user has chosen
  		var data_type = $data_type.val(),

      	// define a format the data shall be converted to
 		format = new ol.format[data_type](),

      	// this will be the data in the chosen format
 		data;

  		try 
  		{
    		// convert the data of the vector_layer into the chosen format
    		data = format.writeFeatures(vector_layer.getSource().getFeatures());
  		} 
  		catch (e) 
  		{
    		// at time of creation there is an error in the GPX format (18.7.2014)
    		jQuery('#data').val(e.name + ": " + e.message);
    		return;
  		}
  
  		if ($data_type.val() === 'GeoJSON') 
  		{
    		// format is JSON
    		jQuery('#data').val(JSON.stringify(data, null, 4));
  		} 
  		else 
  		{
    		// format is XML (GPX or KML)
    		var serializer = new XMLSerializer();
    		jQuery('#data').val(serializer.serializeToString(data));
  		}
	}

	// clear map when user clicks on 'Delete all features'
	jQuery("#delete").click(function() 
	{
  		clearMap();
	});

	// clears the map and the output of the data
	function clearMap() 
	{
  		vector_layer.getSource().clear();
  
  		if (select_interaction) 
  		{
  			select_interaction.getFeatures().clear();
  		}

  		jQuery('#data').val('');
	}

	// creates unique id's
	function uid()
	{
  		var id = 0;
  		
  		return function() 
  		{
    		if (arguments[0] === 0) 
    		{
      			id = 0;
    		}

    		return id++;
  		}
	}
});