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
            Form\ColumnsBlockForm::class => Form\ColumnsBlockForm::class,
        ],
    ],
];

    