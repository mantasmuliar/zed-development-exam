<?php

declare(strict_types=1);

namespace Pyz\Zed\Antelope\Persistence;

use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Orm\Zed\AntelopeLocation\Persistence\PyzAntelopeLocationQuery;
use Pyz\Zed\Antelope\Persistence\Propel\Mapper\AntelopeLocationMapper;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class AntelopePersistenceFactory extends AbstractPersistenceFactory
{
    public function createAntelopeQuery(): PyzAntelopeQuery
    {
        return PyzAntelopeQuery::create();
    }

    public function createAntelopeLocationQuery(): PyzAntelopeLocationQuery
    {
        return PyzAntelopeLocationQuery::create();
    }

    public function createAntelopeLocationMapper(): AntelopeLocationMapper
    {
        return new AntelopeLocationMapper();
    }
}
