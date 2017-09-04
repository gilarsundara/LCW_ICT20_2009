<?php
define("home",1,true);
define("admin",1,true);
include "config.php";
require_once "rss/rss_generator.php";

$rss_channel = new rssGenerator_channel();
$rss_channel->atomLinkHref = 'rss.php';
$rss_channel->title = 'SMAN 20 Bandung RSS FEED';
$rss_channel->link = 'rss.php';
$rss_channel->description = 'Unofficial Website.';
$rss_channel->language = 'id';
$rss_channel->generator = 'PHP RSS Feed Generator';
$rss_channel->managingEditor = 'admin@sman20bandung.sch.id (Administrator)';
$rss_channel->webMaster = 'admin@sman20bandung.sch.id (Administrator)';

$result=DB::con()->query("SELECT * FROM berita WHERE tampilkan='1' ORDER BY id DESC");
while($row=mysqli_fetch_object($result))
{
	$item = new rssGenerator_item();
	$item->title = $row->judul;
	$item->description = trim(htmlspecialchars($row->konten));
	$item->link = "default.php?p=berita&amp;mode=detail&amp;id=$row->id";
	$item->guid = "default.php?p=berita&amp;mode=detail&amp;id=$row->id";
	$item->pubDate = $row->dikirim;
	$rss_channel->items[] = $item;
}


$rss_feed = new rssGenerator_rss();
$rss_feed->encoding = 'UTF-8';
$rss_feed->version = '2.0';
header('Content-Type: application/rss+xml');
echo $rss_feed->createFeed($rss_channel);

?>
