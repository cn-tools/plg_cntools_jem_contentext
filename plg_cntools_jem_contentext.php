<?php
/**
 * plg_cntools_jem_contentext - Joomla Plugin
 *
 * @package    Joomla
 * @subpackage Plugin
 * @author Clemens Neubauer
 * @link https://github.com/cn-tools/
 * @license		GNU/GPL, see LICENSE.php
 * plg_cntools_jem_contentext is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class plgContentPlg_CNTools_JEM_ContentExt extends JPlugin
{
	public function onContentPrepare($context, &$article, &$params, $page = 0)
	{
		if (is_object($article) and property_exists($article, 'text'))
		{
			$article->text = $this->getCNToolsJemPlgValue($context, 'onContentPrepare_BeginText') . $article->text . $this->getCNToolsJemPlgValue($context, 'onContentPrepare_EndText');
		} else {
			$article = $this->getCNToolsJemPlgValue($context, 'onContentPrepare_BeginText') . $article . $this->getCNToolsJemPlgValue($context, 'onContentPrepare_EndText');
		}
	}

    public function onContentBeforeDisplay($context, &$row, &$params, $page = 0) {
		$lValue = $this->getCNToolsJemPlgValue($context, 'onContentBeforeDisplay');
		return $lValue;
    }
	
    public function onContentAfterDisplay($context, &$row, &$params, $page = 0) {
		$lValue = $this->getCNToolsJemPlgValue($context, 'onContentAfterDisplay');
		return $lValue;
    }
	
	public function onEventEnd($event_id, $event_title = '')
	{
		$lValue = $this->getCNToolsJemPlgValueDetail('onEventEnd');
		return $lValue;
	}
	
	public function isComJEMEvent($context)
	{
		if ($context == 'com_jem.event')
		{
			return true;
		} else {
			return false;
		}
	}
	
	public function getCNToolsJemPlgValue($context, $fieldname)
	{
		$lValue = '';
		if ($this->isComJEMEvent($context))
		{
			$lValue = $this->getCNToolsJemPlgValueDetail($fieldname);
		}
		return $lValue;
	}
	
	public function getCNToolsJemPlgValueDetail($fieldname)
	{
		$lNLSCode = strtoupper('Plg_CNTools_JEM_ContentExt_' . $fieldname);
		$lValue = JText::_($lNLSCode);
		if ($lValue == $lNLSCode) { $lValue =''; }
		
		if ($lValue == '')
		{
			$lValue = $this->params->get($fieldname, '');
		}
		return $lValue;
	}
}
?>