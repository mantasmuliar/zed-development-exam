<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Pyz\Zed\Training\Communication\Controller;

use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Training\Business\TrainingFacadeInterface getFacade()
 * @method \Pyz\Zed\Training\Persistence\TrainingRepositoryInterface getRepository()
 */
class AntelopeLocationController extends AbstractController
{
    /**
     * @var string
     */
    public const PARAM_NAME = 'name';

    /**
     * @var string
     */
    public const PARAM_ID = 'id';

    public function addAction(Request $request): JsonResponse
    {
        if (!$request->query->has(static::PARAM_NAME)) {
            return $this->jsonResponse(['error' => 'Name is required.'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $name = $request->query->get(static::PARAM_NAME);
        $antelopeLocationTransfer = (new AntelopeLocationTransfer())
            ->setLocationName($name);
        $antelopeLocationTransfer = $this->getFacade()
            ->createAntelopeLocation($antelopeLocationTransfer);

        return $this->jsonResponse(['antelopeLocation' => $antelopeLocationTransfer->toArray()]);
    }

    public function getAction(Request $request): JsonResponse
    {
        if (!$request->query->has(static::PARAM_ID)) {
            return $this->jsonResponse(['error' => 'Id is required.'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $id = $this->castId($request->query->get(static::PARAM_ID));
        $antelopeLocationTransfer = $this->getFacade()->findAntelopeLocationById($id);

        return $this->jsonResponse(['antelopeLocation' => $antelopeLocationTransfer->toArray()]);
    }
}
