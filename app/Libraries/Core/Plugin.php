<?php

namespace App\Libraries\Core;

class Plugin
{
    private array $plugins;

    public function get(?string $position = null)
    {
        return $this->plugins;
    }

    public function set($keys)
    {
    }

    /**
     * setup used plugins
     * @param string $key plugin group key
     * @param array $plugins plugin array [url, css/js), head/foot)]
     */
    protected function plugin(string $key, array $plugins)
    {
        $values = array();
        foreach ($plugins as $plug) {
            $truevalue = true;
            $pluginval = array(
                'url'      => $plug[0] ?? 0,
                'type'     => $plug[1] ?? 'false',
                'position' => $plug[2] ?? null
            );
            if (!is_string($pluginval['url']))
                $truevalue = false;
            if (
                !is_string($pluginval['type']) ||
                !in_array($pluginval['type'], ['css', 'js'])
            )   $truevalue = false;
            if (
                !is_string($pluginval['position']) ||
                !in_array($pluginval['position'], ['head', 'foot'])
            )   $truevalue = false;

            if ($truevalue) $values[] = $pluginval;
        }
        if (!empty($values)) $this->plugins[$key] = $values;
    }
}
