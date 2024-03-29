<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/portfolio.css" />
  <link rel="stylesheet" type="text/css" media="print" href="css/print.css" />
  <meta name="description" content="" />
  <title>Arttu Salonen: Portfolio</title>
  <script type="text/javascript">

function onLoad()
{
  var toggle_element;
  <?php foreach ( $tpl->projects as $project): ?>
  toggle_element = document.getElementById("project_<?php print $project->getProjectId(); ?>_details_toggler");
  toggle_element.setAttribute("onclick", "toggleDetails(<?php print $project->getProjectId(); ?>); return false;");
  <?php endforeach; ?>
}

function toggleDetails(project_id)
{
  var project_details_container = document.getElementById("project_" + project_id + "_details");
  var toggler_element           = document.getElementById("project_" + project_id + "_details_toggler");

  if ( project_details_container.className == "displayNone" )
    {
      project_details_container.className = "displayBlock";
      toggler_element.innerHTML = "[Show less]";
    }
  else
    {
      project_details_container.className = "displayNone";
      toggler_element.innerHTML = "[Show more]";
    }
}

  </script>
 </head>
<body onload="onLoad();">
<h1>Arttu Salonen: Portfolio</h1>
<pre>&lt; http://portfolio.watkinson.fi &gt;</pre>
<div id="swoof">
<p id="swooffy"><strong>contact:</strong>
arttu<img src="images/swoof.png" alt="" />watkinson.fi
</p>
<h3 class="noprint">About this page</h3>
<p class="about noprint">
Here are listed many of the projects that I have worked on, both
professionally and as a hobby. Some of the projects have their source code available at my GitHub
-account (<?php $link = "[github_link  ]"; $tpl->processGithubLinks($link); print $link; ?>),
including this portfolio system: <?php $link = "[github_link portfolio-system]"; $tpl->processGithubLinks($link); print $link; ?>.
</p>
</div>

<h2>Projects</h2>
<table cellpadding="10" id="projects">
<?php

foreach ( $tpl->projects as $project )
  {
    $tpl->assign("project", $project);
    $tpl->display("project.tpl.php");
  }

?>
</table>
<p class="copyright">Copyright &copy; Arttu Salonen <?php echo date("Y"); ?></p>
</body>
</html>
