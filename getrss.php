<?php
//get the q parameter from URL
$q=$_GET["q"];

//find out which feed was selected
if($q=="Google") {
  $xml=("http://news.google.com/news?ned=us&topic=h&output=rss");
} elseif($q=="Benefits") {
  $xml=("http://www.military.com/cs/Satellite?pagename=Military.com/Feeds/Section&cid=7000022774571");
} elseif($q=="services") {
  $xml=("http://feeds.feedburner.com/militarydotcom/dailynews");
} elseif($q=="army-news") {
  $xml=("http://feeds.feedburner.com/militarydotcom/armynews");
} elseif($q=="navy-news") {
  $xml=("http://feeds.feedburner.com/militarydotcom/navynews");
} elseif($q=="airforce-news") {
  $xml=("http://feeds.feedburner.com/militarydotcom/airforcenews");
} elseif($q=="marines-news") {
  $xml=("http://feeds.feedburner.com/militarydotcom/marinecorpsnews");
} elseif($q=="coastguard-news") {
  $xml=("http://feeds.feedburner.com/militarydotcom/coastguardnews");
} elseif($q=="noaa-news") {
  $xml=("http://oceanservice.noaa.gov/rss/aaupdates.xml");
} elseif($q=="phs-news") {
  $xml=("");
}
//  PHS:  http://www.regulations.gov/rssstreamer?id=PHS
// http://oceanservice.noaa.gov/rss/aaupdates.xml
// http://feeds.feedburner.com/militarydotcom/navynews
// http://feeds.feedburner.com/militarydotcom/airforcenews
$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
$channel_link = $channel->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

//output elements from "<channel>"
//echo("<p><a href='" . $channel_link
 // . "'>" . $channel_title . "</a>");
//echo("<br>");
//echo($channel_desc . "</p>");

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=10; $i++) {
  $item_title=$x->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

  echo ("<p><a href='" . $item_link
  . "' target='_blank'>" . $item_title . "</a>");
  echo ("<br>");
  echo ($item_desc . "</p>");
}

?>