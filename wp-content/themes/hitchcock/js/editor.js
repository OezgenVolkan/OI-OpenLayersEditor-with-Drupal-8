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
	/**
	 * Elements that make up the popup.
	 */
	var container = document.getElementById('popup');
	var content = document.getElementById('popup-content');
	var closer = document.getElementById('popup-closer');

	// make interactions global so they can later be removed
	var select_interaction, draw_interaction, modify_interaction;
	var $interaction_type = jQuery('[name="interaction_type"]');
	var $geom_type = jQuery('#geom_type');

	/**
	* Create an overlay to anchor the popup to the map.
	*/
	var overlay = new ol.Overlay(
	{
		element: container,
		autoPan: true,
		autoPanAnimation: 
		{
	  		duration: 250
		}
	});

	/**
	 * Add a click handler to hide the popup.
	 * @return {boolean} Don't follow the href.
	 */
	closer.onclick = function() 
	{
		// overlay.setPosition(undefined);
		// closer.blur();
		clearMap();
		return false;
	};


	// create a vector layer used for editing
	var vector_layer = new ol.layer.Vector(
	{
  		name: 'vectorlayer_for_editing',
  		source: new ol.source.Vector(),
  		style: new ol.style.Style(
  		{
	    	fill: new ol.style.Fill(
	    	{
	      		color: 'rgba(106, 255, 0, 0.2)'
	    	}),
	    
	    	stroke: new ol.style.Stroke(
	    	{
	      		color: '#6aff00',
	      		width: 4
	    	}),
	    	
	    	image: new ol.style.Circle(
	    	{
	      		radius: 7,
	      		fill: new ol.style.Fill(
	      		{
	        		color: '#6aff00'
	      		})
	    	})
  		})
	});

	var osmLayer = new ol.layer.Tile(
	{
  		source: new ol.source.OSM()
	});

  	var berlin = ol.proj.transform([13.40495, 52.52001], 'EPSG:4326', 'EPSG:3857');

  	var view = new ol.View(
  	{
        center: berlin,
        zoom: 17
    });

	// Create a map
	var map = new ol.Map(
	{
  		target: 'map',
	  	layers: [osmLayer, vector_layer],
  		overlays: [overlay],
  		view: view
	});

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

	// rebuild interaction when the geometry type is changed
	$geom_type.on('change', function(e) 
	{
		clearMap();
  		map.removeInteraction(draw_interaction);
  		addDrawInteraction();
	});

	// get data type to save in
	$data_type = jQuery('#data_type');
	
	// clear map and rebuild interaction when changed
	$data_type.on('change', function() 
	{
  		clearMap();
  		map.removeInteraction(draw_interaction);
  		addDrawInteraction();
	});

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
	      		return vector_layer.get('name') === 'vectorlayer_for_editing';
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
  			jQuery('#object-type-radio').show();
    		osmLayer.setOpacity(0.2);
    		
    		var coordinate = event.feature.getGeometry().getLastCoordinate();

	        overlay.setPosition('bottom-left');

    		// create a unique id
    		// it is later needed to delete features
    		var id = uid();

    		// give the feature this id
    		event.feature.setId(id);

		 	var currentFeat = event.feature;
		 	var restOfFeat 	= vector_layer.getSource().getFeatures();
		 	var allFeat		= restOfFeat.concat(currentFeat);

    		// save the changed data
    		saveData(allFeat);
  		});
	}

	// replace this function by what you need
	function saveData(feature) 
	{
  		// get the format the user has chosen
  		var data_type = $data_type.val(),

      	// define a format the data shall be converted to
 		format = new ol.format[data_type](),

      	// this will be the data in the chosen format
 		data;

		// convert the data of the vector_layer into the chosen format
		data = format.writeFeatures(feature);
  
  		if ($data_type.val() === 'GeoJSON') 
  		{
    		// format is JSON
    		jQuery('#data').val(JSON.stringify(data, null, 4));
  		} 
  		else 
  		{
  			console.log(data);
  			console.log(feature);
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
		jQuery('#object-type-radio-Point').hide();
		osmLayer.setOpacity(1);
  		vector_layer.getSource().clear();
  
  		if (select_interaction) 
  		{
  			select_interaction.getFeatures().clear();
  		}

  		jQuery('#data').val('');

  		overlay.setPosition(undefined);
		closer.blur();
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

	jQuery('#save-feature-properties').on('click', function(event)
	{
		event.preventDefault();
		
		var currentFeature = vector_layer.getSource().getFeatures();
		var featureName = jQuery('#object-name').val();

		alert(currentFeature);
		currentFeature.setProperties({'name': featureName});
	});
});