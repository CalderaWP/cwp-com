/**
 * CWP Theme
 * http://CalderaWP.com
 *
 * Copyright (c) 2015 Josh Pollock
 * Licensed under the GPLv2+ license.
 */
 /** globals jQuery, cwp_theme**/
 ( function( window, undefined ) {
	'use strict';

    // initialise baldrick triggers
    jQuery('.wp-baldrick').baldrick({
     request     : cwp_theme.adminjax,
     method      : 'POST'
    });

 } )( this );
