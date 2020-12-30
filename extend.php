<?php

namespace Bokt\CacheAssets;

use Bokt\CacheAssets\Command\CacheAssetsCommand;
use Flarum\Extend;
use FoF\Console\Extend\EnableConsole;

return [
    new EnableConsole,
    
    (new Extend\Console())
        ->command(CacheAssetsCommand::class),
];
