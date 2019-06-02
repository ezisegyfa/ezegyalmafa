<?php

namespace App\Helpers\FormInfos;

use BenSampo\Enum\Enum;

final class FormItemType extends Enum
{
    const textinput = 0;
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
		$rules = explode('|', $validationRules);
		foreach ($rules as $rule) {
			if ($this->checkRuleIsBooleanRule($rule))
				$this->validationRules[$rule] = true;
			else {
				$oneValueRule = $this->checkOneValueRule($rule);
				if ($oneValueRule)
					$this->validationRules[$oneValueRule['name']] = $oneValueRule['value'];
			}
		}
	}
	public function getValidationRules()
	{
		return $this->validationRules;
	}

	protected function checkRuleIsBooleanRule(string $ruleToCheck)
	{
		$ruleNames = ['required', 'numeric', 'date', 'email', 'password'];
		foreach ($ruleNames as $ruleName)
			if ($ruleName == $ruleToCheck)
				return true;
		return false;
	}

	protected function checkOneValueRule(string $ruleToCheck)
	{
		$semicolonPosition = strpos($ruleToCheck, ':');
		if ($semicolonPosition !== false)
			return [
				'name' => substr($ruleToCheck, 0, $semicolonPosition),
				'value' => substr($ruleToCheck, $semicolonPosition + 1)
			];
		else
			return null;
	}

	public function __construct(string $id, int $type = null, $value = null, string $label = '', string $validationRules = '')
	{
		$this->id = $id;
		$this->setType($type);
		$this->value = $value;
		if (empty($label))
			$this->label = __('view.' . $this->id);
		else
			$this->label = __('view.' . $label);
		$this->setValidationRules($validationRules);
	}
}
