<?php
namespace ColumnMaker;

return [
    'view_manager' => [
        'template_path_stack' => [
            dirname(__DIR__) . '/view',
        ],
    ],
	'block_layouts' => [
        'factories' => [
            'column' => Service\BlockLayout\ColumnFactory::class,
        ],
    ],
	'form_elements' => [
        'invokables' => [
            Form\ColumnBlockForm::class => Form\ColumnBlockForm::class,
        ],
    ],
    'DefaultSettings' => [
        'ColumnBlockForm' => [
            'height' => '500px',
            'perPage' => 1,
            'bodyText' => '',
            'imgSrc' => '',
        ]
    ]
];

    