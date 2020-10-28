<?php
namespace itnovum\openITCOCKPIT\ExampleModule\AngularAssets;

use itnovum\openITCOCKPIT\Core\AngularJS\AngularAssetsInterface;
use itnovum\openITCOCKPIT\Core\AngularJS\PluginAngularAssets;

class AngularAssets extends PluginAngularAssets implements AngularAssetsInterface {

    /**
     * @var array
     */
    protected $jsFiles = [
        'path/in/webroot/lib.min.js'
    ];


    protected $cssFiles = [
        '/path/in/webroot/app.css'
    ];

    /**
     * @return array
     */
    public function getJsFiles() {
        return $this->_getJsFiles('example_module');
    }

    /**
     * @return array
     */
    public function getCssFiles() {
        return $this->_getCssFiles('example_module');
    }


    /**
     * @return array
     */
    public function getJsFilesOnDisk() {
        return $this->_getJsFilesOnDisk('ExampleModule');
    }

    /**
     * @return array
     */
    public function getCssFilesOnDisk() {
        return $this->_getCssFilesOnDisk('ExampleModule');
    }
}
