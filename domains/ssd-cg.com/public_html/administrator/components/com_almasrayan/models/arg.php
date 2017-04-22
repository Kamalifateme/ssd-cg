<?php
// No direct access.
defined('_JEXEC') or die;
jimport('joomla.application.component.modeladmin');
/**
 * arg model.
 */
class almasrayanModelarg extends JModelAdmin
{
	protected $text_prefix = 'arg';
	//==========================================
	protected function canDelete($record){
		if (!empty($record->id))
		{
			return parent::canDelete($record);
		}
	}
	public function getTable($table = 'arg', $prefix = 'almasrayanTable', $config = array()){
		return JTable::getInstance($table, $prefix, $config);
	}
	//==========================================
	public function getForm($data = array(), $loadData = true){
		// Get the form.
		$form = $this->loadForm('com_almasrayan.arg', 'arg', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form))
		{
			return false;
		}
		return $form;
	}
	//==========================================
	protected function loadFormData(){
		// Check the session for previously entered form dat
		$data = JFactory::getApplication()->getUserState('com_almasrayan.edit.arg.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
			// Prime some default values.
		}
		return $data;
	}
	//==========================================
	function stick(&$pks, $value = 1){
		// Initialise variables.
		$table = $this->getTable();
		$pks = (array) $pks;
		// Access checks.
		foreach ($pks as $i => $pk)
		{
			if ($table->load($pk))
			{
				if (!$this->canEditState($table))
				{
					// Prune items that you can't change.
					unset($pks[$i]);
					JError::raiseWarning(403, JText::_('JLIB_APPLICATION_ERROR_EDITSTATE_NOT_PERMITTED'));
				}
			}
		}
		return true;
	}
	//==========================================
	protected function getReorderConditions($table){
		$condition = array();
		$condition[] = 'published >= 0';
		return $condition;
	}
	//==========================================
}
?>