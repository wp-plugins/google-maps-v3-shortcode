=== Plugin Name ===
Contributors: yohman
Donate link: http://gis.yohman.com/blog/2010/10/27/wordpress-plugin-google-maps-shortcode/
Tags: google, google maps, google maps api, kml, network links, shortcode, shortcodes, google maps v3, v3, geocode, map, mapping, maps, latitude, longitude, api, traffic
Requires at least: 2.8
Tested up to: 3.01
Stable tag: 1.02

This plugin allows you to add one or more maps (via the Google Maps v3 API) to your page/post using shortcodes. 


== Description ==

This plugin allows you to add a google map into your post/page using shortcodes. 

Features:

* multiple maps on the same post
* set map size
* set zoom level
* set map type
* set location by latitude/longitude
* set location by address
* add marker
* add custom image as map icon
* add KML via URL link
* show traffic
* support for Google My Maps

See a full description here:

http://gis.yohman.com/blog/2010/10/27/wordpress-plugin-google-maps-shortcode/

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `google-maps-v3-shortcode` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Add shortcodes in your posts (ex: [map address="New York, USA"])

== Frequently Asked Questions ==
= How do I add a map to my post =

Using shortcodes in the edit box for your post.

Ex: [map address="New York, USA"]

See a full description of available shortcodes here:

http://gis.yohman.com/blog/2010/10/27/wordpress-plugin-google-maps-shortcode/

= Can I add multiple maps to the same post? =

Yes!  But make sure you use the "id" parameter to create unique id's for each map.

Ex: 
[map id="map1" address="New York, USA"]
[map id="map2" address="Los Angeles, USA"]

= Can I change the size of the map? =
Yes!  Just add your own width and height parameters (the default is 400x300).

Ex:
[map w="200" h="100"]

= Can you add KML's? =
Yes!  Just provide the url link to the KML file.  The map will auto center and zoom to the extent of your KML.

Ex:
[map kml="http://gmaps-samples.googlecode.com/svn/trunk/ggeoxml/cta.kml"]

= What about adding Google MyMaps? =
Yes!  To do so, follow the instructions on this tutorial:



== Screenshots ==

See full working examples here:

http://gis.yohman.com/blog/2010/10/27/wordpress-plugin-google-maps-shortcode/

== Changelog ==

= 1.02 =
* Fixed bug to allow for KML's with special characters in the URL (this makes it possible to add Google MyMap KML's)

= 1.01 =
* Added info window support
* Got rid of red border around maps

= 1.0 =
* First release

== Upgrade Notice ==

= 1.02 =
* Fixed bug to allow for KML's with special characters in the URL (this makes it possible to add Google MyMap KML's)

= 1.01 =
* Added info window support
* Got rid of red border around maps

= 1.0 =
* First release
