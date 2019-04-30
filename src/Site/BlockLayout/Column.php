<?php
namespace ColumnMaker\Site\BlockLayout;

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
     * @var HtmlPurifier
     */
    protected $htmlPurifier;
	
    /**
     * @param FormElementManager $formElementManager
     * @param array $defaultSettings
     */
    public function __construct(FormElementManager $formElementManager, array $defaultSettings, HtmlPurifier $htmlPurifier)
    {	
		
        $this->formElementManager = $formElementManager;
		$this->defaultSettings = $defaultSettings;
		$this->htmlPurifier = $htmlPurifier;
    }

	public function getLabel() {
		return 'Column Maker';
	}

	public function onHydrate(SitePageBlock $block, ErrorStore $errorStore)
    {
        $data = $block->getData();
        $html = isset($data['html']) ? $this->htmlPurifier->purify($data['html']) : '';
        $data['html'] = $html;
        $block->setData($data);
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

		$textarea = new Textarea("o:block[__blockIndex__][o:data][html]");
        $textarea->setAttribute('class', 'block-html full wysiwyg');
        if ($block) {
            $textarea->setAttribute('value', $block->dataValue('html'));
        }

		$html = '';
		$html .= $view->blockAttachmentsForm($block);
		$html .= '<a href="#" class="collapse" aria-label="collapse"><h4>' . $view->translate('Options'). '</h4></a>';
		$html .= '<div class="collapsible" style="padding-top:6px;">';
		$html .= $view->formCollection($form);
		$html .= $view->formRow($textarea);
        $html .= '</div>';
		return $html;
    }

	public function render(PhpRenderer $view, SitePageBlockRepresentation $block)
	{
		$attachments = $block->attachments();
        if (!$attachments) {
            return '';
		}
		
		return $view->partial('common/block-layout/column-maker', [
			'height' => $block->dataValue('height'),
			'perPage' => $block->dataValue('perPage'),
			'title' => $block->dataValue('title'),
		]);
	}
}
