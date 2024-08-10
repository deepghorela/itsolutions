<?php

use App\Models\Setting;


/**
 * Settings
 *
 * @param string $key
 * @param null $default
 * @return string
 */
function setting($key, $default = null)
{
    $settings = Setting::getSettings();
    $settingCache = array();

    foreach ($settings as $setting) {
        $keys = explode('.', $setting->key);
        $settingCache[$keys[0]][$keys[1]] = $setting->value;
    }

    $parts = explode('.', $key);

    if (count($parts) == 2) {
        return isset($settingCache[$parts[0]][$parts[1]]) ? $settingCache[$parts[0]][$parts[1]]: $default;
    } else {
        return isset($settingCache[$parts[0]]) ? $settingCache[$parts[0]]: $default;
    }
}
