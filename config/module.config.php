<?
namespace ColumnsMaker;

return [
    'view_manager' => [
        'template_path_stack' => [
            dirname(__DIR__) . '/view',
        ],
    ],
	'form_elements' => [
        'invokables' => [
            Form\ColumnsMakerBlockForm::class => Form\ColumnsMakerBlockForm::class,
        ],
    ],
];

    