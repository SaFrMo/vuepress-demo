<?php
/*
 * Add vue.js router to rest-easy data
 */
	function add_routes_to_json($jsonData){

        // Get the name of the category base. Default to "categories"
        $category_base = get_option('category_base');

        // build out router table to be used with Vue
        $jsonData['routes'] = array(

            // Per-site
            // '/path'                              => 'VueComponent',
            // '/path/:var'                         => 'ComponentWithVar'
            // '/path/*/:var'                       => 'WildcardAndVar'
            // path_from_dev_id('dev-id')  		=> 'DefinedByDevId',
		    // path_from_dev_id('dev-id', '/append-me') => 'DevIdPathPlusAppendedString'
			path_from_dev_id('fh-components')		=> 'WorkGrid',
			path_from_dev_id('fh-components', '/:component')	=> 'WorkDetail',
			path_from_dev_id('animations')			=> 'WorkGrid',
			path_from_dev_id('animations', '/:animation')	=> 'WorkDetail',
			path_from_dev_id('about')				=> 'About',

            // Probably unchanging
            ''                                      => 'FrontPage',
            '/' . $category_base                    => 'Archive',
            '*'                                		=> 'Default'
        );

		return $jsonData;
	}
	add_filter('rez_build_all_data', 'add_routes_to_json');
