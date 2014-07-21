<?php

namespace Slim\Views;

class Blade extends \Slim\View
{
    /**
     * @var string The path to the Blade code directory WITHOUT the trailing slash
     */
    public $parserDirectory = null;

    /**
     * @var array The options for the Blade environment, see
     */
    public $parserOptions = array();

    /**
     * @var BladeEnvironment The Blade environment for rendering templates.
     */
    private $parserInstance = null;

    /**
     * Render Blade Template
     *
     * This method will output the rendered template content
     *
     * @param string $template The path to the Blade template, relative to the Blade templates directory.
     * @param null $data
     * @return string
     */
    public function render($template, $data = null)
    {

        $env = $this->getInstance();
        
        $parser = $env->view();
        $data = array_merge($this->all(), (array) $data);

        try {
            $output = $env->view()->make($template, $data);
            $output = $output->__toString();
        } catch (Exception $e) {
			throw new \RuntimeException($e->getMessage());
        }

        return $output;
    }

    /**
     * Creates new BladeEnvironment if it doesn't already exist, and returns it.
     *
     * @return \Blade_Environment
     */
    public function getInstance()
    {
        if (!$this->parserInstance) {
            $views = base_path($this->getTemplatesDirectory().'/');
			if(isset($this->parserOptions['cache'])) {
				$cache = $this->parserOptions['cache'];
			} else {
				throw new \RuntimeException('Cannot set the Blade cache directory');
			}

            $this->parserInstance = new \Philo\Blade\Blade($views, $cache);
        }

        return $this->parserInstance;
    }

}
