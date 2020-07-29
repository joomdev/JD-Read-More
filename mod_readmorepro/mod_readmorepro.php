<?php
/*-------------------------------------------------------------------------------
# mod_readmorepro - scripting module for Joomla 3.x v1.0.2
# -------------------------------------------------------------------------------
# author    JoomDev (Formerly GraphicAholic)
# copyright Copyright (C) 2020 Joomdev, Inc. All rights reserved.
# @license - GNU General Public License version 2 or later
# Websites: https://www.joomdev.com
--------------------------------------------------------------------------------*/
// No direct access
defined('_JEXEC') or die('Restricted access');
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
JHtml::_('bootstrap.framework');
// Import the file / foldersystem
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
$LiveSite = JURI::base();
$document = JFactory::getDocument();
$modbase = JURI::base(true).'/modules/mod_readmorepro/';
$document->addScript ($modbase.'js/readmore.js');
$moduleID = $module->id;
?>
<style>
.article + [data-readmore-toggle]{line-height: <?php echo $params->get('readmorebackgroundheight') ?>; height: <?php echo $params->get('readmorebackgroundheight') ?>;}
@media screen and (max-width: 640px) {
    .article {
        max-height: <?php echo $params->get('articlemediaHeight') ?>
    }
}
</style>
<script>
//jQuery.noConflict();
jQuery('.article').readmore({
speed: <?php echo $params->get('containerSpeed') ?>, //(in milliseconds)
//maxHeight: <?php echo $params->get('articlecontainerHeight') ?>, //(in pixels)
collapsedHeight: <?php echo $params->get('articlecontainerHeight') ?>,
embedCSS: false,
moreLink: "<a href='#' style='text-align: <?php echo $params->get('buttonAlign') ?>; background: <?php echo $params->get('readmorebackground') ?>; width: 100%; display: block; font-weight: <?php echo $params->get('readmorefontweight') ?>; font-size: <?php echo $params->get('readmorefontsize') ?>; padding-left: 5px;'><?php echo $params->get('readmoreText') ?><p></p></a>",
lessLink: "<a href='#' style='text-align: <?php echo $params->get('buttonAlign') ?>; background: <?php echo $params->get('readlessbackground') ?>; width: 100%; display: block; font-weight: <?php echo $params->get('readlessfontweight') ?>; font-size: <?php echo $params->get('readlessfontsize') ?>; padding-left: 5px;'><?php echo $params->get('readlessText') ?><p></p></a>"
});
</script>