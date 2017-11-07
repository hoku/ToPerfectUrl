<?php

require_once('class/ToPerfectUrl.php');


$results = [];
$results[] = doTest('http://example.com');
$results[] = doTest('http://example.com/');
$results[] = doTest('http://example.com/aaa/../');
$results[] = doTest('http://example.com/aaa/../bbb');
$results[] = doTest('http://example.com/aaa/bbb/../ccc');
$results[] = doTest('http://example.com/aaa/bbb/../../ccc');
$results[] = doTest('http://example.com/aaa/bbb/../ccc/../ddd');
$results[] = doTest('http://example.com/aaa/bbb/ccc/../ddd/../../eee');
$results[] = doTest('http://example.com/aaa/../ccc/./ddd');
$results[] = doTest('http://example.com/aaa/../ccc/./././ddd');
$results[] = doTest('http://example.com/../../../../aaa');
$results[] = doTest('http://example.com/aaa/../../../../');
$results[] = doTest('http://example.com/aaa/../../../../bbb');
$results[] = doTest('http://example.com/aaa/../ccc?sample=xxx/../yyy/../../zzz&sample2=abc');
$results[] = doTest('http://example.com:80/aaa/../ccc');
$results[] = doTest('https://example.com/aaa/../ccc');
$results[] = doTest('ftp://example.com/aaa/../ccc');
$results[] = doTest('abc://example.com/aaa/../ccc');
$results[] = doTest('/var/www/html/../../aaa');

var_dump($results);


function doTest($url) {
    $afterUrl = ToPerfectUrl::convert($url);
    return [
        'before' => $url,
        'after'  => $afterUrl
    ];
}
