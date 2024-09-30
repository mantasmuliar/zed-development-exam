<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Training\Business\Writer;

use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Training\Persistence\TrainingEntityManagerInterface;

class AntelopeWriter
{
    public function __construct(
        protected TrainingEntityManagerInterface $entityManager,
    ) {
    }

    public function createAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer
    {
        return $this->entityManager->createAntelope($antelopeTransfer);
    }
}
