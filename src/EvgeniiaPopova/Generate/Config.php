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
     * @todo add PHPDoc blocks for properties, methods and constants
     */
    protected $env;
    protected $pathToConf = '../config/config.yml';
    protected $types = array();

    const ENV_TEST = 'test';
    const ENV_PROD = 'prod';

    public function __construct($env)
    {
        $this->types = array(self::ENV_TEST, self::ENV_PROD);
        $this->setEnv($env);
    }

    public function validateEnv($env)
    {
        return in_array($env, $this->types);
    }

    public function setEnv($env)
    {
        if ($this->validateEnv($env)) {
            $this->env = $env;
        } else {
            throw new \Exception('Invalid environment');
        }
    }

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

