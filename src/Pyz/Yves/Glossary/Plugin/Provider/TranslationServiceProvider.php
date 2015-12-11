<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Glossary\Plugin\Provider;

use Pyz\Yves\Glossary\GlossaryDependencyContainer;
use Silex\Application;
use Silex\ServiceProviderInterface;
use SprykerEngine\Yves\Kernel\AbstractPlugin;
use SprykerFeature\Client\Glossary\Service\GlossaryClientInterface;

/**
 * @method GlossaryDependencyContainer getDependencyContainer()
 * @method GlossaryClientInterface getClient()
 */
class TranslationServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{

    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app['translator'] = $app->share(function ($app) {
            $twigTranslator = $this->getDependencyContainer()->createTwigTranslator(
                $this->getClient(), $app['locale']
            );

            return $twigTranslator;
        });
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {
    }

}