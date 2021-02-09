<?php

namespace Bokt\CacheAssets\Command;

use Bokt\CacheAssets\Event\Cached;
use Flarum\Console\AbstractCommand;
use Flarum\Extension\ExtensionManager;
use Flarum\Frontend\Assets;
use Flarum\Locale\LocaleManager;
use Symfony\Component\Console\Input\InputOption;

class CacheAssetsCommand extends AbstractCommand
{
    /**
     * @var LocaleManager
     */
    private $locales;

    /**
     * @var ExtensionManager
     */
    private $extensions;

    public function __construct(LocaleManager $locales, ExtensionManager $extensions)
    {
        $this->locales = $locales;
        $this->extensions = $extensions;
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('cache:assets')
            ->addOption('css', null, InputOption::VALUE_NONE, 'Cache compiles less to css')
            ->addOption('js', null, InputOption::VALUE_NONE, 'Cache compiled javascript')
            ->addOption('locales', null, InputOption::VALUE_NONE, 'Cache locale translations')
            ->setDescription('Cache all js and/or css ahead of any browser requests.');
    }

    /**
     * @inheritDoc
     */
    protected function fire()
    {
        $this->info('Caching assets ...');

        $locales = array_keys($this->locales->getLocales() ?? []);

        foreach (['forum', 'admin'] as $frontend) {
            /** @var Assets $assets */
            $assets = app('flarum.assets.' . $frontend);

            if ($this->input->getOption('js')) {
                $this->info("Caching $frontend js file");
                $assets->makeJs()->commit();
            }
            if ($this->input->getOption('css')) {
                $this->info("Caching $frontend css file");
                $assets->makeCss()->commit();

                if ($this->fofNightmodeEnabled()) {
                    $this->info("Caching $frontend dark css file");
                    $assets->makeDarkCss()->commit();
                }
            }

            if ($this->input->getOption('locales')) {
                foreach ($locales as $locale) {
                    $this->info("Caching $frontend $locale css & js files");
                    $assets->makeLocaleJs($locale)->commit();
                    $assets->makeLocaleCss($locale)->commit();
                }
            }
        }

        event(new Cached(
            $this->input->getOption('js'),
            $this->input->getOption('css'),
            $this->input->getOption('locales')
        ));
    }

    protected function fofNightmodeEnabled(): bool
    {
        return $this->extensions->isEnabled('fof-nightmode') && class_exists(\FoF\NightMode\AssetsServiceProvider::class);
    }
}
