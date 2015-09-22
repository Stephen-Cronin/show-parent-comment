<?php
/*
Plugin Name: Show Parent Comment
Plugin URI: https://wordpress.org/plugins/show-parent-comment/
Description: Show the parent comment as part of the comment text, in the Admin area only. Useful for getting context when moderating comments.
Version: 0.2
Date: 22 September 2015
Author: Stephen Cronin (Scratch99 Design)
Author URI: http://scratch99.com/

   Copyright 2015  Stephen Cronin  (email : sjc@scratch99.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


// if this is an Ajax request, no need to do anything, return
if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
    return;
}


/**
 * Filter comments and add parent comment to output
 */
function spc_show_parent_comment( $content ) {

    // get the global comment variable
    global $comment;

    // if there's no parent comment, return the comment text unchanged
    if ( ! $comment->comment_parent ) {
        return $content;
    }

    // otherwise grab the parent and add it to the comment
    else {

        // get the parent comment into an object we can use
        $parent_comment = get_comment( $comment->comment_parent );

        // create the string to be appended to the comment text
        $string = '<div class="spc-parent-comment-container"><div class="spc-parent-comment">' . $parent_comment->comment_content . '</div></div>';

        // append and return
        return $string . $content;
    }
}

/**
 * Call function to filter comments on Admin requests
 */
function spc_show_parent_comment_admin() {
    add_filter( 'get_comment_text', 'spc_show_parent_comment' );
}
add_action( 'admin_init', 'spc_show_parent_comment_admin' );


/**
 * Load the necessary scripts and stylesheets
 */
function spc_show_parent_comment_enqueue( $hook ) {

    // exit if not on a page that show comments (the Comments page or Edit post/page screen)
    if ( 'edit-comments.php' != $hook && 'post.php' != $hook ) {
        return;
    }

    // register and enqueue our stylesheets and scripts as necessary
    wp_register_style( 'show_parent_comment_admin_css', plugins_url( '/includes/show-parent-comment.css', __FILE__ ), false );
    wp_enqueue_style( 'show_parent_comment_admin_css' );
    wp_enqueue_script( 'show_parent_comment_admin_js', plugins_url( '/includes/show-parent-comment.js', __FILE__ ), array( 'jquery' ) );

}
add_action( 'admin_enqueue_scripts', 'spc_show_parent_comment_enqueue' );
