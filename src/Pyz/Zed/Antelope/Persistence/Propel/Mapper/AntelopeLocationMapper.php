<?php

declare(strict_types=1);

namespace Pyz\Zed\Antelope\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\AntelopeLocationCollectionTransfer;
use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Orm\Zed\AntelopeLocation\Persistence\PyzAntelopeLocation;

class AntelopeLocationMapper
{
    public function mapAntelopeLocationEntityToTransfer(
        PyzAntelopeLocation $pyzAntelopeLocation,
        AntelopeLocationTransfer $antelopeLocationTransfer,
    ): AntelopeLocationTransfer {
        return $antelopeLocationTransfer->fromArray($pyzAntelopeLocation->toArray(), true);
    }

    public function mapAntelopeLocationEntitiesToCollectionTransfer(
        iterable $pyzAntelopeLocationCollection,
    ): AntelopeLocationCollectionTransfer {
        $antelopeLocationCollectionTransfer = new AntelopeLocationCollectionTransfer();
        foreach ($pyzAntelopeLocationCollection as $pyzAntelopeLocation) {
            $antelopeLocationTransfer = $this->mapAntelopeLocationEntityToTransfer(
                $pyzAntelopeLocation,
                new AntelopeLocationTransfer(),
            );
            $antelopeLocationCollectionTransfer->addAntelopeLocation($antelopeLocationTransfer);
        }

        return $antelopeLocationCollectionTransfer;
    }
}
