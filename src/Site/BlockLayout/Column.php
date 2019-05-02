<?php
namespace ColumnMaker\Site\BlockLayout;

use Omeka\View\Helper\HtmlElement;
use Omeka\Api\Representation\SiteRepresentation;
use Omeka\Api\Representation\SitePageRepresentation;
use Omeka\Api\Representation\SitePageBlockRepresentation;
use Omeka\Site\BlockLayout\AbstractBlockLayout;
use Zend\View\Renderer\PhpRenderer;

use Zend\Form\FormElementManager;

use ColumnMaker\Form\ColumnBlockForm;

class Column extends AbstractBlockLayout
{	
	/**
     * @var FormElementManager
     */
    protected $formElementManager;

    /**
     * @var array
     */
	protected $defaultSettings = [];
	
    /**
     * @param FormElementManager $formElementManager
     * @param array $defaultSettings
     */
    public function __construct(FormElementManager $formElementManager, array $defaultSettings)
    {	
		
        $this->formElementManager = $formElementManager;
		$this->defaultSettings = $defaultSettings;
    }

	public function getLabel() {
		return 'Column Maker';
	}


	public function form(PhpRenderer $view, SiteRepresentation $site,
        SitePageRepresentation $page = null, SitePageBlockRepresentation $block = null
    ) {
		$form = $this->formElementManager->get(ColumnBlockForm::class);
		$data = $block
			? $block->data() + $this->defaultSettings
			: $this->defaultSettings;
		$form->setData([
			'o:block[__blockIndex__][o:data][height]' => $data['height'],
			'o:block[__blockIndex__][o:data][perPage]' => $data['perPage'],
			'o:block[__blockIndex__][o:data][title]' => $data['title'],
		]);
		
		$form->prepare();

		$html = '';
		// $html .= $view->blockAttachmentsForm($block);
		$html .= '<a href="#" class="collapse" aria-label="collapse"><h4>' . $view->translate('Options'). '</h4></a>';
		$html .= '<div class="collapsible" style="padding-top:6px;">';
		$html .= $view->formCollection($form);
        $html .= '</div>';
		return $html;
    }

	public function render(PhpRenderer $view, SitePageBlockRepresentation $block)
	{
		// $attachments = $block->attachments();
        // if (!$attachments) {
        //     return '';
		// }
		
		return $view->partial('common/block-layout/column-maker', [
			'height' => $block->dataValue('height'),
			'perPage' => $block->dataValue('perPage'),
			'title' => $block->dataValue('title'),
		]);
	}	
}
