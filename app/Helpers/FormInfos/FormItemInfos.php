<?php

namespace App\Helpers\FormInfos;

use BenSampo\Enum\Enum;

final class FormItemType extends Enum
{
    const input = 0;
    const textarea = 1;
    const select = 2;
    const checkBox = 3;
}

class FormItemInfos
{
	public $id;
	public $label;
	public $value;
	protected $type;
	public function setType(int $type = null)
	{
		if ($type)
			if (FormItemType::hasValue($type))
				$this->type = FormItemType::getKey($type);
			else
				throw new \Exception("Unexpected input type: " . $type, 500);
		else
			$this->type = FormItemType::getKey(0);
	}
	public function getType()
	{
		return $this->type;
	}

	protected $validationRules;
	public function setValidationRules(string $validationRules)
	{
		$this->validationRules = [];
		$this->setBoolValidationRules($validationRules, 'required', 'numeric', 'date', 'email', 'password');
		if (strpos($validationRules, 'max') !== false) {
			$validationRulesAfterMax = substr($validationRules, strpos($validationRules, 'max'));
			$ruleEndCharacterPos = strpos($validationRulesAfterMax, '|');
			if ($ruleEndCharacterPos === false)
				$maxPart = substr($validationRulesAfterMax, 0);
			else
				$maxPart = substr($validationRulesAfterMax, 0, $ruleEndCharacterPos);
			$maxLength = (int)(substr($maxPart, strpos($maxPart, ':') + 1));
			$this->validationRules['max'] = $maxLength;
		}
	}
	public function getValidationRules()
	{
		return $this->validationRules;
	}

	protected function setBoolValidationRules(string $ruleString, string ...$ruleNames)
	{
		foreach ($ruleNames as $ruleName)
			if (strpos($ruleString, $ruleName) !== false)
				$this->validationRules[$ruleName] = true;
	}

	public function __construct(string $id, int $type = null, $value = null, string $label = null, string $validationRules = '')
	{
		$this->id = $id;
		$this->setType($type);
		$this->value = $value;
		if ($label)
			$this->label = $label;
		else
			$this->label = __('view.' . $this->id);
		$this->setValidationRules($validationRules);
	}
}
