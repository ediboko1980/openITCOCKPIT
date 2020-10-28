<?php
namespace ExampleModule\Lib;

use itnovum\openITCOCKPIT\Core\Dashboards\ModuleWidgetsInterface;

class Widgets implements ModuleWidgetsInterface {

    /**
     * @var array
     */
    private $ACL_PERMISSIONS = [];

    /**
     * Widgets constructor.
     * @param $ACL_PERMISSIONS
     */
    public function __construct($ACL_PERMISSIONS) {
        $this->ACL_PERMISSIONS = $ACL_PERMISSIONS;
    }

    /**
     * @return array
     */
    public function getAvailableWidgets() {
        $widgets = [];
        //Check for user permissions
        if (isset($this->ACL_PERMISSIONS['examplemodule']['test']['index'])) {
            $widgets[] = [
                'type_id'   => 900, //A unique identify
                'title'     => __('Example Overview'),
                'icon'      => 'fas fa-code',
                'directive' => 'examplemodule-widget',
                'width'     => 4,
                'height'    => 13
            ];
        }

        return $widgets;
    }

}
