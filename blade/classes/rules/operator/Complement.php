<?php

/*
 * This file is part of the Ruler package, an OpenSky project.
 *
 * (c) 2011 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Delphinium\Blade\Classes\Rules\Operator;

use Delphinium\Blade\Classes\Rules\IContext;
use Delphinium\Blade\Classes\Rules\Set;
use Delphinium\Blade\Classes\Rules\VariableOperand;

/**
 * A Complement Set Operator
 *
 * @author Jordan Raub <jordan@raub.me>
 */
class Complement extends VariableOperator implements VariableOperand
{
    public function prepareValue(IContext $context)
    {
        $complement = null;
        /** @var VariableOperand $operand */
        foreach ($this->getOperands() as $operand) {
            if (!$complement instanceof Set) {
                $complement = $operand->prepareValue($context)->getSet();
            } else {
                $set = $operand->prepareValue($context)->getSet();
                $complement = $complement->complement($set);
            }
        }

        return $complement;
    }

    protected function getOperandCardinality()
    {
        return static::MULTIPLE;
    }
}
