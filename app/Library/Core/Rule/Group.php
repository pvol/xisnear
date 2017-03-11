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

/**
 * Group
 * 
 * 
 */
class Group
{
    
    use Factory;
    
    /** @var rule group list */
    private $group;
    
    /**
     * init rule
     */
    public function __construct($group_id){
        $this->group = Model\Group::find($group_id);
    }
    
    /**
     * obey the rule
     */
    public function obeyTheRule(){
        $rules = explode($this->group->rules, ',');
        foreach($rules as $rule_id){
            $rule_obj = new Rule($rule_id);
            if(!$rule_obj->obeyTheRule()){
                return false;
            }
        }
        return true;
    }

}
