<?php
/**
 * plg_cntools_bannerext - Joomla Plugin
 *
 * @package    Joomla
 * @subpackage Plugin
 * @author Clemens Neubauer
 * @link https://github.com/cn-tools/
 * @license		GNU/GPL, see LICENSE.php
 * plg_cntools_bannerext is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class plgContentPlg_CNTools_JEM_ContentExt extends JPlugin
{
	public function plgContentPlg_CNTools_JEM_ContentExt( &$subject, $config )
	{
		parent::__construct( $subject, $config );
	}

    public function onContentBeforeDisplay($context, &$row, &$params, $page = 0) {
		$lValue = $this->getValue($context, 'onContentBeforeDisplay');
		return $lValue;
    }
	
    public function onContentAfterDisplay($context, &$row, &$params, $page = 0) {
		$lValue = $this->getValue($context, 'onContentAfterDisplay');
		return $lValue;
    }
	
	protected function getValue($context, $fieldname)
	{
		$lValue = '';
		if ($context == 'com_jem.event')
		{
			$lValue = $this->params->get($fieldname, '');
		}
		return $lValue;
	}
}
?>