<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Pyz\Zed\AntelopeLocationGui\Communication\Controller;

use Pyz\Zed\AntelopeLocationGui\AntelopeLocationGuiConfig;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\AntelopeLocationGui\Communication\AntelopeLocationGuiCommunicationFactory getFactory()
 */
class IndexController extends AbstractController
{
    /**
     * @var string
     */
    public const MESSAGE_CREATE_SUCCESS = 'Antelope location was successfully created.';

    /**
     * @var string
     */
    public const MESSAGE_CREATE_ERROR = 'Antelope location was not created.';

    /**
     * @return array
     */
    public function indexAction(): array
    {
        $table = $this->getFactory()
            ->createAntelopeLocationTable();

        return $this->viewResponse([
            'table' => $table->render(),
            'createUrl' => AntelopeLocationGuiConfig::URL_ANTELOPE_LOCATION_CREATE,
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function tableAction(): JsonResponse
    {
        $table = $this
            ->getFactory()
            ->createAntelopeLocationTable();

        return $this->jsonResponse(
            $table->fetchData(),
        );
    }

    public function createAction(Request $request): array|RedirectResponse
    {
        $antelopeLocationForm = $this->getFactory()
            ->createAntelopeLocationForm()
            ->handleRequest($request);

        if ($antelopeLocationForm->isSubmitted() && $antelopeLocationForm->isValid()) {
            /** @var \Generated\Shared\Transfer\AntelopeLocationTransfer $antelopeLocationTransfer */
            $antelopeLocationTransfer = $antelopeLocationForm->getData();
            $antelopeLocationTransfer = $this->getFactory()
                ->getAntelopeFacade()
                ->createAntelopeLocation($antelopeLocationTransfer);

            if ($antelopeLocationTransfer->getIdAntelopeLocation()) {
                $this->addSuccessMessage(static::MESSAGE_CREATE_SUCCESS);
            } else {
                $this->addErrorMessage(static::MESSAGE_CREATE_ERROR);
            }

            return $this->redirectResponse(AntelopeLocationGuiConfig::URL_ANTELOPE_LOCATION_LIST);
        }

        return $this->viewResponse([
            'antelopeLocationForm' => $antelopeLocationForm->createView(),
            'backUrl' => AntelopeLocationGuiConfig::URL_ANTELOPE_LOCATION_LIST,
        ]);
    }
}
