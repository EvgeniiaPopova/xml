<?php

/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 21.04.17
 */
namespace Generate;

class Config
{
    /**
     * @todo add PHPDoc blocks for properties, methods and constants  +
     */

    /** @var string $env type of environment */
    /** @var string $pathToConf Path to config */
    /** @var array $types list of types */

    protected $env;
    protected $pathToConf = '../config/config.yml';
    protected $types = array();

    /**@#+ Config const */
    const ENV_TEST = 'test';
    const ENV_PROD = 'prod';
    /**@#- */

    /**
     * Config constructor.
     * @param string $env
     */
    public function __construct($env)
    {
        $this->types = array(self::ENV_TEST, self::ENV_PROD);
        $this->setEnv($env);
    }

    /**
     * @param $env
     * @return bool
     */
    public function validateEnv($env)
    {
        return in_array($env, $this->types);
    }

    /**
     * @param $env
     * @throws \Exception
     */
    public function setEnv($env)
    {
        if ($this->validateEnv($env)) {
            $this->env = $env;
        } else {
            throw new \Exception('Invalid environment');
        }
    }

    /**
     * @return string
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @return array
     * @todo STORE OPTIONS
     */
    public function getOptions()
    {
        $typeEnv = $this->getEnv();
        $options = yaml_parse_file($this->pathToConf);
        return $options[$typeEnv];
    }
}

