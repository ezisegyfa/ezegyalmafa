<?php

namespace App\Helpers\FormInfos;

class TextInput extends FormItemInfos
{
	public function __construct(string $id, string $value = '', string $label = '', string $validationRules = '')
	{
		parent::__construct($id, FormItemType::textinput, $value, $label, $validationRules);
	}
}
