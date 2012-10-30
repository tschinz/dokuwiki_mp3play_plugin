<?php
/*
 * DokuWiki mp3play plugin
 * 2011 Zahno Silvan
 * Usage:
 *
 * {{mp3play>place_of_playlist.xml}} 
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the LGNU Lesser General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * LGNU Lesser General Public License for more details.
 * 
 * You should have received a copy of the LGNU Lesser General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
 

if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'syntax.php');

/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_mp3play extends DokuWiki_Syntax_Plugin {

    /**
     * return some info
     */
    function getInfo(){
        return array(
            'author' => 'Zahno Silvan',
            'email'  => 'zaswiki@gmail.com',
            'date'   => '2011-02-17',
            'name'   => 'Mp3Play Plugin',
            'desc'   => 'Embedding MP3 Player for Files and Streams',
            'url'    => 'http://zawiki.dyndns.org/doku.php/tschinz:dw_mp3play',
        );
    }

    /**
     * What kind of syntax are we?
     */
    function getType(){
        return 'substition';
    }

    /**
     * Where to sort in?
     */
    function getSort(){
        return 299;
    }


    /**
     * Connect pattern to lexer
     */
    function connectTo($mode) {
      $this->Lexer->addSpecialPattern('\{\{mp3play>.*?\}\}',$mode,'plugin_mp3play');
    }

    /**
     * Handle the match
     */
    function handle($match, $state, $pos, &$handler){
        switch ($state) {
          case DOKU_LEXER_ENTER :
            break;
          case DOKU_LEXER_MATCHED :
            break;
          case DOKU_LEXER_UNMATCHED :
            break;
          case DOKU_LEXER_EXIT :
            break;
          case DOKU_LEXER_SPECIAL :
            return $match;
            break;
        }
        return array();
    }

    /**
     * Create output
     */
    function render($mode, &$renderer, $data) {
		if($mode == 'xhtml'){

			$options['showplaylist'] = $this->getConf('showplaylist');
			$options['showeq']       = $this->getConf('showeq');
			$options['firsttrack']   = $this->getConf('firsttrack');
			$options['initvol']      = $this->getConf('initvol');
			$options['width']        = $this->getConf('width');
			$options['height']       = $this->getConf('height');

			$params['menu']        = 'false';
			$params['quality']     = 'high';
			$params['name']        = 'Plugin Mp3Play';
			$params['allowScriptAccess'] = 'always';
			$params['type']        = 'application/x-shockwave-flash';
			$params['pluginspage'] = 'http://www.macromedia.com/go/getflashplayer';
			$params['wmode']       = 'transparent';
			$params['border']      = '0';

			// strip {{mp3play> from start
			$data     = substr($data,10);
			// strip }} from end
			$data     = substr($data,0,-2);

			if (empty($data))
			{
				$renderer->doc .= 'No playlist given';
				return true;
			}

			// get current url
			$url = wl($ID,'',true);
			// cut doku.php at the end
            $url = substr($url,0,-9);

			$data = $url.'/lib/exe/fetch.php/'.$data;
			$playlist = $data;

			$flashvars  = $playlist.'&ShowPlaylist='.$options['showplaylist'].'&ShowEQ='.$options['showeq'].'&firstTrack='.$options['firsttrack'].'&initVol='.$options['initvol'];
			$alt        = ''; 

			$movie = $url.'/lib/plugins/mp3play/flashplayer/player.swf';
			$renderer->doc .= '<embed src="'.$movie.'" menu="'.$params['menu'].'" quality="'.$params['quality'].'" width="'.$options['width'].'" height="'.$options['height'].'" name="'.$params['name'].'" allowScriptAccess="'.$params['allowScriptAccess'].'" type="'.$params['type'].'" pluginspage="'.$params['pluginspage'].'" flashvars="playList='.$flashvars.'" wmode="'.$params['wmode'].'" border="'.$params['border'].'" / >';

			return true;
        }
        return false;
    }
}
