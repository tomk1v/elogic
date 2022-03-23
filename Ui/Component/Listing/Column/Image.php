<?php
/**
 * Store Locator
 * Ui Component for displaying thumbnail in admin
 *
 * @category  Learning
 * @package   Learning\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Learning\StoreLocator\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class Image extends Column
{
    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var UrlInterface
     */
    protected $url;

    /**
     * Image constructor.
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param StoreManagerInterface $storeManager
     * @param UrlInterface $url
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        StoreManagerInterface $storeManager,
        UrlInterface $url,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->storeManager = $storeManager;
        $this->url = $url;
    }

    /**
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);

        if (isset($dataSource['data']['items'])) {
            $fieldName = 'image';
            foreach ($dataSource['data']['items'] as & $item) {
                if (!empty($item['image_path'])) {
                    $name = $item['image_path'];
                    $item[$fieldName . '_src'] = $mediaUrl.'storelocator/tmp/image/'.$name;
                    $item[$fieldName . '_alt'] = '';
                    $item[$fieldName . '_orig_src'] = $mediaUrl.'storelocator/image/'.$name;
                }
            }
        }
        return $dataSource;
    }
}
