<?php

namespace app\utils;

class Text
{
    private static $_texts = [];

    public static function get($key, array $data = [])
    {
        if(empty(self::$_texts))
        {
            $texts = Config::get("TEXTS");
            self::$_texts = is_array($texts) ? $texts : [];
        }

        if(array_key_exists($key, self::$_texts))
        {
            $text = self::$_texts[$key];
            foreach($data as $search => $replace)
            {
                $text = str_replace($search, $replace, $text);
            }
            return $text;
        }
        return "";
    }
}