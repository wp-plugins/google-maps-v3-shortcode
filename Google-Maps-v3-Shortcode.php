<?php
/*
Plugin Name: Google Maps v3 Shortcode
Plugin URI: http://gis.yohman.com
Description: This plugin allows you to add one or more maps to your page/post using shortcodes.  Features include:  specify location by address or lat/lon combo, add kml, show address, add your own custom image icon, set map size.
Version: 0.0
Author: yohda
Author URI: http://gis.yohman.com/
*/

// [tag1] -> Some Longer Text


// Add the google maps api to header
add_action('wp_head', 'gmaps_header');

function gmaps_header() {
	?>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<?php
}

function mapme($attr) {

	// default atts
	$attr = shortcode_atts(array(	'lat'   => '0', 
									'lon'    => '0',
									'id' => 'map',
									'z' => '1',
									'w' => '400',
									'h' => '300',
									'maptype' => 'ROADMAP',
									'address' => '',
									'kml' => '',
									'marker' => '',
									'markerimage' => '',
									'traffic' => 'no'), $attr);
									

	$returnme = '
    <div id="' .$attr['id'] . '" style="width:' . $attr['w'] . 'px;height:' . $attr['h'] . 'px;border:1px solid red;"></div><br>

    <script type="text/javascript">

		var latlng = new google.maps.LatLng(' . $attr['lat'] . ', ' . $attr['lon'] . ');
		var myOptions = {
			zoom: ' . $attr['z'] . ',
			center: latlng,
			mapTypeId: google.maps.MapTypeId.' . $attr['maptype'] . '
		};
		' . $attr['id'] . ' = new google.maps.Map(document.getElementById("' . $attr['id'] . '"),
		myOptions);
		';
		
		//kml
		if($attr['kml'] != '') 
		{
			$returnme .= '
			var kmllayer = new google.maps.KmlLayer(\'' . $attr['kml'] . '\');
			kmllayer.setMap(' . $attr['id'] . ');
			';
		}
		
		//traffic
		if($attr['traffic'] == 'yes')
		{
			$returnme .= '
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(' . $attr['id'] . ');
			';
		}
	
		//address
		if($attr['address'] != '')
		{
			$returnme .= '
		    var geocoder_' . $attr['id'] . ' = new google.maps.Geocoder();
			var address = \'' . $attr['address'] . '\';
			geocoder_' . $attr['id'] . '.geocode( { \'address\': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					' . $attr['id'] . '.setCenter(results[0].geometry.location);
					';
					
					if ($attr['marker'] !='')
					{
						//add custom image
						if ($attr['markerimage'] !='')
						{
							$returnme .= 'var image = "'. $attr['markerimage'] .'";';
						}
						$returnme .= '
						var marker = new google.maps.Marker({
							map: ' . $attr['id'] . ', 
							';
							if ($attr['markerimage'] !='')
							{
								$returnme .= 'icon: image,';
							}
						$returnme .= '
							position: ' . $attr['id'] . '.getCenter()
						});
						';
					}
			$returnme .= '
				} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
			});
			';
		}

		//marker: show if address is not specified
		if ($attr['marker'] != '' && $attr['address'] == '')
		{
			//add custom image
			if ($attr['markerimage'] !='')
			{
				$returnme .= 'var image = "'. $attr['markerimage'] .'";';
			}

			$returnme .= '
				var marker = new google.maps.Marker({
				map: ' . $attr['id'] . ', 
				';
				if ($attr['markerimage'] !='')
				{
					$returnme .= 'icon: image,';
				}
			$returnme .= '
				position: ' . $attr['id'] . '.getCenter()
			});
			';
		}

		$returnme .= '</script>';
		
		return $returnme;
	?>
    

	<?php
}
add_shortcode('map', 'mapme');


?>