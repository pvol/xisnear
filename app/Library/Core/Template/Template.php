<?php 

/**
 * core
 * 
 * @version 1.0
 * @package Rule
 * 
 */

namespace Core\Template;

use Core\Frame\Traits\Factory;
use Core\Template\Exception\TemplateException;

/**
 * template
 * 
 * 
 */
class Template
{
    use Factory;
    
    public function render($name){
        $template = \Core\Template\Model\Template::where('name', $name)->first();
        if(!$template){
            throw new TemplateException("模板{$name}不存在");
        }
        $rule_group = new \Core\Rule\Group($template->rule_group_id);
        if($rule_group->obeyTheRule()){
            _include($template->path);
        }
    }

}
