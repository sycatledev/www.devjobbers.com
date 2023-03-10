<?php

namespace AsaP\Utils;

class Utils {

    public static function clearFormat(string $toFormat) : string
    {
        $formattedText = htmlspecialchars($toFormat);

        return $formattedText;
    }

    public static function toSlug($toFormat): string 
    {
        $formattedText = trim(
            preg_replace(
                '/[\s-]+/', '-', 
                preg_replace('/[^A-Za-z0-9-]+/', '-', 
                preg_replace('/[&]/', 'and', 
                preg_replace('/[\']/', '', 
                iconv('UTF-8', 'ASCII//TRANSLIT', 
                $toFormat
            ))))), 
            '-'
        );

        return $formattedText;
    }

    public static function generateUUIDV4() : string
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for the time_low
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            // 16 bits for the time_mid
            mt_rand(0, 0xffff),
            // 16 bits for the time_hi,
            mt_rand(0, 0x0fff) | 0x4000,

            // 8 bits and 16 bits for the clk_seq_hi_res,
            // 8 bits for the clk_seq_low,
            mt_rand(0, 0x3fff) | 0x8000,
            // 48 bits for the node
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

}

?>