<?php 
  function query_cgspace($last_post) {
    if ($last_post == 1) {
      $url = 'https://cgspace.cgiar.org/rest/collections/1118/items?expand=all&limit=1';
      }
      elseif ($last_post == 0) {
        $url = 'https://cgspace.cgiar.org/rest/collections/1118/items?expand=all';
        }
    $response = json_decode(file_get_contents($url));
    $items_array = $response;

    foreach($items_array as $item){

      $item_name = $item->name;
      $item_handle = $item->handle;

      $item_bitstreams = $item->bitstreams;
      foreach($item_bitstreams as $bitstream)
      {
      $bitstream_name = $bitstream->name;
      $bitstream_format = $bitstream->format;

      if ($bitstream_format == 'JPEG') {
          print '<div class="post-thumb">';
            print '<a href=http://hdl.handle.net/'.$item_handle.'>';
              print "<img  src='https://cgspace.cgiar.org/bitstream/handle/".$item_handle."/".$bitstream_name. "' />$item_name  <br/>";
            print '</a>';
          print '</div><br /><br />';
        }
      }
    }
  }
?>