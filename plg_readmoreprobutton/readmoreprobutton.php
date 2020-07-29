<?php
/**
 * @version   	1.1
 * @package     Joomla
 * @subpackage  System
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.
 * @license     GNU GPL v2.0
 */

defined('_JEXEC') or die;

class plgButtonReadMoreProButton extends JPlugin
{
    public function onDisplay($name)
    {

        $doc = JFactory::getDocument();

		$txt = '<div class="article">Replace this with your own text!</div>';
		$label = 'JD Read More';
		$js = "
                function insertCustText(editor) {
                    jInsertEditorText('".$txt."', editor);
                }
                ";

        $doc->addScriptDeclaration($js);

		$button = new JObject;
		$button->modal = false;
		$button->onclick = 'insertCustText(\''.$name.'\');return false;';
		$button->text = JText::_('JD Read More');
		$button->name = 'arrow-down';
		// TODO: The button writer needs to take into account the javascript directive
		//$button->link', 'javascript:void(0)');
		$button->link = '#';

        return $button;
    }
}
?>