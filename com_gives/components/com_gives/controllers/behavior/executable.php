<?php

class ComGivesControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{
    
    protected function _beforeAdd(KCommandContext $context)
    {
        $caller = $context->caller->getIdentifier()->name;
        
        if ($caller == 'volunteer')
            return true;
        return parent::_beforeAdd($context);
    }

}