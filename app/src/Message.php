<?php
use SilverStripe\ORM\DataObject;

class Message extends DataObject
{
  private static $db = [
        'FullName' => 'Varchar',
        'Email' => 'Varchar',
        'Message' => 'Text',
    ];

  private static $has_one = [
       'ContactPage' => ContactPage::class,
    ];

    private static $table_name = 'Message';

}
