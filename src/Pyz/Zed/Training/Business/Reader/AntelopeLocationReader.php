<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Pyz\Zed\Training\Business\Reader;

use Generated\Shared\Transfer\AntelopeLocationCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeLocationResponseTransfer;
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

    public function findAntelopeLocation(
        AntelopeLocationCriteriaTransfer $antelopeLocationCriteriaTransfer,
    ): AntelopeLocationResponseTransfer {
        $responseTransfer = (new AntelopeLocationResponseTransfer())->setIsSuccessful(false);
        if ($antelopeLocationCriteriaTransfer->getIdLocation()) {
            $antelopeLocationTransfer = $this->trainingRepository->findAntelopeLocationById(
                $antelopeLocationCriteriaTransfer->getIdLocation(),
            );

            return $responseTransfer
                ->setAntelopeLocation($antelopeLocationTransfer)
                ->setIsSuccessful($antelopeLocationTransfer !== null);
        }

        return $responseTransfer;
    }
}
