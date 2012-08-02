<?php

namespace Markdown\Silex\Service;

use Silex\Application;
use Silex\ServiceProviderInterface;

use Markdown\Parser\MarkdownParser;
use Markdown\Twig\Extension\MarkdownTwigExtension;

class MarkdownSilexService implements ServiceProviderInterface
{
    public function boot(Application $app)
    {
        //
    }

    public function register(Application $app)
    {
        $app['markdown'] = $app->share(function ($app) {
            $features = isset($app['markdown.features']) ? $app['markdown.features'] : array();
            return new MarkdownParser($features);
        });
        if (isset($app['twig'])) {
            $app['twig']->addExtension(new MarkdownTwigExtension($app['markdown']));
        }
    }
}
