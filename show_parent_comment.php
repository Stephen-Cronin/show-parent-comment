<?php
/*
Plugin Name: Show Parent Comment
Plugin URI: http://scratch99.com/
Description: Show the parent comment as part of the comment text, in the Admin area only. Useful for getting context when moderating comments.
Version: 0.1
Date: 1 September 2015
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


// if there's no parent, return comment text as is, otherwise grab the parent and add it.
function spc_show_parent_comment( $content ) {
    global $comment;
    if ( ! $comment->comment_parent ) {
        return $content;
    }
    else {
        $parent_comment = get_comment( $comment->comment_parent );
        $string = '<div style="border:1px solid #ccc; padding: 8px 12px; background:#FEEFEE;">In reply to ' . $parent_comment->comment_author . ' who said: ' . $parent_comment->comment_content . '</div>';
        return $content . $string;
    }
}

// if it's an admin request, filter comments and add comment parent below text
function spc_show_parent_comment_admin() {
    add_filter( 'get_comment_text', 'spc_show_parent_comment' );
}
add_action( 'admin_init', 'spc_show_parent_comment_admin' );
