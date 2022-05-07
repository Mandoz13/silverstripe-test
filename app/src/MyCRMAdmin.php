<?php

use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\Form; //namespace for using silverstripe forms


class MyCRMAdmin extends ModelAdmin
{
    private static $managed_models = array(
		'Customer',
		'HostingContract',
		'HostingType'

	);

  // using  getEditForm method to remove default ImportButton from modeladmin pages
  function getEditForm($id = null, $fields = null) {
          $form = parent::getEditForm($id, $fields);
          $form->Fields()
                ->fieldByName($this->sanitiseClassName($this->modelClass))
                ->getConfig()
                ->removeComponentsByType('SilverStripe\Forms\GridField\GridFieldImportButton');

         return $form;
    }

// Limiting the number of results that can be returned in the main area to 10 using getlist function
  public function getList()
   {
      $list = parent::getList();
      $list = $list->limit(10);

      return $list;
   }

   // public function getCMSFields()
   // {
   //     // parent::getCMSFields() does all the hard work and creates the fields for Title, IsActive and Content.
   //     $fields = parent::getCMSFields();
   //     $fields->dataFieldByName('Customer')->setTitle('Client');
   //
   //     return $fields;
   // }

  private static $url_segment = 'mycrm';

	private static $menu_title = 'My CRM';

	public function SearchClassSelector()
    {
	    return "dropdown";
	}

}
