<?php

use App\Provider\ConfigServiceProvider;
use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;

class App extends Application
{
    use Application\TwigTrait;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);

        $this['root_dir'] = __DIR__ . '/../app';

        $this->register(new ConfigServiceProvider());
        $this->register(new TwigServiceProvider());
        $this->register(new ServiceControllerServiceProvider());
    }

    /**
     * @param string $resource
     */
    public function configure($resource)
    {
        $this['configurator']->configure($this, $resource);
    }
}
