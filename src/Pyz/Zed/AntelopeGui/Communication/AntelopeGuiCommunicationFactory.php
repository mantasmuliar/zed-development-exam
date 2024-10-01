<?php

declare(strict_types=1);

namespace Pyz\Zed\AntelopeGui\Communication;

use Generated\Shared\Transfer\AntelopeTransfer;
use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Pyz\Zed\AntelopeGui\AntelopeGuiDependencyProvider;
use Pyz\Zed\AntelopeGui\Communication\Form\AntelopeCreateForm;
use Pyz\Zed\AntelopeGui\Communication\Form\AntelopeDataProvider;
use Pyz\Zed\AntelopeGui\Communication\Table\AntelopeTable;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Symfony\Component\Form\FormInterface;

/**
 * @method \Pyz\Zed\AntelopeGui\AntelopeGuiConfig getConfig()
 */
class AntelopeGuiCommunicationFactory extends AbstractCommunicationFactory
{
    public function createAntelopeTable(): AntelopeTable
    {
        return new AntelopeTable(
            $this->getAntelopePropelQuery()
        );
    }

    public function getAntelopePropelQuery(): PyzAntelopeQuery
    {
        return $this->getProvidedDependency(AntelopeGuiDependencyProvider::PROPEL_QUERY_ANTELOPE);
    }

    public function createAntelopeDataProvider(): AntelopeDataProvider
    {
        return new AntelopeDataProvider($this->getAntelopeFacade());
    }

    /**
     * @param AntelopeTransfer $antelopeTransfer
     *
     * @return FormInterface
     */
    public function createAntelopeCreateForm(AntelopeTransfer $antelopeTransfer): FormInterface
    {
        $dataProvider = $this->createAntelopeDataProvider();
        return $this->getFormFactory()->create(
            AntelopeCreateForm::class,
            $antelopeTransfer,
            $dataProvider->getOptions(),
        );
    }

    public function getAntelopeFacade(): AntelopeFacadeInterface
    {
        return $this->getProvidedDependency(AntelopeGuiDependencyProvider::FACADE_ANTELOPE);
    }
}
