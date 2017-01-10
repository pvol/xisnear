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
 * Group
 * 
 * @author xisnear <service@xisnear.com>
 */
class Group
{
    
    use Factory;
    
    /** @var rule group list */
    private $groups;
    
    /**
     * init rule
     */
    public function __construct($group_path = 'rule.groups'){
        $this->groups = _config($group_path);
    }
    
    /**
     * enforce rules
     */
    public function enforce($group_keys){
        if(is_string($group_keys)){
            $group_keys = explode(',', $group_keys);
        }
        foreach($group_keys as $group_key){
            // return false when any of the rules failed
            if($this->enforceOne($group_key) !== true){
                return false;
            }
        }
        return true;
    }
    
    /**
     * enforce one rule
     */
    public function enforceOne($group_key){
        $rule_keys = $this->groups[$group_key];
        if(!count($rule_keys)){
            throw new RuleException("rule group config error:no rules");
        }
        $rule = new \Xisnear\Rule\Rule();
        return $rule->enforce($rule_keys);
    }

}
