<?php

/*
 +----------------------------------------------------------------------+
 | This file has been heavily modified since being auto-generated by    |
 | MediaWiki.                                                           |
 | This file is tracked and updated by Git, DO NOT EDIT THIS FILE       |
 | MANUALLY.                                                            |
 |                                                                      |
 | User preference options are marked "UPO"                             |
 +----------------------------------------------------------------------+
*/

if( defined( 'MW_INSTALL_PATH' ) ) {
	$IP = MW_INSTALL_PATH;
} else {
	$IP = dirname( __FILE__ );
}

// Import settings that are not safe to put into Git
require_once( "$IP/SecretSettings.php" );

$path = array( $IP, "$IP/includes", "$IP/languages" );
set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );

// Set all default options
require_once( "$IP/includes/DefaultSettings.php" );

if ( $wgCommandLineMode ) {
	if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
		die( "This script must be run from the command line\n" );
	}
}

$wgShellLocale = "en_US.utf8";

$wgLanguageCode = "en";


/*
 +------------------------------+
 |      DATABASE SETTINGS       |
 |                              |
 | Mostly in SecretSettings.php |
 +------------------------------+
*/

# MySQL specific settings
$wgDBprefix         = "mw_";

# MySQL table options to use during installation or update
$wgDBTableOptions   = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = true;


/*
 +------------------------------+
 |        BASE SETTINGS         |
 +------------------------------+
*/

$wgSitename         = "Nottinghack Wiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath       = "";
$wgScriptExtension  = ".php";

## The relative URL path to the skins directory
$wgStylePath        = "$wgScriptPath/skins";

$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = array();
#$wgCacheDirectory = "$IP/cache";
$wgCacheEpoch = max( $wgCacheEpoch, gmdate( 'YmdHis', @filemtime( __FILE__ ) ) );

$wgArticlePath = "/wiki/$1";  # Virtual path. This directory MUST be different from the one used in $wgScriptPath
$wgUsePathInfo = true;        # Enable use of pretty URLs
$wgFavicon = "http://www.nottinghack.org.uk/favicon.ico";
$wgAppleTouchIcon = "http://www.nottinghack.org.uk/hackspaceNottmsm128.png";

# This line stops all unregistered users from editing
$wgGroupPermissions['*']['edit'] = false;
# This line disables self-registration
# Sysops or logged-in users can create accounts for others through Special:Userlogin
$wgGroupPermissions['*']['createaccount'] = false;

$wgLocaltimezone = 'EST';

$wgLocalTZoffset = date("Z") / 60;

$wgLocalInterwiki   = strtolower( $wgSitename );

$wgDiff3 = "/usr/bin/diff3";


/*
 +------------------------------+
 |        EMAIL SETTINGS        |
 +------------------------------+
*/

$wgEnableEmail      = true;
$wgEnableUserEmail  = true; //UPO

$wgEmergencyContact = "webmaster@nottinghack.org.uk";
$wgPasswordSender = "webmaster@nottinghack.org.uk";

$wgEnotifUserTalk = true; //UPO
$wgEnotifWatchlist = true; //UPO
$wgEmailAuthentication = true;


/*
 +------------------------------+
 |       DISPLAY SETTINGS       |
 +------------------------------+
*/

$wgLogo             = "$wgStylePath/common/images/nottinghack_small.png";

$wgUseTeX           = true;

$wgRightsPage = "Main:Copyright"; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "http://creativecommons.org/licenses/by-sa/3.0/";
$wgRightsText = "Creative Commons Attribution-ShareAlike 3.0 License";
$wgRightsIcon = "http://i.creativecommons.org/l/by-sa/3.0/88x31.png";
# $wgRightsCode = ""; # Not yet used

$wgDefaultSkin = 'vector';
# To remove various skins from the User Preferences choices
$wgSkipSkins = array("modern", "chick", "cologneblue", "myskin", "nostalgia", "simple", "standard");

$wgAllowExternalImages = false;
$wgAllowExternalImagesFrom = array( 'http://chart.apis.google.com/' );


/*
 +------------------------------+
 |        FILE SETTINGS         |
 +------------------------------+
*/

$wgEnableUploads       = true;
$wgUseImageMagick = false;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# File Extensions allowed for upload
$wgFileExtensions = array('png', 'gif', 'pde', 'jpg', 'jpeg', 'pdf', 'sh3d', 'psd', 'svg');

#If issues with JavaScript fasle positive uncomment
# $wgAllowTitlesInSVG = true;
$wgSVGConverter = 'ImageMagick';

# need to allow zips, as sh3d is a zip!
$wgMimeTypeBlacklist = array(
							 # HTML may contain cookie-stealing JavaScript and web bugs
							 'text/html', 'text/javascript', 'text/x-javascript',  'application/x-shellscript',
							 # PHP scripts may execute arbitrary code on the server
							 'application/x-php', 'text/x-php',
							 # Other types that may be interpreted by some servers
							 'text/x-python', 'text/x-perl', 'text/x-bash', 'text/x-sh', 'text/x-csh',
							 # Client-side hazards on Internet Explorer
							 'text/scriptlet', 'application/x-msdownload',
							 # Windows metafile, client-side vulnerability on some systems
							 'application/x-msmetafile',
							 # A ZIP file may be a valid Java archive containing an applet which exploits the
							 # same-origin policy to steal cookies
							 #'application/zip',
							 # MS Office OpenXML and other Open Package Conventions files are zip files
							 # and thus blacklisted just as other zip files
							 'application/x-opc+zip',
							 );


/*
 +------------------------------+
 |      NAMESPACE SETTINGS      |
 +------------------------------+
*/

define("NH_NS_PROJECT", 510);
define("NH_NS_PROJECT_TALK", 511);
define("NH_NS_GROUP", 512);
define("NH_NS_GROUP_TALK", 513);
define("NH_NS_LIBRARY", 514);
define("NH_NS_LIBRARY_TALK", 515);
 
$wgExtraNamespaces[NH_NS_PROJECT] = "Project";
$wgExtraNamespaces[NH_NS_PROJECT_TALK] = "Project_talk";
$wgExtraNamespaces[NH_NS_GROUP] = "Group";
$wgExtraNamespaces[NH_NS_GROUP_TALK] = "Group_talk";
$wgExtraNamespaces[NH_NS_LIBRARY] = "Library";
$wgExtraNamespaces[NH_NS_LIBRARY_TALK] = "Library_talk";

$wgNamespacesToBeSearchedDefault = array(
	NS_MAIN				=>	true,
	NS_TALK				=>	false,
	NS_USER				=>	true,
	NS_USER_TALK		=>	false,
	NS_PROJECT			=>	false,
	NS_PROJECT_TALK		=>	false,
	NS_FILE				=>	false,
	NS_FILE_TALK		=>	false,
	NS_MEDIAWIKI		=>	false,
	NS_MEDIAWIKI_TALK	=>	false,
	NS_TEMPLATE			=>	false,
	NS_TEMPLATE_TALK	=>	false,
	NS_HELP				=>	false,
	NS_HELP_TALK		=>	false,
	NS_CATEGORY			=>	false,
	NS_CATEGORY_TALK	=>	false,
	NH_NS_PROJECT		=>	true,
	NH_NS_PROJECT_TALK	=>	false,
	NH_NS_GROUP			=>	true,
	NH_NS_GROUP_TALK	=>	false,
	NH_NS_LIBRARY		=>	true,
	NH_NS_LIBRARY_TALK	=>	false
);

$wgNamespacesWithSubpages = array(
	NS_MAIN				=>	true,
	NS_TALK				=>	false,
	NS_USER				=>	true,
	NS_USER_TALK		=>	false,
	NS_PROJECT			=>	false,
	NS_PROJECT_TALK		=>	false,
	NS_FILE				=>	false,
	NS_FILE_TALK		=>	false,
	NS_MEDIAWIKI		=>	false,
	NS_MEDIAWIKI_TALK	=>	false,
	NS_TEMPLATE			=>	false,
	NS_TEMPLATE_TALK	=>	false,
	NS_HELP				=>	false,
	NS_HELP_TALK		=>	false,
	NS_CATEGORY			=>	false,
	NS_CATEGORY_TALK	=>	false,
	NH_NS_PROJECT		=>	true,
	NH_NS_PROJECT_TALK	=>	false,
	NH_NS_GROUP			=>	true,
	NH_NS_GROUP_TALK	=>	false,
	NH_NS_LIBRARY		=>	true,
	NH_NS_LIBRARY_TALK	=>	false
);


/*
 +------------------------------+
 |          EXTENSIONS          |
 +------------------------------+
*/

# Adding the ParserFunctions extension
require_once( "$IP/extensions/ParserFunctions/ParserFunctions.php" );
$wgPFEnableStringFunctions = true;

# Adding SyntaxHighlight_GeSHi extension
require_once("$IP/extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php");

# Adding Poem extension
require_once($IP.'/extensions/Poem/Poem.php');

# Adding Widgets extension
require_once("$IP/extensions/Widgets/Widgets.php");
$wgGroupPermissions['sysop']['editwidgets'] = true;

# Adding SpecialInterwiki extension
require_once("$IP/extensions/Interwiki/Interwiki.php");
$wgGroupPermissions['*']['interwiki'] = false;
$wgGroupPermissions['sysop']['interwiki'] = true;
$wgGroupPermissions['interwiki']['interwiki'] = true;

# Adding ReplaceText Extension
require_once( "$IP/extensions/ReplaceText/ReplaceText.php" );
$wgGroupPermissions['bureaucrat']['replacetext'] = true;

# Adding in the WikiEditor Extension
# Bundled in 1.19 an later
require_once( "$IP/extensions/WikiEditor/WikiEditor.php" );
# Enables use of WikiEditor by default but still allow users to disable it in preferences
$wgDefaultUserOptions['usebetatoolbar'] = 1;
$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;
# Displays the Preview and Changes tabs
$wgDefaultUserOptions['wikieditor-preview'] = 1;
# Displays the Publish and Cancel buttons on the top right side
$wgDefaultUserOptions['wikieditor-publish'] = 1;
# Displays a navigation column (summary) on the right side
$wgDefaultUserOptions['usenavigabletoc'] = 1;

# Adding Vector extension
# Bundled in 1.19 and later
require_once( "$IP/extensions/Vector/Vector.php" );
$wgDefaultUserOptions['useeditwarning'] = 1;
$wgVectorFeatures['editwarning']['user'] = true;
$wgVectorFeatures['collapsibletabs']['user'] = true;
$wgVectorFeatures['collapsiblenav']['user'] = true;
$wgVectorUseSimpleSearch = true;

# Adding Renameuser extenstion
# Bundled in 1.19 and later
require_once("$IP/extensions/Renameuser/Renameuser.php");

# Adding Category Sort Headers extension
require_once( "$IP/extensions/CategorySortHeaders/CategorySortHeaders.php" );

# Adding MagicNumberedHeadings extension
require_once($IP.'/extensions/MagicNumberedHeadings/MagicNumberedHeadings.php');

# Adding CSS extension
require_once("$IP/extensions/CSS/CSS.php");

# Adding HMS auth extension
require_once('extensions/HMSAuth/Auth.php');
$wgAuth = new NHAuth();

