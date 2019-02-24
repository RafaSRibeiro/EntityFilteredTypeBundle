#Overview

Bundle Symfony criado para atualizar os dados por uma rota ajax.


#Configuração/Uso

####AppKernel.php
````
class AppKernel extends Kernel {

    public function registerBundles() {
        $bundles = [
            new RafaSRibeiro\Bundle\EntityFilteredBundle\EntityFilteredTypeBundle(),
        ];
        
        return $bundles;
    }
````   

####config.yml
````
twig:
    paths:
        '%kernel.root_dir%/../vendor/rafasribeiro/entity-filtered-type-bundle/Resources/views': RafaSRibeiroEntityFilteredBundle
    form_themes:
        - '@RafaSRibeiroEntityFilteredBundle/form/fields.html.twig'
````        

####AbstractType

````
use RafaSRibeiro\Bundle\EntityFilteredBundle\Component\Form\Type;
...
$form->add('field', EntityFilteredType::class, [
        'depends_on' => 'campo_dependente',
        'route_path' => 'rota_ajax'
    ]);
````