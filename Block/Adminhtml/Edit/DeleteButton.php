<?php
/**
 * Store Locator
 * Block is used for delete button in admin edit form
 *
 * @category  Learning
 * @package   Learning\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Learning\StoreLocator\Block\Adminhtml\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Delete button
     *
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        $id = $this->getLocationId();
        if ($id && $this->canRender('delete')) {
            $data = [
                'label' => __('Delete'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->urlBuilder->getUrl('*/*/delete', ['id' => $id]) . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }
}
