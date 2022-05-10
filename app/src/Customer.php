<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;

class Customer extends DataObject
{
	private static $db = [
        'FirstName' => 'Varchar',
        'Surname' => 'Varchar',
        'Email' => 'Varchar',
        'CustomerType' => "Enum('Private,Business','Private')",
    ];

    private static $has_one = [
        'Avatar' => Image::class,
				'OurCustomersPage' => OurCustomersPage::class,
    ];

    //adding avatar(image) to $owns array so that Customer object recognised it wnen called in template
		private static $owns = [
		'Avatar'
		];

    private static $has_many = [
        'HostingContracts' => HostingContract::class,
				'Transactions' => Transaction::class,
    ];

    private static $summary_fields = [
        'FirstName',
        'Surname',
        'CustomerType',
    ];

    private static $searchable_fields = [
        'FirstName',
        'Surname',
        'HostingContracts.ContractNumber',
				//adding ContractType as searchable field
				'HostingContracts.ContractType',

    ];

	private static $table_name = 'Customer';

}
