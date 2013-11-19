ModernPdf
=========

The PHP 5.3, PSR Compliant, Pdf Generator

**Still in early development.** Only low level features are currently implemented
and they will probably be broken from time to time until a first stable branch
is released.

What's inside :
---------------

* PDF\A compliant
 * PDF\A-1a
 * PDF\A-1b
* Low Level file Structure
 * Objects (Strings, Dates, Names, Arrays, Dictionaries, Indirect References)
 * Streams
* Low level document structure
 * Trailer dictionary
 * Document information dictionary
 * Document catalog
 * Pages and Page Trees
* Low level graphics
 * OutputIntent and ICC Embedding
 * Building and Painting paths (Line, Bézier curve, filled shapes)
 * Colors and color spaces
 * Transformations
 * Clipping
 * Image XObjects (Jpeg)
* Low level text and fonts
 * Type1, TrueType fonts
 * Text streams
* Metadata
 * DocumentInfo dictionary
 * XMP metadata stream
* Outlines
 * Annotations
  * Text
  * Hyperlink

What's not inside at the moment:
--------------------------------

A quick and quite raw list of non implemented features that **shall be implemented**
in the future days.

* Low level support
 * HexStrings (<> enclosed strings)
 * Document modification. It **will be** surely **included on the first release**.
 * Filters
 * Incremental updates
 * Linearization
 * Transparency
 * Shadings and patterns
 * form XObjects
 * Type0, MMType1, Type3 and CID fonts
 * Annotations
  * File
 * Encrypted documents
 * Image XObjects (Png, tiff, gif, bmp)
 * DocumentCatalog /Dests entry.
 * Document's name dictionary
 * Outlines on DocumentCatalog /Dests entry.
 * Outlines on Document's name dictionary.

* High level helpers
 * Document Parser
 * Page builder (pick a format and orientation, for instance.)
 * Text editor (Word wrapping, new page handling and styles.)
 * Table editor (Creating tables, filling cells)

Todo before it's usable :
-------------------------

* Code cleaning
 * DataStructure/Rectangle.
 * DataStructure/NameTree.
 * DataStructure/NumberTree.
 * Dispatch objects.
 * Dispatch types and check them in the specification.
* Tests
* Documentation
* High level API
