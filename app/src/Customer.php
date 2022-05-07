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
    ];

    private static $has_many = [
        'HostingContracts' => HostingContract::class,
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
