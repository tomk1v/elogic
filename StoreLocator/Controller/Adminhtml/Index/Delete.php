<?php
/**
 * Store Locator
 * Controller process URL-request for delete record button
 *
 * @category  Learning
 * @package   Learning\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Learning\StoreLocator\Controller\Adminhtml\Index;

use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Learning\StoreLocator\Api\LocationRepositoryInterface;

class Delete extends Action
{
    /**
     * @var LocationRepositoryInterface
     */
    private $locationRepository;

    /**
     * @param Context $context
     * @param LocationRepositoryInterface $locationRepository
     */
    public function __construct(
        Context $context,
        LocationRepositoryInterface $locationRepository
    ) {
        parent::__construct($context);
        $this->locationRepository = $locationRepository;
    }

    /**
     * @return ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $this->locationRepository->deleteById($id);
                $this->messageManager->addSuccessMessage(__('The record has been deleted.'));

                return $resultRedirect->setPath('*/*/');
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());

                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a record to delete.'));

        return $resultRedirect->setPath('*/*/');
    }
}
