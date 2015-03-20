# WDS - Harden Soft 404s

**Contributors:**      [webdevstudios](https://github.com/webdevstudios), [patrickgarman](https://github.com/pmgarman)

**Donate link:**       [http://webdevstudios.com](http://webdevstudios.com)

**Tags:**              soft 404

**Requires at least:** 3.8.0

**Tested up to:**      4.1.0

**Stable tag:**        1.0.0

**License:**           GPLv2 or later

**License URI:**       [http://www.gnu.org/licenses/gpl-2.0.html](http://www.gnu.org/licenses/gpl-2.0.html)

## Description

In WordPress when a search result or post archive has no results, a HTTP 200 status code is returned. This is sometimes not desired for various reasons, namely SEO. This plugin will trigger a true HTTP 404 status code when "no results are found" rather than a "soft 404" of having no results yet still returning a 200 error code. Google (and other search engines) will not index a page returning a 404, but it will index a page returning a soft 404. Harden your 404's to keep empty result pages out of search engine indexes!

## Installation

If installing the plugin from wordpress.org:

1. Download a ZIP of the plugin
1. Install the plugin through your WordPress dashboard or by using FTP/SFTP

## Changelog

#### 1.0.0 - 2015-03-10

##### Initial Release
