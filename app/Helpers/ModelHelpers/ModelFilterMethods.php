<?php

namespace App\Helpers\ModelHelpers;

use App\Helpers\ModelHelpers\Relationship;
use Illuminate\Support\Facades\DB;
use Log;

trait ModelFilterMethods
{
	public static function filter(array $filterData)
	{
        $filterData = array_filter($filterData, function($item, $key) {
            return $item;
        }, ARRAY_FILTER_USE_BOTH);
        $filterData = static::getDatabaseColumnsFromArray($filterData);
        if (array_key_exists('startDate', $filterData) && array_key_exists('endDate', $filterData)) {
            $query = static::getFilterByCreatedAtQuery($filterData['startDate'], $filterData['endDate']);
            unset($filterData['startDate']);
            unset($filterData['endDate']);
            return $query->where($filterData);
        }
        else
            return static::where($filterData);
	}

	public static function getFilterByCreatedAtQuery(string $startDate, string $endDate)
	{
		return static::where('created_at', '>=', $startDate)->where('created_at', '<', $endDate);
	}
}