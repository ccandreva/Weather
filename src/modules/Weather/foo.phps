<?php
        $xmlstr = file_get_contents('./zone-ny.xml');
        
        $doc = new SimpleXMLElement($xmlstr);
        print_r($doc);
        
print $doc->head->product->attributes()->{'concise-name'} . "\n";
#print $doc->dog[1]->attributes()->breed . "\n";
