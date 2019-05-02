<?php
namespace ColumnMaker\Service\BlockLayout;

use Interop\Container\ContainerInterface;
use ColumnMaker\Site\BlockLayout\Column;
use Zend\ServiceManager\Factory\FactoryInterface;

class ColumnFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $services, $requestedName, array $options = null)
	{
		return new Column(
			$services->get('FormElementManager'),
			$services->get('Config')['DefaultSettings']['ColumnBlockForm']
		);
	}
}
?>