<?php

use SilverStripe\ORM\DataObject;
class HostingType extends DataObject
{
    private static $db = [
        'Title' => 'Text',
        'Description' => 'Text',
        'Price' => 'Float',
    ];

    //this code below checks whether the price is below 5 and validates in server side.
    //as in silverstripe 4.10.0 validate method should return true if the value passes any validation and false if Silverstripe CMS should trigger a validation error on the page.
    public function validate()
    {
       $result = parent::validate();
        //checks if price is below 5
       if($this->Price < 5) {
           //adding error message
           $result->addError('The minimum price is 5. Please enter price greater or equal to 5.');
       }

       return $result;
     }

    private static $has_many = [
        'HostingContracts' => HostingContract::class,
    ];

	private static $table_name = 'HostingType';
}
