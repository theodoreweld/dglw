
  <?php
   function curPageURL 
  $pageURL  'http'
   if $_SERVER"HTTPS" == "on" $pageURL .= "s"
   $pageURL .= "://"
   if $_SERVER"SERVER_PORT" != "80" 
  $pageURL .= $_SERVER"SERVER_NAME"":"$_SERVER"SERVER_PORT"$_SERVER"REQUEST_URI"
   else 
  $pageURL .= $_SERVER"SERVER_NAME"$_SERVER"REQUEST_URI"
  
   return $pageURL
  ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>

<title>DGLW.NET -- David Wolf Portfolio Site: <%title%> </title>

<link rel='stylesheet' href='<%baseurl%><%basename%>/site/<%obj_theme%>/style.css' type='text/css' />
<!--[if lte IE 6]>
<link rel='stylesheet' href='<%baseurl%><%basename%>/site/<%obj_theme%>/ie.css' type='text/css' />
<![endif]-->
<plug:front_lib_css />
<plug:front_dyn_css />
<script type='text/javascript' src='<%baseurl%><%basename%>/site/js/jquery.js'></script>
<script type='text/javascript' src='<%baseurl%><%basename%>/site/js/cookie.js'></script>
<script type='text/javascript' src='<%baseurl%><%basename%>/site/js/tweet.js'></script>
<script src="http://www.html5canvastutorials.com/libraries/kinetic-v3.6.0.js"></script>
<script src="http://www.html5canvastutorials.com/libraries/kinetic-image-plugin-v1.0.1.js"></script>
<script type='text/javascript' src='<%baseurl%><%basename%>/site/js/homepageCanvas.js'></script>

<plug:front_lib_js />
<script type='text/javascript'>
path = '<%baseurl%>/files/gimgs/';

$(document).ready(function()
{
	setTimeout('move_up()', 1);
});
</script>
<plug:front_dyn_js />
<plug:backgrounder color='<%color%>', img='<%bgimg%>', tile='<%tiling%>' />
</head>

<body class='section-<%section_id%>' onmousedown="return false;">
<div id='menu'>
<div class='container'>
<a href="http://www.dglw.net"><img src="<%baseurl%><%basename%>/site/sample/img/DGLW_LOGO_v3.png" style="padding-left:4px" /></a>
<ul style="border-top: 1px solid #eee"><li style="font-size:9px; padding-left: 3px; "><i>David Gordon Lawrence Wolf <br />Personal &amp; Portfolio Website</i></li></ul>
<%obj_itop%>
<plug:front_index />
<%obj_ibot%>
<ul>
<li><b>Find Me On:</b> </li>
<li>&nbsp;</li>
<li><a href="http://www.linkedin.com/profile/view?id=28702956&locale=en_US&trk=tab_pro"><img src="<%baseurl%><%basename%>/site/sample/img/social_linkedin.png" height="40" width="40" /></a>&nbsp;&nbsp;<a href="https://www.facebook.com/profile.php?id=31707199"><img src="<%baseurl%><%basename%>/site/sample/img/social_facebook.png" height="40" width="40"  /></a>&nbsp;&nbsp; <a href="https://www.last.fm/user/theodore_weld"><img src="<%baseurl%><%basename%>/site/sample/img/social_lastfm.png" height="40" width="40"  /></a></li>
<li>&nbsp;</li>
<li><a href="http://twitter.com/theodore_weld"><img src="<%baseurl%><%basename%>/site/sample/img/social_twitter.png" height="40" width="40" /></a> &nbsp;<a href="https://plus.google.com/117889352905970612158/posts"><img src="<%baseurl%><%basename%>/site/sample/img/social_googleplus.png"  height="40" width="40" /></a> &nbsp;&nbsp;<a href="http://old.thesixtyone.com/#/theodoreweld/"><img src="<%baseurl%><%basename%>/site/sample/img/social_t61.png" height="40" width="40"  /></a></li>
<li>&nbsp;</li>
</ul> 
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<br />
<!-- you must provide a link to Indexhibit on your site someplace - thank you -->
<ul style="padding-top: 5px">
<li style="color:#000">---</li>
<li>David Wolf</li>
<li><a href="mailto:iam@dglw.net">iam@dglw.net</a>
<li style="color:#333">--</li>
<li>&copy; 2012</li>
<li>Built w/ <a href='http://www.indexhibit.org/'>Indexhibit</a></li>
</ul>

</div>	
</div>	

<div id='content'>
<div class='container'>

<!-- text and image -->
<plug:front_exhibit /><br />
<div id="container">

        </div>


</div>
</div>

</body>
</html>