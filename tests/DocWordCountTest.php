<?php
 
use Haakym\WordCount\DocWordCount;
 
class DocWordCountTest extends PHPUnit_Framework_TestCase {
 
  public function testDocWordCountCanCountWordsInDocFile()
  {
    $docFile = __DIR__ . '/files/doc-file.doc';

    $docWordCount = new DocWordCount;
    
    $wordCount = $docWordCount->count($docFile);

    $this->assertEquals(244, $wordCount);
  }
 
}