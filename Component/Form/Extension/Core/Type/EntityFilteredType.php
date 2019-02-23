<?php
/**
 * Created by PhpStorm.
 * User: rafael.s.ribeiro
 * Date: 22/02/2019
 * Time: 08:52
 */

namespace Component\Form\Extension\Core\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntityFilteredType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'depends_on' => null,
            'route_path' => null,
            'route_method' => 'get',
            'placeholder' => 'Selecione',
            'field_query' => 'query',
            'route_key' => 'id',
            'route_label' => 'label',
            'loading_label' => 'Carregando...'
        ]);
        parent::configureOptions($resolver);
    }

    public function buildView(FormView $view, FormInterface $form, array $options) {
        $view->vars['depends_on'] = $options['depends_on'];
        $view->vars['route_path'] = $options['route_path'];
        $view->vars['route_method'] = $options['route_method'];
        $view->vars['loading_label'] = $options['loading_label'];
        $view->vars['field_query'] = $options['field_query'];
        $view->vars['route_key'] = $options['route_key'];
        $view->vars['route_label'] = $options['route_label'];
        parent::buildView($view, $form, $options);
    }

    public function getParent() {
        return EntityType::class;
    }

    public function getBlockPrefix() {
        return 'entity_filtered';
    }
}