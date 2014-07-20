<?php namespace TinyAura\Config;

class Config {

    protected $configFiles;

    protected $globalConfig;

    public function loadAll()
    {
        $this->configFiles = $this->getConfigFiles();
        
        $this->includeConfigFiles();

        return $this->globalConfig;
    }

    private function getConfigFiles()
    {
        $files = [];
        $dir = __DIR__."/../../app/config";
        foreach(glob("{$dir}/*.php") as $fileName)
        {
            $baseName = basename($fileName, ".php");

            $files[$baseName] = $fileName;
        }

        return $files;
    }

    private function includeConfigFiles()
    {
        foreach($this->configFiles as $file => $path)
        {
            $this->globalConfig[$file] = include $path; 
        }
    }

    public function get($config = null, $setting = null)
    {
        if(is_null($config))
        {
            throw new NonExistentConfigException("Cannot find config: NULL");
        }

        if( ! isset($globalConfig[$config]))
        {
            throw new NonExistentConfigException("Cannot find config: $config");
        }

        if( ! isset($globaleConfig[$config][$setting]))
        {
            throw new NonExistentConfigValueException("No value set for $value in $config");
        }
    }
}