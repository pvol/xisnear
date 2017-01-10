<?php 

/**
 * xisnear
 * 
 * @version 1.0
 * @package Rule
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Rule;

use Xisnear\Frame\Traits\Factory;
use Xisnear\Rule\Exception\RuleException;

/**
 * Rule
 * 
 * @author xisnear <service@xisnear.com>
 */
class Rule
{
    use Factory;
    
    /** @var rule list */
    private $rules;
    
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
    public function __construct($rule_path = 'rule.rules'){
        $this->rules = _config($rule_path);
    }
    
    /**
     * enforce rules
     */
    public function enforce($rule_keys){
        if(is_string($rule_keys)){
            $rule_keys = explode(',', $rule_keys);
        }
        foreach($rule_keys as $rule_key){
            // return false when any of the rules failed
            if($this->enforceOne($rule_key) !== true){
                return false;
            }
        }
        return true;
    }
    
    /**
     * enforce one rule
     */
    public function enforceOne($rule_key){
        $rule = $this->rules[$rule_key];
        if(!isset($rule['fact']) || !isset($rule['compare']) || !isset($rule['expect'])){
            throw new RuleException("rule config error:" . $rule_key);
        }
        
        // new class
        $object = call_user_func([$rule['fact'], 'singleton']);
        
        // get function name
        $function_name = $rule['compare'];
        
        // use shorthand character
        if(array_key_exists($rule['compare'], self::$compare_type)){
            $function_name = self::$compare_type[$rule['compare']];
        }
        if($object->$function_name($rule['expect']) === true){
            return true;
        } else {
            return false;
        }
    }

}
