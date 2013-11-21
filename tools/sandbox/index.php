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

use \ModernPdf\Component\ContentStream;
use \ModernPdf\Component\FileStructure;
use \ModernPdf\Component\DocumentStructure;
use \ModernPdf\Component\DataStructure;
use \ModernPdf\Component\ObjectType;

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
$pagetreeData->addKid(new ObjectType\PdfIndirectReference($page));
$pageData->setParent(new ObjectType\PdfIndirectReference($pagetree));

$iccBuilder = new IccBuilder();
$iccBuilder->loadFile(__DIR__ . '/AdobeRGB1998.icc');

$iccProfile = new FileStructure\Object(9, 0, $iccBuilder->build());

$outputIntentData = new DocumentStructure\OutputIntent();
$outputIntentData->setSubType(new ObjectType\PdfName('GTS_PDFA1'));
$outputIntentData->setOutputConditionIdentifier(new ObjectType\PdfString('sRGB v4'));
$outputIntentData->setRegistryName(new ObjectType\PdfString('http://www.color.org/'));
$outputIntentData->setDestOutputProfile(new ObjectType\PdfIndirectReference($iccProfile));
$outputIntent = new FileStructure\Object(10, 0, $outputIntentData);

$imageBuilder = new ImageBuilder();
$imageBuilder->loadFile(__DIR__ . '/modern.jpg');


$image = new FileStructure\Object(7, 0, $imageBuilder->build());

$resourceData = new ContentStream\Resource();
$resourceData->addFont("F0", new ObjectType\PdfIndirectReference($font));
$resourceData->addImage("X2", new ObjectType\PdfIndirectReference($image));
$resource = new FileStructure\Object(3, 0, $resourceData);

$pageData->setResource(new ObjectType\PdfIndirectReference($resource));

$contentData = new ObjectType\PdfStream();
$streamBuilder = new StreamBuilder($contentData);
$content = new FileStructure\Object(4, 0, $contentData);

$streamBuilder->getStateWriter()
    ->saveGraphicState()
    ->addTranslation(0, 732)
    ->addScaling(211, 54);

$streamBuilder->getPathWriter()
    ->image(new ObjectType\PdfName('X2'));

$streamBuilder->getStateWriter()
    ->restoreGraphicState()
    ->addTranslation(251, 768);

$streamBuilder->getTextWriter()
    ->openTextSection()
    ->setFont(new ObjectType\PdfName('F0'), 26)
    ->setLeading(36)
    ->setRenderingMode(StreamBuilder::RENDERING_MODE_STROKE)
    ->printLnText(new ObjectType\PdfString('Hello, World, this is so cool !'))
    ->printText(new ObjectType\PdfString('This is a new line.'))
    ->closeTextSection();


$pageData->addContent(new ObjectType\PdfIndirectReference($content));

$creationDate = new DataStructure\PdfDate(new \DateTime('NOW'));

$metadataData = new ContentStream\XmpMetadata();
$metadataData->addMetadata('dc:creator', array('ModernPdf'), 'rdf:Seq');
$metadataData->addMetadata('pdfaid:conformance', 'A');
$metadataData->addMetadata('pdfaid:part', '3');
$metadataData->addMetadata('xmp:CreateDate', $creationDate->__toMetadata());
$metadataData->addMetadata('xmp:CreatorTool', 'ModernPdf');
$metadata = new FileStructure\Object(8, 0, $metadataData);

$infosData = new DocumentStructure\Metadata\DocumentInformation();
$infosData->setCreationDate($creationDate);
$infosData->setCreator(new ObjectType\PdfString('ModernPdf'));
$infos = new FileStructure\Object(6, 0, $infosData);

$catalogData = new DocumentStructure\DocumentCatalog();
$catalogData->setPageTree(new ObjectType\PdfIndirectReference($pagetree));
$catalogData->setMetadata(new ObjectType\PdfIndirectReference($metadata));
$catalogData->setMarkInfo(true);
$catalogData->addOutputIntent(new ObjectType\PdfIndirectReference($outputIntent));
$catalog = new FileStructure\Object(5, 0, $catalogData);

$dest = new DataStructure\PdfDestination();
$dest->setFit(new ObjectType\PdfIndirectReference($page));

$outlineDictionaryData = new DocumentStructure\Outline\OutlineDictionary();
$outlineDictionaryData->setTitle(new ObjectType\PdfString("The first page."));
$outlineDictionaryData->setCount(0);
$outlineDictionaryData->setDest($dest);
$outlineDictionary = new FileStructure\Object(17, 0, $outlineDictionaryData);

$outlinesData = new DocumentStructure\Outline\Outlines();
$outlinesData->setFirst(new ObjectType\PdfIndirectReference($outlineDictionary));
$outlinesData->setLast(new ObjectType\PdfIndirectReference($outlineDictionary));
$outlinesData->setCount(1);
$outlines = new FileStructure\Object(16, 0, $outlinesData);
$outlineDictionaryData->setParent(new ObjectType\PdfIndirectReference($outlines));
$catalogData->setOutlines(new ObjectType\PdfIndirectReference($outlines));

$textAnnotationData = new DocumentStructure\Annotation\TextAnnotation();
$textAnnotationData->setContents(new ObjectType\PdfString('This is an annotation.'));
$textAnnotationData->setRect(new ObjectType\PdfArray(array(0, 700, 800, 800)));
$textAnnotation = new FileStructure\Object(18, 0, $outlinesData);
$pageData->addAnnot(new ObjectType\PdfIndirectReference($textAnnotation));

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
