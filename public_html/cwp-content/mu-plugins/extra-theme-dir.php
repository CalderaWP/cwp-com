<?php
/*
 Plugin Name: Extra Theme Dir
 */
/**
 * Adds an additional, non gitignored theme directory
 */
register_theme_directory( trailingslashit( WP_CONTENT_DIR ) . '/cwp-themes' );
