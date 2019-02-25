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

####Opções
````
'depends_on' => Campo do formulário, no qual o campo depende.
'route_path' => Caminho do ajax para consulta de valores.
'route_method' => methodo do ajax para consulta de valores (default: get)
'loading_label' => label do select no status de carregand. (default: Carregando...)
'field_query' => campo enviado no query do ajax para filtro de valores. (default: query)
'route_key' => nome do campo chave de retorno do ajax. (default: id) 
'route_label' => label do campo chave de retorno do ajax. (default: label)
````        