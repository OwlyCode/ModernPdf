<?php
/**
 * This is a sample file to illustrate how it works at low level.
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
use \ModernPdf\Builder\ImageBuilder;
use \ModernPdf\Builder\IccBuilder;
use \ModernPdf\Builder\TrueTypeBuilder;

use \ModernPdf\Outputer;
use \ModernPdf\Model\Object   as Object;
use \ModernPdf\Model\Type     as Type;
use \ModernPdf\Model\Resource as Resource;

$builder  = new FileBuilder();

$file = $builder->getFile();

$trueTypeBuilder = new TrueTypeBuilder();
$trueTypeBuilder->load('freeMono');
$fontStream = $trueTypeBuilder->buildFontStream(11);
$encoding   = $trueTypeBuilder->buildEncoding(12);
$widths     = $trueTypeBuilder->buildWidths(13);
$descriptor = $trueTypeBuilder->buildFontDescriptor($fontStream, 14);
$font       = $trueTypeBuilder->buildFont($descriptor, $encoding, $widths, 15);



$pagetree = new Object\PageTree(1);
$page = new Object\Page(2);
$pagetree->addKid(new Type\PdfIndirectReference($page));

$iccBuilder = new IccBuilder();
$iccBuilder->loadFile(__DIR__ . '/AdobeRGB1998.icc');

$iccProfile = $iccBuilder->build(9);

$outputIntent = new Object\OutputIntent(10);
$outputIntent->setSubType(new Type\PdfName('GTS_PDFA1'));
$outputIntent->setOutputConditionIdentifier(new Type\PdfString('sRGB v4'));
$outputIntent->setRegistryName(new Type\PdfString('http://www.color.org/'));
$outputIntent->setDestOutputProfile(new Type\PdfIndirectReference($iccProfile));

$imageBuilder = new ImageBuilder();
$imageBuilder->loadFile(__DIR__ . '/modern.jpg');


$image = $imageBuilder->build(7);

$resource = new Object\Resource(3);
$resource->addFont("F0", new Type\PdfIndirectReference($font));
$resource->addImage("X2", new Type\PdfIndirectReference($image));

$page->setResource(new Type\PdfIndirectReference($resource));

$content = new Object\Stream(4);
$streamBuilder = new StreamBuilder($content);


$streamBuilder->getStateWriter()
    ->saveGraphicState()
    ->addTranslation(0, 732)
    ->addScaling(211, 54);

$streamBuilder->getPathWriter()
    ->image(new Type\PdfName('X2'));

$streamBuilder->getStateWriter()
    ->restoreGraphicState()
    ->addTranslation(251, 768);

$streamBuilder->getTextWriter()
    ->openTextSection()
    ->setFont(new Type\PdfName('F0'), 26)
    ->setLeading(36)
    ->setRenderingMode(StreamBuilder::RENDERING_MODE_STROKE)
    ->printLnText(new Type\PdfString('Hello, World, this is so cool !'))
    ->printText(new Type\PdfString('This is a new line.'))
    ->closeTextSection();


$page->addContent(new Type\PdfIndirectReference($content));

$creationDate = new Type\PdfDate(new \DateTime('NOW'));

$metadata = new Object\XmpMetadata(8);
$metadata->addMetadata('dc:creator', array('ModernPdf'), 'rdf:Seq');
$metadata->addMetadata('pdfaid:conformance', 'A');
$metadata->addMetadata('pdfaid:part', '3');
$metadata->addMetadata('xmp:CreateDate', $creationDate->__toMetadata());
$metadata->addMetadata('xmp:CreatorTool', 'ModernPdf');

$infos = new Object\DocumentInformation(6);
$infos->setCreationDate($creationDate);

$infos->setCreator(new Type\PdfString('ModernPdf'));

$catalog = new Object\DocumentCatalog(5);
$catalog->setPageTree(new Type\PdfIndirectReference($pagetree));
$catalog->setMetadata(new Type\PdfIndirectReference($metadata));
$catalog->setMarkInfo(true);
$catalog->addOutputIntent(new Type\PdfIndirectReference($outputIntent));

$dest = new Type\PdfDestination();
$dest->setFit(new Type\PdfIndirectReference($page));

$outlineDictionary = new Object\OutlineDictionary(17);
$outlineDictionary->setTitle(new Type\PdfString("The first page."));
$outlineDictionary->setCount(0);
$outlineDictionary->setDest($dest);

$outlines = new Object\Outlines(16);
$outlines->setFirst(new Type\PdfIndirectReference($outlineDictionary));
$outlines->setLast(new Type\PdfIndirectReference($outlineDictionary));
$outlines->setCount(1);
$outlineDictionary->setParent(new Type\PdfIndirectReference($outlines));
$catalog->setOutlines(new Type\PdfIndirectReference($outlines));

$textAnnotation = new Object\TextAnnotation(17);
$textAnnotation->setContents(new Type\PdfString('This is an annotation.'));
$textAnnotation->setRect(new Type\PdfArray(array(0, 700, 800, 800)));
$page->addAnnot(new Type\PdfIndirectReference($textAnnotation));

$file->addObject($pagetree);
$file->addObject($page);
$file->addObject($resource);
$file->addObject($content);
$file->addObject($catalog);
$file->addObject($infos);
$file->addObject($image);
$file->addObject($metadata);
$file->addObject($iccProfile);
$file->addObject($outputIntent);
$file->addObject($fontStream);
$file->addObject($encoding);
$file->addObject($widths);
$file->addObject($descriptor);
$file->addObject($font);
$file->addObject($outlines);
$file->addObject($outlineDictionary);
$file->addObject($textAnnotation);

$file->setDocumentCatalog($catalog);
$file->setDocumentInformation($infos);

$file->prepare();

$outputer = new Outputer();
//echo $outputer->output($file);
file_put_contents("test.pdf", $outputer->output($file));
