<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Crm\CrmControllerRouteFunctions;
use App\Http\Controllers\Crm\CrmControllerRouteInitializing;
use App\Http\Controllers\Controller;

class CrmController extends Controller
{
    use CrmControllerRouteFunctions, CrmControllerRouteInitializing;

    protected $modelTypeNamespaceUrl;
    public function getModelTypeNamespaceUrl()
    {
        if (!isset($this->modelTypeNamespaceUrl))
            $this->setModelTypeNamespaceUrl();
        return $this->modelTypeNamespaceUrl;
    }
    public function setModelTypeNamespaceUrl()
    {
        $this->modelTypeNamespaceUrl = 'App\\Models\\' . $this->getModelTypeName();
    }

    protected $tableName;
    public function getTableName()
    {
        if (!isset($this->tableName))
            $this->setTableName();
        return $this->tableName;
    }
    public function setTableName()
    {
        $this->tableName = getModelTypeNameTableName($this->getModelTypeName());
    }

    protected $modelTypeName;
    public function getModelTypeName()
    {
        return $this->modelTypeName;
    }
    public function setModelTypeName(string $modelTypeName)
    {
        $this->modelTypeName = $modelTypeName;
        $this->setTableName();
        $this->setModelTypeNamespaceUrl();
    }

    public $requestValidationRules;
}
