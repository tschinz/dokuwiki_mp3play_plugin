# Dokuwiki Plugin MP3Play

<table>
  <tr>
    <th align="left">Description</th>
    <td>The Mp3Play plugin let you add an flash mp3 player to your Webpage and Stream Mp3 files</td>
  </tr>
  <tr>
    <th align="left">Author</th>
    <td>Zahno Silvan</td>
  </tr>
  <tr>
    <th align="left">Email</th>
    <td>zaswiki@gmail.com</td>
  </tr>
  <tr>
    <th align="left">Type</th>
    <td>syntax</td>
  </tr>
  <tr>
    <th align="left">Lastupdate</th>
    <td>2012-10-22</td>
  </tr>
  <tr>
    <th align="left">Tags</th>
    <td>music, mp3, stream, flash, embed</td>
  </tr>
</table>

## Download
* Download to Dokuwiki plugin folder
* File     : https://github.com/tschinz/dokuwiki_mp3play_plugin/zipball/master

## Versions
* **2011-02-17**
  * Init version 
* **2012-10-22**
  * Moved repo to GitHub

## Syntax
```
{{mp3play>path-to-playlist.xml}}
```

"Path to the Playlist" should look something like this:
```
namespace:folder:subfolder:....:playlist.xml
```

## Settings
<table>
  <tr>
    <th>Admin setting</th>
    <th>Default value</th>
    <th>Description</th>
  </tr>
  <tr>
    <th align="left">Showplaylist</th>
    <td>1</td>
    <td>0 or 1</td>
  </tr>
  <tr>
    <th align="left">Showeq</th>
    <td>1</td>
    <td>0 or 1</td>
  </tr>
  <tr>
    <th align="left">Firsttrack</th>
    <td>1</td>
    <td>First track to play 1-x</td>
  </tr>
  <tr>
    <th align="left">Initvol</th>
    <td>50</td>
    <td>Start volume 0-100</td>
  </tr>
  <tr>
    <th align="left">Width</th>
    <td>100%</td>
    <td>Width size in pixel or %</td>
  </tr>
  <tr>
    <th align="left">Height</th>
    <td>320</td>
    <td>Height in pixel or %</td>
  </tr>
</table>

## Playlist example
```xml
<?xml version="1.0" encoding="UTF-8"?>
<songs>
  <song path="http://streamer-dtc-aa02.somafm.com:80/stream/1018/" title="Some Internetradio Mp3 Stream" />
  <song path="http://77.67.106.13:10203/" title="Mountain Chill - Planets Destination for Chill" />
  <song path="http://musicweb.koncon.nl/AllCourses/hdpj/chapter05/TaketheATrain.mp3" title="URL to a MP3 file on the Net" />
</songs>
```

Download the example playlist [here](http://zawiki.dyndns.org/~zas/zawiki/lib/exe/fetch.php/tschinz:programming:dw:mp3play:playlist.xml)

## Thanks
The Flash Player used from [Charles](http://sexywp.com/flash-player-widget.htm). Originally a WordPress Plugin.

## Example
![Screennshot 1](http://zawiki.dyndns.org/~zas/zawiki/lib/exe/fetch.php/tschinz:programming:dw:mp3play:mp3play_1.png)
![Screennshot 2](http://zawiki.dyndns.org/~zas/zawiki/lib/exe/fetch.php/tschinz:programming:dw:mp3play:mp3play_2.png)
![Screennshot 3](http://zawiki.dyndns.org/~zas/zawiki/lib/exe/fetch.php/tschinz:programming:dw:mp3play:mp3play_3.png)

## Documentation

All documentation for the Mp3Play Plugin is available online at:

  * [Dokuwiki Plugin Page](http://dokuwiki.org/plugin:mp3play2)
  * [ZaWiki Plugin Page](http://zawiki.dyndns.org/~zas/zawiki/doku.php/tschinz:dw_mp3play)
  * [Github Project Page](https://github.com/tschinz/dokuwiki_mp3play_plugin)

2011 by Zahno Silvan <zaswiki@gmail.com>