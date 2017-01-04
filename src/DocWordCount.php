<?php

namespace Haakym\WordCount;

class DocWordCount
{
	public function count($file)
	{
		// open for reading
		$fileHandle = fopen($file, "r");
        
        // read up to length bytes from the file pointer referenced by handle
        $line = @fread($fileHandle, filesize($file));   

        // explode at chr(0x0D) == "\r"
        $lines = explode(chr(0x0D), $line);

		/*
        array_reduce($lines, function($result, $line) {
        	$pos = strpos($line, chr(0x00));

            if (($pos !== FALSE)||(strlen($line)==0)) {

            } else {
                $result .= $line." ";
            }

            return $result;
        }, "");
		*/

        $outtext = "";

        foreach($lines as $thisline) {
            $pos = strpos($thisline, chr(0x00));

            if (($pos !== FALSE)||(strlen($thisline)==0)) {

            } else {
                $outtext .= $thisline." ";
            }
        }

        $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/", "", $outtext);

        return str_word_count($outtext);
	}
}