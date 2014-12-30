<?php

/**
* Random Background
* For main page only
*
* Plugin
* 
* @version 1.0
* @author Vaska 
*/

// folder must be from the root of your Indexhibit site.
// If you are up more than one folder level indicate as 'folder/folder2'
// no beginning or trailing slashes /

function ndxz_rand_bg($folder='', $tile=true)
{
	global $rs;
	
	if ($rs['url'] == '/')
	{
		// get our images
		$path = DIRNAME . "/$folder/";
		
		if (is_dir($path))
		{
			if ($fp = opendir($path)) 
			{
				while (($module = readdir($fp)) !== false) 
				{
					if ((eregi("jpg$", $module)) || (eregi("gif$", $module)) || (eregi("png$", $module)))
					{      
						$images[] = $module;
					}
				} 
			}
			closedir($fp);
		}
		
		$image = count($images);
		$rand = rand(0, $image-1);
		
		$show = BASEURL . "/$folder/" . $images[$rand];
		
		$tile = ($tile == true) ? 'repeat' : 'no-repeat';
		
		// this 215px setting may need to be adjusted if you have altered your Index in the template
		$style = "<style type='text/css'>body { background: url($show) $tile;\nbackground-position: 215px 0; }</style>\n";
		return $style;
	}
	else
	{
		return backgrounder($rs['color'], $rs['bgimg'], $rs['tiling']);
	}
	
	return;
}

?>