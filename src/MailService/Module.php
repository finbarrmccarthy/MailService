<?php
namespace MailService;

use Zend\Mvc\MvcEvent;
use Zend\Loader\StandardAutoloader;
use Zend\Loader\AutoloaderFactory;

class Module {

    public function getAutoloaderConfig() {
        return array(
            AutoloaderFactory::STANDARD_AUTOLOADER => array(
                StandardAutoloader::LOAD_NS => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getServiceConfig() {
        return array(
            'shared' => array(
                 'mailservice_message' => false
            ),
            'invokables' => array(
                'mailservice_message'   => 'MailService\Mail\Service\Message',
            ),
            'factories' => array(
                'mailservice_transport' => 'MailService\Mail\Transport\Service\TransportFactory',
                'mailservice_renderer'  => 'MailService\Mail\View\MailPhpRendererFactory',
            ),
        );
    }
}

