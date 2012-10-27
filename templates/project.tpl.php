<tr class="project">
    <td class="projectMetadata">
    <h3 class="projectName">
    <?php print $tpl->project->getName(); ?>
    </h3>
    <?php if ($tpl->project->getCustomer() !== NULL): ?>
      <p>
      <strong>Customer:</strong>
      <?php print $tpl->project->getCustomer(); ?>
      </p>
    <?php endif; ?>
    <p>
    <strong>Date:</strong>
    <?php print $tpl->project->getDate(); ?>
    </p>
    </td>
    <td class="projectDescription">
    <p>
    <strong>Description of project:</strong>
    <?php print $tpl->project->getDescription(); ?>
    </p>
    <p>
    <strong>Own role:</strong>
    <?php print $tpl->project->getUserRoles(); ?>
    </p>
    <p>
    <strong>Professional skills:</strong>
    <?php print $tpl->project->getProfessionalSkills(); ?>
    </p>
    <p>
    <strong>Methods, tools and technologies:</strong>
    <?php print $tpl->project->getMethods(); ?>
    </p>
    <p>
    <strong>Main tools:</strong>
    <?php print $tpl->project->getMainTools(); ?>
    </p>
    <a href="#" class="toggler" id="project_<?php print $tpl->project->getProjectId(); ?>_details_toggler">[Show more]</a>
    <div id="project_<?php print $tpl->project->getProjectId(); ?>_details" class="displayNone">
      <p>
      <?php print $tpl->parseDetails($tpl->project->getDetails()); ?>
      <?php if ( count($tpl->project->getSpecs()) > 0 ): ?>
      <br />
      <br />
      <strong>Specs:</strong>
        <ul>
        <?php foreach ( $tpl->project->getSpecs() as $spec ): ?>

        <li><?php print $spec; ?></li>

        <?php endforeach; ?>
        </ul>
      <?php endif;?>
      </p>
      <?php if ( $tpl->project->getProjectPage() !== NULL): ?>
        <p>
        <strong>Project website: </strong> <a target="__blank" href="<?php print $tpl->project->getProjectPage();?>"><?php print $tpl->project->getProjectPage();?> <img src="images/open_in_new_window.jpg" alt="Opens in a new window." /></a>
        </p>
      <?php endif; ?>
    </div>
    </td>
</tr>