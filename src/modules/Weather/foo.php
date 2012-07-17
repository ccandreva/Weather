<?php
        $xmlstr = file_get_contents('./zone-ny.xml');
        
        $doc = new SimpleXMLElement($xmlstr);
        print_r($doc);
        
print $doc->head->product->attributes()->{'concise-name'} . "\n";
print $doc->data->{'time-layout'}[1]->{'start-valid-time'}->attributes()->{'period-name'}
        . "\n";
$dataroot = $doc->{data};
$keynum = 1;
$timelayout = $dataroot->{'time-layout'}[$keynum];

foreach ($timelayout->{'start-valid-time'} as $s) {
        $n =  $s->attributes()->{'period-name'};
        print "$n\n";
}
