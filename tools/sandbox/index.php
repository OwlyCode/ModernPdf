<?php
/**
 * This is a sample file to illustrate how it works.
 *
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

$loaderPath = __DIR__ . '/../../vendor/autoload.php';
if (!is_readable($loaderPath)) {
    throw new LogicException('Run php composer.phar install at first');
}
$loader = require $loaderPath;

use \ModernPdf\Builder;
use \ModernPdf\Outputer;

$builder  = new Builder();

$file = $builder->getFile();

$pagetree = new \ModernPdf\Model\Object\PageTree(1);
$page = new \ModernPdf\Model\Object\Page(2);
$pagetree->addKid(new \ModernPdf\Model\Type\PdfIndirectReference($page));

$resource = new \ModernPdf\Model\Object\Resource(3);
$resource->addFont("F0", new \ModernPdf\Model\Resource\Font\Times());

$page->setResource(new \ModernPdf\Model\Type\PdfIndirectReference($resource));

$content = new \ModernPdf\Model\Object\Stream(4);
$page->addContent(new \ModernPdf\Model\Type\PdfIndirectReference($content));

$catalog = new \ModernPdf\Model\Object\DocumentCatalog(5);
$catalog->setPageTree(new \ModernPdf\Model\Type\PdfIndirectReference($pagetree));

$file->addObject($pagetree);
$file->addObject($page);
$file->addObject($resource);
$file->addObject($content);
$file->addObject($catalog);

$outputer = new Outputer();
echo $outputer->output($file);
file_put_contents("test.pdf", $outputer->output($file));
