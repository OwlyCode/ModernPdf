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
require $loaderPath;

use ModernPdf\Component\ObjectType\PdfDate;
use ModernPdf\Component\ObjectType\PdfDestination;
use ModernPdf\Component\ObjectType\PdfStream;
use \ModernPdf\Builder\IccBuilder;
use \ModernPdf\Builder\ImageBuilder;
use \ModernPdf\Builder\StreamBuilder;
use \ModernPdf\Builder\TrueTypeBuilder;
use \ModernPdf\Component\ContentStream;
use \ModernPdf\Component\DocumentStructure;
use \ModernPdf\Component\FileStructure;
use \ModernPdf\FileBuilder;
use \ModernPdf\Outputer;

$builder  = new FileBuilder();

$file = $builder->getFile();

$trueTypeBuilder = new TrueTypeBuilder();
$trueTypeBuilder->load('freeMono');
$fontStream = new FileStructure\Object(11, 0, $trueTypeBuilder->buildFontStream());
$encoding   = new FileStructure\Object(12, 0, $trueTypeBuilder->buildEncoding());
$widths     = new FileStructure\Object(13, 0, $trueTypeBuilder->buildWidths());
$descriptor = new FileStructure\Object(14, 0, $trueTypeBuilder->buildFontDescriptor($fontStream));
$font       = new FileStructure\Object(15, 0, $trueTypeBuilder->buildFont($descriptor, $encoding, $widths));

// Pages construction.
$pagetreeData = new DocumentStructure\Page\PageTree();
$pagetree = new FileStructure\Object(1, 0, $pagetreeData);
$pageData = new DocumentStructure\Page\Page();
$page = new FileStructure\Object(2, 0, $pageData);
$pagetreeData->addKid($page);
$pageData->setParent($pagetree);

$iccBuilder = new IccBuilder();
$iccBuilder->loadFile(__DIR__ . '/AdobeRGB1998.icc');

$iccProfile = new FileStructure\Object(9, 0, $iccBuilder->build());

$outputIntentData = new DocumentStructure\OutputIntent();
$outputIntentData->setSubType('GTS_PDFA1');
$outputIntentData->setOutputConditionIdentifier('sRGB v4');
$outputIntentData->setRegistryName('http://www.color.org/');
$outputIntentData->setDestOutputProfile($iccProfile);
$outputIntent = new FileStructure\Object(10, 0, $outputIntentData);

$imageBuilder = new ImageBuilder();
$imageBuilder->loadFile(__DIR__ . '/modern.jpg');

$image = new FileStructure\Object(7, 0, $imageBuilder->build());

$resourceData = new ContentStream\Resource();
$resourceData->addFont("F0", $font);
$resourceData->addImage("X2", $image);
$resource = new FileStructure\Object(3, 0, $resourceData);

$pageData->setResource($resource);

$contentData = new PdfStream();
$streamBuilder = new StreamBuilder($contentData);
$content = new FileStructure\Object(4, 0, $contentData);

$streamBuilder
    ->getStateWriter()
    ->saveGraphicState()
    ->addTranslation(0, 732)
    ->addScaling(211, 54)
;

$streamBuilder
    ->getPathWriter()
    ->image('X2')
;

$streamBuilder
    ->getStateWriter()
    ->restoreGraphicState()
    ->addTranslation(251, 768)
;

$streamBuilder
    ->getTextWriter()
    ->openTextSection()
    ->setFont('F0', 26)
    ->setLeading(36)
    ->setRenderingMode(StreamBuilder::RENDERING_MODE_STROKE)
    ->printLnText('Hello, World, this is so cool !')
    ->printText('This is a new line.')
    ->closeTextSection()
;


$pageData->addContent($content);

$creationDate = new PdfDate(new \DateTime('NOW'));

$metadataData = new ContentStream\XmpMetadata();
$metadataData->addMetadata('dc:creator', array('ModernPdf'), 'rdf:Seq');
$metadataData->addMetadata('pdfaid:conformance', 'A');
$metadataData->addMetadata('pdfaid:part', '3');
$metadataData->addMetadata('xmp:CreateDate', $creationDate->__toMetadata());
$metadataData->addMetadata('xmp:CreatorTool', 'ModernPdf');
$metadata = new FileStructure\Object(8, 0, $metadataData);

$infosData = new DocumentStructure\Metadata\DocumentInformation();
$infosData->setCreationDate($creationDate);
$infosData->setCreator('ModernPdf');
$infos = new FileStructure\Object(6, 0, $infosData);

$catalogData = new DocumentStructure\DocumentCatalog();
$catalogData->setPageTree($pagetree);
$catalogData->setMetadata($metadata);
$catalogData->mark(true);
$catalogData->addOutputIntent($outputIntent);
$catalog = new FileStructure\Object(5, 0, $catalogData);

$outlineDictionaryData = new DocumentStructure\Outline\OutlineDictionary();
$outlineDictionaryData->setTitle("The first page.");
$outlineDictionaryData->setCount(0);
$outlineDictionaryData->setDest(PdfDestination::fromFit($page));
$outlineDictionary = new FileStructure\Object(17, 0, $outlineDictionaryData);

$outlinesData = new DocumentStructure\Outline\Outlines();
$outlinesData->setFirst($outlineDictionary);
$outlinesData->setLast($outlineDictionary);
$outlinesData->setCount(1);
$outlines = new FileStructure\Object(16, 0, $outlinesData);
$outlineDictionaryData->setParent($outlines);
$catalogData->setOutlines($outlines);

$textAnnotationData = new DocumentStructure\Annotation\TextAnnotation();
$textAnnotationData->setContent('This is an annotation.');
$textAnnotationData->setRect([0, 700, 800, 800]);
$textAnnotationData->setTextLabel("Lol");
$textAnnotation = new FileStructure\Object(18, 0, $textAnnotationData);
$pageData->addAnnot($textAnnotation);

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
file_put_contents("test.pdf", $outputer->output($file));
