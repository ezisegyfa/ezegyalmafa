<?php

namespace App\Helpers\ModelHelpers;

use App\Helpers\ModelHelpers\ModelRecursiveMethods;
use App\Helpers\ModelHelpers\ModelFilterMethods;
use App\Helpers\FormInfos\TextInput;
use App\Helpers\FormInfos\TextArea;
use App\Helpers\FormInfos\Select;
use App\Helpers\FormInfos\SelectOption;
use App\Helpers\FormInfos\FormValidationInfos;
use App\Helpers\FormInfos\FormItemTextType;
use App\Helpers\FormInfos\FormInputType;
use App\Helpers\RelationHelpers\Relationship;

/**
 * Execute database methods with updating related tables.
 */
trait ModelFormInfoMethods
{
    public function getModelFormInfos()
    {
        return array_map(function ($columnName) {
            $formInfo = static::getColumnDefaultFormInfos($columnName);
            $formInfo->value = $this->$columnName;
            return $formInfo;
        }, static::getAcceptedColumnNames());
    }

    public static function getFormInfos()
    {
        return array_merge(static::getNonRelationshipFormInfos(), static::getRelationshipFormInfos());
    }

    public static function getRelationshipFormInfos()
    {
        $formInfos = [];
        $relationships = static::getManyToOneRelationships();
        foreach ($relationships as $relationship)
            if (static::isAcceptedFormColumn($relationship->getColumnName()))
                array_push($formInfos, static::createRelationColumnFormInfos($relationship));
        return $formInfos;
    }

    public static function getNonRelationshipFormInfos()
    {
        return array_map(function($columnName) {
            return static::createNonRelationColumnFormInfos($columnName);
        }, static::getAcceptedNonRelationColumnNames());
    }

    public static function getColumnDefaultFormInfos(string $columnName)
    {
        if (in_array($columnName, static::getColumnNames())) {
            if (in_array($columnName, static::getNonRelationColumnNames()))
                return static::createNonRelationColumnFormInfos($columnName);
            else
                return static::createRelationColumnFormInfosByColumnName($columnName);
        }
        else
            throw new \Exception("Invalid column name:" . $columnName, 500);
    }

    protected static function createNonRelationColumnFormInfos(string $columnName)
    {
        return new TextInput($columnName, '', '', static::getColumnRequestRules($columnName));
    }

    protected static function createRelationColumnFormInfosByColumnName(string $columnName)
    {
        return static::createRelationColumnFormInfos(static::getColumnRelationship($columnName));
    }

    public static function createSelectFormInfos()
    {
        return new Select(
            str_singular(static::getTableName()),
            static::getSelectFormOptions()
        );
    }

    protected static function createRelationColumnFormInfos(Relationship $relationship)
    {
        $columnName = $relationship->getColumnName();
        $relatedModelTypeName = $relationship->getModelTypeNamespaceUrl();
        return new Select(
            $columnName, 
            $relatedModelTypeName::getSelectFormOptions(),
            null,
            '',
            static::getColumnRequestRules($columnName)
        );
    }

    public static function getSelectFormOptions()
    {
        return convertModelsToSelectOptions(static::all());
    }

    public static function getAcceptedColumnNames()
    {
        return array_filter(static::getColumnNames(), function($columnName) {
            return static::isAcceptedFormColumn($columnName);
        });
    }

    public static function isAcceptedFormColumn(string $columnName)
    {
        $isCustomIgnoredColumnName = isset(static::$ignoredFormColumnNames) && in_array($columnName, static::$ignoredFormColumnNames);
        return !in_array($columnName, getIgnoredColumnNames()) && !$isCustomIgnoredColumnName;
    }
}