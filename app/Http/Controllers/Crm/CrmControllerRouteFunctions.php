<?php

namespace App\Http\Controllers\Crm;

use Illuminate\Http\Request;

trait CrmControllerRouteFunctions
{
    public function index()
    {
        return static::getIndexView(static::getTableName());
    }

    public function query()
    {
        return static::getQuery(static::getTableName());
    }

    public function create()
    {
        return static::getCreateView(static::getTableName()); 
    }

    public function store(Request $request)
    {
        return static::processStore($request, static::getTableName()); 
    }

    public function show($id)
    {
        return static::getShowView($id, static::getTableName()); 
    }

    public function edit($id)
    {
        return static::processEdit($id, static::getTableName()); 
    }

    public function update($id, Request $request)
    {
        return static::processUpdate($id, $request, static::getTableName());      
    }

    public function destroy($id)
    {
        return static::processDestroy($id, static::getTableName());
    }

    public static function getIndexView(string $tableName)
    {
        $modelTypeNamespaceUrl = getTableModelTypeNamespaceUrl($tableName);
        $columnNames = $modelTypeNamespaceUrl::getColumnWithTableNames();
        $tableNames = static::getTableNamesToRender();
        return view('data.index', compact('columnNames', 'tableName', 'tableNames'));
    }

    public static function getQuery(string $tableName)
    {
        $modelTypeNamespaceUrl = getTableModelTypeNamespaceUrl($tableName);
        return $modelTypeNamespaceUrl::getDataTableQuery();
    }

    public static function getCreateView(string $tableName)
    {
        $modelTypeNamespaceUrl = getTableModelTypeNamespaceUrl($tableName);
        $formInfos = $modelTypeNamespaceUrl::getFormInfos();
        $tableNames = static::getTableNamesToRender();
        $sendButtonTitle = __('view.create');
        $route = url($tableName);
        return view('data.form', compact('formInfos', 'tableNames', 'tableName', 'sendButtonTitle', 'route'));
    }

    public static function processStore(Request $request, string $tableName)
    {
        $modelTypeNamespaceUrl = getTableModelTypeNamespaceUrl($tableName);
        $request->validate($modelTypeNamespaceUrl::getRequestRules());
        try {
            $data = $modelTypeNamespaceUrl::getDataFromRequest($request);
            $modelTypeNamespaceUrl::create($data);
            return redirect()->route($tableName . '.index')
                             ->with('success_message', 'Model was successfully added!');
        } catch (\Exception $exception) {
            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    public static function getShowView($id, string $tableName)
    {
        $modelTypeNamespaceUrl = getTableModelTypeNamespaceUrl($tableName);
        $modelToShow = $modelTypeNamespaceUrl::withRelationsQuery()->get();

        return view('data.show', compact('modelToShow'));
    }

    public static function getEditView($id, string $tableName)
    {
        $modelTypeNamespaceUrl = getTableModelTypeNamespaceUrl($tableName);
        $modelToEdit = $modelTypeNamespaceUrl::findOrFail($id);
        $formInfos = $modelToEdit->getModelFormInfos();
        $tableNames = getDatabaseTableNames();
        $sendButtonTitle = __('view.edit');
        $route = url($tableName, $modelToEdit->id);
        return view('data.form', compact('formInfos', 'tableName', 'tableNames', 'sendButtonTitle', 'route'));
    }

    public static function processUpdate($id, Request $request, string $tableName)
    {
        $modelTypeNamespaceUrl = getTableModelTypeNamespaceUrl($tableName);
        $request->validate($modelTypeNamespaceUrl::getRequestRules());
        try {
            $data = $modelTypeNamespaceUrl::getDataFromRequest($request);
            $modelToUpdate = $modelTypeNamespaceUrl::findOrFail($id);
            $modelToUpdate->update($data);
            return redirect()->route($tableName . '.index')
                ->with('success_message', 'Model was successfully updated!');
        } catch (\Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    public static function processDestroy($id, string $tableName)
    {
        try {
            $modelTypeNamespaceUrl = getTableModelTypeNamespaceUrl($tableName);
            $modelToDelete = $modelTypeNamespaceUrl::findOrFail($id);
            $modelToDelete->delete();
            return redirect()->route($tableName . '.index')
                             ->with('success_message', 'Model was successfully deleted!');
        } catch (\Exception $exception) {
            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    public static function getTableNamesToRender()
    {
        $tableNames = getDatabaseTableNames();
        unset($tableNames[2]);
        unset($tableNames[10]);
        unset($tableNames[21]);
        unset($tableNames[23]);
        return $tableNames;
    }
}
