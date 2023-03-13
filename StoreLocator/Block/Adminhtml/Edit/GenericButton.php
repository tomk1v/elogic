<?php
/**
 * Store Locator
 * Block is used like generic button for others buttons, consists helper methods
 *
 * @category  Learning
 * @package   Learning\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Learning\StoreLocator\Block\Adminhtml\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\UrlInterface;

class GenericButton
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var Context
     */
    protected $context;

    /**
     * @param Context $context
     *
     */
    public function __construct(
        Context $context
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->context = $context;
    }

    /**
     * @return int|null
     */
    public function getLocationId()
    {
        return $this->context->getRequest()->getParam('id');
    }

    /**
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }

    /**
     * @param string $name
     * @return string
     */
    public function canRender($name)
    {
        return $name;
    }
}
