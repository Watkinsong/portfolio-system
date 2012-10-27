<?php

/**
 * An application -related class that contains services needed to launch the application.
 */
class Application
{
  /**
   * The absolute path to the install folder.
   */
  private $install_dir;

  /**
   * The constructor.
   */
  public function __construct()
  {
    $this->install_dir = "PORTFOLIO_INSTALL_DIR";
  }

  /**
   * Returns the absolute path to the project install directory.
   *
   * @retval  string  The absolute path to the install directory.
   */
  public function getInstallDir()
  {
    return $this->install_dir;
  }

  /**
   * Returns the absolute path to the directory where source files are located.
   *
   * @retval  string  The absolute path to the source file directory.
   */
  public function getSourceDir()
  {
    return $this->install_dir . "/src";
  }

  /**
   * Returns the absolute path to the directory where template files are located.
   *
   * @retval  string  The absolute path to the template file directory.
   */
  public function getTemplateDir()
  {
    return $this->install_dir . "/templates";
  }

  /**
   * Returns the absolute path to the directory where the portfolio text database is located.
   *
   * @retval  string  The absolute path to the text database directory.
   */
  public function getDatabaseDir()
  {
    return $this->install_dir . "/db";
  }
}

?>
