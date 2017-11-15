=== Simple Subscription Plugin ===
Contributors: Peter Tumulty
Author URL: http://ptums.me
Tags: blogs, opt-in, email marketing, newsletter plugin, admin, plugin, email, mail, wordpress
Requires at least: 4.8.3
Tested up to: 4.8.3
Stable tag: 1.0

== Description ==
This plugin is a simple subscription plugin. It enables users to get emails when latest posts are published by

<b>Update November 14, 2017</b>

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Update setting.php with your database settings. You can find the settings in 'wp-config.php' in your www directory.
4. Place `[ss_subscriber]` in your templates.
5. Navigate to Settings > Simple Subscription to select categories to be displayed and edit subscriber email and categories.

== To Do: ==
1. Create an email action function that will fire whenever:
   1. Disable Function after email sent. Set a timer to it.
   2. Enable HTML in email and limit content in body of email.
2. Confirmation Email When user is subscribed.
