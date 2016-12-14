<?php
  function query_flickr($last_post) {
    $api_key = '1b4ff32742da4ec59526cf2f27599adc';
    $photoset_id = '72157670220127814';
    $user_id = '131075783@N02';
    // $perPage = 5;
  
    $url = 'https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos';
    $url.= '&api_key=' . $api_key;
    $url.= '&photoset_id=' . $photoset_id;
    $url.= '&user_id=' . $user_id;
    // $url.= '&per_page=' . $perPage;
    $url.= '&format=json';
    $url.= '&nojsoncallback=1';
  
    $response = json_decode(file_get_contents($url));
  
    if ($last_post == 1) {
      $photo_number = ($response->photoset->total) - 1;
      $farm_id = $response->photoset->photo[$photo_number]->farm;
      $server_id = $response->photoset->photo[$photo_number]->server;
      $photo_id = $response->photoset->photo[$photo_number]->id;
      $secret_id = $response->photoset->photo[$photo_number]->secret;
      $size = 'n';
      $title = $response->photoset->photo[$photo_number]->title;
      $photo_url = 'https://farm' . $farm_id . '.staticflickr.com/' . $server_id . '/' . $photo_id . '_' . $secret_id . '_' . $size . '.' . 'jpg';
  
      print '<div class="post-thumb">';
        print '<a href="' . $photo_url . '">';
          print "<img title='" . $title . "' src='" . $photo_url . "' /> $title";
        print '</a>';
      print '</div>';
  
    } elseif ($last_post == 0) {
  
  
        $photo_array = $response->photoset->photo;
        $a = 0;
        foreach($photo_array as $single_photo) {
          $a = $a + 1;
          $farm_id = $single_photo->farm;
          $server_id = $single_photo->server;
          $photo_id = $single_photo->id;
          $secret_id = $single_photo->secret;
          $size = 'm';
          $title = $single_photo->title;
          $photo_url_short = 'https://farm' . $farm_id . '.staticflickr.com/' . $server_id . '/' . $photo_id . '_' . $secret_id . '_m.' . 'jpg';
          $photo_url_ori = 'https://farm' . $farm_id . '.staticflickr.com/' . $server_id . '/' . $photo_id . '_' . $secret_id . '_b.' . 'jpg';
          // print '<div class="photo-thumb">'xl
          //   print '<a href="' . $photo_url . '">';
          //     print "<img title='" . $title . "' src='" . $photo_url . "' /> $a. $title  <br/>";
          //   print '</a>';
          // print '</div>';
  
  
  
  print '   <a href="' . $photo_url_ori . '">';
  print '   <img alt="' . $title . '" src="' . $photo_url_ori . '" data-image="' . $photo_url_ori . '" data-description="' .  $title . '" style="display:none">';
  print '   </a>';
  
        }
  
  
      }
  }
  ?>