/*! CWP Theme - v0.1.0 - 2015-01-08
 * http://CalderaWP.com
 * Copyright (c) 2015; * Licensed GPLv2+ */
/** globals jQuery, cwp_theme**/
 ( function( window, undefined ) {
	'use strict';

    // initialise baldrick triggers
    jQuery('.wp-baldrick').baldrick({
     request     : cwp_theme.adminjax,
     method      : 'POST'
    });

 } )( this );
