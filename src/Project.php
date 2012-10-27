<?php

/**
 * Project contains the details of a single project displayed on the porfolio -site.
 *
 * @author  Arttu Salonen <art.salonen@gmail.com>
 * @license
 */
class Project
{
  /**
   * Id of the project.
   *
   * An integer, older projects have smaller numbers whereas the lates project has always the greatest number.
   */
  private $project_id;

  /**
   * Name of the project.
   */
  private $name;

  /**
   * Name of the project's customer.
   */
  private $customer;

  /**
   * The date when the project took place.
   *
   * A string that is freely constructed, such as "09-10/2009".
   */
  private $date;

  /**
   * A brief description about the project.
   */
  private $description;

  /**
   * Roles of the person in the project.
   *
   * Also a free string.
   */
  private $user_roles;

  /**
   * Professional skills used in the project.
   *
   * Also a free string.
   */
  private $professional_skills;

  /**
   * Description of methods, tools and technologies used in the project.
   */
  private $methods;

  /**
   * Description of main tools used in the project.
   */
  private $main_tools;

  /**
   * Details of the project, explaining further the backgounds and implementation of the project.
   */
  private $details;

  /**
   * An array of project specs, these are free strings explaining e.g. programming language version or used standards.
   */
  private $specs;

  /**
   * The URL for the project website.
   */
  private $project_page;

  /**
   * The constructor.
   *
   * @param  $project_id           Id of the project, an integer.
   * @param  $name                 Name of the project.
   * @param  $customer             Name of the project's customer.
   * @param  $date                 A date string depicting the time the project took place.
   * @param  $description          A brief description about the project.
   * @param  $user_roles           The user's role or roles in the project.
   * @param  $professional_skills  Professional skills used in the project.
   * @param  $methods              Methods, tools and technologies used in the project.
   * @param  $main_tools           Main tools of the project.
   * @param  $details              Detailed description about the project.
   */
  public function __construct($project_id, $name, $customer, $date, $description, $user_roles, $professional_skills, $methods, $main_tools, $details)
  {
    $this->project_id          = $project_id;
    $this->name                = $name;
    $this->customer            = $customer;
    $this->date                = $date;
    $this->description         = $description;
    $this->user_roles          = $user_roles;
    $this->professional_skills = $professional_skills;
    $this->methods             = $methods;
    $this->main_tools          = $main_tools;
    $this->details             = $details;
    $this->specs               = array();
    $this->project_page        = NULL;
  }

  /**
   * Returns the id of the project.
   *
   * @retval  integer  Id of the project.
   */
  public function getProjectId()
  {
    return $this->project_id;
  }

  /**
   * Adds a specification to this project.
   *
   * @param  $spec  The specification, such as the version of a programming language or a standard that was used.
   */
  public function addSpec($spec)
  {
    $this->specs[] = $spec;
  }

  /**
   * Returns the name of the project.
   *
   * @retval  string  Name of the project.
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Returns the name of the project's customer.
   *
   * @retval  string  Name of the project's customer.
   */
  public function getCustomer()
  {
    return $this->customer;
  }

  /**
   * Returns the date information when the project took place.
   *
   * @retval  string  The date the project took place in a freely-constructed string.
   */
  public function getDate()
  {
    return $this->date;
  }

  /**
   * Returns the description of the project.
   *
   * @retval  string  The description of the project.
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * Returns the description of the role or roles of the user in the project.
   *
   * @retval  string  Description about the user's roles in the project.
   */
  public function getUserRoles()
  {
    return $this->user_roles;
  }

  /**
   * Returns the description of the professional skills used in the project.
   *
   * @retval  string  A description of professional skills used in the project.
   */
  public function getProfessionalSkills()
  {
    return $this->professional_skills;
  }

  /**
   * Returns the description about the methods, tools and technologies used in the project.
   *
   * @retval  string  Description about methods, tools and technologies used in the project.
   */
  public function getMethods()
  {
    return $this->methods;
  }

  /**
   * Returns the description about main tools used in the project.
   *
   * @retval  string  Description about main tools used in the project.
   */
  public function getMainTools()
  {
    return $this->main_tools;
  }

  /**
   * Returns the detailed description about the project.
   *
   * @retval  string  Detailed description about the project.
   */
  public function getDetails()
  {
    return $this->details;
  }

  /**
   * Returns the specs used in the project.
   *
   * @retval  array  An array of specifications used in the project.
   */
  public function getSpecs()
  {
    return $this->specs;
  }

  /**
   * Sets the project page.
   *
   * @param  $project_page  The full URL to the project's website.
   */
  public function setProjectPage($project_page)
  {
    $this->project_page = $project_page;
  }

  /**
   * Returns the full URL to the project's website.
   *
   * @retval  string  The full URL to the project's website.
   */
  public function getProjectPage()
  {
    return $this->project_page;
  }
}

?>
