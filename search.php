<?php
require_once ('SearchTags.php');
require_once ('CallApiExchange.php');

if(isset($_POST['tags']) and strlen($_POST['tags'])>0){
     $search = new SearchTags(htmlspecialchars($_POST['tags']));
     $tags = $search->convertSearchTagsForExchange();
     $apiExchange = new CallApiExchange();
     $rest = $apiExchange->querySearch($tags);
     print "<h1> key words search : ".$tags."</h1>";
     if($rest!=false && count($rest->items)>0) {
         foreach ($rest->items as $item) {
             print "<h2> title: ".$item->title."</h2>";
             print "<p> Tags: ".$search->arrayExplode($item->tags)."</p>";
             print "<p> link: ".$item->link."</p>";
         }
     } else {
         print "no result";
     }
} else {
    print "no search tag enter";
}