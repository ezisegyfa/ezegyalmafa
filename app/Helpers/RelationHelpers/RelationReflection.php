<?php

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;
use App\Helpers\RelationHelpers\Relationship;

function getOneToManyRelationships(string $classTypeName) 
{
    $relationships = collect(getHasManyMethods($classTypeName))->map(function($method) { 
        return new Relationship($method); 
    })->toArray();

    return $relationships;
}

function getManyToOneRelationships(string $classTypeName) 
{
    $relationships = collect(getBelongsToMethods($classTypeName))->map(function($method) { 
        return new Relationship($method); 
    })->toArray();

    return $relationships;
}

function getManyToManyRelationships(string $classTypeName) 
{
    $relationships = collect(getBelongsToManyMethods($classTypeName))->map(function($method) { 
        return new Relationship($method); 
    })->toArray();

    return $relationships;
}

function getHasManyMethods(string $classTypeName)
{
    return collect(getOneParameterMethods($classTypeName))->filter(function($method) { 
        return str_contains(getMethodBody($method), '$this->hasMany('); 
    })->toArray();
}

function getBelongsToMethods(string $classTypeName)
{
    return collect(getOneParameterMethods($classTypeName))->filter(function($method) { 
        return str_contains(getMethodBody($method), '$this->belongsTo('); 
    })->toArray();
}

function getBelongsToManyMethods(string $classTypeName)
{
    return collect(getOneParameterMethods($classTypeName))->filter(function($method) { 
        return str_contains(getMethodBody($method), '$this->belongsToMany('); 
    })->toArray();
}

function getOneParameterMethods(string $classTypeName)
{
    $methods = (new ReflectionClass($classTypeName))->getMethods(ReflectionMethod::IS_PUBLIC);
    return collect($methods)->filter(function($method) use ($classTypeName) { return 
            $method->class == $classTypeName
            && empty($method->getParameters())
            && $method->getName() !== __FUNCTION__;
        })->toArray(); 
}

function getMethodRelationshipModelName(ReflectionMethod $method)
{
    $methodBody = getMethodBody($method);
    $parameterStartingPosition = getMethodBodyPartPosition('(', $methodBody, 'helpers.methodDoesntHaveFunctionCall') + 1;
    $methodBodyAfterRelationshipFunction = substr($methodBody, $parameterStartingPosition);
    $comaPosition = getMethodBodyPartPosition(',', $methodBodyAfterRelationshipFunction, 'helpers.methodDoesntHaveClassPart');
    $modelNamespaceUrl = substr($methodBodyAfterRelationshipFunction, 0, $comaPosition);
    $modelNamespaceUrl = str_replace('\'', '', str_replace('::class', '', $modelNamespaceUrl));
    $modelName = last(explode('\\', $modelNamespaceUrl));
    return $modelName;
}

function getMethodBody(ReflectionMethod $method)
{
    $filename = $method->getFileName();
    $start_line = $method->getStartLine();
    $end_line = $method->getEndLine();
    $length = $end_line - $start_line;

    $source = file($filename);

    $body = implode("", array_slice($source, $start_line, $length));
    return $body;
}

function getMethodBodyPartPosition(string $methodPartToFind, string $methodBody, string $errorMessageTitle)
{
    $searchedPosition = strpos($methodBody, $methodPartToFind);
    if ($searchedPosition)
        return $searchedPosition;
    else
        throw new Exception(__($errorMessageTitle) . ' Method body: ' . $methodBody);
        
}

function getManyToManyRelationshipFieldName(string $parentModelTypeName, string $relatedModelTypeName)
{
    return str_plural(camel_case(getNamespaceUrlModelTypeName($parentModelTypeName) . ' ' . getNamespaceUrlModelTypeName($relatedModelTypeName)));
}

function getSingularNamedRelationAttributes(array $relationships, array $attributes)
{
    $relationAttributes = collect($relationships)->map(function($relationship) use($attributes) {
        return (object)[
            'data' => $relationship->selectSingularNamedProperAttribute($attributes),
            'relationship' => $relationship
        ];
    })->filter(function($relationAttribute) {
        return !is_null($relationAttribute->data);
    })->toArray();
    checkRelatedValueTypes($relationAttributes);
    return $relationAttributes;
}

function getPluralNamedRelationAttributes(array $relationships, array $attributes)
{
    $relationAttributes = collect($relationships)->map(function($relationship) use($attributes) {
        return (object)[
            'data' => $relationship->selectPluralNamedProperAttribute($attributes),
            'relationship' => $relationship
        ];
    })->filter(function($relationAttribute) {
        return !is_null($relationAttribute->data);
    })->toArray();
    checkRelatedValueTypes($relationAttributes);
    return $relationAttributes;
}

function checkRelatedValueTypes(array $relationAttributes)
{
    foreach ($relationAttributes as $relationAttribute) {
        $relatedValueType = gettype($relationAttribute->data);
        if ($relatedValueType != 'array' && !is_numeric($relatedValueType) != 'integer')
            throw new Exception(__('helpers.invalidRelationDataType'));
    }
}

function getAnotherItemExistsErrorMessage(array $identifierAttributes)
{
    $message = __('helpers.anotherItemExistsErrorMessage');
    foreach ($identifierAttributes as $key => $value) {
        $message .= $key . ': ' . $value . ' ';
    }
    return $message;
}

function convertTypeToRelationFieldName(string $typeName)
{
    return strtolower(snake_case(getNamespaceUrlModelTypeName($typeName) . '_id'));
}

function getNamespaceUrlModelTypeName(string $namespaceUrl)
{
    return last(explode('\\', $namespaceUrl));
}