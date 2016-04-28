<?php

namespace Medvslav\Blog2\Controller\AbstractController;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;

interface Blog2LoaderInterface
{
    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return \Medvslav\Blog2\Model\Blog2
     */
    public function load(RequestInterface $request, ResponseInterface $response);
}
