#Personal website redesign 2015 - clone of https://github.com/niekdegreef/business readme file as per business theme #

##Local tools
 * Illustrator
 * MAMP
 * Codekit (SCSS / Autoprefixr / Susy)
 * Github client
 * Susy grids - https://github.com/ericam/susy (used through codekit)
 * Devdocs - http://devdocs.io
 * VirtualBox with Windows & IE 8 and 9 for testing

##Online tools

* Typekit where necesarry
* Typecast
* Gridlover

##Process

1. Design & set up styles on paper, then in Illustrator
1. Configure servers: MAMP / remote dev server [check php versions are same]
1. Set up folder structure, drop into codekit [check libsass compiler & autoprefixr checked] Note as of 12-14 libsass & susy don't like each other, fix on the way apparently, til then, slower compiling times
1. Download latest underscores starter theme: http://underscores.me/
1. Get latest version of susy https://github.com/ericam/susy (or use via Codekit)
1. Include " @import "susy"; " in the main.scss to use Susy via Codekit
1. Set basic variables, colours, padding, margin (with susy so these are relative to the grid)
1. Edit the styles document, change colour names & classes where needed
1. Define typography (http://www.gridlover.net/app/ & http://typecast.com/)
1. Take parts from the underscores.css and put them in correct files

##Plugins

* ACF 	http://www.advancedcustomfields.com/
* ACF repeater collapser 	https://github.com/mrwweb/ACF-Repeater-Collapser, for faq lists for example, to long to scroll through
* Adminimize 	https://wordpress.org/plugins/adminimize/
* WP migrate DB https://deliciousbrains.com/wp-migrate-db-pro/
* clean-author-admin-theme 		My own little plugin for a custom login screen, logo & background image
* regenerate-thumbnails		https://wordpress.org/plugins/regenerate-thumbnails/

## File structure

* ### styles
[http://brettjankord.com/projects/style-guide-boilerplate/ OR https://github.com/adactio/Pattern-Primer]

	* index.php 		[ style guide accesible at site.styles ]
	* style.css 		[ import from site's css: @import '../../style.css'; ]

* ### css

	* ### css
		* admin.css 				 [ load only if necesarry, used for custom styling of WP admin ] 

	* ### susy 						 [ https://github.com/ericam/susy ]

	* ### animate	 				 [ https://github.com/geoffgraham/animate.scss, import only the necesarry in animate.scss]

	* ### scss
		* **base**
			* _reset.scss 			 [ reset ] 
			* _normalize.scss 		 [ normalize (instead of reset when applicable) ] 
			* _underscores.scs		 [ underscores.me style - check if necesarry, pref. copy to scss files ]
			* _susy        			 [ susy https://github.com/ericam/susy ]
			* _global.scss        	 [ global.scss ]
			* _typography.scs		 [ Typography rules  ]
			* _shittybrowser.scs	 [ IE rules  ]
			* _touch.scss   		 [ touch rules  ]
			* _genericons.scss  	 [ icons ]
		* **helpers**
			* _variables.scss  		 [ Sass Variables ]
			* _mixins.scss     		 [ Sass Mixins ]
		* **components**
			* _components.scss  	 [ Reusable components ]
			* _navigation.scss  	 [ Navigation ]
			* _buttons.scss     	 [ Buttons ]
		* **layout**
			* _grid.scss       		 [ Grid system ]
			* _header.scss     		 [ Header ]
			* _footer.scss     		 [ Footer ]
			* _sidebar.scss    		 [ Sidebar ]
			* _forms.scss      		 [ Forms ]
		* **pages**
			* _home.scss      		 [ Home specific styles ]
			* _gallery.scss   		 [ Gallery specific styles ]
			* _contact.scss   		 [ Contact specific styles ]
		* **themes**
			* _mailer.scss     		 [ Mailer theme ]
			* _admin.scss     		 [ Mailer theme ]
		* **vendors**
			* _jquery-ui.scss   	 [ scss for accordion ]
			* _slider.scss   	 	 [ slider ]
			* _lightgallery.scss  	 [ lightgallery ]
		* **quick fixes**
			* _bits.scss 
			* _shame.scss
		* **main.scss**				 [ imports everything, don't compile directly ]

* ### js
	* **vendors**
		* _jquery.js     	
		* _modernizr.js 
		* _masonry.js   
		* _stellar.js   
	* **min**
		* _myscripts.min.js	# minified
		* _vendor.min.js	# minified - combined all vendor .js

* ### images

* ### Markup (based on Wordpress theme structure) 
[as per the Underscores theme https://github.com/Automattic/underscores.me]:

	* 404.php				#
	* archive.php				#
	* comments.php				#
	* content-none.php			#
	* content-page.php			#
	* content-search.php			#
	* content-single.php			#
	* content.php				#
	* footer.php				#
	* functions.php				#
	* header.php				#
	* index.php				# start
	* page.php				#
	* screenshot.png			#
	* search.php				#
	* sidebar.php				#
	* single.php				#
	* style.css					# style.scss compiles to this
	* style.scss				# imports css/scss/main.css, but includes wp-theme statement, with       / * ! content */ at top, this prevents compiling into compressed by Codekit, because Wordpress needs this to recognise the theme

### import block:

	@import "susy";
	@import "variables.scss";
	@import "mixins.scss";
	@import "typography.scss"; 
	@import "reset.scss";
	@import "normalize.scss";
	@import "genericons.scss";
	@import "global.scss";
	@import "components.scss";
	@import "lightgallery.scss";
	@import "underscores.scss";
	@import "shittybrowser.scss";
	@import "touch.scss";
	@import "bits.scss";
	@import "buttons.scss";
	@import "navigation.scss";
	@import "grid.scss";
	@import "header.scss";
	@import "footer.scss";
	@import "sidebar.scss";
	@import "forms.scss";
	@import "home.scss";
	@import "gallery.scss";
	@import "contact.scss";
	@import "mailer.scss";
	@import "slider.scss";
	@import "shame.scss";

### SVG notes
	* Using svg for the logo by default, note to remove width & height, otherwise SVG does not show up on ipad
	* png fallback

### References
	* http://css-tricks.com/snippets/wordpress/