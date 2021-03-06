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
     * Properties PHPDoc blocks are in wrong place
     */

    /** @var string $env Current env type */
    protected $env;
    /** @var string $pathToConf Path to config file */
    protected $pathToConf = '../config/config.yml';
    /** @var array $types list of environment types */
    protected $types = array();
    /** * @var array $options */
    protected $options;

    /**#@+
     * Config const
     * @var string
     */
    const ENV_TEST = 'test';
    const ENV_PROD = 'prod';
    /**#@-*/

    /**
     * Config constructor.
     * @param string $env
     */
    public function __construct($env)
    {
        $this->setTypes(array());
        $this->setEnv($env);
    }

    /**
     * @param string $env
     * @return bool
     */
    public function validateEnv($env)
    {
        return in_array($env, $this->getTypes());
    }

    /**
     * @param string $env
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
     * @param array $types
     */
    public function setTypes($types)
    {
        $this->types = $types;
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        if (empty($this->types)) {
            $this->setTypes(array(self::ENV_TEST, self::ENV_PROD));
        }
        return $this->types;
    }

    /**
     * Get options
     * @return array
     */
    public function getOptions()
    {
        $env = $this->getEnv();
        if (empty($this->options)) {
            $this->options = yaml_parse_file($this->pathToConf);
        }
        return $this->options[$env];
    }
}
