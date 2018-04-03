
# 概要

URLの文字列内にある相対指定を除去します。  
具体的には `./` と `../` です。  
http://〜、https://〜、ftp://〜、で始まるURL文字列のみに対応しています。


# 使い方

超簡単です。  
ToPerfectUrl.php をインクルードすれば使えます。

    require_once('class/ToPerfectUrl.php');
    $convertedUrl = ToPerfectUrl::convert('http://example.com/aaa/../bbb');
    echo $convertedUrl;
    // http://example.com/bbb になる！


# 実行結果

以下のようにURLの文字列が変換されます。  
（これは sample.php を実行した結果です）

    ["before"]=>
    string(18) "http://example.com"
    ["after"]=>
    string(18) "http://example.com"
    
    ["before"]=>
    string(19) "http://example.com/"
    ["after"]=>
    string(19) "http://example.com/"
    
    ["before"]=>
    string(26) "http://example.com/aaa/../"
    ["after"]=>
    string(19) "http://example.com/"
    
    ["before"]=>
    string(29) "http://example.com/aaa/../bbb"
    ["after"]=>
    string(22) "http://example.com/bbb"
    
    ["before"]=>
    string(33) "http://example.com/aaa/bbb/../ccc"
    ["after"]=>
    string(26) "http://example.com/aaa/ccc"
    
    ["before"]=>
    string(36) "http://example.com/aaa/bbb/../../ccc"
    ["after"]=>
    string(22) "http://example.com/ccc"
    
    ["before"]=>
    string(40) "http://example.com/aaa/bbb/../ccc/../ddd"
    ["after"]=>
    string(26) "http://example.com/aaa/ddd"
    
    ["before"]=>
    string(47) "http://example.com/aaa/bbb/ccc/../ddd/../../eee"
    ["after"]=>
    string(26) "http://example.com/aaa/eee"
    
    ["before"]=>
    string(35) "http://example.com/aaa/../ccc/./ddd"
    ["after"]=>
    string(26) "http://example.com/ccc/ddd"
    
    ["before"]=>
    string(39) "http://example.com/aaa/../ccc/./././ddd"
    ["after"]=>
    string(26) "http://example.com/ccc/ddd"
    
    ["before"]=>
    string(34) "http://example.com/../../../../aaa"
    ["after"]=>
    string(22) "http://example.com/aaa"
    
    ["before"]=>
    string(35) "http://example.com/aaa/../../../../"
    ["after"]=>
    string(19) "http://example.com/"
    
    ["before"]=>
    string(38) "http://example.com/aaa/../../../../bbb"
    ["after"]=>
    string(22) "http://example.com/bbb"
    
    ["before"]=>
    string(69) "http://example.com/aaa/../ccc?sample=xxx/../yyy/../../zzz&sample2=abc"
    ["after"]=>
    string(62) "http://example.com/ccc?sample=xxx/../yyy/../../zzz&sample2=abc"
    
    ["before"]=>
    string(32) "http://example.com:80/aaa/../ccc"
    ["after"]=>
    string(25) "http://example.com:80/ccc"
    
    ["before"]=>
    string(30) "https://example.com/aaa/../ccc"
    ["after"]=>
    string(23) "https://example.com/ccc"
    
    ["before"]=>
    string(28) "ftp://example.com/aaa/../ccc"
    ["after"]=>
    string(21) "ftp://example.com/ccc"
    
    ["before"]=>
    string(28) "abc://example.com/aaa/../ccc"
    ["after"]=>
    bool(false)
    
    ["before"]=>
    string(23) "/var/www/html/../../aaa"
    ["after"]=>
    bool(false)


# ライセンス

MIT License です。
