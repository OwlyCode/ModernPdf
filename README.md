ModernPdf
=========

The PHP 5.3, PSR Compliant, Pdf Generator

**Still in early development.** Only low level features are currently implemented
and they will probably be broken from time to time until a first stable branch
is released.

What's inside :
---------------

* Low Level file Structure
 * Objects (Strings, Dates, Names, Arrays, Dictionaries, Indirect References)
 * Streams
* Low level document structure
 * Trailer dictionary
 * Document information dictionary
 * Document catalog
 * Pages and Page Trees
* Low level graphics
 * Building and Painting paths (Line, Bézier curve, filled shapes)
 * Colors and color spaces
 * Transformations
 * Clipping
 * Image XObjects (Jpeg)
* Low level text and fonts
 * Type1 fonts
 * Text streams

What's not inside at the moment:
--------------------------------

* Filters.
* Incremental updates.
* Linearization.
* Transparency.
* Shadings and patterns.
* form XObjects.
* TrueType, Type3 and CID fonts.
* Document metadata and navigation.
* Encrypted documents.
* Image XObjects (Png, tiff, gif, bmp)

Todo before it's usable :
-------------------------

* Refactor FileRepresentation
* More image support
 * PNG Support.
 * Tiff Support.
 * Gif Support.
* Ensure the generated PDF is valid.
* Tests.
* Documentation.
* High level API.
