<?php

namespace App\Helpers\FormInfos;

use App\Helpers\FormInfos\FormItemInfos;
use Reliese\Database\Eloquent\Model;

class SelectOption
{
	public $id;
	public $label;

	public function __construct(string $id, string $label = '')
	{
		$this->id = $id;
		if ($label)
			$this->label = $label;
		else
			$this->label = __('formInfoLabels.' . $id);
	}

	public static function createFromObject($optionItem) 
	{
		if ($optionItem instanceof Model)
			$propertyFields = $optionItem->getAttributes();
		else
		    $propertyFields = get_object_vars($optionItem);
	    if (count($propertyFields) != 2)
	    	throw new \Exception("The gived object can't convert to form option! Object: " . json_encode($optionItem), 1);
	    else 
		    return new SelectOption($optionItem->id, $propertyFields[static::getValueKey($propertyFields)]);
	}

	public static function createFromObjectWithTranslate($optionItem) 
	{
		if ($optionItem instanceof Model)
			$propertyFields = $optionItem->getAttributes();
		else
		    $propertyFields = get_object_vars($optionItem);
	    if (count($propertyFields) != 2)
	    	throw new \Exception("The gived object can't convert to form option! Object: " . json_encode($optionItem), 1);
	    else 
		    return new SelectOption($optionItem->id, __('formInfoLabels.' . $propertyFields[static::getValueKey($propertyFields)]));
	}

	protected static function getValueKey(array $fields)
	{
	    $objectKeys = array_keys($fields);
	    if ($objectKeys[0] == 'id')
	    	return $objectKeys[1];
	    else
	    	return $objectKeys[0];
	}
}
