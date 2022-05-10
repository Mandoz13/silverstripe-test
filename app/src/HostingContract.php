<?php

use SilverStripe\ORM\DataObject;

class HostingContract extends DataObject
{
	private static $db = [
        'ContractNumber' => 'Varchar',
        'StartDate' => 'Date',
        'EndDate' => 'Date',
				//ContractType added here
				'ContractType' => 'Varchar',
    ];

    private static $has_one = [
        'Customer' => Customer::class,
        'HostingType' => HostingType::class,
    ];

    private static $summary_fields = [
        'ContractNumber',
        'EndDate',
				'ContractType',
    ];

	private static $table_name = 'HostingContract';
}
