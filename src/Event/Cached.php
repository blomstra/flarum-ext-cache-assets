<?php

namespace Blomstra\CacheAssets\Event;

class Cached
{
    /**
     * @var bool
     */
    public $js;
    /**
     * @var bool
     */
    public $css;
    /**
     * @var bool
     */
    public $locales;

    public function __construct(bool $js, bool $css, bool $locales)
    {
        $this->js = $js;
        $this->css = $css;
        $this->locales = $locales;
    }
}
