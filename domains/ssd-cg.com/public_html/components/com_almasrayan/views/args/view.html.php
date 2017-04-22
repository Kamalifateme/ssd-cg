<?php
// No direct access
defined('_JEXEC') or die;
class almasrayanViewargs extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $published;
	/**
	 * Display the view
	 */
	public function display($tpl = null){
		global $compconfig,$view,$option,$app;
		// Initialise variables.
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state	= $this->get('State');
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$id = JRequest::getVar('id');
        if(count($this->items)==1 && $id){
			$tpl = "detail";
		}
		$db = JFactory::getDBO();
		{otherdata}
		parent::display($tpl);
	}
}
?>