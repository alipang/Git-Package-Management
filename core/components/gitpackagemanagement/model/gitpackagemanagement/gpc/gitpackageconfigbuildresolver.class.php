<?php

class GitPackageConfigBuildResolver {
    private $modx;
    private $resolversDir = 'resolvers';
    private $before = array();
    private $after = array();
    private $file = array();

    public function __construct(modX &$modx) {
        $this->modx =& $modx;
    }

    public function fromArray($config) {
        if(isset($config['resolversDir'])){
            $this->resolversDir = $config['resolversDir'];
        }

        if(isset($config['before'])){
            $this->before = $config['before'];
        }

        if(isset($config['after'])){
            $this->after = $config['after'];
        }

        if(isset($config['file']) && is_array($config['file'])) {
            foreach ($config['file'] as $file) {
                if (!isset($file['source']) || !isset($file['target'])) continue;

                $this->file[] = array(
                    'source' => $file['source'],
                    'target' => $file['target']
                );
            }
        }

        return true;
    }

    /**
     * @return string
     */
    public function getResolversDir() {
        return $this->resolversDir;
    }

    /**
     * @param string $resolversDir
     */
    public function setResolversDir($resolversDir) {
        $this->resolversDir = $resolversDir;
    }

    public function getFileResolvers()
    {
        return $this->file;
    }

    /**
     * @return array
     */
    public function getBefore() {
        return $this->before;
    }

    /**
     * @param array $before
     */
    public function setBefore($before) {
        $this->before = $before;
    }

    /**
     * @return array
     */
    public function getAfter() {
        return $this->after;
    }

    /**
     * @param array $after
     */
    public function setAfter($after) {
        $this->after = $after;
    }
}