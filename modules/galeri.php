<?php
defined("home") or die("Maaf anda tidak bisa melihat halaman ini");
?>
<link rel="stylesheet" href="css/jd.gallery.css" type="text/css" media="screen" charset="utf-8" />
<script src="js/mootools.v1.11.js" type="text/javascript"></script>
<script src="js/jd.gallery.js" type="text/javascript"></script>
<script src="js/jd.gallery.set.js" type="text/javascript"></script>
<script type="text/javascript">
window.addEvent('domready', function() {
document.myGallerySet = new gallerySet($('myGallerySet'), {
timed: false
});
});
</script>
<div class="content">
<div id="myGallerySet">
<div id="gallery1" class="galleryElement">
<h2>Album Sekolah</h2>
<?php
function dirlist($dir, $bool = "dirs"){
$truedir = $dir;
$dir = scandir($dir);
if($bool == "files"){ 
$direct = 'is_dir';
}elseif($bool == "dirs"){
$direct = 'is_file';
}
foreach($dir as $k => $v){
if(($direct($truedir.$dir[$k])) || $dir[$k] == '.' || $dir[$k] == '..' ){
unset($dir[$k]);
}
}
$dir = array_values($dir);
return $dir;
}
$dir = "galeri/";
$files = dirlist($dir,"files");
foreach($files as $key => $value){
?>

<div class="imageElement">
<h3><?=$value;?></h3>
<p>Album Sekolah</p>
<a href="#" title="buka" class="open"></a>
<img src="admin/thumb/phpThumb.php?src=../../<?=$dir.$value;?>&amp;w=400" alt="" class="full" />
<img src="admin/thumb/phpThumb.php?src=../../<?=$dir.$value;?>&amp;w=100" alt="" class="thumbnail" />
</div>
<?
}
?>

