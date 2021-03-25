<?php

namespace ArrayHelper;

class ArrayHelper
{
    public static function keepKeys($array, $keysToKeep = [])
    {
        return array_filter(
          $array,
          function ($value, $key) use ($keysToKeep) {
              return in_array($key, $keysToKeep);
          },
          ARRAY_FILTER_USE_BOTH
        );
    }
}