<?php
namespace Magenteiro\Sharer\Block;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;

class Sharer extends Template
{
    private $storeManager;

    public function __construct(Template\Context $context, array $data = [], StoreManagerInterface $storeManager)
    {
        parent::__construct($context, $data);
        $this->storeManager = $storeManager;
    }

    public function getCurrentUrl()
    {
        return urlencode($this->storeManager->getStore()->getCurrentUrl());
    }
}
