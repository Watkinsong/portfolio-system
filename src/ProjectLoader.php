<?php

require_once(realpath(dirname(__FILE__)) . "/Project.php");

/**
 * Contains services to load project data from the system.
 */
class ProjectLoader
{
  /**
   * An instance of the Application -class containing services needed to obtain project data.
   */
  private $application;

  /**
   * The constructor.
   *
   * @param  $application  An Application -object.
   */
  public function __construct(Application $application)
  {
    $this->application = $application;
  }

  /**
   * Builds a Project -object from a row as a result of parsing an ini -file in the database folder.
   *
   * @param  $result_row  The associative array, a result of parse_ini_file of a project ini file.
   * @retval Project      The Project -object.
   */
  private function buildProjectFromResultRow(array $result_row)
  {
    $project = NULL;

    if ( ! array_key_exists("customer", $result_row) )
      {
        $result_row["customer"] = NULL;
      }

    $project = new Project($result_row["project_id"],
                           $result_row["name"],
                           $result_row["customer"],
                           $result_row["date"],
                           $result_row["description"],
                           $result_row["user_roles"],
                           $result_row["professional_skills"],
                           $result_row["methods"],
                           $result_row["main_tools"],
                           $result_row["details"]);

    if ( count($result_row["specs"]) > 0 )
      {
        foreach ( $result_row["specs"] as $spec )
          {
            $project->addSpec($spec);
          }
      }

    if ( array_key_exists("project_page", $result_row) )
      {
        $project->setProjectPage($result_row["project_page"]);
      }

    return $project;
  }

  /**
   * Fetches project data from the system.
   *
   * @retval  array  An array of Project -objects.
   */
  public function getProjects()
  {
    $rv = array();

    $project_ini_files = glob($this->application->getDatabaseDir() . "/*.ini");

    if ( is_array($project_ini_files) )
      {
        foreach ( $project_ini_files as $project_ini_file )
          {
            $result = parse_ini_file($project_ini_file, TRUE, INI_SCANNER_NORMAL);

            if ( is_array($result) )
              {
                $project   = $this->buildProjectFromResultRow($result);

                $rv[$project->getProjectId()] = $project;
              }
          }

        krsort($rv);
        $rv = array_values($rv);
      }

    return $rv;
  }
}

?>
