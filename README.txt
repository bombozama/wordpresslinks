=== Bombozama ===
Contributors: bombozama
Tags: widgetkit, link manager, blogroll
Requires at least: 3.0.1
Tested up to: 4.5
Stable tag: 4.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Widgetkit Content Provider: Wordpress Links

== Description ==

This plugin allows to use the old Wordpress Link Manager as a content provider for [Widgetkit](http://yootheme.com/widgetkit).

* Content is selectable by Link Categories or by manual input of Link id's.
* Users can build from simple lists of links to complex galleries by using the link's image attribute.

== Installation ==

As of version 3.5, the Links Manager and blogroll are hidden for new Wordpress installs. Make sure the Link Manager is enabled, either by installing the [Link Manager Plugin](https://wordpress.org/support/plugin/link-manager) or by including the following in your theme's `functions.php` file:
```
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
```

1. Make sure the Link Manager is enabled.
2. This plugin requires Widgetkit to be up and running. Get that second.
3. Upload the plugin to the `/wp-content/plugins/` directory
4. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Does this work for all versions of Widgetkit? =
I don't know. I developed it with Widgetkit v.2.7.6.- Test it at your own risk.

= What is the purpose of more field mapping options? =
Just in case you need extra fields from the links at the time of customizing widget output.

== Screenshots ==

1. Widget creation screen.

== Changelog ==

= 1.0 =
* Initial release