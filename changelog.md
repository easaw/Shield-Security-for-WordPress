= 6.9.0 - Series =
*Released: 6th September, 2018* - [Release Notes](https://icwp.io/dc)

* **(v.0)**  NEW:		[**PRO**] [Traffic Watcher](https://icwp.io/c1) - live tracking of all requests to your site.
* **(v.0)**  NEW:		[**PRO**] [Yubikey](https://icwp.io/c1) - Allows for multiple Yubikeys on the same user profile.
* **(v.0)**  ADDED:		[**PRO**] Option to include listing of affected files within Hack Guard notification emails.
* **(v.0)**  ADDED:		Option to delete the Security Admin Access Key
* **(v.0)**  ADDED:		Option to add WooCommerce roles to 2FA-Email setting.
* **(v.0)**  CHANGED:	Basic Stats system now requires minimum PHP v5.4.
* **(v.0)**  CHANGED:	Password Policies now requires minimum WordPress v4.4.
* **(v.0)**  IMPROVED:	Password expiration now redirects to the 'set password' screen, instead of the user profile.
* **(v.0)**  IMPROVED:	Password capture for purposes of password policies is improved.
* **(v.0)**  IMPROVED:	You can now delete the 'forceoff' file from inside the WP Admin.
* **(v.0)**  IMPROVED:	Audit Trail entries for emails will identify the file that's calling the `wp_mail` function.
* **(v.0)**  IMPROVED:	Audit Trail entries for post editing will identify the post type wherever possible.
* **(v.0)**  IMPROVED:	Audit Trail entries will try to display all message text correctly.
* **(v.0)**  IMPROVED:	Login/Register/Password forms are only checked when visitor is not logged-in.
* **(v.0)**  IMPROVED:	Major database code refactoring and other code improvements.
* **(v.0)**  IMPROVED:	User sessions handling.
* **(v.0)**  IMPROVED:	Security Admin UX - ajax session checking, with admin notifications and auto-page reload.
* **(v.0)**  IMPROVED:	Security Admin password setting now requires a confirmation password entry.
* **(v.0)**  IMPROVED:	Refined Cooldown timing system.
* **(v.0)**  IMPROVED:	Refined Bot checkbox Javascript.
* **(v.0)**  IMPROVED:	Cron entry cleanup after deactivation.
* **(v.0)**  UPDATED:	Bootstrap libraries to latest release v4.1.3.
* **(v.0)**  FIXED:		Potential bug with Plugin/Themes guard scanning.
* **(v.0)**  FIXED:		PHP Warning(s).

= 6.8 Series =
*Released: 11th June, 2018* - [Release Notes](https://icwp.io/d4)

* **(v.2)**  FIXED:		Bug with multi-factor authentication verification.
* **(v.2)**  FIXED:		Bug with chosen reCAPTCHA style not being honoured on login pages
* **(v.2)**  FIXED:		Bug with Invisible reCAPTCHA + WooCommerce
* **(v.2)**  FIXED:		Bug with Pwned passwords always being checked even if setting turned off.
* **(v.1)**  FIXED:		A couple of bugs with WooCommerce reCAPTCHA processing.
* **(v.1)**  FIXED:		A bug with user sessions cleaning
* **(v.0)**  ADDED:		[**PRO**] White Label - ability to re-brand the entire Shield Security plugin to your company brand.
* **(v.0)**  ADDED:		[**PRO**] Option for all users to receive notification email upon login to their accounts.
* **(v.0)**  IMPROVED:	Completely rebuilt the bot and reCAPTCHA login protection system.
* **(v.0)**  IMPROVED:	Import/Export system hugely improved with respect to automated push of options from Master sites.
* **(v.0)**  IMPROVED:	A different approach to sessions management that should handle sessions a bit better.
* **(v.0)**  IMPROVED:	Expired user sessions are cleaned from the DB using a cron, and on Insights Dashboard load.

= 6.7 Series =
*Released: 21st May, 2018* - [Release Notes](https://icwp.io/cx)

* **(v.2)**  ADDED:		[**PRO**] Admin Notes feature - Notes can now be easily deleted (editing will not be possible).
* **(v.2)**  UPDATED:	Some translations.
* **(v.2)**  FIXED:		A few bugs with the Insights Dashboard.
* **(v.2)**  FIXED:		Removed the dependency on jQuery with Invisible reCAPTCHA.
* **(v.1)**  FIXED:		A few bugs with the Insights Dashboard
* **(v.1)**  ADDED:		[**PRO**] Admin Notes feature - you can now add notes to the Shield plugin in the Insights Dashboard.
* **(v.0)**  ADDED:		All-New Insights Dashboard providing a high-level overview of your site security, with recommendations.
* **(v.0)**  ADDED:		Helpful, explanatory videos directly into the Guided Welcome Wizard.
* **(v.0)**  ADDED:		A simple test cron to demonstrate whether your site crons are running.
* **(v.0)**  ADDED:		[**PRO**] Full support for new WordPress GDPR Privacy Policy controls for exporting and erasing data.
* **(v.0)**  ADDED:		[**PRO**] New GDPR guided wizard for exporting/erasing particular data based on custom search results.
* **(v.0)**  CHANGED:	Guided Wizards now load through WP admin to fix ajax problems for poorly configured SSL on some sites
* **(v.0)**  IMPROVED:	Upgraded Bootstrap library to 4.1.1.
* **(v.0)**  IMPROVED:	Compatibility with AIO Events Cal - they like to force their old Twig libraries on everyone else.

= 6.6 Series =
*Released: 19th March, 2018* - [Release Notes](https://icwp.io/c3)

* **(v.7)**  IMPROVED:	reCAPTCHA JS is only included on pages where it's actually used by Shield.
* **(v.7)**  IMPROVED:	Upgrade Bootstrap library to 4.1.0.
* **(v.7)**  IMPROVED:	Include jQuery for the plugin badge as required
* **(v.6)**  ADDED:		Small exclusion in the firewall for a jetpack parameter.
* **(v.6)**  ADDED:		SVGs to the default list of files scanned by the plugin guard.
* **(v.6)**  ADDED:		Workaround for a [ridiculous NGG bug](https://wordpress.org/support/topic/forcefully-executing-wp_footer-not-compatible-with-other-plugins/).
* **(v.1-4)**  FIXED:	Various small fixes and improvements
* **(v.4)**  FIXED:		PHP Fatal Error on wp object cache.
* **(v.0)**  NEW:		[**PRO**] [Keyless Activation of Pro licenses](https://icwp.io/c1).
* **(v.0)**  ADDED:		[WordPress Password Policies](https://icwp.io/c2).
* **(v.0)**  ADDED:		Pwned Passwords Detection.
* **(v.0)**  IMPROVED:	Major rewrite of plugin AJAX handling.
* **(v.0)**  IMPROVED:	Notices to indicate the time of the last scans.
* **(v.0)**  FIXED:		A few bugs

= 6.5 Series =
*Released: 5th March, 2018* - [Release Notes](https://icwp.io/bu)

* **(v.0)**  IMPROVED:		[Plugin Guard](https://icwp.io/bq) better handles the case where a plugin/theme has been entirely renamed/removed.
* **(v.0)**  IMPROVED:		Attempts to access the XML-RPC system when it's disabled will now result in a transgression increment in the IP Black List
* **(v.0)**  IMPROVED:		Try to prevent black listing the server's own public IP address where visitor IP address detection is not correctly configured.
* **(v.0)**  ADDED:			[**PRO**] Provisional support for not processing 2FA logins for Woocommerce Social Login plugin.
* **(v.0)**  FIXED:			Plugin Guard better handles ignoring non-WordPress.org Plugins/Themes
* **(v.0)**  FIXED:			A few small bugs

= 6.4 Series =
*Released: 26th February, 2018* - [Release Notes](https://icwp.io/br)

* **(v.1-4)**  FIXED:		Various Fixes
* **(v.0)**  ADDED:			[**PRO**] New Scanner to [detect file changes for active plugins and themes](https://icwp.io/bq)
* **(v.0)**  IMPROVED:		Automatic updates for vulnerable plugins ignores [automatic updates delay setting](https://icwp.io/bc)
* **(v.0)**  CHANGED:		Email notifications for scanners will now link to the Wizard where possible, instead of listing files.

= 6.3 Series =
*Released: 12th February, 2018* - [Release Notes](https://icwp.io/bc)

* **(v.3)**  FIXED:			Bug with automatic updates delay setting
* **(v.2)**  CHANGED:		Changed a text that seems to cause servers to swallow-up emails. [See here for more reliable email](https://icwp.io/bi)
* **(v.1)**  FIXED:			Options page javascript to work around conflicts.
* **(v.0)**  ADDED:			[**PRO**] [Automatic updates stability delay](https://icwp.io/bc)
* **(v.0)**  IMPROVED:		Complete [plugin UI rebuild](https://icwp.io/bd), using the new Bootstrap 4.
* **(v.0)**  FIXED:			A few bugs with Google Authenticator.

= 6.2 Series =
*Released: 31st January, 2018* - [Release Notes](https://icwp.io/b6)

* **(v.2)**  FIXED:			Fix for IP Manager PHP error.
* **(v.2)**  IMPROVED:		Two-factor verification email.
* **(v.1)**  FIXED:			Bug where administrator login email notification setting is not being honoured.
* **(v.1)**  IMPROVED:		If a site is having trouble with database creation, User Sessions wont lock you out.
* **(v.0)**  IMPROVED:		Major overhaul of the Shield User Sessions system.
* **(v.0)**  IMPROVED:		Link the Security Admin authentication with the new Sessions system.
* **(v.0)**  IMPROVED:		Major overhaul to plugin's user meta data storage, limiting to a single DB entry for all data.
* **(v.0)**  ADDED:			[**PRO**] Ability to increase frequency of file system scans up to once every hour.
* **(v.0)**  ADDED:			[**PRO**] Add a "remember me" option, to allow users to skip Multi-factor authentication for a set number of days.

= 6.1 Series =
*Released: 15th January, 2018* - [Release Notes](https://icwp.io/ay)

* **(v.1)**  FIXED:			Verify link missing from the two-factor authentication verification email.
* **(v.0)**  ADDED:			3x more Shield Wizards: Multi-factor Authentication, Core File Scanning, Unrecognised File Scanning.
* **(v.0)**  ADDED:			You can now use regular expressions for file exclusions in the 'Unrecognised File Scanner'.
* **(v.0)**  CHANGED:		File Scanner email notifications now link to the appropriate scanner wizard directly.
* **(v.0)**  IMPROVED:		Plugin options pages restyling.
* **(v.0)**  IMPROVED:		Plugin refactoring and improvements.

= 6.0 Series =
*Released: 18th December, 2017*

* **(v.0)**  ADDED:			All-new Shield Welcome and Setup Wizard - more helpful guided wizards to come.
* **(v.0)**  ADDED:			[**PRO**] [Shield options import and export](https://icwp.io/at)
* **(v.0)**  ADDED:			[**PRO**] In conjunction with import/export - Shield Security Network: automated options syncing.
* **(v.0)**  CHANGED:		Going forward, new features and options will [support only PHP 5.4+](https://icwp.io/au). Existing features will remain unaffected.

= 5.20 Series =
*Released: 11th December, 2017*

* **(v.0)**  IMPROVED:		[**PRO**] Audit Trail length are configurable. Length for free is 50 entries (the original unpaginated limit)
* **(v.0)**  IMPROVED:		Large redesign of options sections to be more intuitive and cleaner
* **(v.0)**  IMPROVED:		Added dedicated help section for each module.
* **(v.0)**  IMPROVED:		Certain modules have an new *Actions* centre, such a Audit Trail viewer and User Sessions manager
* **(v.0)**  IMPROVED:		Audit Trails are now ajax-paginated. You can browse through all your audit trail entries
* **(v.0)**  IMPROVED:		User session tables are also ajax-paginated.

= 5.19 Series =
*Released: 4th December, 2017*

* **(v.1)**  FIXED:			Plugin Vulnerabilities scan for premium plugins.
* **(v.0)**  ADDED:			[**PRO**] Automated WordPress plugins vulnerability scanner with auto updates email notifications
* **(v.0)**  ADDED:			Added Google reCAPTCHA support for register/forget password pages.
* **(v.0)**  ADDED:			[**PRO**] Support for Multi-Factor Authentication for WooCommerce and other 3rd party plugins.
* **(v.0)**  ADDED:			[**PRO**] Bot-protection/Google reCAPTCHA support for BuddyPress register pages.

= 5.18 Series =
*Released: 27th November, 2017*

* **(v.0)**  ADDED:			[**PRO**] Invisible Google reCAPTCHA option.
* **(v.0)**  ADDED:			[**PRO**] Support for Google reCAPTCHA themes - light and dark.
* **(v.0)**  IMPROVEMENT:	Google reCAPTCHA is more reliable and configurable.

= 5.17 Series =
*Released: 23rd November, 2017*

* **(v.0)**  ADDED:			Shield Security goes Pro! Added new options and extras to premium clients.
* **(v.0)**  IMPROVEMENT:	Fix and improvement to Google reCAPTCHA.
* **(v.0)**  ADDED:			[**PRO**] Support for Woocommerce and Easy Digital Downloads login/registration form protection.
* **(v.0)**  ADDED:			[**PRO**] Ability to customise most user-facing texts.
* **(v.0)**  ADDED:			[**PRO**] Extra IP Transgression signal.

= 5.16 Series =
*Released: 16th October, 2017*

With this release, we fixed a clash of options for Google reCAPTCHA. Every attempt was made to ensure no interruption to your existing settings, but please check to ensure your reCAPTCHA settings are as you expect them to be.

* **(v.4)**  FIX:			Error with incorrect/unprefixed database table name used in SQL query.
* **(v.3)**  IMPROVEMENT:	Tweak to the Visitor IP Auto-detection to better ensure CloudFlare IP addresses are ignored.
* **(v.3)**  IMPROVEMENT:	Plugin Badge will now stay closed when a visitor closes it.
* **(v.2)**  FIX:			Removed some namespace parsing that broke on sites with PHP 5.2.
* **(v.1)**  FIX:			404 page displayed for password reset request when Login URL is renamed.
* **(v.0)**  IMPROVEMENT:	Much better auto-detection of valid request/visitor IP addresses.
* **(v.0)**  FIX:			Clashing of reCAPTCHA options for Comments and Login Protection.
* **(v.0)**  IMPROVEMENT:	Statistic Reporting database management and pruning.
* **(v.0)**  FIX:			Various system fixes and improvements.

= 5.15 Series =
*Released: 21st September, 2017*

* **(v.1)**  FIX:			Processing AJAX requests from the Network Admin side of WordPress.
* **(v.1)**  IMPROVEMENTS:	Better handling of file exclusions in the Hack Guard module.
* **(v.1)**  IMPROVEMENTS:	Better handling of fatal errors in loading Shield where some core files are missing.
* **(v.0)**  ADDED:			New HTTP Security Header: Referrer Policy.
* **(v.0)**  ADDED:			Supports paths for file exclusions in the Unrecognised File Scanner.
* **(v.0)**  IMPROVEMENTS:	Better interception of unintentional redirects to the hidden Login URL (e.g. /wp-admin/customize.php).
* **(v.0)**  IMPROVEMENTS:	Better handling of email sending entries in the Audit Trail.
* **(v.0)**  IMPROVEMENTS:	Improved (tabbed) display of Audit Trail.
* **(v.0)**  IMPROVEMENTS:	Better generation & handling of the One Time Password for email-based two-factor authentication.
* **(v.0)**  IMPROVEMENTS:	Some code clean up and refactoring.

= 5.14 Series =
*Released: 9th September, 2017*

* **(v.0)**  ADDED:			Option for administrators to manually override and set the source of the visitor IP address.
* **(v.0)**  UPDATED:		In-plugin documentation links to updated and revised helpdesk articles/blogs.
* **(v.0)**  IMPROVEMENTS:	Strip out any non-alphanumeric characters uses in the generation of Google Authenticator URLs.
* **(v.0)**  FIX:			Shield now ignores any requests sent to Rest API URIs with respect to Shield user sessions.

= 5.13 Series =
*Released: 15th August, 2017*

* **(v.2)**  IMPROVEMENTS:	Small adjustment to handling of Shield User sessions in conjunction with WordPress sessions.
* **(v.2)**  FIX:			Restore display of help links for options.
* **(v.1)**  FIX:			PHP 5.2 incompatibility.
* **(v.0)**  ADDED:			New option for [Unrecognised File Scanner](https://icwp.io/94) to scan the Uploads folder for JS and PHP files.
* **(v.0)**  ADDED:			Option to provide custom list of files to be excluded from the [Unrecognised File Scanner](https://icwp.io/94).

= 5.12 Series =
*Released: 3rd August, 2017*

* **(v.2)**  IMPROVEMENTS:	Improved support for Windows IIS hosting for [Unrecognised File Scanner](https://icwp.io/94)
* **(v.2)**  CHANGED:		Removed the email-based 2FA automatic login link.
* **(v.2)**  FIX:			Potential bug with Shield not recognising plugin configuration updates and not rebuilding options accordingly.
* **(v.1)**  ADDED:			A few more exclusions for the [Unrecognised File Scanner](https://icwp.io/94)
* **(v.1)**  FIX:			Fix for Fatal error.
* **(v.0)**  ADDED:			[Unrecognised File Scanner](https://icwp.io/94) release. Automatically detect and delete
							any files present in core WordPress directories that aren't part of your core installation.
* **(v.0)**  ADDED:			Updated Firewall rules for SQL under the 'Aggressive' rule set.

= 5.11 Series =
*Released: 26th July, 2017*

* **(v.1)**  FIX:			JSON syntax
* **(v.0)**  IMPROVEMENTS:	Final preparation for [Shield Central](https://icwp.io/83) release.

= 5.10 Series =
*Released: 19th June, 2017*

* **(v.2)**  FIXED:			Fatal error with GASP + Password Reset.
* **(v.2)**  FIXED:			Fatal error with failing reCAPTCHA HTTP requests.
* **(v.1)**  IMPROVEMENTS:	Further preparation for [Shield Central](https://icwp.io/83) release.
* **(v.0)**  ADDED:			More in-depth reporting and statistics gathering - options for reports will be made available
 							in a later release.

= 5.9 Series =
*Released: 31st May, 2017*

* **(v.0)**  ADDED:			Help Videos for 1 or 2 modules. More to come and just testing format and uptake.
* **(v.0)**  ADDED:			Special handling for WP Fastest Cache.
* **(v.0)**  CHANGE:		Configuration for automatic self-update for the Shield plugin has been removed.
* **(v.0)**  CHANGE:		No longer remove an existing user session when accessed from another IP address. Just redirect.
							Protects existing, legitimate sessions from being forcefully expired.
* **(v.0)**  FIXED:			Danish string translation.

= 5.8 Series =
*Released: 7th April, 2017*

* **(v.2)**  IMPROVEMENTS:	The core file scanner now works more reliably for international WordPress installations.
* **(v.2)**  CHANGE:		Login Cooldown now uses only the flag file as an indicator of login times.
* **(v.2)**  CHANGE:		Filter to allow for changing the two factor timeout period, from 5 (minutes). Filter: `icwp-wpsf-login_intent_timeout`
* **(v.2)**  CHANGE:		Changed timeout for two-factor authentication email to 5 minutes to account for slower email-sending providers.
* **(v.2)**  CHANGE:		Added further clarification to the Login Notification email indicating that two-factor authentication was pending.
* **(v.1)**  FIXED:			Fixed a couple of bugs with the Login Authentication Portal, for certain edge cases.
* **(v.0)**  CHANGE:		Major overhaul of [Two-Factor / Multi-Factor Login Authentication](https://icwp.io/87).
* **(v.0)**  CHANGE:		[Introduction of Login Authentication Portal](https://icwp.io/86) for improved Multi-Factor Authentication.
* **(v.0)**  ADDED:			Option to choose between two-factor or multi-factor login authentication.
* **(v.0)**  ADDED:			Administrators can remove Google Authenticator from another user's profile.
* **(v.0)**  ADDED:			When Security Admin is active, only Security Admins may remove Google Authenticator from other admins.
* **(v.0)**  CHANGE:		Yubikey login authentication is now managed directly from the User Profile screen, as with Google Authenticator.
* **(v.0)**  CHANGE:		Email-based login authentication no longer uses a separate database table.
* **(v.0)**  FIXED:			Core file scanning now adequately handles Windows/Unix new lines during scan.
* **(v.0)**  FIXED:			Certain crons weren't setup correctly.
* **(v.0)**  IMPROVEMENTS:	Further preparation for [Shield Central](https://icwp.io/83) release.

= 5.7 Series =

* **(v.3)**  FIXED:			Attempt to improve the Google Authenticator flow for more reliable activation.
* **(v.2)**  IMPROVEMENTS:	More admin notices when saving Google Authenticator settings.
* **(v.2)**  IMPROVEMENTS:	Further preparation for [Shield Central](https://icwp.io/83) release.
* **(v.1)**  Skipped
* **(v.0)**  ADDED:			Shortcode for displaying plugin badge in pages/posts.
* **(v.0)**  CHANGE:		Enabled JS eval() for the Content Security Policy by default.
* **(v.0)**  IMPROVEMENTS:	Replace YAML configuration files with JSON.
* **(v.0)**  IMPROVEMENTS:	Preparation for [Shield Central](https://icwp.io/83) release.
* **(v.0)**  IMPROVEMENTS:	Security Admin notices are more refined and optimized.
* **(v.0)**  IMPROVEMENTS:	Removed unnecessary files/code.

= 5.6 Series =

* **(v.2)**  CHANGE:		Fix an instance where the hidden Login URL would be leaded.
* **(v.1)**  CHANGE:		Replaying of Yubikey one-time-passwords is no longer permitted.
* **(v.1)**  ADDED:			Filter for login form GASP fields.
* **(v.1)**  ADDED:			Filter for comment form GASP fields.
* **(v.1)**  CHANGE:		Improved compatibility of HTTP Headers with WP Super Cache.
* **(v.0)**  ADDED:			Option to disable anonymous Rest API access. WordPress v4.7+ only. Note that if another plugin
							or service authenticates the request it will be honoured, whether anonymous or not.
= 5.5 Series =

* **(v.6)**  IMPROVED:		Fixed possible leak of the Login URL from the 'Hide WP Login URL' feature.
* **(v.5)**  ADDED:			Ability to add custom protocols to the domains (apart from http/s) to the Content Security Policy
* **(v.5)**  FIXED:			Bug where automatic update emails would contain empty plugins.
* **(v.5)**  FIXED:			Javascript scope on GASP form elements.
* **(v.5)**  FIXED:			Various fixes and code improvements.
* **(v.4)**  FIXED:			Bug with data cleaning/storage that caused stored options to balloon resulting in database timeouts. (only certain options affected)
* **(v.4)**  IMPROVED:		Sometimes "anti-virus" scanners scared normal, everyday hard-working folk by identifying a Shield file as being a virus, because they're not very clever - reduced chances of this.
* **(v.3)**  ADDED:			Fix for WordPress Multisite where the correct database prefix wasn't being used.
* **(v.2)**  ADDED:			Filter to allow modification of the email footer
* **(v.2)**  ADDED:			Block auto-updates on Shield itself if PHP < 5.3 and new version is v6.0+
* **(v.2)**  FIXED:			Missing Link
* **(v.2)**  FIXED:			Plugin Installation ID wasn't always being set
* **(v.2)**  TRANSLATIONS:	Dutch (56%)
* **(v.1)**  ADDED:			Built-in forceful protection in the form of a wp_die() against the (currently) un-patched W3 Total Cache XSS vulnerability [more info](https://icwp.io/7j)
* **(v.1)**  IMPROVED:		Better XMLRPC Lockdown - prevents ANY XMLRPC command processing.
* **(v.1)**  IMPROVED:		Make certain strings translatable
* **(v.1)**  IMPROVED:		Wrap-up certain login form elements into spans/divs to allow styling etc.
* **(v.1)**  IMPROVED:		PHP Version number cleaning during stats tracking.
* **(v.0)**  ADDED:			Options and statistics tracking ability. Over time we are looking to share statistics and performance metrics of Shield.
* **(v.0)**  IMPROVED:		Performance for options loading, especially for web hosts that don't permit file writing
* **(v.0)**  CHANGED:		Numerous fixes and code improvements.
* **(v.0)**  CHANGED:		Removed query that deletes old GASP comment tokens on normal page loads.
* **(v.0)**  CHANGED:		Google reCAPTCHA is now based on the locale of the website, not auto-detected.
* **(v.0)**  FIXED:			Now URL encodes the username in the link for two-factor authentication by email.
* **(v.0)**  FIXED:			If the xmlrpc.php has been deleted, this is now ignore by the file scanner
* **(v.0)**  TRANSLATIONS:	Dutch (38%), Portuguese (32%)

= 5.4 Series =

* **(v.5)**  CHANGED:		User Management module is no-longer enabled by default on clean installations
* **(v.5)**  CHANGED:		Made the GASP checkbox for Login protection clickable by label. [Thanks Aubrey!](https://github.com/FernleafSystems/Shield/pull/22)
* **(v.5)**  CHANGED:		Shield Statistics only shows for WordPress admins (instead of all users)
* **(v.5)**  FIXED:			Added a couple of guards to ensure data is of the correct format to prevent spurious errors
* **(v.5)**  FIXED:			Bug where automatic file repair links from emails we're not working.
* **(v.4)**  SKIPPED.
* **(v.3)**  FIXED:			Various fixes and improvements
* **(v.3)**  CHANGED:		Lots of cleaning of old code.
* **(v.3)**  REMOVED:		Various old, unused options, and the force_ssl_login option as it's deprecated by WordPress Core
* **(v.3)**  TRANSLATIONS:	Dutch (36%), Swedish (35%)
* **(v.3)**  FIXED:			Various fixes and improvements
* **(v.3)**  CHANGED:		Lots of cleaning of old code.
* **(v.3)**  REMOVED:		Various old, unused options, and the force_ssl_login option as it's deprecated by WordPress Core
* **(v.3)**  TRANSLATIONS:	Dutch (36%), Swedish (35%)
* **(v.2)**  ADDED:			A guard around certain modules like, User Sessions, to ensure the DB has been initiated properly before use.
* **(v.2)**  ADDED:			Exclusion for Swedish license files that don't exist in the SVN repo.
* **(v.2)**  ADDED:			Parameter exclusion for reCAPTCHA.
* **(v.2)**  CHANGED:		[HTTP Security Headers](https://icwp.io/7b) module is enabled by default on new installs.
* **(v.1)**  FIXED:			Nasty bug that caused an infinite loop bug in some configurations.
* **(v.0)**  ADDED:			Per-site plugin statistics gathering - summary display on admin dashboard.
* **(v.0)**  ADDED:			HTML class to the "I'm a human" checkbox field.
* **(v.0)**  ADDED:			Ability to change minimum user role for login notification emails with use of `add_filter()`. See FAQs.
* **(v.0)**  REMOVED:		Option 'Prevent Remote Login' causes more trouble with than it's worth with too many hosting configurations.
* **(v.0)**  CHANGED:		For websites that don't run WP Crons correctly, added code for automatic database cleaning.
* **(v.0)**  CLEANED:		Removed Twig render code as it was never being used.

= 5.3 Series =

* **(v.2)**  IMPROVED:		[HTTP Security Headers](https://icwp.io/7b) Content Security Policy now supports specifying HTTPS for domains/hosts.
* **(v.2)**  FIXED:			Human Comment SPAM Feature didn't fire under certain circumstances.
* **(v.2)**  FIXED:			Fixed parsing of Human Comment SPAM dictionary words.
* **(v.1)**  TRANSLATIONS:	Dutch (32%)
* **(v.0)**  ADDED:			New Feature - [HTTP Security Headers](https://icwp.io/7b).
* **(v.0)**  FIXED:			Prevent renaming WP Login to "/login"

= 5.2 Series =

* **(v.0)**  ADDED:			Guard against core file scanner and automatic WordPress updates clashing.
* **(v.0)**  CHANGED:		Logic for brute force login checking is improved - they all run before username/password checking
* **(v.0)**  FIXED:			Certain older versions of PHP don't like combined IPv4 and IPv6 filter flags
* **(v.0)**  FIXED:			Google reCAPTCHA for WordPress sites that have restrictive settings for sockets etc.
* **(v.0)**  REMOVED:		[Plugin vulnerabilities scanner](https://icwp.io/75). It's out-of-date and unsuitable.

= 5.1 Series =

* **(v.0)**  FIXED:			Improved compatibility with bbPress.
* **(v.0)**  CHANGED:		Optimizations around options and definitions (storing fewer options data)
* **(v.0)**  CHANGED:		Improved styling and responsiveness of plugin badge.
* **(v.0)**  ADDED:			Ability to programmatically export/import options - further preparation for iControlWP+Shield integration.
* **(v.0)**  FIXED:			Issue where Core automatic updates would fail, but notification email was sent anyway

= 5.0 Series =

* **(v.3)**  FIXED:			Issue with setting session cookies with PHP 7
* **(v.2)**  FIXED:			[Rename WordPress Login URL](https://icwp.io/5s) bug
* **(v.2)**  CHANGED:		reCAPTCHA text usage corrected throughout plugin.
* **(v.1)**  CHANGED:		Removed the whole 'wp-content' directory from the [Core File Scanner](https://icwp.io/wpsf40) feature.
* **(v.1)**  CHANGED:		A WordPress filter to change the plugin badge text content (see FAQ)
* **(v.1)**  CHANGED:		Tweaked the plugin badge styling.
* **(v.1)**  CHANGED:		All emails sent by the plugin contain the name of the site and the current plugin version in the email footer.
* **(v.1)**  ADDED:			In-plugin links to blogs and info articles for Google ReCaptcha and [Google Authenticator](https://icwp.io/wpsf43)
* **(v.0)**  NEW:			WordPress Simple Firewall plugin has been re-branded and is called **Shield**
* **(v.0)**  ADDED:			NEW feature - [Google ReCaptcha](https://icwp.io/shld2) for Comment SPAM and Login protection.
* **(v.0)**  ADDED:			Support for this plugin is now Premium. Added Premium Support page that links to Helpdesk.
* **(v.0)**  CHANGED:		Refactor of comment spam code.
* **(v.0)**  CHANGED:		Core File Scanner now handles the odd Hungarian distribution.

= 4.17 Series =
*Released: 17th February, 2016*

* **(v.0)**  ADDED:			NEW feature - [Google Authenticator Login option](https://icwp.io/wpsf43).
* **(v.0)**  ADDED:			[Core File Scanner](https://icwp.io/wpsf40) now includes an automatic link to repair files (you must be logged in as admin for this link to work!).
* **(v.0)**  ADDED:			NEW - if you already have a logged-in session and you open the login screen, you'll be provided with a link to go straight to the admin area.
* **(v.0)**  CHANGED:		Email-based Two-Factor Authentication is now stateless/session-less - it will not check validity per-page load.
* **(v.0)**  CHANGED:		Changes to the email-based authentication system - now only 1 option and it no longer locks to IP or browser.
* **(v.0)**  CHANGED:		Various efficiency improvements including reduced SQL updates.
* **(v.0)**  CHANGED:		Email system is improved and now send emails from the default WordPress sender. This may be [changed with filter](https://icontrolwp.freshdesk.com/support/solutions/articles/3000048723).

= 4.16 Series =
*Released: 20th January, 2016*

* **(v.2)**  CHANGED:		Further changes and improvements to the [Core File Scanner](https://icwp.io/wpsf40).
* **(v.2)**  CHANGED:		Improvements to the [automatic black list system](https://icwp.io/wpsf27) for failed login attempts.
* **(v.2)**  TRANSLATIONS:	Turkish (100%)
* **(v.1)**  CHANGED:		Improved the contents of the [Core File Scanner](https://icwp.io/wpsf40) notification email with links to original source files.
* **(v.1)**  CHANGED:		Now also excluding the /wp-content/languages/ directory since translations may update independently.
* **(v.1)**  CHANGED:		Handles the special case of [old index.php files](https://wordpress.org/support/topic/problem-with-checksum-hashes)
* **(v.0)**  ADDED:			Feature: [Automatically scans WordPress Core files](https://icwp.io/wpsf40) and detects alterations from the default WordPress Core File data
* **(v.0)**  ADDED:			Feature: to automatically attempt to repair/replace WordPress Core files that are discovered which have been altered.
* **(v.0)**  ADDED:			Option to toggle the [Plugin Vulnerabilities cron](https://icwp.io/wpsf41).
* **(v.0)**  ADDED:			Two-Factor Authentication links now honour the WordPress 'redirect_to' parameter.

= 4.15 Series =
*Released: 6th January, 2016*

* **(v.0)**  ADDED:			New and updated Firewall rules as well as a new 'Aggressive' option that looks for additional request data. Disabled by default, but may cause an increase in false positives.
* **(v.0)**  CHANGED:		Improved and optimized Firewall processing.
* **(v.0)**  FIXED:			[Issue](https://github.com/FernleafSystems/wp-simple-firewall/issues/3) where automatic update notification emails are sent out without any update notices (probably due to failed updates).
* **(v.0)**  FIXED:			Small conflict with WP Login Rename and other security plugins.
* **(v.0)**  TRANSLATIONS:	Czech (91%), Finnish (98%), Turkish (98%).

= 4.14 Series =
*Released: 20th November, 2015*

* **(v.2)**  ADDED:			User notice message displayed when the 'Theme My Login' plugin is active and you try to rename your login URL - It is not compatible.
* **(v.1)**  ADDED:			Added WordPress filter option to specify URL instead of present a 404 when Rename WP Login is active. [more info](https://icontrolwp.freshdesk.com/solution/articles/3000044812)
* **(v.1)**  ADDED:			Added 'Unique Plugin Installation ID' to be utilized in the future.
* **(v.1)**  FIXED:			WordPress Comments bug where some comments didn't pass through the SPAM filters in a certain scenario.
* **(v.0)**  ADDED:			[Custom Automatic Update Notifications Email](https://icwp.io/wpsf33) that runs separately to the in-built WordPress core notification email.
* **(v.0)**  ADDED:			Filter to remove the admin area IP address footer text
* **(v.0)**  CHANGED:		Added native support for PayPal return links - whitelisting "verify_sign" parameter.
* **(v.0)**  CHANGED:		Tweak patterns for matching on 'WordPress terms'.
* **(v.0)**  TRANSLATIONS:	Danish (100%), Czech (92%), Turkish (92%), Finnish (88%),
* **(v.0)**  FIXED:			Small bugs and readying for WordPress 4.4

= 4.13 Series =
*Released: 22nd October, 2015*

* **(v.0)**  NEW:			Added option to block the modification, addition/promotion and deletion of WordPress administrators users within the 'Security Admin' module.
* **(v.0)**  NEW:			Renamed 'Admin Access' module to 'Security Admin'.
* **(v.0)**  CHANGED:		Simplified and consolidated the use of cookies for User Session - sets and removes cookies better to reduce their usage.
* **(v.0)**  CHANGED:		Simplified and consolidated the use of cookies for Two Factor Login Authentication.
* **(v.0)**  CHANGED:		Cleaned up some Comment SPAM filtering code.
* **(v.0)**  CHANGED:		Comments Filter doesn't use cookies unless a session cookie for the visitor already exists.
* **(v.0)**  CHANGED:		IP Manager Automatic Black List - default black list duration is now 1 minute & default transgressions limit is 10
* **(v.0)**  CHANGED:		Improvements to the database create queries: use MySQL Engine defaults (instead of MyISAM); use WordPress dbDelta() for updates.
* **(v.0)**  CHANGED:		Various code optimizations and cleaning.

= 4.12 Series =
*Released: 10th October, 2015*

* **(v.0)**  NEW:			Option to completely disable the XML-RPC system. [more info](https://icwp.io/wpsf31)
* **(v.0)**  CHANGED:		Logged-in users are automatically forwarded to the WordPress admin only if they are Administrators.

= 4.11 Series =
*Released: 5th October, 2015*

* **(v.0)**  NEW:			Ability to now completely block the update/changing of certain WordPress site options. [more info](https://icwp.io/wpsf30)
* **(v.0)**  FIXED:			Various small bugs with the IP Manager UI ajax.
* **(v.0)**  FIXED:			Uncaught PHP Exception when a site's hosting isn't properly configured to handle IPv6 addresses.
* **(v.0)**  TRANSLATIONS:	Danish - 57%, Czech - 100%, Finnish - 94%

= 4.10 Series =
*Released: 23rd August, 2015*

* **(v.4)**  REFACTOR:		Notifications system is more reliable and most notices can be hidden/closed (at least for the current page load as some notices are persistent).
* **(v.4)**  REMOVED:		The old manual black list option has been completely removed - in favour of the automatic black list system.
* **(v.4)**  CHANGED:		Revised the order of certain hooks being created to avoid the possibility of pluggable.php not being loaded for PHP Shutdown.
* **(v.4)**  CHANGED:		The presence of IP addresses in the IP Whitelist will force the IP Manager feature to be enabled.
* **(v.4)**  CHANGED:		We now make an attempt to prevent the caching of WordPress wp_die() pages that we generate. (compatible with at least W3TC, Super Cache)
* **(v.4)**  TRANSLATIONS:  Turkish - 100%, Danish - 3%

* **(v.3)**  FIXED:       	Another PHP 5.2 incompatibility.
* **(v.2)**  ADDED:			White Listing UI to the IP Manager - CIDR ranges are supported (also automatically migrates IPs, except ranges, from legacy to new)
* **(v.2)**  ADDED:			Returned the black marking of failed WP login attempts to the automatic black list system
* **(v.2)**  ADDED:			Using a 3rd party API service: [ipify.org](https://www.ipify.org/) - to find the server's own IP address so we can ensure it's not used in the black lists
* **(v.2)**  CHANGED:		AJAX calls are handled more robustly with actual error messages where possible.
* **(v.2)**  FIXED:       	A few black list processing bugs.

* **(v.1)**  ADDED:       	UI to view and remove IP address from Automatic Black List Engine.
* **(v.1)**  FIX:       	Removed transgression counting on failed logins - WP data is inconsistent.
* **(v.1)**  CHANGED:		Original legacy white list now takes priority over new auto black list
* **(v.1)**  CHANGED:		Default transgressions limit is now 7
* **(v.1)**  ADDED:       	Ability to reset plugin options to default using 'reset' flag file. [more info](https://icwp.io/wpsf28)
* **(v.0)**  NEW FEATURE:	'FABLE' - [Fully Automatic Black Listing Engine](https://icwp.io/wpsf27).

Simply put, FABLE will automatically block all malicious traffic by IP, based on their activity. This Security Plugin will track malicious behaviour
and count all transgressions that visitors make against the site.  Once a particular visitor exceeds the specified number transgressions, FABLE
will outright block any access they have to your WordPress site.

What makes the FABLE system better?

* Hands Free - Automatic. No more need for maintaining manual black lists.
* Loads first before other plugins.
* Automatic pruning. Based on expiration time you specify, older IP address will be removed.
* Increased Performance. With automatic pruning, IP look-up tables remain small and concise so page load times for legitimate visitors is minimally affected.
* Adaptive. It wont just block based on 1 misdemeanour - instead you may allow any given visitor grace to legitimately get things wrong (like login passwords).
* Intelligent. With an fully integrated plugin such as this, it uses login failure attempts, spam comment attempts, login brute force attempts to capture malicious visitors.

Which actions will trigger an ABLE transgression?

* Attempt to login with an invalid username/password combination
* Any attempt to login while the login cooldown system is in-effect
* Any login attempt that trips the GASP Login protection system
* Any login attempt with a username that doesn't exist
* Any attempt to access /wp-admin/, /login/, or wp-login.php while the Rename WP Login setting is active
* Any comment that gets labelled as SPAM by the plugin
* Failed attempt to authenticate with the plugin's Admin Access Protection module
* Any trigger of a Firewall block rule

= 4.9 Series =
*Released: 7th July, 2015*

* **(v.8)**  CHANGED:       Firewall, User Sessions and Lockdown Feature Modules are now enabled by default for new installations.
* **(v.8)**  FIX:           Some server email programs can't handle colons (:) in the email subject (because supporting all characters would be waaay too radical man).
* **(v.8)**  ADDED:       	Function to better get the WordPress home URL to prevent interference from other plugins.
* **(v.8)**  CHANGED:       Updated Text For [Author Scan Block](https://icwp.io/6e) feature.
* **(v.7)**  CHANGED:       How author query blocking works to be more reliable and stricter - only runs when users are not logged in, and it will DIE instead of redirect.
* **(v.6)**  ADDED:         New Option: prevent detection of usernames using the ?author=N query. (location under section: Lockdown -> Obscurity)
* **(v.6)**  FIXED:         Infinite redirect loop logic prevents redirect for rejected comment SPAM that's posted in bulk. This results in email notifications for spam comments.
* **(v.5)**  ADDED:         The plugin will load itself first before all other plugins
* **(v.5)**  FIXED:         No longer using parse_url() to determine the request URL as it's too inconsistent and unreliable.
* **(v.4)**  FIX:           Audit Trail Viewer display issue with non-escaped HTML (Thanks Chris!)
* **(v.4)**  ADDED:         An admin warning for sites with PHP version less than 5.3.2 (future versions will require this as a minimum)
* **(v.4)**  TRANSLATIONS:  Danish - 6%, Spanish - 76%
* **(v.3)**  ADDED:         Further checking for availability of certain PHP/server data before enabling the rename WordPress login feature
* **(v.3)**  ADDED:         Option to add the Plugin Badge as a Widget to your side-bar or page footer, or any other widget area.
* **(v.3)**  TRANSLATIONS:  Polish - 100%
* **(v.2)**  ADDED:         Email notifications sent out to report email address on a daily cron. [more info](https://www.icontrolwp.com/2015/07/plugin-vulnerability-email-notifications/)
* **(v.2)**  FIX:           Work around a WordPress inline plugin update Javascript bug.
* **(v.1)**  FIX:           Fix syntax support for earlier versions of PHP.
* **(v.0)**  FEATURE:       Plugin Vulnerabilities Detection: If you're running plugins with known vulnerabilities you will be warned - [more info](https://icwp.io/wpsf22)

= 4.8 Series =
*Released: 21st June, 2015*

* **(v.0)**  FEATURE:       Admin Access Restriction Areas - Restrict access to certain WordPress areas and functionality to **Administrators** with the Admin Access key.
* **(v.0)**  ADDED:         Admin Access Restriction Area - Plugins. You can now restrict access to certain Plugin actions - activate, install, update, delete.
* **(v.0)**  ADDED:         Admin Access Restriction Area - Themes. You can now restrict access to certain Theme actions - activate, install, update, delete.
* **(v.0)**  ADDED:         Admin Access Restriction Area - Pages/Post. You can now restrict access to certain Page/Post actions - Create/Edit, Publish, Delete.

= 4.7 Series =
*Released: 29th April, 2015*

* **(v.7)**  FIXED:         The text used to explain why some comments were marked as spam was broken.
* **(v.7)**  FIXED:         Group sign-up form now honours your SSL setting.
* **(v.7)**  TRANSLATIONS:  Spanish - 74%, Russian - 91%, Turkish - 94%, Polish- 95%, Finnish - 100%
* **(v.6)**  FIXED:         Verifying ability to send/receive email doesn't complete if Admin Access Protection is turned on.
* **(v.6)**  FIXED:         GASP Login Protection feature breaks because certain key options aren't initialized when the feature is enabled.
* **(v.6)**  FIXED:         Some "more info" links were empty.
* **(v.4)**  ADDED:         Email Sending Verification when enabling two-factor authentication - this ensures your site can send (and you can receive) emails.
* **(v.4)**  ADDED:         Section Summaries - each option tab contains a small text summary outlining the purpose and recommendation for each.
* **(v.4)**  CHANGED:       The Admin Access Key input is now a password field.
* **(v.4)**  CHANGED:       Custom Login URL now works with or without trailing slash.
* **(v.4)**  CHANGED:       Streamlining and improvement of PHP UI templates
* **(v.4)**  ADDED:         Implemented TWIG for templates (not yet activated)
* **(v.4)**  TRANSLATIONS:  Romanian (100%), Spanish-Spain (63%)
* **(v.3)**  ADDED:         Integrated protection against 2x RevSlider vulnerabilities (Local File Include and Arbitrary File Upload)
* **(v.3)**  CHANGED:       Reverted the addition of Permalinks/Rewrite rules flushing, in case this is a problem for some.
* **(v.2)**  UPDATED/FIX:   Major fixes and improvements to the rename wp-login.php feature.
* **(v.2)**  TRANSLATIONS:  Mexican-Spanish (61%), Arabic (38%)
* **(v.1)**  FIX:           Silence warnings from filesystem touch() command.
* **(v.1)**  TRANSLATIONS:  Polish (100%), Finnish (100%), Czech (73%), Arabic (34%)
* **(v.0)**  UPDATED:       Options page user interface re-design.
* **(v.0)**  FIX:           Audit trail time now reflects the user's timezone correctly.
* **(v.0)**  FIX:           Better compatibility with BBPress.
* **(v.0)**  UPDATED:       Underlying plugin code improvements.
* **(v.0)**  TRANSLATIONS:  Russian (100%), Czech (70%), Polish (97%)

= 4.6 Series =
*Released: 10th April, 2015*

* **(v.3)**  SECURITY:  Added protection against XSS vulnerability in WordPress comments. [Learn More](https://icwp.io/63) - Note: This is not a vulnerability with the Firewall plugin.
* **(v.3)**  SECURITY:  Added extra precautions to WordPress URL redirects. [Learn More](https://icwp.io/64).
* **(v.3)**  TRANSLATIONS: Russian (70%), Czech (67%)
* **(v.2)**  FIX:       Bug with the database table verification logic.
* **(v.2)**  TRANSLATIONS: Russian (New- 54%), Romanian (100%), Turkish (89%), Czech (53%)
* **(v.1)**  FIX:       XMLRPC compatibility logic was preventing other non-XMLRPC related code from running.
* **(v.1)**  UPDATED:   Plugin Badge styling
* **(v.1)**  UPDATED:   Updated Czech(41%) and Spanish (60%) translations
* **(v.0)**  ADDED:     New feature that displays the last login time for all users on the users listing page (User Management feature must be enabled).
* **(v.0)**  ADDED:     **Completely optional** promotional Plugin Badge option - help us promote the plugin and reassure your site visitors at the same time. [Learn More](https://icwp.io/5x)
* **(v.0)**  UPDATED:   Updated Czech(38%) translations

= 4.5 Series =
*Released: 6th March, 2015*

* **(v.5)**  CHANGED:   Updated Finnish (100%), Czech (16%) translations
* **(v.5)**  CHANGED:   Change logs now more clearly display changes between versions
* **(v.5)**  FIX:       Small translation coverage
* **(v.4)**  ADDED:     New and updated language translations including Polish (100%), Finnish
* **(v.4)**  FIX:       Better string translation coverage for menus etc.
* **(v.3)**  ADDED:     New and updated language translations including Polish, Czech and German
* **(v.3)**  CHANGED:   Only set the plugin cookie if necessary
* **(v.2)**  CHANGED:   Attempt to resolve DB errors related to transient options reported on WP Engine
* **(v.1)**  ADDED:     New feature- GASP Login Protection can now be applied to lost password form - enabled by default
* **(v.0)**  ADDED:     New feature- GASP Login Protection can now be applied to user registrations - enabled by default

= 4.4 Series =
*Released: 21st February, 2015*

* **(v.2)**  ADDED:     Romanian Translation.
* **(v.2)**  ADDED:     A plugin minimum-requirements processing system.
* **(v.2)**  IMPROVED:  The WordPress admin-UI code is simpler and cleaner.
* **(v.1)**  ADDED:     **Significant** performance enhancement in plugin loading times (up to 50% reduction).
* **(v.0)**  CHANGED:   The 'Prevent Remote Login' option now tries to detect web hosting server compatibility before allowing it to be enabled.
* **(v.0)**  CHANGED:   More lax in finding the 'forceOff' file when users are trying to turn off the firewall.
* **(v.0)**  CHANGED:   Parsing the URL no longer outputs warnings that might interfere with response headers.

= 4.3 Series =
*Released: 15th January, 2015*

* **(v.6)**  FIXES:     More thorough validation of whitelisted IP addresses
* **(v.5)**  FIXES:     Some hosting environments need absolute file paths for PHP include()/require()
* **(v.5)**  CHANGED:   Streamlined the detection of whitelisting and added in-plugin notification if **you** are whitelisted
* **(v.4)**  FIXES:     Work around for cases where PHP can't successfully run parse_url()
* **(v.2)**  IMPROVED:  Refactoring for better code organisation
*   ADDED:      New Feature - [Rename WP Login Page](https://icwp.io/5s).
*   ADDED:      UI indicators on whether plugins will be automatically updated in the plugins listing.
*   CHANGED:    IP Address WhiteList is now global for the whole plugin, and can be accessed under the "Dashboard" area
*   IMPROVED:   Firewall processing code is simplified and more efficient.

= 4.2.1 =
*Released: 22th December, 2014*

*   FIXED:      Changes to how feature specifications are read from disk to prevent .tmp file build up.

= 4.2.0 =
*Released: 12th December, 2014*

*   ADDED:      Audit Trail Auto Cleaning - default cleans out entries older than 30 days.
*   FIXED:      Various small bug fixes and code cleaning.

= 4.1.4 =
*Released: 24th November, 2014*

*   FIXED:      Fixed small logic bug which prevented deactivation of the plugin on the UI.

= 4.1.3 =
*Released: 19th November, 2014*

*   IMPROVED:   User Sessions are simplified.
*   UPDATED:    a few translation files based on the latest available contributions.

= 4.1.2 =

*   ADDED:      Self-correcting database table validation - if the structure of a database table isn't what is expected, it'll be re-created.

= 4.1.1 =

*   WARNING:    Due to new IPv6 support, all databases tables will be rebuilt - all active user sessions will be destroyed.
*   ADDED:      Preliminary support for IPv6 addresses throughout. We don't support whitelist ranges but IPv6 addresses are handled much more reliably in general.
*   ADDED:      New audit trail concept added called "immutable" that represents entries that will never be deleted - such entries would usually involve actions taken on the audit trail itself.
*   FIXED:      Support for audit trail events with longer names.
*   IMPROVED:   Comments Filtering - It now honours the WordPress settings for previously approved comment authors and never filters such comments.
*   REMOVED:    Option to enable GASP Comments Filtering for logged-in users has been completely removed - this reduces plugin options complexity. All logged-in users by-pass **all** comments filtering.
*   FIXED:      Prevention against plugin redirect loops under certain conditions.
*   FIXED:      IP whitelisting wasn't working under certain cases.

= 4.0.0 =

*   ADDED:      New Feature - Audit Trail
*   ADDED:      Audit Trail options include: Plugins, Themes, Email, WordPress Core, Posts/Pages, Shield plugin
*   FIXED:      Full and proper cleanup of plugin options, crons, and databases upon deactivation.
*   REMOVED:    Firewall Log. This is no longer an option and is instead integrated into the "Shield" Audit Trail.

= 3.5.5 =

*   ADDED:      Better admin notifications for events such as options saving etc.
*   CHANGE:     Some plugin styling to highlight features and options better.
*   FIXED:      Small bug with options default values.

= 3.5.3 =

*   ADDED:      A warning message on the WordPress admin if the "forceOff" override is active.
*   CHANGED:    The 'forceOff' system is now temporary - i.e. it doesn't save the configuration, and so once this file is removed, the plugin returns to the settings specified.
*   CHANGED:    The 'forceOn' option is now removed.
*   FIXED:      Problems with certain hosting environments reading in files with the ".yaml" extension - [support ref](https://wordpress.org/support/topic/yaml-breaks-plugin)
*   FIXED:      Small issue where when the file system paths change, some variables don't update properly.

= 3.5.0 =

*   CHANGED:    Plugin features are now configured [using YAML](https://github.com/mustangostang/spyc/) - no more in-PHP configuration.
*   REMOVED:    A few options from User Sessions Management as they were unnecessary.
*   CHANGED:    Database storing tables now have consistent naming.
*   FIXED:      Issue with User Sessions Management where '0' was specified for session length, resulting in lock out.
*   FIXED:      Firewall log gathering.
*   FIXED:      Various PHP warning notices.

= 3.4.0 =

*   ADDED:      Option to limit number of simultaneous sessions per WordPress user login name (User Management section)

= 3.3.0 =

*   ADDED:      Option to send notification when an administrator user logs in successfully (under User Management menu).
*   CHANGED:    Refactoring for how GET and POST data is retrieved

= 3.2.1 =

*   FIXED:      Custom Comment Filter message problem when using more than one substitution. [ref](http://wordpress.org/support/topic/warning-sprintf-too-few-arguments-in-hometnrastropublic_htmlwpwp-conten?replies=8#post-5927337)

= 3.2.0 =

*   ADDED:      Options to allow by-pass XML-RPC so as to be compatible with WordPress iPhone/Android apps.
*   UPDATED:    Login screen message when you're forced logged-out due to 2-factor auth failure on IP or cookie.
*   CHANGED:    Tweaked method for setting admin access protection on/off
*   CHANGED:    comment filtering code refactoring.
*   FIXED:      Options that were "multiple selects" weren't saving correctly

= 3.1.5 =

*   FIX:        Where some comments would fail GASP comment token checking.

= 3.1.4 =

*   FIX:        Logout URL parameters are now generated correctly so that the correct messages are shown.
*   CHANGED:    small optimizations and code refactoring.
*   UPDATED:    a few translation files based on the latest available contributions.

= 3.1.3 =

*   FIX:        issue with login cooldown timeouts not being updated where admin access restriction is in place.

= 3.1.2 =

*   FIX:        auto-updates feature not loading
*   FIX:        simplified implementation of login protection feature to reduce possibility for bugs/lock-outs
*   FIX:        auto-forwarding for wp-login.php was preventing user logout

= 3.1.0 =

*   ADDED:      option to check the logged-in user session only on WordPress admin pages (now the default setting)
*   ADDED:      option to auto-forward to the WordPress dashboard when you go to wp-login.php and you're already logged in.
*   ADDED:      message to login screen when no user session is found
*   CHANGED:    does not verify session when performing AJAX request. (need to build appropriate AJAX response)
*   FIX:        for wp_login action not passing second argument

= 3.0.0 =

*   FEATURE:    User Management. Phase 1 - create user sessions to track current and attempted logged in users.
*   CHANGED:    MASSIVE plugin refactoring for better performance and faster, more reliable future development of features
*   ADDED:      Obscurity Feature - ability to remove the WP Generator meta tag.
*   ADDED:      ability to change user login session length in days
*   ADDED:      ability to set session idle timeout in hours
*   ADDED:      ability to lock session to a particular IP address (2-factor auth by IP is separate)
*   ADDED:      ability to view active user sessions
*   ADDED:      ability to view last page visited for active sessions
*   ADDED:      ability to view last active time for active sessions
*   ADDED:      ability to view failed or attempted logins in the past 48hrs
*   ADDED:      Support for GASP login using WooCommerce
*   CHANGED:    Admin Access Restriction now has a separate options/feature page
*   CHANGED:    Admin styling to better see some selected options
*   ADDED:      Support for WP Wall shoutbox plugin (does no GASP comment checks)
*   CHANGED:    Removed support for upgrading from versions prior to 2.0
*   CHANGED:    Removed support for importing from Firewall 2 plugin - to import, manually install plugin v2.6.6, import settings, then upgrade.

= 2.6.6 =

*	FIX:		Improved compatibility with bbPress.

= 2.6.5 =

*	FIX:		Could not enable Admin Access Protection feature on new installs due to too aggressive testing on security.

= 2.6.4 =

*   ENHANCED:   Dashboard now shows a more visual summary of settings and removes duplicate options settings with links to sections.
*   ENHANCED:   WordPress Lock Down options now also set the corresponding WordPress defines if they're not already.

= 2.6.3 =

*   ADDED:      More in-line plugin links to help/blog resources
*   ENHANCED:   [Admin Access Protection](https://icwp.io/5b) is further enhanced in 3 ways:

1.  More robust cookie values using MD5s
1.  Blocks plugin options updating right at the point of WordPress options update so nothing can rewrite the actual plugin options.
1.  Locks the current Admin Access session to your IP address - effectively only 1 Shield admin allowed at a time.

= 2.6.2 =

*   ENHANCED:   Added option to completely reject a SPAM comment and redirect to the home page (so it doesn't fill up your database with rubbish)
*   ADDED:      Plugin now has an internal stats counter for spam and other significant plugin events.

= 2.6.1 =

*   ADDED:      Plugin now installs with default SPAM blacklist.
*   ADDED:      Now automatically checks and updates the SPAM blacklist when it's older than 48hrs.
*   ENHANCED:   Comment messages indicate where the SPAM content was found when marking human-based spam messages.

= 2.6.0 =

**Major Features Release: Please review SPAM comments filtering options to determine where SPAM goes**

*	FEATURE:    Added Human SPAM comments filtering - replacement for Akismet that doesn't use or send any data to 3rd party services. Uses [Blacklist provided and maintained by Grant Hutchinson](https://github.com/splorp/wordpress-comment-blacklist)
*	ENHANCED:   Two-Factor Login now automatically logs in the user to the admin area without them having to re-login again.
*	ENHANCED:   Added ability to terminate all currently (two-factor) verified logins.
*	ENHANCED:   Spam filter/scanning adds an explanation to the SPAM content to show why a message was filtered.
*	FIXES:      For PHP warnings while in php strict mode.
*	CLEAN:      Much cleaning up of code.

= 2.5.9 =

*	FEATURE:    Added option to try and exclude search engine bots from firewall checking option - OFF by default.

= 2.5.8 =

*	FEATURE:    Added 'PHP Code' Firewall checking option.

= 2.5.7 =

*	IMPROVED:   Handling and logic of two-factor authentication and user roles/levels

= 2.5.6 =

*	FEATURE:    Added ability to specify the particular WordPress user roles that are subject to 2-factor authentication. (Default: Contributors, Authors, Editors and Administrators)

= 2.5.5 =

*	FEATURE:    Added 'Lockdown' feature to force login to WordPress over SSL.
*	FEATURE:    Added 'Lockdown' feature to force WordPress Admin dashboard to be delivered over SSL.
*	FIX:        Admin restricted access feature wasn't disabled with the "forceOff" option.

= 2.5.4 =

*	FIX:        How WordPress Automatic/Background Updates filters worked was changed with WordPress 3.8.2.

= 2.5.3 =

*	UPDATED:    Translations. And confirmed compatibility with WordPress 3.9

= 2.5.2 =

*	FEATURE:    Option to Prevent Remote Posting to the WordPress Login system. Will check that the login form was submitted from the same site.

= 2.5.1 =

*	UPDATED:    Translations and added some partials (Catalan, Persian)
*	FIX:        for cleanup cron running on non-existent tables.

= 2.5.0 =

*	FEATURE:    Two-Factor Authenticated Login using [Yubikey](https://icwp.io/4i) One Time Passwords (OTP).

= 2.4.3 =

*	ADDED:      Translations: Spanish, Italian, Turkish. (~15% complete)
*	UPDATED:    Hebrew Translations (100%)

= 2.4.2 =

*	ADDED:      Contextual help links for many options.  More to come...
*	ADDED:      More Portuguese (Brazil) translations (~80%)

= 2.4.1 =

*	ADDED:      More strings to the translation set for better multilingual support
*	ADDED:      Portuguese (Brazil) translations (~40%)
*	UPDATED:    Hebrew Translations
*	FIXED:      Automatic cleaning of database logs wasn't actually working as expected. Should now be fixed.

= 2.4.0 =

*	NEW:        Option to enable Two-Factor Authentication based on Cookie. In this way you can tie a user session to a single browser.
*	FIX:        Better WordPress Multisite (WPMS) Support.

= 2.3.4 =

*   FIX:        Automatic updating of itself.

= 2.3.3 =

*	ADDED:      Hebrew Translations. Thanks [Ahrale](http://atar4u.com)!
*	ADDED:      Automatic trimming of the Firewall access log to 7 days - it just grows too large otherwise.
*   FIX:        The previously added automatic clean up of old comments and login protect database entries was wiping out the valid login protect
                entries and was forcing users to re-login every 24hrs.
*   FIX:        Some small bugs, errors, and PHPDoc Comments.

= 2.3.2 =

*	ADDED:		Automatic cleaning of GASP Comments Filter and Login Protection database entries (older than 24hrs) using WordPress Cron (everyday @ 6am)
*	CHANGED:	Huge code refactoring to allow for more easily use with other WordPress plugins.

= 2.2.5 =

*	ADDED:		Email sending options for automatic update notifications - options to change the notification email address, or turn it off completely.

= 2.2.4 =

*	FIX:		Small bug fix.
*	CHANGED:	When running a force automatic updates process, tries to remove influence from other plugins and uses only this plugin's automatic updates settings.
*	CHANGED:	A bit of automatic updates code refactoring.

= 2.2.2 =

*	CHANGED:	Changed all options to be disabled by default.
*	CHANGED:	The option for admin notices will turn off all main admin notices except after you update options.

= 2.2.1 =

*	ADDED:		Verified compatibility with WordPress 3.8

= 2.2.0 =

*	CHANGED:	Certain filesystem calls are more compatible with restrictive hosting environments.
*	CHANGED:	Plugin is now ready to integate with [iControlWP automatic background updates system](http://www.icontrolwp.com/2013/11/manage-wordpress-automatic-background-updates-icontrolwp/).
*	FIX:		Login Protection Cooldown feature may not operate properly in certain scenarios.

= 2.1.5 =

*	IMPROVED:	Improved logic for Firewall whitelisting for pages and parameters to ensure whitelisting rules are followed.
*	CHANGED:	The whitelisting rule for posting pages/posts is only for the "content" and the firewall checking will apply to all other page parameters.

= 2.1.4 =

*	FIX:		When you run the Force Automatic Background Updates, it disables the plugins.  This problem is now fixed.

= 2.1.2 =

*	FIX:		A bug that prevented auto-updates of this plugin.
*	FIX:		Not being able to hide translations and upgrade notices.
*	ADDED:		Tweaks to auto-update feature to allow interfacing with the iControlWP service to customize the auto update system.

= 2.1.0 =

*	ADDED:		A button that lets you run the WordPress Automatic Updates process on-demand (so you don't have to wait for WordPress cron).
*	CHANGED:	The plugin now sets more options to be turned on by default when the plugin is first activated.
*	CHANGED:	A lot of optimizations and code refactoring.

= 2.0.3 =

*	FIX:		Whoops, sorry, accidentally removed the option to toggle "disable file editing".  It's back now.

= 2.0.2 =

*	CHANGED:	WordPress filters used to programmatically update whitelists now update the Login Protection IP whitelist

= 2.0.1 =

*	ADDED:		Localization capabilities. All we need now are translators! [Go here to get started](http://translate.icontrolwp.com/).
*	ADDED:		Option to mask the WordPress version so the real version is never publicly visible.

= 1.9.2 =

*	CHANGED:	Simplified the automatic WordPress Plugin updates into 1 filter for consistency

= 1.9.1 =

*	ADDED:		Increased admin access security features - blocks the deactivation of itself if you're not authenticated fully with the plugin.
*	ADDED:		If you're not authenticated with the plugin, the plugin listing view wont have 'Deactivate' or 'Edit' links.

= 1.9.0 =

*	ADDED:		New WordPress Automatic Updates Configuration settings

= 1.8.2 =

*	ADDED:		Notification of available plugin upgrade is now an option under the 'Dashboard'
*	CHANGED:	Certain admin and upgrade notices now only appear when you're authenticated with the plugin (if this is enabled)
*	FIXED:		PHP Notice with undefined index.

= 1.8.1 =

*	ADDED:		Feature- Access Key Restriction [more info](https://icwp.io/2s).
*	ADDED:		Feature- WordPress Lockdown. Currently only provides 1 option, but more to come.

= 1.7.3 =

*	CHANGED:	Reworked a lot of the plugin to optimize for further performance.
*	FIX:		Potential infinite loop in processing firewall.

= 1.7.1 =

*	ADDED:		Much more efficiency yet again in the loading/saving of the plugin options.

= 1.7.0 =

*	ADDED:		Preliminary WordPress Multisite (WPMS/WPMU) Support.
*	CHANGED:	The Firewall now kicks in on the 'plugins_loaded' hook instead of as the actual firewall plugin is initialized (as a result
				of WP Multisite support).

= 1.6.2 =

*	REMOVED:	Automatic upgrade option until I can ascertain what caused the plugin to auto-disable.

= 1.6.1 =

*	ADDED:		Options to fully customize the text displayed by the GASP comments section.
*	ADDED:		Option to include logged-in users in the GASP Comments Filter.

= 1.6.0 =

*	ADDED:		A new section - 'Comments Filtering' that will form the basis for filtering comments with SPAM etc.
*	ADDED:		Option to add enhanced GASP based comments filtering to prevent SPAM bots posting comments to your site.

= 1.5.6 =

*	IMPROVED:	Whitelist/Blacklist IP range processing to better cater for ranges when saving, with more thorough checking.
*	IMPROVED:	Whitelist/Blacklist IP range processing for 32-bit systems.
*	FIXED:		A bug with Whitelist/Blacklist IP checking.

= 1.5.5 =

*	FIXED:		Quite a few bugs fixed.

= 1.5.4 =

*	FIXED:		Typo error.

= 1.5.3 =

*	FIXED:		Some of the firewall processors were saving unnecessary data.

= 1.5.2 =

*	CHANGED:	The method for finding the client IP address is more thorough, in a bid to work with Proxy servers etc.
*	FIXED:		PHP notice reported here: http://wordpress.org/support/topic/getting-errors-when-logged-in

= 1.5.1 =

*	FIXED:		Bug fix where IP address didn't show in email.
*	FIXED:		Attempt to fix problem where update message never hides.

= 1.5.0 =

*	ADDED:		A new IP whitelist on the Login Protect that lets you by-pass login protect rules for given IP addresses.
*	REMOVED:	Firewall rule for wp-login.php and whitelisted IPs.

= 1.4.2 =

*	ADDED:		The plugin now has an option to automatically upgrade itself when an update is detected - enabled by default.

= 1.4.1 =

*	ADDED:		The plugin will now displays an admin notice when a plugin upgrade is available with a link to immediately update.
*	ADDED:		Plugin collision: removes the main hook by 'All In One WordPress Security'. No need to have both plugins running.
*	ADDED:		Improved Login Cooldown Feature- works more like email throttling as it now uses an extra filesystem-based level of protection.
*	FIXED:		Login Cooldown Feature didn't take effect in certain circumstances.

= 1.4.0 =

*	ADDED:		All-new plugin options handling making them more efficient, easier to manage/update, using far fewer WordPress database options.
*	CHANGED:	Huge improvements on database calls and efficiency in loading plugin options.
*	FIXED:		Nonce implementation.

= 1.3.2 =

*	FIXED:		Small compatibility issue with Quick Cache menu not showing.

= 1.3.0 =

*	ADDED:		Email Throttle Feature - this will prevent you getting bombarded by 1000s of emails in case you're hit by a bot.
*	ADDED:		Another Firewall die() option. New option will print a message and uses the wp_die() function instead.
*	ADDED:		Refactored and improved the logging system (upgrading will delete your current logs!).
*	ADDED:		Option to separately log Login Protect features.
*	ADDED:		Option to by-pass 2-factor authentication in the case sending the verification email fails
				(so you don't get locked out if your hosting doesn't support email!).
*	CHANGED:	Login Protect checking now better logs out users immediately with a redirect.
*	CHANGED:	We now escape the log data being printed - just in case there's any HTML/JS etc in there we don't want.
*	CHANGED:	Optimized and cleaned a lot of the option caching code to improve reliability and performance (more to come).

= 1.2.7 =

*	FIX:		Bug where the GASP Login protection was only working when you had 2-factor authentication enabled.

= 1.2.6 =

*	ADDED:		Ability to import settings from WordPress Firewall 2 plugin options - note, doesn't import page and variables whitelisting.
*	FIX:		A reported bug - parameter values could also be arrays.

= 1.2.5 =

*	ADDED:		New Feature - Option to add a checkbox that blocks automated SPAM Bots trying to log into your site.
*	ADDED:		Added a clear user message when they verify their 2-factor authentication.
*	FIX:		A few bugfixes and logic corrections.

= 1.2.4 =

*	CHANGED:	Documentation on the dashboard, and the message after installing the firewall have been updated to be clearer and more informative.
*	FIX:		A few bugfixes and logic corrections.

= 1.2.3 =

*	FIX:		bugfix.

= 1.2.2 =

*	FIX:		Some warnings and display bugs.

= 1.2.1 =

*	ADDED:		New Feature - Login Wait Interval. To reduce the effectiveness of brute force login attacks, you can add an interval by
				which WordPress will wait before processing any more login attempts on a site.
*	CHANGED:	Optimized some settings for performance.
*	CHANGED:	Cleaned up the UI when the Firewall / Login Protect features are disabled (more to come).
*	CHANGED:	Further code improvements (more to come).

= 1.2.0 =

*	ADDED:		New Feature - **Login Protect**. Added 2-Factor Login Authentication for all users and their associated IP addresses.
*	CHANGED:	The method for processing the IP address lists is improved.
*	CHANGED:	Improved .htaccess rules (thanks MickeyRoush)
*	CHANGED:	Mailing method now uses WP_MAIL
*	CHANGED:	Lot's of code improvements.

= 1.1.6 =

*	ADDED:		Option to include Cookies in the firewall checking.

= 1.1.5 =

*	ADDED: Ability to whitelist particular pages and their parameters (see FAQ)
*	CHANGED: Quite a few improvements made to the reliability of the firewall processing.

= 1.1.4 =

*	FIX: Left test path in plugin.

= 1.1.3 =

*	ADDED: Option to completely ignore logged-in Administrators from the Firewall processing (they wont even trigger logging etc).
*	ADDED: Ability to (un)blacklist and (un)whitelist IP addresses directly from within the log.
*	ADDED: helpful link to IP WHOIS from within the log.

= 1.1.2 =

*	CHANGED: Logging now has its own dedicated database table.

= 1.1.1 =

*	Fix: Block notification emails weren't showing the user-friendly IP Address format.

= 1.1.0 =

*	You can now specify IP ranges in whitelists and blacklists. To do this separate the start and end address with a hyphen (-)	E.g. For everything between 1.2.3.4 and 1.2.3.10, you would do: 1.2.3.4-1.2.3.10
*	You can now specify which email address to send the notification emails.
*	You can now add a comment to IP addresses in the whitelist/blacklist. To do this, write your IP address then type a SPACE and write whatever you want (don't take a new line).
*	You can now set to delete ALL firewall settings when you deactivate the plugin.
*	Improved formatting of the firewall log.

= 1.0.2 =
*	First Release

== Upgrade Notice ==

= 1.1.2 =

*	CHANGED: Logging now has its own dedicated database table.
*	Fix: Block notification emails weren't showing the user-friendly IP Address format.
*	You can now specify IP ranges in whitelists and blacklists. To do this separate the start and end address with a hyphen (-)	E.g. For everything between 1.2.3.4 and 1.2.3.10, you would do: 1.2.3.4-1.2.3.10
*	You can now specify which email address to send the notification emails.
*	You can now add a comment to IP addresses in the whitelist/blacklist. To do this, write your IP address then type a SPACE and write whatever you want (don't take a new line).
*	You can now set to delete ALL firewall settings when you deactivate the plugin.
*	Improved formatting of the firewall log.