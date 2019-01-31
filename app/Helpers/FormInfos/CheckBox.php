<?php

namespace App\Helpers\FormInfos;

class CheckBox extends FormItemInfos
{
	public function __construct(string $id, bool $value = false, string $label = null, string $validationRules = '')
	{
		parent::__construct($id, FormItemType::checkBox, $value, $label, $validationRules);
	}
}
