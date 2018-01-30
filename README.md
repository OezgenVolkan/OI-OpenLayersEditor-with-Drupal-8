# OI-OpenLayersEditor-with-WordPress

Dieses kleine Projekt wird für das Modul "Ortsbasierte Informationssysteme" an der HTW-Berlin entwickelt. Das Projekt verbindet OpenLayers mit WordPress und bietet einen Editor für OpenStreetMaps. Mit dem Editor soll es möglich sein, Punkte, Linien und Polygone in die Karte einzuzeichnen und diese mit Meta-Daten abzuspeichern. Das Ergebnis des Projekts soll ein erster funktionsfähiger Prototyp sein.  

---

## 1 Einführung
### 1.1 Gegenstand und zweck des Dokuments

Dieses Dokument dient zur Dokumentation eines Projektes für das Modul „Ortsbasierte Informationssysteme“. Die Dokumentation beschreibt hierbei die Entwicklung einer Software. Das Dokument richtet sich dabei an den Entwickler, der sich für die Visualisierung von Geodaten und die Entwicklung von Editoren interessiert und es wird
davon ausgegangen, dass grundlegende Kenntnisse in der Softwareentwicklung sowie im Umgang mit
Geodaten vorhanden sind.

### 1.2 Aufbau des Dokuments

Die Dokumentation ist wie folgt gegliedert. Zunächst wird im Kapitel 2 das Produkt vorgestellt. Dabei
wird die Produktvision näher erläutert sowie die Zielgruppe für das Produkt beschrieben. Das 3.
Kapitel dient der Vorbereitung. Hier werden die verwendeten Anwendungen und Bibliotheken und die
Aufgaben der Software für das Produkt erläutert. Im 4. Kapitel wird die Realisierung dokumentiert. So
wird beschrieben wie die Softwarelösung implementiert wird. 


## 2 Vorstellung des Produktes
### 2.1 Produktvision

Als Software-Produkt soll mit Webtechnologien ein Editor entwickelt werden, mit dem man Geodaten Visualisieren, erstellen und     bearbeiten kann. Der Editor wird in ein Content Management System eingebettet und kann somit über ein Web-Browser bedient werden. Mit dem Editor soll es möglich sein, Punkte, Linien und Polygone auf einer OpenStreetMaps-Karte einzuzeichnen und mit Meta-Daten abzuspeichern. Zusätzlich soll es die Möglichkeit geben, nach beendigung der Zeichnung, die Punkte, Linien oder Polygone zu korrigieren. Dafür soll als Zielprodukt ein erster funktionsfähiger Prototyp entstehen.

### 2.2 Zielgruppe

Mögliche Zielgruppe könnten Personen oder Unternehmen sein, die mit Geoinformationen arbeiten. Genau gesehen kommen alle als Zielgruppe in Frage, die sich für die Erstellung oder Pflege von Karten interessieren, beispielsweise Anwender und Entwickler, die eine Karte im Internet darstellen oder Kartenbasierte Anwendungen erstellen möchten.


## 3 Vorbereitung
### 3.1 Verwendete Anwendungen und Bibliotheken

---
#### 3.1.1 XAMPP
---
* ##### Was ist XAMPP:

   XAMPP ist ein Open-Source Programmpaket. Es ermöglicht das Installieren und Konfigurieren eines Apache Webservers mit MySQL, PHP und Perl. Die Software wendet sich hauptsächlich an Entwickler, die eine Entwicklungsumgebung mit Datenbankanbindung benötigen. Durch die Nutzung erhält der Entwickler einen lokalen Apache-Webserver.

* ##### XAMPP installieren und konfigurieren

   XAMPP ist unter dem Link https://www.apachefriends.org/de/download.html herunterladbar. Nachdem die Software heruntergeladen und installiert wurde, muss die Anwendung gestartet werden. Nachdem Start öffnet sich das XAMPP Control Panel, wie unten im Bild zu sehen.
   
   ![alt text](http://teampasswordmanager.com/assets/img/site/docs/xampp_control_panel_2015.png "XAMPP Control Panel")
   
   Die Module Apache und MySQL müssen über einen Klick auf den Start-Button gestartet werden. Wenn dies erfolgreich gewesen ist, sind die Modulnamen grün hinterlegt, wie oben zu sehen. Durch diesen Schritt wurde ein vollfunktionsfähiger lokaler Webserver mit MySQL-Datenbank Anbindung aufgesetzt. Nun kann man über einen Web-Browser unter der Adresse `http://localhost/` auf den lokalen Webserver zugreifen.
   
   Durch die Installation von XAMPP wurden am gewünschten Installationsort unter dem Ordner `XAMPP` mehrere Verzeichnisse und Dateien abgelegt. Für dieses Projekt ist das Verzeichnis `htdocs` von Bedeutung. Dies ist der öffentliche Ordner, wo die Source-Dateien der Webanwendungen gespeichert werden und über die Adresse `http://localhost/[Name_Webanwendung]` durch einen Web-Browser abrufbar sind. In dieses Verzeichnis wird auch dieses Projekt gespeichert und ist somit über `http://localhost/OI-OpenLayersEditor-with-WordPress` erreichbar. 

* ##### MySQL-Datenbank Tabelle über phpMyAdmin erstellen

   Für die WordPress Installation wird eine MySQL-Datenbank Tabelle benötigt, die Konfiguration für WordPress folgt im nächsten Kapitel. Da das MySQL-Modul von XAMPP gestartet ist, kann man über den Browser unter der Adresse `http://localhost/phpmyadmin` auf phpMyAdmin zugreifen, wie im folgenden Bild dargestellt.
   
   ![alt text](https://upload.wikimedia.org/wikipedia/commons/0/06/Screenshot-127.0.0.1_-_localhost_phpMyAdmin_3.3.2deb1ubuntu1_-_Chromium.png "phpMyAdmin")
   
   Über phpMyAdmin kann man Datenbanktabellen anlegen und bearbeiten. Wir möchten eine Datenbanktabelle anlegen, dazu klicken wir links in der Navigation auf den ersten Eintrag mit der Bezeichnung `Neu`. Hier vergeben wir lediglich den Namen der Tabelle, hier `osmeditor` **(Wichtig für die Folgende WordPress Installation)**.

---
#### 3.1.2 WordPress
---

* ##### Was ist WordPress:

   WordPress ist eine Open-Source-Software, zur Verwaltung der Inhalte einer Webseite. Mit der Webanwendung können Weblogs, Webseiten oder Webanwendungen erstellt werden. WordPress kann auch hierarchische Seiten verwalten und gestattet den Einsatz als Content-Management-System (CMS). Es basiert auf der Skriptsprache PHP und arbeitet mit einer MySQL-Datenbank.

* ##### Installation:

   Bevor wir die Anwendung aufsetzen können müssen wir es ersteinmal WordPress herunterladen. Unter dem Link https://de.wordpress.org/download/ können wir die Source-Dateien als Zip downloaden. Die Zip-Datei wird nun in das `htdocs/OI-OpenLayersEditor-with-Wordpress` Verzeichnis, welches in Kapitel **3.1.1 - XAMPP installieren und konfigurieren** erstellt wurde, entpackt. Als nächsten Schritt rufen wir die Adresse `http://localhost/OI-OpenLayersEditor-with-Wordpress` über ein Browser auf, es erscheint die Folgende Seite.
   
   ![alt text](http://homepageanleitung.de/wp-content/uploads/2015/07/wordpress-installieren.png "WordPress Begrüßung")
   
   WordPress begrüßt uns und teilt uns mit, dass wir eine existierende Datenbanktabelle benötigen und ohne diese Informationen nicht fortfahren können. Da wir aber bei der XAMPP Konfiguration eine Datenbanktabelle angelegt haben, können wir auf den Button `Los geht´s!` klicken. Damit gelangen wir zur nächsten Seite, wie im Bild unten gezeigt.
   
   ![alt text](https://online-marketing-site.de/wp-content/uploads/wordpress-installieren-zugangsdaten.png "WordPress Datenbank Informationen")
   
   Hier geben wir die Folgenden Informationen ein:
   * **Datenbank Name**: `osmeditor`
   * **Benutzername**: `root (bei XAMPP localhost standard)`
   * **Passwort**: `leer lassen (bei XAMPP localhost standard)`
   * **Datenbank host**: `localhost`
   * **Tabellen-Präfix**: `wp_ (standard bei Wordpress)`
   
   Nachdem wir die nötigen Datenbank Informationen eingegeben haben, klicken wir auf senden und wenn alles gut läuft kommt die letzte Seite der Installation, wie unten zu sehen.
   
   ![alt text](https://www.miss-webdesign.at/mw/wp-content/uploads/2016/01/wordpress-installieren-website-informationen.png "WordPress allgemeine Informationen")
   
   WordPress möchte nun, dass wir den `Titel` der Webseite eingeben, hier ist der Titel gleich des Verzeichnisses, also `OI-OpenLayersEditor-with-Wordpress`. `Benutzername`, `Passwort` und `E-Mail-Adresse` werden vom Nutzer ausgewählt und sind für den späteren Login im Backend-Bereich wichtig. Nachdem alle Eingaben gemacht wurden, wird WordPress mit Klick auf `WordPress Installieren` installiert.

---
#### 3.1.3 OpenLayers JavaScript-Bibliothek
---

* ##### Was ist OpenLayers:
   
   OpenLayers ist eine JavaScript-Bibliothek, mit der Geodaten im Web-Browser angezeigt werden können. Sie ist in der Programmiersprache JavaScript geschrieben und ist unabhängig von der eingesetzten Serversoftware. Die Software stellt typische Webmapping-Elemente bereit, wie beispielsweise eine Skala zum verändern des dargestellten Maßstabs. OpenLayers wurde Jahrelang auf der Startseite von OpenStreetMap eingesetzt und wird unter anderem beim Schweizer Geoportal des Bundes verwendet.
   
* ##### OpenLayers-Bibliothek in WordPress einbinden:

   Nachdem die WordPress Installation erfolgreich fertig gestellt ist, wird es Zeit OpenLayers in die WordPress Umgebung einzubinden. Dazu benötigen wir die Folgenden html script- und link-Tags:
   
   ```Html
   <link rel="stylesheet" href="https://openlayers.org/en/v4.6.4/css/ol.css" type="text/css">
   <script src="https://openlayers.org/en/v4.6.4/build/ol.js" type="text/javascript"></script>
   ```
   
   Diese liefern uns die OpenLayers JavaScript-Bibliothek und die zur darstellung nötige CSS-Datei. In dem aktuell aktiven WordPress Theme, zu finden unter `..xampp\htdocs\OI-OpenLayersEditor-with-Wordpress\wp-content\themes\[Theme_Name]`, werden in der `header.php` die zwei Zeilen von oben ergänzt.
   
   ```Html
   <!DOCTYPE html>

   <html class="no-js" <?php language_attributes(); ?>>
	   <head profile="http://gmpg.org/xfn/11">
		
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
 
		<?php wp_head(); ?>
	      
	      	<link rel="stylesheet" href="https://openlayers.org/en/v4.6.4/css/ol.css" type="text/css">
         	<script src="https://openlayers.org/en/v4.6.4/build/ol.js" type="text/javascript"></script>
         ...
	 ...
   ```
   
   Nach Implementierung der zwei Zeilen in die `header.php` Datei ist OpenLayers nun einsatzbereit.

## 4 Realisierung
### 4.1 Implementierung der Software
---
#### 4.1.1 Erstellen der Map und der dafür benötigten Komponenten 
---

* ##### Der HTML-Code
   
   In der `page-editor.php`, zu finden unter `..xampp\htdocs\OI-OpenLayersEditor-with-Wordpress\wp-content\themes\hitchcock\`, erstellen wir das HTML Element 
   
   ```Html 
		<div id="map" class="map"></div> 
   ```
   
   In dem ``<div>``-Container wird die Karte gerendert und angezeigt
   
* ##### Der JavaScript-Code

   Der JavaScript-Code sieht wie folgt aus:
      
   ```javascript
		var osmLayer = new ol.layer.Tile(
		{
			source: new ol.source.OSM()
		});
   ```
      
   Zunächst legen wir eine Variable mit dem Namen `osmLayer` an und weisen dieser eine Tile-Layer, mit der source `ol.source.OSM()` zu. Als nächstes benötigen wir eine `ol.View`.
      
   ```javascript
		var berlin = ol.proj.transform([13.40495, 52.52001], 'EPSG:4326', 'EPSG:3857');

		var view = new ol.View(
		{
			center: berlin,
			zoom: 17
		});
   ```
      
   Wir legen mit `var view = new ol.View` eine neue View an. Mit den Properties **center** und **zoom** werden die Startkoordinaten und Zoomfaktor eingestellt. Hier:
   * **center**: `berlin (Koordinaten von Berlin)`
   * **zoom**: `17`
      
   Da dies ein Editor ist, benötigen wir eine Schicht, auf die der Nutzer mit der Karte interagieren kann, der folgende Code legt so eine Vector-Schicht an:
      
   ```javascript
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
   ```
      
   Der Vector-Schicht werden die folgenden Properties zugewiesen:
   * **name**: `name des Vectors (vector_layer_for_editing)`
   * **source**: `Die Source of Features (new ol.source.Vector())`
   * **style**: `Der Style der gezeichneten Geometrien`
      
   Wir möchten, dass nach Abschluss einer Interaktion (Geometrie zeichnen), sich ein Popup Fenster öffnet, in die wir zusätzliche Informationen eingeben können. Dies tut der folgende Code:
      
   **HTML-Code:**
   ```html 
		<div id="popup" class="ol-popup">
		<a href="#" id="popup-closer" class="ol-popup-closer"></a>
		<div id="popup-content" class="editor-popup-content">
   ```
   Es werden in der `page-editor.php`-Datei die für das Popup-Fenster notwendigen `<div>`-Container angelegt. Der folgende JavaScript-Code arbeitet mit diesen `<div>`-Containern.
      
   **JavaScript-Code:**
   ```javascript
		var container = document.getElementById('popup');
		var content = document.getElementById('popup-content');
		var closer = document.getElementById('popup-closer');
		
		var overlay = new ol.Overlay(
		{
			element: container,
			autoPan: true,
			autoPanAnimation: 
			{
				duration: 250
			}
		});
		
		closer.onclick = function() 
		{
			clearMap();
			return false;
		};
   ```
      
   Da wir alle benötigten Komponenten erstellt haben, können wir nun die Kernkomponente implementieren. Die `ol.Map()` sieht folgendermaßen aus:
      
   ```javascript
		var map = new ol.Map(
		{
			target: 'map',
			layers: [osmLayer, vector_layer],
			overlays: [overlay],
			view: view
		});
   ```
      
   Mit `var map = new ol.Map()` legen wir eine neue Karteninstanz an und weisen sie der Variable `map` zu. Im folgenden werden die einzelnen Properties erklärt:
   * **target**: `'map'`, dies ist das `<div>`-Container id-Attribut, in welches die Karte gerendert wird
   * **layers**: `[osmLayer, vecctor_layer]`, die notwendigen Layer, die angelegt wurden
   * **overlays**: `[overlay]`, das Popup-Fenster, welches wir erstellt haben
   * **view**: `view`, die View, mit den Startkoordinaten und Zoomfaktor

---
#### 4.1.2 Die Nutzerinteraktion implementieren
---

   Im folgenden werden wir die Nutzerinteraktion mit der Karte implementieren. Dafür definieren wir ersteinmal globale Variablen.

   ```javascript
		var select_interaction, draw_interaction, modify_interaction;
		var $interaction_type = jQuery('[name="interaction_type"]');
		var $geom_type = jQuery('#geom_type');
		$data_type = jQuery('#data_type');
   ```
   
   Baue neu, wenn Interaction Type ändert
   ```javascript
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
   ```
   
   Baue neu, wenn Geometrie Typ sich ändert
   ```javascript
		$geom_type.on('change', function(e) 
		{
			clearMap();
			map.removeInteraction(draw_interaction);
			addDrawInteraction();
		});
   ```
   
   Säubere Map und baue neu, wenn sich Datenyp ändert
   ```javascript
		$data_type = jQuery('#data_type');
	
		// clear map and rebuild interaction when changed
		$data_type.on('change', function() 
		{
			clearMap();
			map.removeInteraction(draw_interaction);
			addDrawInteraction();
		});
   ```
   
   Die Funktion addModifyInteraction()
   ```javascript
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
   ```
   
   Die addDrawInteraction() Funktion
   ```javascript
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
				jQuery('#object-type-radio-' + $geom_type.val()).show();
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
				var allFeat	= restOfFeat.concat(currentFeat);

			// save the changed data
			saveData(allFeat);
			});
		}
   ```
   
   Die outputData Funktion
   ```javascript
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
   ```
   
   Die Funktionen clearMap(), uid()
   ```javascript
		jQuery("#delete").click(function() 
		{
			clearMap();
		});

		// clears the map and the output of the data
		function clearMap() 
		{
			jQuery('#object-type-radio-Point').hide();
			jQuery('#object-type-radio-LineString').hide();
			jQuery('#object-type-radio-Polygon').hide();
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
   ```


## 5 Ergebnis

Das Ergebnis ist ein erster Prototyp, mit dem man `Punkte`, `Linien` und `Polygone` Zeichnen und im nachhinein modifizieren kann. Die Daten zu den eingezeichneten Geometrien werden je nach gewähltem Datentyp in dem Datenfenster angezeigt, diese werden im Moment nicht persistiert. Auch die zusätzlichen Angaben, wie `Object Type` und `Object Name` werden nicht in die Daten mit aufgenommen, diese Funktionalität muss nachgerüstet werden. Im folgenden sind ein Paar Screenshots vom Editor.
