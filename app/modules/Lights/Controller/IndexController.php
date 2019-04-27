<?php

namespace Lights\Controller;

use Application\Mvc\Controller;
use Page\Model\Helper\PageHelper;
use Page\Model\Page;
use Phalcon\Mvc\Dispatcher\Exception;

class IndexController extends Controller
{
    public $devices = [
        'garden' => [
            'ip' => '192.168.1.125',
            'status' => null
        ]
    ];

    public function initialize()
    {
        $this->setAdminEnvironment();
        $this->helper->activeMenu()->setActive('admin-lights');
    }

    public function indexAction()
    {

        if ($this->request->isPost()) {
            $data = $this->request->get();
            if (isset($data['device']) && isset($data['value']) && array_key_exists($data['device'], $this->devices)) {
                file_get_contents('http://' . $this->devices[$data['device']]['ip'] . '/5/' . $data['value']);
            }
        }

        foreach ($this->devices as &$device) {
            try {
                $device['status'] = $status = file_get_contents('http://' . $device['ip']);
            } catch (\Exception $e) {

            }

        }

        $this->view->devices = $this->devices;


    }


}
