<?php

use SilverStripe\ORM\DataObject;

class Transaction extends DataObject
{
	private static $db = [
    'amount' => 'Float',
    'transaction_type' => 'Varchar',
    'transaction_date' => 'Date',
    ];

    private static $has_one = [
        'Customer' => Customer::class,
    ];

    private static $summary_fields = [
        'amount',
        'transaction_type',
    ];

	private static $table_name = 'Transaction';

}
