<?php

namespace BaseV1EmbedTools;

use MapasCulturais\App;

class Module extends \MapasCulturais\Module
{
    function __construct($config = [])
    {
        /** @var  App $app */
        $app = App::i();

        $config += [];
        parent::__construct($config);
    }

    public function _init()
    {
        if (strpos($_SERVER['REQUEST_URI'], '/embedtools') === 0) {
            $app = App::i();

            $app->view->enqueueScript('app', 'evaluations', 'js/embedTools-evaluations.js');

            $theme_instance = new \MapasCulturais\Themes\BaseV1\Theme($app->config['themes.assetManager']);
            $theme_instance->path = $app->view->path;
            $app->view = $theme_instance;
            $app->view->enqueueScript('app', 'embedtools-messages', 'js/embedtools.js', ['mapasculturais']);
            $app->view->enqueueStyle('app', 'embedtools-style', 'css/embedtools.css', ['main']);

            $app->hook(' template(embedtools.reportmanager.reports-footer):before', function () {
                $this->part('create-reports-modal', []);
            });

            $app->hook('template(embedtools.reportmanager.reports-footer):before', function () {
                $this->part('dynamic-reports');
            });
        }
    }

    public function register()
    {
        /** @var  App $app */
        $app = App::i();

        $app->registerController("embedtools", Controller::class);
    }
}
