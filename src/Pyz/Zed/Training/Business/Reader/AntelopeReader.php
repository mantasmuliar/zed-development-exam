<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Training\Business\Reader;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeResponseTransfer;
use Pyz\Zed\Training\Persistence\TrainingRepositoryInterface;

class AntelopeReader
{
    public function __construct(
        protected TrainingRepositoryInterface $trainingRepository,
    ) {
    }

    public function getAntelope(
        AntelopeCriteriaTransfer $antelopeCriteriaTransfer,
    ): AntelopeResponseTransfer {
        $antelopeTransfer = $this->trainingRepository->getAntelope($antelopeCriteriaTransfer);
        $antelopeResponseTransfer = new AntelopeResponseTransfer();
        $antelopeResponseTransfer->setIsSuccessFul(false);
        if ($antelopeTransfer) {
            $antelopeResponseTransfer->setAntelope($antelopeTransfer);
            $antelopeResponseTransfer->setIsSuccessFul(true);
        }

        return $antelopeResponseTransfer;
    }
}
