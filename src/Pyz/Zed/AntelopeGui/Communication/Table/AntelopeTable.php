<?php

declare(strict_types=1);

namespace Pyz\Zed\AntelopeGui\Communication\Table;

use Orm\Zed\Antelope\Persistence\Map\PyzAntelopeTableMap;
use Orm\Zed\Antelope\Persistence\PyzAntelope;
use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Orm\Zed\AntelopeLocation\Persistence\Map\PyzAntelopeLocationTableMap;
use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class AntelopeTable extends AbstractTable
{
    public const COL_ID_ANTELOPE = 'id_antelope';
    public const COL_NAME = 'name';
    public const COL_COLOR = 'color';

    public const COL_LOCATION_NAME = 'location_name';


    public function __construct(protected PyzAntelopeQuery $antelopeQuery)
    {
    }

    /**
     * @param TableConfiguration $config
     *
     * @return TableConfiguration
     */
    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            static::COL_ID_ANTELOPE => 'Antelope ID',
            static::COL_NAME => 'Name',
            static::COL_COLOR => 'Color',
            static::COL_LOCATION_NAME => 'Location',
        ]);

        $config->setSortable([
            static::COL_ID_ANTELOPE,
            static::COL_NAME,
            static::COL_COLOR,
            static::COL_LOCATION_NAME,
        ]);

        $config->setSearchable([
            PyzAntelopeTableMap::COL_NAME,
            PyzAntelopeTableMap::COL_COLOR,
        ]);

        return $config;
    }

    /**
     * @param TableConfiguration $config
     *
     * @return array
     */
    protected function prepareData(TableConfiguration $config): array
    {
        $query = $this->antelopeQuery
            ->leftJoinPyzAntelopeLocation()
            ->withColumn(PyzAntelopeLocationTableMap::COL_LOCATION_NAME, static::COL_LOCATION_NAME);

        $antelopeEntityCollection = $this->runQuery(
            $query,
            $config,
            true
        );

        if (!$antelopeEntityCollection->count()) {
            return [];
        }

        return $this->mapReturns($antelopeEntityCollection);
    }

    /**
     * @param ObjectCollection<PyzAntelope> $antelopeEntityCollection
     *
     * @return array<int,mixed>
     */
    protected function mapReturns(ObjectCollection $antelopeEntityCollection
    ): array {
        $returns = [];

        foreach ($antelopeEntityCollection as $antelopeEntity) {
            $returns[] = $antelopeEntity->toArray();
        }

        return $returns;
    }
}
