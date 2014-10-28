TvDb-PHP-Class
==============

Unofficial PHP class for the TVDB API. Supports caching and is easier to use than the official php class.

What does it do:
----------------
The Client implements the most used api functions from thetvdb.

How to use:
-----------
require_once("tvdb.cls.php");
$tvdb = new TvDb("http://thetvdb.com", "APIKEY");

// Search for a show
$data = $tvdb->getSeries('Doctor Who (2005)');

// Use the first show found and get the S01E01 episode
$episode = $tvdb->getEpisode($data[0]->Series->seriesid, 1, 1, 'en');
var_dump($episode);

Cache:
------
Unlike most of the other classes, this TvDb class default uses caching.
This means you will need a writable cache folder on the same level as the class.

The Time To Live is 600 (10 minutes) by default. To choose your own value, use
$tvdb = new TvDb("http://thetvdb.com", "APIKEY", 3600); // one hour

Status:
-------
This version is still in Beta and may contain lots of errors.