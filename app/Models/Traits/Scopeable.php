<?php
namespace App\Models\Traits;

trait Scopeable
{
    public static function getByCriteria(array $criteria = [])
    {
        $model = null;

        foreach ($criteria as $key => $value) {
            
            $key = self::camelise($key);

            if (!method_exists(self::class, "scope{$key}")) {
                continue;
            }
            
            if (!$model) {
                $model = self::$key($value);
                continue;
            }

            $model = $model->{$key}($value);
        }

        return $model ? $model->get() : self::get();
    }

    private static function camelise(string $string = '')
    {
        return str_replace('_', '', ucwords($string, '_'));
    }
}