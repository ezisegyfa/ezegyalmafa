<?php

namespace App\Helpers\FormInfos;

class Input extends FormItemInfos
{
	public function __construct(string $id, string $value = '', string $label = null, string $validationRules = '')
	{
		parent::__construct($id, FormItemType::input, $value, $label, $validationRules);
	}
}
