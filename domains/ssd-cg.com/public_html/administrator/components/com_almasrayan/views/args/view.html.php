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
		$this->addToolbar();
		parent::display($tpl);
	}
	/**
	 * Add the page title and toolbar.
	 */
	protected function addToolbar(){
		global $option;
		$db = JFactory::getDBO();
		{otherdata}
		//=========================================================
		require_once JPATH_COMPONENT.'/helpers/almasrayan.php';
		JToolBarHelper::title(JText::_('args'), 'args.png');
		JToolBarHelper::addNew('arg.add');
		JToolBarHelper::editList('arg.edit');
		JToolBarHelper::publish('args.publish', 'JTOOLBAR_PUBLISH', true);
		JToolBarHelper::unpublish('args.unpublish', 'JTOOLBAR_UNPUBLISH', true);
		$published = $this->state->get( 'filter.published');
		if($published==-2)
		JToolBarHelper::deleteList('', 'args.delete', 'JTOOLBAR_EMPTY_TRASH');
		else
		JToolBarHelper::trash('args.trash');
//=============================================================== {
		$published = $this->state->get('filter.published');
		$O = array();
		$O[] = JHTML::_('select.option', "", JText::_("JOPTION_SELECT_PUBLISHED"));
		$O[] = JHTML::_('select.option', "0", JText::_("JUNPUBLISHED"));
		$O[] = JHTML::_('select.option', "1", JText::_("JPUBLISHED"));
		$O[] = JHTML::_('select.option', "-2", JText::_("JTRASHED"));
		$this->lists["published"] = JHTML::_('select.genericlist',  $O, "filter_published", 'onchange="Joomla.submitform();"', 'value', 'text',$published);
//=============================================================== }
		
	}
}
?>