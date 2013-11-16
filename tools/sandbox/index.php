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

use \ModernPdf\FileBuilder;
use \ModernPdf\Builder\StreamBuilder;
use \ModernPdf\Outputer;
use \ModernPdf\Model\Object   as Object;
use \ModernPdf\Model\Type     as Type;
use \ModernPdf\Model\Resource as Resource;

$builder  = new FileBuilder();

$file = $builder->getFile();

$pagetree = new Object\PageTree(1);
$page = new Object\Page(2);
$pagetree->addKid(new Type\PdfIndirectReference($page));

$resource = new Object\Resource(3);
$resource->addFont("F0", new Resource\Font\Times());

$page->setResource(new Type\PdfIndirectReference($resource));

$content = new Object\Stream(4);
$streamBuilder = new StreamBuilder($content);

$streamBuilder->getStateWriter()
    ->addRotation(1/4)
    ->addTranslation(200, 500);
$streamBuilder->getTextWriter()
    ->openTextSection()
    ->setFont(new Type\PdfName('F0'), 36)
    ->setLeading(46)
    ->setRenderingMode(StreamBuilder::RENDERING_MODE_STROKE)
    ->printLnText(new Type\PdfString('Hello, World, this is so cool !'))
    ->printText(new Type\PdfString('This is a new line.'))
    ->closeTextSection();

$page->addContent(new Type\PdfIndirectReference($content));

$catalog = new Object\DocumentCatalog(5);
$catalog->setPageTree(new Type\PdfIndirectReference($pagetree));

$infos = new Object\DocumentInformation(6);
$infos->setCreationDate(new Type\PdfDate(new \DateTime('NOW')));
$infos->setCreator(new Type\PdfString('ModernPdf'));


$file->addObject($pagetree);
$file->addObject($page);
$file->addObject($resource);
$file->addObject($content);
$file->addObject($catalog);
$file->addObject($infos);
$file->setDocumentCatalog($catalog);
$file->setDocumentInformation($infos);

$file->prepare();

$outputer = new Outputer();
echo $outputer->output($file);
file_put_contents("test.pdf", $outputer->output($file));
