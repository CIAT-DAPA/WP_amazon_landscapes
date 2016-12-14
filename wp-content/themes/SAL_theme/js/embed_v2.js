function addScript(src,callback) {
  var s = document.createElement('script');
  s.setAttribute('src', src);
  s.onload=callback;
  document.body.appendChild(s);
}

function callback3()
{
window.setTimeout(function(){
$('#flickrembed').html('<div id="gallery" style="display:none; margin: 0 auto;" class="center"></div>');
api = $("#gallery").unitegallery({
          gallery_images_preload_type:"minimal",
          gallery_autoplay:true,
          slider_control_zoom:true,
          gallery_play_interval: 10000,
          slider_scale_mode: "",
          slider_scale_mode_fullscreen: "",
          slider_enable_bullets: false,
          gallery_theme:""});
        
}, 500);
}

function callback2()
{
$('head').append('<link rel="stylesheet" href="https://flickrembed.com/unitegallery/css/unite-gallery.css" type="text/css"/>');
$('head').append('<link rel="stylesheet" href="https://flickrembed.com/unitegallery/themes/default/ug-theme-default.css" type="text/css" />');
addScript('https://flickrembed.com/unitegallery/themes/ug-theme-.js', callback3);
}

function callback1()
{


addScript('https://flickrembed.com/unitegallery/js/unitegallery.min.js', callback2);
}

addScript('https://code.jquery.com/jquery-1.12.1.min.js', callback1);

