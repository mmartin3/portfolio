<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
  "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<title>Matt Martin's Portfolio | Selected works 2008-2019</title>
<link rel="stylesheet" href="style.css" type="text/css">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
<script type='text/javascript'>
$(document).ready(function()
{
  $(".title").hide();
  $(".info").hide();
  $(".info::eq(0)").show();
  $(".button").mouseenter(function(){
    $(this).animate({opacity:'0.5'});
  });
  $(".button").mouseleave(function(){
    $(this).animate({opacity:'1.0'});
  });
  $(".button").click(function(){
    var n = $(this).index();
    $(".info").hide(1000);
    $(".info::eq("+n+")").show(1000);
  });
  $("#javatag").click(function(){
    $(".info").hide(1000);
    $(".java").show(1000);
  });
  $("#phptag").click(function(){
    $(".info").hide(1000);
    $(".php").show(1000);
  });
  $("#ctag").click(function(){
    $(".info").hide(1000);
    $(".c").show(1000);
  });
  $("#rubytag").click(function(){
    $(".info").hide(1000);
    $(".ruby").show(1000);
  });
  $("#sqltag").click(function(){
    $(".info").hide(1000);
    $(".sql").show(1000);
  });
});
</script>
<?php

/**
 * Returns HTML output for the given project data.
 *
 * @param {Object} project Data for a project
 * @return {String} HTML output
 */
function print_info($project)
{
	$html = "";
	extract((array)$project);
	$html .= "<div class='info $tags'><h2 class='infobox'>$title</h2>\n";
	$html .= "<div class='infobox'><p>";
	$html .= htmlentities($info);
	$html .= "</p>\n";
	
	if ( isset($img) )
	{
		$html .= "<img src=\"$img\" alt=\"$title\">\n";
	}
	
	if ( isset($links) )
	{
		$html .= "<ul>\n";
		
		foreach ( $links as $name => $link )
		{
			$html .= "<li><a href='$link' target='_blank'>$name</a></li>";
		}
		
		$html .= "</ul>\n";
	}
	
	else
	{
		$html .= "<br>";
	}
	
	$html .= "</div></div>\n";
	
	return $html;
}
?>
<div id="wrapper">
	<div id="header">
	<h1>Matt Martin's Portfolio</h1>
	<a href="#" id="javatag" class="tag">#java</a>
	<a href="#" id="phptag" class="tag">#php</a>
	<a href="#" id="ctag" class="tag">#c++</a>
	<a href="#" id="rubytag" class="tag">#ruby</a>
	<a href="#" id="sqltag" class="tag">#sql</a>
	</div>
         <?php
		 
		 $json = file_get_contents("projects.json");
		 $projects = json_decode($json);
		 $sidebar = '<div id="sidebar">';
		 $projects_output = "";
         
		 foreach ( $projects as $project )
		 {
			 $sidebar .= "<div class='button'><p>$project->title</p></div>\n";
			 $projects_output .= print_info($project);
		 }
		 
		 $sidebar .= "</div>";
         
         echo "$sidebar$projects_output";
		 
         ?>
         <div id="footer">
           <p>&copy; Matt Martin 2008-2019</p>
           <p>
           <a href="http://www.linkedin.com/in/mmartin3">      
           <img src="http://s.c.lnkd.licdn.com/scds/common/u/img/webpromo/btn_viewmy_160x25.png" width="160" height="25" border="0" alt="View Matt Martin's profile on LinkedIn">
           </a>
           </p>
         </div>
    </div>
    </body>
</html>