<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Pyz\Zed\Training\Business\Reader;

use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Pyz\Zed\Training\Persistence\TrainingRepositoryInterface;

class AntelopeLocationReader
{
    private TrainingRepositoryInterface $trainingRepository;

    public function __construct(TrainingRepositoryInterface $trainingRepository)
    {
        $this->trainingRepository = $trainingRepository;
    }

    public function findAntelopeLocationById(int $idLocation): ?AntelopeLocationTransfer
    {
        return $this->trainingRepository->findAntelopeLocationById($idLocation);
    }
}
