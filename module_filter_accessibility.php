<?php
/**
 * @version 	1.1.8
 * @package 	Module filter accessibility
 * @copyright 	(c) 2017 Stefan Herzog
 * @license		GNU/GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');

class plgSystemModule_filter_accessibility extends JPlugin {

	/**
	* Load the language file on instantiation.
	*
	* @var    boolean
	* @since  3.1
	*/
	protected $autoloadLanguage = true;

	function onAfterInitialise() {
		$canDo = JHelperContent::getActions('com_modules');
		$user  = JFactory::getUser();
		$app	 = JFactory::getApplication();
		$url	 = JUri::getInstance();

		if($app->isClient('administrator') && $app->input->get('option', '', 'string') === 'com_modules') {

			// Path to current template
			$pathOnly   = JURI::base(true).'/templates/'.$app->getTemplate().'/html/com_modules/modules/';
			$dest = $pathOnly . 'default.php';

			if(!is_dir(JPATH_ROOT . $pathOnly)) {
					mkdir(JPATH_ROOT . $pathOnly, 0755, true );
					$app->enqueueMessage(JText::_('Filter wurde erstellt'), 'notice');
			}

			if(!file_exists($dest)) {
				// File doesn't exist => copy file to this path
				if(copy(dirname(__FILE__) . '/src/default.php', JPATH_ROOT . $dest) ) {
					$app->enqueueMessage(JText::_('Filter wurde angewendet - nur bearbeitbare Module werden angezeigt.'), 'notice');
				}
			}
		}
	}

	function onAfterRender() {
		$app = JFactory::getApplication();

		if($app->isClient('administrator') && $app->input->get('option', '', 'string') === 'com_modules') {
			$pathOnly   = JURI::base(true).'/templates/'.$app->getTemplate().'/html/com_modules/';
			$dest = $pathOnly . 'modules/default.php';

			if(file_exists(JPATH_ROOT.$dest)) {
				// File exists => delete file (= override = filter)
				unlink(JPATH_ROOT.$dest);
			}
		}
	}
}
