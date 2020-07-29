<?php
/**
 * @package     ReadMore.Plugin
 * @subpackage  System.ReadMorePRO
 *
 * @copyright   Copyright (C) 2020 Joomdev, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
jimport( 'joomla.plugin.plugin' );
/**
 * System plugin to readmorepro terms.
 *
 * @since  3.0
 */
class PlgSystemReadMorePro extends JPlugin {

    public function __construct( &$subject, $params ){
		parent::__construct( $subject, $params );
		$this->paramObj = new JRegistry($params['params']);
		}

   public function onAfterRender()
    {
      $app = JFactory::getApplication();
      $articlecontainerHeight = $this->paramObj->get('articlecontainerHeight','');
      $articlemediaHeight = $this->paramObj->get('articlemediaHeight','');
      $containerSpeed = $this->paramObj->get('containerSpeed','');
      $buttonAlign = $this->paramObj->get('buttonAlign','');
      $readmoreText = $this->paramObj->get('readmoreText','');
      $readmorebackground = $this->paramObj->get('readmorebackground','');
      $readmorebackgroundheight = $this->paramObj->get('readmorebackgroundheight','');
      $readmoreColor = $this->paramObj->get('readmoreColor','');
      $readmorefontsize = $this->paramObj->get('readmorefontsize','');
      $readmorefontweight = $this->paramObj->get('readmorefontweight','');
      $readlessText = $this->paramObj->get('readlessText','');
      // only insert the script in the frontend
      if ($app->isClient('site')) {
          $html = $app->getBody();
          $scripts = [
              "jQuery('.article').readmore({
                    speed: $containerSpeed,
                    collapsedHeight: $articlecontainerHeight,
                    embedCSS: true,
                    moreLink: '<a>$readmoreText<p></p></a>',
                    lessLink: '<a>$readlessText<p></p></a>'
            });
                ",
              ];
        
          $cssTag = "";
          $tag = "";
          $tags = "";
          foreach($scripts as $s){
              $cssTag .= '<style>.article + [data-readmore-toggle]{text-align: '.$buttonAlign.'; background: '.$readmorebackground.'; font-size: '.$readmorefontsize.'; line-height: '.$readmorebackgroundheight.'; font-weight: '.$readmorefontweight.'; height: '.$readmorebackgroundheight.'; padding-left: 5px;}
              @media screen and (max-width: 640px) {
                .article {
                    max-height: '.$articlemediaHeight.';
                }
                }
              </style>';
              $tag .= '<script src="plugins/system/readmorepro/js/readmore.js"></script>';
              $tags .= '<script>' . $s . '</script>';
          }
          $html = str_replace('</body>',$cssTag . '</body>',$html);
          $html = str_replace('</body>',$tag . '</body>',$html);
          $html = str_replace('</body>',$tags . '</body>',$html);
          // override the original response
          $app->setBody($html);
        }
    }
}