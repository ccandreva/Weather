<?php
//        $xmlstr = file_get_contents('./zone-ny.xml');
        $xmlstr = file_get_contents('http://forecast.weather.gov/MapClick.php?lat=41.02090&lon=-73.75740&FcstType=dwml');
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
	