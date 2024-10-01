<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Pyz\Zed\AntelopeLocationGui\Communication;

use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Orm\Zed\AntelopeLocation\Persistence\PyzAntelopeLocationQuery;
use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Pyz\Zed\AntelopeLocationGui\AntelopeLocationGuiDependencyProvider;
use Pyz\Zed\AntelopeLocationGui\Communication\Form\AntelopeLocationForm;
use Pyz\Zed\AntelopeLocationGui\Communication\Table\AntelopeLocationTable;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Symfony\Component\Form\FormInterface;

/**
 * @method \Pyz\Zed\AntelopeLocationGui\AntelopeLocationGuiConfig getConfig()
 */
class AntelopeLocationGuiCommunicationFactory extends AbstractCommunicationFactory
{
    public function createAntelopeLocationForm(?AntelopeLocationTransfer $antelopeLocationTransfer = null): FormInterface
    {
        return $this->getFormFactory()->create(AntelopeLocationForm::class, $antelopeLocationTransfer);
    }

    public function createAntelopeLocationTable(): AbstractTable
    {
        return new AntelopeLocationTable($this->getAntelopeLocationQuery());
    }

    public function getAntelopeLocationQuery(): PyzAntelopeLocationQuery
    {
        return $this->getProvidedDependency(AntelopeLocationGuiDependencyProvider::QUERY_ANTELOPE_LOCATION);
    }

    public function getAntelopeFacade(): AntelopeFacadeInterface
    {
        return $this->getProvidedDependency(AntelopeLocationGuiDependencyProvider::FACADE_ANTELOPE);
    }
}
