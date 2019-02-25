#Overview

Bundle Symfony criado para atualizar os dados por uma rota ajax.


#Configuração/Uso

####AppKernel.php
````
class AppKernel extends Kernel {

    public function registerBundles() {
        $bundles = [
            new \RafaSRibeiro\Bundle\EntityFilteredBundle\EntityFilteredTypeBundle(),
        ];
        
        return $bundles;
    }
````   

####config.yml
````
twig:
    form_themes:
        - 'EntityFilteredTypeBundle:Form:fields.html.twig'
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