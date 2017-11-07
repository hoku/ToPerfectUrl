<?php
/**
 *	ToPerfectUrl
 *
 *	@license	MIT License
 *	@author		hoku
 *	@copyright	hoku
 */

class ToPerfectUrl {

    public static function convert($sourceUrl) {
        if (!preg_match("/^(https?|ftp):\\/\\//",$sourceUrl)) {
            return false;
        }

        list($beforeUrl, $params) = explode('?', $sourceUrl, 2);

        $parts = explode('/', $beforeUrl);
        for ($i = 4; $i < count($parts); $i++) {
            if ($parts[$i] !== '..') { continue; }

            array_splice($parts, $i-1, 2);
            $i = 4;
        }

        $afterUrl = implode('/', $parts);
        $afterUrl = str_replace('../', '', $afterUrl);
        $afterUrl = str_replace('./' , '', $afterUrl);

        if ($params) {
            $afterUrl .= '?' . $params;
        }
        return $afterUrl;
    }

}
