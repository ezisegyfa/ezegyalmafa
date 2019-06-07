<?php

namespace App\Http\Controllers\Crm;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

trait CrmControllerRouteInitializing
{
    public static function initializeRoutes()
    {
        $dataControllerNames = static::getDataControllerNames();
        $dataControllerTableNames = array_map(function($dataControllerName) {
            return lcfirst(str_plural(snake_case(str_replace('Controller', '', $dataControllerName))));
        }, $dataControllerNames);
        foreach (getDatabaseTableNames() as $tableName) {
            if (in_array($tableName, $dataControllerTableNames)) {
                $dataControllerName = getTableModelTypeName($tableName) . 'Controller';
                $indexFunction = $dataControllerName . '@index';
                $queryFunction = $dataControllerName . '@query';
                $createFunction = $dataControllerName . '@create';
                $storeFunction = $dataControllerName . '@store';
                $showFunction = $dataControllerName . '@show';
                $editFunction = $dataControllerName . '@edit';
                $updateFunction = $dataControllerName . '@update';
                $destroyFunction = $dataControllerName . '@destroy';
            }
            else {
                $indexFunction = function() use($tableName) {
                    return static::getIndexView($tableName);
                };
                $queryFunction = function() use($tableName) {
                    return static::getQuery($tableName);
                };
                $createFunction = function() use($tableName) {
                    return static::getCreateView($tableName);
                };
                $storeFunction = function(Request $request) use($tableName) {
                    return static::processStore($request, $tableName);
                };
                $showFunction = function() use($tableName) {
                    return static::getShowView($tableName);
                };
                $editFunction = function($id) use($tableName) {
                    return static::getEditView($id, $tableName);
                };
                $updateFunction = function($id, Request $request) use($tableName) {
                    return static::processUpdate($id, $request, $tableName);
                };
                $destroyFunction = function($id) use($tableName) {
                    return static::processDestroy($id, $tableName);
                };
            }
            $modelTypeName = getTableModelTypeName($tableName);
            Route::group([
                'prefix' => $tableName
            ], function () use($modelTypeName, $tableName, $indexFunction, $queryFunction, $createFunction, $storeFunction, $showFunction, $editFunction, $updateFunction, $destroyFunction) {
                Route::get('/', $indexFunction)
                    ->name($tableName . '.index');
                Route::get('/getQuery', $queryFunction)
                    ->name($tableName . '.index.query');
                Route::get('/create', $createFunction)
                    ->name($tableName . '.create');
                Route::post('/', $storeFunction)
                    ->name($tableName . '.store');
                Route::get('/show/{' . $modelTypeName . '}', $showFunction)
                    ->name($tableName . '.show')
                    ->where('id', '[0-9]+');
                Route::get('/edit/{' . $modelTypeName . '}', $editFunction)
                    ->name($tableName . '.edit')
                    ->where('id', '[0-9]+'); 
                Route::post('/{' . $modelTypeName . '}', $updateFunction)
                    ->name($tableName . '.update')
                    ->where('id', '[0-9]+');
                Route::delete('/{' . $modelTypeName . '}', $destroyFunction)
                    ->name($tableName . '.destroy')
                    ->where('id', '[0-9]+');
            });
        }
    }

    public static function getDataControllerNames()
    {
        $dataControllerFileNames = array_diff(scandir(join_paths(app_path(), 'Http', 'Controllers', 'DataControllers')), ['.', '..']);
        return array_map(function($controllerFileName) {
            return str_replace('.php', '', $controllerFileName);
        }, $dataControllerFileNames);
    }
}
