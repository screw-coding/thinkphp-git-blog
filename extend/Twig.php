<?php

/*
 *
 * BlogCI4 - Blog write with Codeigniter v4dev
 * @author Deathart <contact@deathart.fr>
 * @copyright Copyright (c) 2018 Deathart
 * @license https://opensource.org/licenses/MIT MIT License
 */

use Twig\Environment;
use Twig\Error\Error;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

/**
 * Class General
 *
 * @package App\Libraries
 */
class Twig
{
    /**
     * @var Environment
     */
    private $environment;

    /**
     * @var string
     */
    private $ext = '.twig';

    /**
     * Twig constructor.
     *
     * @param string $templateFolder
     */
    public function __construct(string $templateFolder)
    {

        $loader = new FilesystemLoader(root_path() . 'public/theme' . DIRECTORY_SEPARATOR . $templateFolder);

        if (!is_writable(runtime_path() . 'cache') || env("ENV") == "development") {
            $dataConfig['cache'] = runtime_path() . 'cache';
            $dataConfig['auto_reload'] = true;
        }

        if (env("ENV") == "development") {
            $dataConfig['debug'] = true;
        }

        $dataConfig['autoescape'] = false;

        $this->environment = new Environment($loader, $dataConfig);
        //$this->env("ENV")->addExtension(new CoreExtension());
        if (env("ENV") == "development") {
            $this->environment->addExtension(new DebugExtension());
        }
    }

    /**
     * @param string $file
     * @param array $array
     *
     * @return string
     * @throws \think\Exception
     */
    public function render(string $file, array $array): string
    {
        try {
            $template = $this->environment->load($file . $this->ext);
        } catch (Error $error_Loader) {
            throw new \think\Exception($error_Loader->getMessage());
        }

        return $template->render($array);
    }
}
