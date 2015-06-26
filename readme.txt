=== Codeins Post Voting ===
Contributors: kapilsharma12
Tags: post voting, post rating, hot cool, hot cool bar.
Donate link: www.codeins.org/donate
Requires at least: 3.5
Tested up to: 4.2.2
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Codeins Post Voting bar can be used to show how hot or cool your post is.

== Description ==
Codeins Post Voting bar can be used to show how hot or cool your post is. Every post is shown with the hot cool bar and registered user can vote for hot or cool. if user is not registered it will open a popup if a user want to login or register.

== Installation ==
1. Upload the Codeins Post Voting plugin  to the `/wp-content/plugins/` directory
2. Activate the plugin through the `\'Plugins\'` menu in WordPress
3. If bar not display in your site after activation plugin. you can add support in theme by adding code
`<?php
	if(function_exists('codeins_add_vote_content'))
			echo codeins_add_vote_content();
?>`
into `index.php` of you theme at appropriate location. 


== Screenshots ==
1. How plugin look on home page.
2. General setting admin page.
3. Post voting stats.
4. User Management settings.

== Frequently Asked Questions ==
= Q.1 How add rating bar to posts? =
Ans. it add automatically when new post load.
= Q.1 Can i turn off bar for all post? =
Ans. Yes, you can go to this plugins general setting page you can turn it off.
= Q.2 can i change hot cool bar settings? =
Ans. Yes, you can go to this plugins general setting page and make changes to bar the way you wan it.

== Changelog ==
= 1.0 =
 * initial release

== Upgrade Notice ==
= 1.0 =
 * initial release