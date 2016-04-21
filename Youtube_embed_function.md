###Replaces all [youtube]LINK[/youtube] tags with youtube iframe embeds
    function embedYoutube($haystack) {
      $i=0;
      while(strpos($haystack,'[youtube]',$i) !== FALSE ) { 
       $pos = strpos($haystack,'[youtube]',$i);
       $startYoutubeLink = $pos+9;
       $endYoutubeLink = strpos($haystack,'[/youtube]');
         if( $endYoutubeLink === FALSE ) {
           return 'Do not forget to include youtube closing tag of [/youtube]';
         }
         else {
           $youtubeLinkLength = $endYoutubeLink - $startYoutubeLink;
           $youtubeLink = substr($haystack,$startYoutubeLink,$youtubeLinkLength);
           $posEnd = $endYoutubeLink + 10;
	   $haystack = substr($haystack,0,$pos).
           '<center><iframe id="player" type="text/html" width="480" height="270" src="'.$youtubeLink.'" frameborder="0"></iframe></center>'.
           substr($haystack,$posEnd);
           $i = $posEnd;
         }
	}
       return $haystack;
      }
