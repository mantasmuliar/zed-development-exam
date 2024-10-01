<?php

declare(strict_types=1);

namespace Pyz\Zed\AntelopeGui\Communication\Form;

use Generated\Shared\Transfer\AntelopeTransfer;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class AntelopeCreateForm extends AbstractType
{
    public const FIELD_NAME = AntelopeTransfer::NAME;
    public const FIELD_COLOR = AntelopeTransfer::COLOR;

    public const FIELD_ID_LOCATION = AntelopeTransfer::ID_ANTELOPE_LOCATION;

    public const OPTION_LOCATION_CHOICES = 'location_choices';

    public function getBlockPrefix(): string
    {
        return 'antelope';
    }

    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ): void {
        $this->addNameField($builder)
            ->addColorField($builder)
            ->addIdLocationField($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);

        $resolver->setRequired(static::OPTION_LOCATION_CHOICES);
    }

    protected function addColorField(FormBuilderInterface $builder
    ): static {
        $builder->add(static::FIELD_COLOR, TextType::class, [
            'constraints' => [
                $this->createNotBlankConstraint(),
            ],
        ]);

        return $this;
    }

    protected function createNotBlankConstraint(): NotBlank
    {
        return new NotBlank();
    }

    protected function addNameField(FormBuilderInterface $builder): static
    {
        $builder->add(static::FIELD_NAME, TextType::class, [
            'label' => 'Name',
            'constraints' => [
                $this->createNotBlankConstraint(),
            ],
        ]);

        return $this;
    }

    protected function addIdLocationField(FormBuilderInterface $builder, array $options): static
    {
        $builder->add(static::FIELD_ID_LOCATION, ChoiceType::class, [
            'label' => 'Location',
            'required' => true,
            'choices' => $options[static::OPTION_LOCATION_CHOICES],
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }
}
