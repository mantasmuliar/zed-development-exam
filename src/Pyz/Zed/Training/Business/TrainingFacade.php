<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Training\Business;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Generated\Shared\Transfer\AntelopeResponseTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\Training\Business\TrainingBusinessFactory getFactory()
 * @method \Pyz\Zed\Training\Persistence\TrainingRepositoryInterface getRepository()
 * @method \Pyz\Zed\Training\Persistence\TrainingEntityManagerInterface getEntityManager()
 */
class TrainingFacade extends AbstractFacade implements TrainingFacadeInterface
{
    public function createAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer
    {
        return $this->getFactory()->createAntelopeWriter()->createAntelope($antelopeTransfer);
    }

    public function getAntelope(
        AntelopeCriteriaTransfer $antelopeCriteriaTransfer,
    ): AntelopeResponseTransfer {
        return $this->getFactory()->createAntelopeReader()->getAntelope($antelopeCriteriaTransfer);
    }

    public function createAntelopeLocation(AntelopeLocationTransfer $antelopeLocationTransfer): AntelopeLocationTransfer
    {
        return $this->getFactory()->createAntelopeLocationWriter()->createAntelopeLocation($antelopeLocationTransfer);
    }

    public function findAntelopeLocationById(int $idLocation): ?AntelopeLocationTransfer
    {
        return $this->getFactory()->createAntelopeLocationReader()->findAntelopeLocationById($idLocation);
    }
}
