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
 * Group
 * 
 * @author pvol <pvol@163.com>
 */
class Group
{
    /** @var rule list */
    private $rules;
    
    /**
     * init rule
     */
    public function __construct($rule_path = 'rule'){
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

}
