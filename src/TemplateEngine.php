<?php

class TemplateEngine
{
  /**
   * An instance of the Application -class for the template engine to be able to locate template folder.
   */
  private $application;

  /**
   * An associative array to store all needed variables.
   *
   * The keys to the variable are names of the variables, and the values are the actual variables.
   */
  private $variables;

  /**
   * The constructor.
   *
   * @param  $application  An Application -object.
   */
  public function __construct(Application $application)
  {
    $this->application = $application;
    $this->variables   = array();
  }

  /**
   * Assigns a variable to the template engine.
   *
   * @param  $variable_name  The name of the variable.
   * @param  $variable       The actual variable.
   */
  public function assign($variable_name, $variable)
  {
    $this->variables[$variable_name] = $variable;
  }

  /**
   * Implementation of the magic method __get so that assigned variables can be accessed in the template.
   *
   * @param  $variable_name  The name of the variable.
   * @retval mixed           The assigned variable.
   */
  public function __get($variable_name)
  {
    $rv = NULL;

    if ( array_key_exists($variable_name, $this->variables) )
      {
        $rv = $this->variables[$variable_name];
      }

    return $rv;
  }

  /**
   * Converts all [link] -tags in an input to HTML -code.
   *
   * @param  $input  Reference to a content variable that is modified.
   */
  public function processLinks(&$input)
  {
    $matched_counts = preg_match_all("/\[link .*?\]/", $input, $matches);

    if ( $matched_counts > 0 )
      {
        foreach ( $matches[0] as $match )
          {
            $url = $match;
            $url = substr($url, strlen("[link "));
            $url = substr($url, 0, -1);
            $escaped_url = preg_replace("#/#", "\/", $url);

            $replacement = '<a href="' . $url . '" target="__blank">' . $url . ' <img src="images/open_in_new_window.jpg" alt="Opens in a new window." /></a>';

            $input = preg_replace("/\[link $escaped_url\]/", $replacement, $input);
          }
      }
  }

  /**
   * Converts all [image] -tags in an input to HTML -code.
   *
   * @param  $input  Reference to a content variable that is modified.
   */
  public function processImages(&$input)
  {
    $matched_counts = preg_match_all("/\[image .*?\]/", $input, $matches);

    if ( $matched_counts > 0 )
      {
        foreach ( $matches[0] as $match )
          {
            $image_name         = $match;
            $image_name         = substr($image_name, strlen("[image "));
            $image_name         = substr($image_name, 0, -1);
            $escaped_image_name = preg_replace("#\.#", "\.", $image_name);

            $replacement = '<img src="images/' . $image_name . '" alt="images/' . $image_name . '" />';

            $input = preg_replace("/\[image $escaped_image_name\]/", $replacement, $input);
          }
      }
  }

  public function processDownloadLinks(&$input)
  {
    $matched_counts = preg_match_all("/\[download .*?\]/", $input, $matches);

    if ( $matched_counts > 0 )
      {
        foreach ( $matches[0] as $match )
          {
            $download_name = $match;
            $download_name = substr($download_name, strlen("[download "));
            $download_name = substr($download_name, 0, -1);

            $replacement = '<a href="downloads/' . $download_name . '">' . $download_name . ' <img src="images/download.png" alt="Downloads the resource." /></a>';

            $input = preg_replace("/\[download $download_name\]/", $replacement, $input);
          }
      }
  }

  public function processNonprintContent(&$input)
  {
    $input = preg_replace("/\[noprint\]/", '<span class="noprint">', $input);
    $input = preg_replace("/\[\/noprint\]/", '</span>', $input);
  }

  public function parseDetails($details)
  {
    $this->processLinks($details);
    $this->processImages($details);
    $this->processDownloadLinks($details);
    $this->processNonprintContent($details);
    print nl2br($details);
  }

  /**
   * Displays a template file.
   *
   * In the template file, assigned variables can be accessed with $tpl -variables, e.g. $tpl->projects.
   *
   * @param  $template_file  The name of the template file.
   */
  public function display($template_file)
  {
    $file_path = $this->application->getTemplateDir() . "/" . $template_file;
    $tpl       = $this;
    include($file_path);
  }
}

?>
