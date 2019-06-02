<?php

namespace App\Helpers\FormInfos;

class TextArea extends FormItemInfos
{
	public function __construct(string $id, string $value = '', string $label = '', string $validationRules = '')
	{
		parent::__construct($id, FormItemType::textarea, $value, $label, $validationRules);
	}
}
