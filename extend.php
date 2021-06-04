<?php

namespace Blomstra\CacheAssets;

use Blomstra\CacheAssets\Command\CacheAssetsCommand;
use Flarum\Extend;

return [
    (new Extend\Console)
        ->command(CacheAssetsCommand::class),
];
