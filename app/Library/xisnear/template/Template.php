<?php 

/**
 * xisnear
 * 
 * @version 1.0
 * @package Rule
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Template;

use Xisnear\Frame\Traits\Factory;
use Xisnear\Template\Exception\TemplateException;

/**
 * template
 * 
 * @author xisnear <service@xisnear.com>
 */
class Template
{
    use Factory;
    
    public function render($name){
        $template = \Xisnear\Template\Model\Template::where('name', $name)->first();
        if(!$template){
            throw new TemplateException("模板{$name}不存在");
        }
        $rule_group = new \Xisnear\Rule\Group($template->rule_group_id);
        if($rule_group->obeyTheRule()){
            _include($template->path);
        }
    }

}
