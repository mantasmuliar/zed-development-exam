<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Training\Communication\Controller;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeLocationCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeLocationResponseTransfer;
use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Generated\Shared\Transfer\AntelopeResponseTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Pyz\Zed\Training\Business\TrainingFacadeInterface getFacade()
 * @method \Pyz\Zed\Training\Persistence\TrainingRepositoryInterface getRepository()
 */
class GatewayController extends AbstractGatewayController
{
    public function getAntelopeAction(AntelopeCriteriaTransfer $antelopeCriteria): AntelopeResponseTransfer
    {
        return $this->getFacade()
            ->getAntelope($antelopeCriteria);
    }

    public function addAntelopeLocationAction(
        AntelopeLocationTransfer $antelopeLocationTransfer,
    ): AntelopeLocationResponseTransfer {
        $antelopeLocationTransfer = $this->getFacade()->createAntelopeLocation($antelopeLocationTransfer);

        return (new AntelopeLocationResponseTransfer())
            ->setIsSuccessful(true)
            ->setAntelopeLocation($antelopeLocationTransfer);
    }

    public function findAntelopeLocationAction(
        AntelopeLocationCriteriaTransfer $antelopeLocationCriteriaTransfer,
    ): AntelopeLocationResponseTransfer {
        return $this->getFacade()->findAntelopeLocation($antelopeLocationCriteriaTransfer);
    }
}
