<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Pyz\Zed\AntelopeLocationGui\Communication\Form;

use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @method \Pyz\Zed\AntelopeLocationGui\Communication\AntelopeLocationGuiCommunicationFactory getFactory()
 * @method \Pyz\Zed\AntelopeLocationGui\AntelopeLocationGuiConfig getConfig()
 */
class AntelopeLocationForm extends AbstractType
{
    public const FIELD_LOCATION_NAME = AntelopeLocationTransfer::LOCATION_NAME;

    public const FIELD_ID_ANTLOPE_LOCATION = AntelopeLocationTransfer::ID_ANTELOPE_LOCATION;

    /**
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class' => AntelopeLocationTransfer::class,
        ]);
    }

    /**
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $this->addIdAntelopeLocationField($builder);
        $this->addLocationNameField($builder);
    }

    /**
     * @return void
     */
    private function addLocationNameField(FormBuilderInterface $builder): void
    {
        $builder->add(static::FIELD_LOCATION_NAME, TextType::class, [
            'label' => 'Location Name',
            'required' => true,
            'constraints' => [
                new NotBlank(),
            ],
        ]);
    }

    /**
     * @return void
     */
    private function addIdAntelopeLocationField(FormBuilderInterface $builder): void
    {
        $builder->add(static::FIELD_ID_ANTLOPE_LOCATION, HiddenType::class);
    }
}
