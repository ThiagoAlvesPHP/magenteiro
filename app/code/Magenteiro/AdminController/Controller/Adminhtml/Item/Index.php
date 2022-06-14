<?php
namespace Magenteiro\AdminController\Controller\Adminhtml\Item;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultFactory;

    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->resultFactory = $pageFactory;
    }

    public function execute()
    {
        return $this->resultFactory->create();
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenteiro_AdminController::item');
    }
}
