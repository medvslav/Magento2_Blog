<?php

namespace Medvslav\Blog2\Controller\AbstractController;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Registry;

class Blog2Loader implements Blog2LoaderInterface
{
    /**
     * @var \Medvslav\Blog2\Model\Blog2Factory
     */
    protected $blog2Factory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $url;

    /**
     * @param \Medvslav\Blog2\Model\Blog2Factory $blog2Factory
     * @param OrderViewAuthorizationInterface $orderAuthorization
     * @param Registry $registry
     * @param \Magento\Framework\UrlInterface $url
     */
    public function __construct(
        \Medvslav\Blog2\Model\Blog2Factory $blog2Factory,
        Registry $registry,
        \Magento\Framework\UrlInterface $url
    ) {
        $this->blog2Factory = $blog2Factory;
        $this->registry = $registry;
        $this->url = $url;
    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return bool
     */
    public function load(RequestInterface $request, ResponseInterface $response)
    {
        $id = (int)$request->getParam('id');
        if (!$id) {
            $request->initForward();
            $request->setActionName('noroute');
            $request->setDispatched(false);
            return false;
        }

        $blog2 = $this->blog2Factory->create()->load($id);
        $this->registry->register('current_blog2', $blog2);
        return true;
    }
}
