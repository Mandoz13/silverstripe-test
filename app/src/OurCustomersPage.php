<?php
use SilverStripe\ORM\DataObject;

class OurCustomersPage extends Page
{
  private static $has_many = [
        'Customers' => Customer::class,
    ];



}

//adding controller to send public function to template
class OurCustomersPageController extends PageController
{
   private static $allowed_actions = ['CustomerDetail'];

   public function CustomerDetail()
   {
      return Customer::get();
   }

}
