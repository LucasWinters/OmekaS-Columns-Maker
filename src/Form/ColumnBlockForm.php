<?php
namespace ColumnMaker\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class ColumnBlockForm extends Form
{
	public function init()
	{
		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][height]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Column Height',
                'info' => 'Please enter a number as CSS units.',
            ],
		]);
		
		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][perPage]',
            'type' => Element\Number::class,
            'options' => [
				'label' => 'Number of Columns',
				'info' => 'The number of columns to be made.'
			],
			'attributes' => [
				'min' => 1,
                'max' => 5,
			]
		]);
		
		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][bodyText]',
			'type' => Element\Text::class,
            'options' => [
				'label' => 'Body Text (optional)',
			]
		]);

		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][imgSrc]',
			'type' => Element\Text::class,
            'options' => [
				'label' => 'Link to Image (optional)',
			]
		]);

		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][hyLink]',
			'type' => Element\Text::class,
            'options' => [
				'label' => 'HyperLink for Columns',
			]
		]);
	}
}