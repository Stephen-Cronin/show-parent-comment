=== Plugin Name ===
Contributors: StephenCronin
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=sjc@scratch99.com&currency_code=&amount=&return=&item_name=WP-ShowParentComment
Tags: comments, comment moderation, show parent comment, show comment parent, parent comment
Requires at least: 4.2
Tested up to: 4.3.1
Stable tag: 0.2.1
Add the parent comment to comments in the WP Admin area, in order to assist with comment moderation

== Description ==
When moderating comments in the WordPress Admin area, it is useful to be able to see the parent comment if one exists.

= How To Use It =
You don't need to do anything. Simply activate it and the parent comment will appear for comments that have one. 

= Compatibility =
* This plugin requires WordPress 4.2 or above (it probably works on older versions, but I haven't tested it and you really should be on the latest version!).
* I am not currently aware of any compatibility issues with any other WordPress plugins.

= Support =
The free version of this plugin is officially not supported, but if you leave a comment on the plugin's support forum, I'll try to help if I can.

= Disclaimer =
This plugin is released under the [GPL licence](http://www.gnu.org/copyleft/gpl.html). I do not accept any responsibility for any damages or losses, direct or indirect, that may arise from using the plugin or these instructions. This software is provided as is, with absolutely no warranty. Please refer to the full version of the GPL license for more information.

= Acknowledgments =
* This plugin is a result of Jeff Chandler's idea, expressed in [this tweet](https://twitter.com/jeffr0/status/638366391041572865).
* The clunky original UI was redesigned by Jason Lemieux from [Postmatic](http://gopostmatic.com/) in version 0.2.

== Installation ==
1. Download the plugin file and unzip it.
1. Upload the `show-parent-comment` folder to the `wp-content/plugins/` folder.
1. Activate the Show Parent Comment plugin within WordPress.

Alternatively, you can install the plugin automatically through the WordPress Admin interface by going to Plugins -> Add New and searching for Show Parent Comment.

== Frequently Asked Questions ==

= Where are the settings? =
There are none! This plugin is purposely kept simple.

== Screenshots ==

1. Show Parent Comment in action on the Comments screen.

== Changelog ==

= 0.2.1 (11 November 2015) =
* Bug Fix: Made changes to how the comment object is accessed so it works with WordPress 4.4 (plugin breaks with the beta version).

= 0.2 (22 September 2015) =
* Enhancement: Reworked the UI so that the parent comment appears before the comment, in a style similar to a blockquote (props to Jason Lemieux from Postmatic).

= 0.1.1 (19 September 2015) =
* Bug fix: Prevented the plugin from firing during Ajax requests, as we don't want the parent comment added then (for example when user edits their comment on the front end via Ajax).
* Enhancement: Simplified the introduction to the parent comment, removing author name and edit link.
* Enhancement: Tweaked the background colour of the parent comment.
* Enhancement: Slightly increased the size of the Show More link.

= 0.1 (8 September 2015) =
* Initial Beta Release.
