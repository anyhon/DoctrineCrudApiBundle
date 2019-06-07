<?php
declare(strict_types=1);

namespace WernerDweight\DoctrineCrudApiBundle\Service\Request;

class ParameterEnum
{
    /** @var string */
    public const OFFSET = 'offset';

    /** @var string */
    public const LIMIT = 'limit';

    /** @var string */
    public const FILTER = 'filter';
    /** @var string */
    public const FILTER_CONDITIONS = 'conditions';
    /** @var string */
    public const FILTER_LOGIC = 'logic';
    /** @var string */
    public const FILTER_LOGIC_AND = 'and';
    /** @var string */
    public const FILTER_LOGIC_OR = 'or';
    /** @var string[] */
    public const AVAILABLE_FILTERING_LOGICS = [
        ParameterEnum::FILTER_LOGIC_AND,
        ParameterEnum::FILTER_LOGIC_OR,
    ];
    /** @var string */
    public const FILTER_FIELD = 'field';
    /** @var string */
    public const FILTER_FIELD_SEPARATOR = '.';
    /** @var string */
    public const FILTER_OPERATOR = 'operator';
    /** @var string */
    public const FILTER_OPERATOR_EQUAL = 'eq';
    /** @var string */
    public const FILTER_OPERATOR_NOT_EQUAL = 'neq';
    /** @var string */
    public const FILTER_OPERATOR_GREATER_THAN = 'gt';
    /** @var string */
    public const FILTER_OPERATOR_GREATER_THAN_OR_EQUAL = 'gte';
    /** @var string */
    public const FILTER_OPERATOR_GREATER_THAN_OR_EQUAL_OR_NULL = 'gten';
    /** @var string */
    public const FILTER_OPERATOR_LOWER_THAN = 'lt';
    /** @var string */
    public const FILTER_OPERATOR_LOWER_THAN_OR_EQUAL = 'lte';
    /** @var string */
    public const FILTER_OPERATOR_BEGINS_WITH = 'begins';
    /** @var string */
    public const FILTER_OPERATOR_CONTAINS = 'contains';
    /** @var string */
    public const FILTER_OPERATOR_CONTAINS_NOT = 'not-contains';
    /** @var string */
    public const FILTER_OPERATOR_ENDS_WITH = 'ends';
    /** @var string */
    public const FILTER_OPERATOR_IS_NULL = 'null';
    /** @var string */
    public const FILTER_OPERATOR_IS_NOT_NULL = 'not-null';
    /** @var string */
    public const FILTER_OPERATOR_IS_EMPTY = 'empty';
    /** @var string */
    public const FILTER_OPERATOR_IS_NOT_EMPTY = 'not-empty';
    /** @var string */
    public const FILTER_OPERATOR_IN = 'in';
    /** @var string[] */
    public const AVAILABLE_FILTERING_OPERATORS = [
        ParameterEnum::FILTER_OPERATOR_EQUAL,
        ParameterEnum::FILTER_OPERATOR_NOT_EQUAL,
        ParameterEnum::FILTER_OPERATOR_GREATER_THAN,
        ParameterEnum::FILTER_OPERATOR_GREATER_THAN_OR_EQUAL,
        ParameterEnum::FILTER_OPERATOR_GREATER_THAN_OR_EQUAL_OR_NULL,
        ParameterEnum::FILTER_OPERATOR_LOWER_THAN,
        ParameterEnum::FILTER_OPERATOR_LOWER_THAN_OR_EQUAL,
        ParameterEnum::FILTER_OPERATOR_BEGINS_WITH,
        ParameterEnum::FILTER_OPERATOR_CONTAINS,
        ParameterEnum::FILTER_OPERATOR_CONTAINS_NOT,
        ParameterEnum::FILTER_OPERATOR_ENDS_WITH,
        ParameterEnum::FILTER_OPERATOR_IS_NULL,
        ParameterEnum::FILTER_OPERATOR_IS_NOT_NULL,
        ParameterEnum::FILTER_OPERATOR_IS_EMPTY,
        ParameterEnum::FILTER_OPERATOR_IS_NOT_EMPTY,
        ParameterEnum::FILTER_OPERATOR_IN,
    ];
    /** @var string */
    public const FILTER_VALUE = 'value';
    /** @var string */
    public const FILTER_VALUE_WILDCARD = '*';

    /** @var string */
    public const ORDER_BY = 'orderBy';
    /** @var string */
    public const ORDER_BY_FIELD = 'field';
    /** @var string */
    public const ORDER_BY_DIRECTION = 'direction';
    /** @var string */
    public const ORDER_BY_DIRECTION_ASC = 'asc';
    /** @var string */
    public const ORDER_BY_DIRECTION_DESC = 'desc';
    /** @var string[] */
    public const AVAILABLE_ORDERING_DIRECTIONS = [
        ParameterEnum::ORDER_BY_DIRECTION_ASC,
        ParameterEnum::ORDER_BY_DIRECTION_DESC,
    ];

    /** @var string */
    public const GROUP_BY = 'groupBy';
    /** @var string */
    public const GROUP_BY_FIELD = 'field';
    /** @var string */
    public const GROUP_BY_DIRECTION = 'direction';
    /** @var string */
    public const GROUP_BY_DIRECTION_ASC = 'asc';
    /** @var string */
    public const GROUP_BY_DIRECTION_DESC = 'desc';
    /** @var string */
    public const GROUP_BY_AGGREGATES = 'aggregates';
    /** @var string */
    public const GROUP_BY_AGGREGATE_FUNCTION = 'function';
    /** @var string */
    public const GROUP_BY_AGGREGATE_FIELD = 'field';
    /** @var string */
    public const GROUP_BY_ITEMS = 'items';

    /** @var string */
    public const RESPONSE_STRUCTURE = 'responseStructure';

    /** @var string */
    public const ENTITY_NAME = 'entityName';
}
