<?php 

/**
 * xisnear
 * 
 * @version 1.0
 * @package Rule
 * @author pvol <pvol@163.com>
 */

namespace Xisnear\Rule;

/**
 * Rule
 * 
 * @author pvol <pvol@163.com>
 */
class Rule
{
    /** @var rule list */
    private $rules;
    
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
            throw new Exception("rule config error:" . $rule_key);
        }
        $object = new $rule['fact'];
        if($object->$rule['compare']($rule['expect']) === true){
            return true;
        } else {
            return false;
        }
    }

}
