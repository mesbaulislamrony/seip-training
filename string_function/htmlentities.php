<?php
/* htmlentities — Convert all applicable characters to HTML entities */
/* string htmlentities ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]])*/
/*
ENT_COMPAT		Will convert double-quotes and leave single-quotes alone.
ENT_QUOTES		Will convert both double and single quotes.
ENT_NOQUOTES 	Will leave both double and single quotes unconverted.
ENT_IGNORE		Silently discard invalid code unit sequences instead of returning an empty string. Using this flag is discouraged as it » may have security implications.
ENT_SUBSTITUTE 	Replace invalid code unit sequences with a Unicode Replacement Character U+FFFD (UTF-8) or &#FFFD; (otherwise) instead of returning an empty string.
ENT_DISALLOWED 	Replace invalid code points for the given document type with a Unicode Replacement Character U+FFFD (UTF-8) or &#FFFD; (otherwise) instead of leaving them as is. This may be useful, for instance, to ensure the well-formedness of XML documents with embedded external content.
ENT_HTML401 	Handle code as HTML 4.01.
ENT_XML1 		Handle code as XML 1.
ENT_XHTML 		Handle code as XHTML.
ENT_HTML5 		Handle code as HTML 5. 
*/

	$str = "A 'quote' is <b>bold</b>";
	echo htmlentities($str)."<br>";			// Outputs: A 'quote' is &lt;b&gt;bold&lt;/b&gt;
	echo htmlentities($str, ENT_QUOTES);	// Outputs: A &#039;quote&#039; is &lt;b&gt;bold&lt;/b&gt;

?>