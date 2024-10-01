<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Pyz\Zed\AntelopeLocationGui;

use Orm\Zed\AntelopeLocation\Persistence\PyzAntelopeLocationQuery;
use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class AntelopeLocationGuiDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_ANTELOPE = 'FACADE_ANTELOPE';

    /**
     * @var string
     */
    public const QUERY_ANTELOPE_LOCATION = 'QUERY_ANTELOPE_LOCATION';

    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $this->addAntelopeFacade($container);
        $this->addAntelopeLocationQuery($container);

        return $container;
    }

    /**
     * @return void
     */
    private function addAntelopeFacade(Container $container): void
    {
        $container->set(
            static::FACADE_ANTELOPE,
            static function (Container $container): AntelopeFacadeInterface {
                return $container->getLocator()->antelope()->facade();
            },
        );
    }

    /**
     * @return void
     */
    private function addAntelopeLocationQuery(Container $container): void
    {
        $container->set(
            static::QUERY_ANTELOPE_LOCATION,
            static function (): PyzAntelopeLocationQuery {
                return new PyzAntelopeLocationQuery();
            },
        );
    }
}
