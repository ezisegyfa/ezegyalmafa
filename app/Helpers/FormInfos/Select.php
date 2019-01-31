<?php

namespace App\Helpers\FormInfos;

use App\Helpers\FormInfos\FormItemInfos;

class Select extends FormItemInfos
{
	public $options;

	public function __construct(string $id, array $options, int $value = 0, string $label = null, string $validationRules = '')
	{
		parent::__construct($id, FormItemType::select, $value, $label, $validationRules);
		$this->options = $options;
	}
}
