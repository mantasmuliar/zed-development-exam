<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Pyz\Zed\Training\Business\Writer;

use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Pyz\Zed\Training\Persistence\TrainingEntityManagerInterface;

class AntelopeLocationWriter
{
    private TrainingEntityManagerInterface $entityManager;

    public function __construct(TrainingEntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createAntelopeLocation(AntelopeLocationTransfer $antelopeLocationTransfer): AntelopeLocationTransfer
    {
        return $this->entityManager->createAntelopeLocation($antelopeLocationTransfer);
    }
}
