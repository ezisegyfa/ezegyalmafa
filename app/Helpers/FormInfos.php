<?php

use App\Models\ProductType;
use App\Models\ProductSpeciality;
use App\Models\Brand;
use App\Helpers\FormInfos\SelectOption;

function getHeaderSearchFormInfos()
{
	$categorySelect = ProductType::getColumnDefaultFormInfos('category_id');
	array_unshift($categorySelect->options, new SelectOption('0', __('view.Any')));
	$productSpecialitySelect = ProductSpeciality::createSelectFormInfos();
	array_unshift($productSpecialitySelect->options, new SelectOption('0', __('view.Any')));
	$brandSelect = Brand::createSelectFormInfos();
	array_unshift($brandSelect->options, new SelectOption('0', __('view.Any')));
	return [
		$categorySelect,
		$productSpecialitySelect,
		$brandSelect,
	];
}

function convertModelsToSelectOptions($modelsToConvert)
{
	if (empty($modelsToConvert))
		return [];
	else if (gettype($modelsToConvert) == 'array')
		return array_map(function($currentModel) {
	        return new SelectOption($currentModel->id, $currentModel->getRenderValue());
	    }, $modelsToConvert);
	else if (gettype($modelsToConvert) == 'object' && get_class($modelsToConvert) == 'Illuminate\Database\Eloquent\Collection')
		return $modelsToConvert->map(function($currentModel) {
	        return new SelectOption($currentModel->id, $currentModel->getRenderValue());
	    })->toArray();
	else
		throw new Exception("Invalid model collection class: " . get_class($modelsToConvert), 500);
		
}