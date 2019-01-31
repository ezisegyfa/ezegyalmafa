<?php

use Illuminate\Http\Request;

function processUpdateModelRequest(string $modelTypeNameWithNamespaceUrl, Request $request, $id)
{
	$modelToUpdate = $modelTypeNameWithNamespaceUrl::find($id);
    if ($modelToUpdate) {
    	try {
    		$modelTypeName = strtolower(last(explode('\\', $modelTypeNameWithNamespaceUrl)));
            if ($modelToUpdate->update($request->$modelTypeName))
                return response()->json($modelToUpdate);
            else
                return response()->json(getErrorMessage($id, $request, $modelTypeName));
        } catch (\Exception $e) {
            return response()->json(getErrorMessage($id, $request) . __('helpers.errorMessage') . $e->message);
        }
    }
    else
        return response()->json(__('helpers.idNotFound'));
}

function getErrorMessage($id, Request $request, string $modelTypeName)
{
	return __('helpers.errorOccured') . $id . __('helpers.updateDatas') . $request->$modelTypeName;
}

function getRenderValues(string $modelClassName)
{
    $identifiers = array();
    if ($modelClassName == 'User')
        $modelNamespaceUrl = 'App\\' . $modelClassName;
    else
        $modelNamespaceUrl = 'App\\Models\\' . $modelClassName;
    collect($modelNamespaceUrl::all())->each(function($model, $key) use(&$identifiers){ 
        $identifiers[$model->id] = $model->getRenderValue();
    });
    return $identifiers;
}

function getRequestNamespaceUrls()
{
    return array_map(function($requestFilePath) {
        return 'App\\Models\\' . str_replace('.php', '', last(explode('/', $requestFilePath)));
    }, getRequestFiles());
}