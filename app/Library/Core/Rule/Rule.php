<?php 

/**
 * core
 * 
 * @version 1.0
 * @package Rule
 * 
 */

namespace Core\Rule;

use Core\Frame\Traits\Factory;
use Core\Rule\Exception\RuleException;

/**
 * Rule
 * 
 * 
 */
class Rule
{
    use Factory;
    
    /** @var rule list */
    private $rule;
    
    /** @var rule fact data */
    private $data;
    
    /** @var rule compare type */
    const COMPARE_TYPE_EQUAL_TO = '=';
    
    /** @var rule compare type */
    const COMPARE_TYPE_LESS_THAN = '<';
    
    /** @var rule compare type */
    const COMPARE_TYPE_GREATER_THAN = '>';
    
    /** @var rule compare type */
    const COMPARE_TYPE_EQUAL_AND_LESS_THAN = '<=';
    
    /** @var rule compare type */
    const COMPARE_TYPE_EQUAL_AND_GREATER_THAN = '>=';
    
    /** @var rule compare type */
    const COMPARE_TYPE_NOT_EQUAL = '!=';
    
    /** @var rule compare type */
    const COMPARE_TYPE_CONTAIN = 'contain';
    
    /** @var rule compare type */
    const COMPARE_TYPE_NOT_CONTAIN = '!contain';
    
    /** @var rule compare type */
    const COMPARE_TYPE_LIKE = 'like';
    
    /** @var rule compare type */
    const COMPARE_TYPE_NOT_LIKE = '!like';
    
    /** @var compare type to function map */
    public static $compare_type = [
        self::COMPARE_TYPE_EQUAL_TO => 'equalTo',
        self::COMPARE_TYPE_LESS_THAN => 'lessThan',
        self::COMPARE_TYPE_GREATER_THAN => 'greaterThan',
        self::COMPARE_TYPE_EQUAL_AND_LESS_THAN => 'equalAndLessThan',
        self::COMPARE_TYPE_EQUAL_AND_GREATER_THAN => 'equalAndGreaterThan',
        self::COMPARE_TYPE_NOT_EQUAL => 'notEqualTo',
        self::COMPARE_TYPE_CONTAIN => 'contain',
        self::COMPARE_TYPE_NOT_CONTAIN => 'notContain',
        self::COMPARE_TYPE_LIKE => 'like',    
        self::COMPARE_TYPE_NOT_LIKE => 'notLike', 
    ];
    
    /**
     * init rule
     */
    public function __construct($rule_id, $data = []){
        $this->rule = Model\Rule::find($rule_id);
        $this->data = $data;
    }
    
    /**
     * obey the rule
     */
    public function obeyTheRule(){
        $fact_alias = _config('rule.alias');
        if(in_array($this->rule->fact, $fact_alias)){
            $fact = $fact_alias[$this->rule->fact];
        } else {
            $fact = $this->rule->fact;
        }
        if(!class_exists($fact)){
            throw new RuleException("规则实现不存在");
        }
        $fact_obj = new $fact($this->data);
        return $fact_obj->{$this->rule->compare}($this->rule->expect);
    }

}
