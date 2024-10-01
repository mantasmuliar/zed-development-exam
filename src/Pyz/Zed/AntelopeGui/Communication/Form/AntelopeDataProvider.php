<?php

declare(strict_types=1);

namespace Pyz\Zed\AntelopeGui\Communication\Form;

use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;

class AntelopeDataProvider
{
    private AntelopeFacadeInterface $antelopeFacade;

    public function __construct(AntelopeFacadeInterface $antelopeFacade)
    {
        $this->antelopeFacade = $antelopeFacade;
    }

    public function getOptions(): array
    {
        return [
            AntelopeCreateForm::OPTION_LOCATION_CHOICES => $this->getLocationChoices(),
        ];
    }

    private function getLocationChoices(): array
    {
        $antelopeLocationCollectionTransfer = $this->antelopeFacade->getAntelopeLocations();
        $mappedLocationChoices = [];
        foreach ($antelopeLocationCollectionTransfer->getAntelopeLocations() as $antelopeLocationTransfer) {
            $mappedLocationChoices[$antelopeLocationTransfer->getLocationName()] = $antelopeLocationTransfer->getIdAntelopeLocation();
        }

        return $mappedLocationChoices;
    }
}
