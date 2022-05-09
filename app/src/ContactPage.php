<?php
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;

class ContactPage extends Page
{
  private static $has_many = [
        'Messages' => Message::class,
    ];

}

class ContactPageController extends PageController
{
   //this array allows us to use public function to the templates
   private static $allowed_actions = ['Form'];

   //creating a public form
   public function Form()
   {
       $fields = new FieldList(
           new TextField('FullName'),
           new EmailField('Email'),
           new TextareaField('Message')
       );

          $actions = new FieldList(
           new FormAction('handleContact', 'Submit')
         );
         //validatting form fields to be required
         $validator = new RequiredFields('FullName', 'Email', 'Message');
         //returning with form, controller, fields, actions and validator objects
         return new Form($this, 'Form', $fields, $actions, $validator);

   }

   //creating a public function to handle and store in the database
   public function handleContact($data, $form)
   {
       $Message = Message::create();
       $Message -> Name = $data['FullName'];
       $Message -> Email = $data['Email'];
       $Message -> Message = $data['Message'];
       $Message->write();

       $form->sessionMessage('Thanks for contacting us!');

       return $this->redirectBack();

    }
}
