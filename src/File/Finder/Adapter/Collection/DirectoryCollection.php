<?php declare(strict_types=1);

namespace LDL\File\Finder\Adapter\Collection;

use LDL\File\Finder\DirectoryInterface;
use LDL\Type\Collection\AbstractCollection;
use LDL\Type\Collection\Traits\Validator\AppendValueValidatorChainTrait;
use LDL\Validators\InterfaceComplianceValidator;

class DirectoryCollection extends AbstractCollection
{
    use AppendValueValidatorChainTrait;

    public function __construct(iterable $items = null)
    {
        parent::__construct($items);

        $this->getAppendValueValidatorChain()
            ->append(new InterfaceComplianceValidator(DirectoryInterface::class))
            ->lock();
    }
}