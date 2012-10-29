<?php

require_once("Application.php");
$application = new Application();
require_once($application->getSourceDir() . "/ProjectLoader.php");
require_once($application->getSourceDir() . "/TemplateEngine.php");

$project_loader  = new ProjectLoader($application);
$projects        = $project_loader->getProjects();
$template_engine = new TemplateEngine($application);

if ( count($projects) > 0 )
  {
    $template_engine->assign("projects", $projects);
    $template_engine->display("index.tpl.php");
  }
else
  {
    $template_engine->display("error.tpl.php");
  }

?>
