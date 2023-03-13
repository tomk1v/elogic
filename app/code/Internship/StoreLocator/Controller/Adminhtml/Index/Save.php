<?php
/**
 * Store Locator
 * Controller process URL-request for saving record button
 *
 * @category  Internship
 * @package   Internship\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Internship\StoreLocator\Controller\Adminhtml\Index;

use Throwable;
use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Internship\StoreLocator\Api\Data\LocationInterface;
use Internship\StoreLocator\Api\LocationRepositoryInterface;
use Internship\StoreLocator\Model\Location;
use Internship\StoreLocator\Model\LocationFactory;
use Internship\StoreLocator\Model\ImageUploader;

class Save extends Action
{
    /**
     * @var LocationRepositoryInterface
     */
    private $locationRepository;

    /**
     * @var LocationFactory
     */
    private $locationFactory;

    /**
     * Image uploader
     *
     * @var ImageUploader
     */
    protected $imageUploader;

    /**
     * @param Action\Context $context
     * @param LocationRepositoryInterface $locationRepository
     * @param LocationFactory $locationFactory
     */
    public function __construct(
        Action\Context $context,
        LocationRepositoryInterface $locationRepository,
        ImageUploader $imageUploader,
        LocationFactory $locationFactory
    ) {
        parent::__construct($context);
        $this->locationRepository = $locationRepository;
        $this->locationFactory = $locationFactory;
        $this->imageUploader = $imageUploader;
    }

    /**
     * @return ResultInterface
     */
    public function execute()
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam(LocationInterface::KEY_ID);
        $data = $this->getRequest()->getParams();

        /** @var Location $location */
        if ($id) {
            $location = $this->locationRepository->getById($id);
        } else {
            unset($data[LocationInterface::KEY_ID]);
            $location = $this->locationFactory->create();
        }

        //logic for saving name of image
        if (isset($data['image'][0]['name']) && isset($data['image'][0]['tmp_name'])) {
            $data['image_path'] = $data['image'][0]['name'];
            $this->imageUploader->moveFileFromTmp($data['image_path']);
        } elseif (isset($data['icon'][0]['name']) && !isset($data['image'][0]['tmp_name'])) {
            $data['image_path'] = $data['image'][0]['name'];
        } else {
            $data['image_path'] = '';
        }

        $location->setData($data);

        try {
            $this->locationRepository->save($location);
            $this->messageManager->addSuccessMessage(__('Location saved successfully'));

            if (key_exists('back', $data) && $data['back'] == 'edit') {

                return $resultRedirect->setPath('*/*/edit', ['id' => $id, '_current' => true]);
            }

            return $resultRedirect->setPath('*/*/');
        } catch (Throwable $throwable) {
            $this->messageManager->addErrorMessage(__("Location was not saved"));

            return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
        }
    }
}
