<?php
/**
 * @version 	1.1.8
 * @package 	Plugin filter accessibility
 * @copyright 	(c) 2017 Stefan Herzog
 * @license		GNU/GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');
jimport('joomla.error.exception');

class plgSystemPlugin_filter_accessibility extends JPlugin {

	/**
	* Load the language file on instantiation.
	*
	* @var    boolean
	* @since  3.1
	*/
	protected $autoloadLanguage = true;

	void onAfterInitialise() {

	}

	void onBeforeRender() {
		
	}

}
