<?php

namespace Magenteiro\HideWishList\Helper;
use Magento\Wishlist\Helper\Data as DataVendor;

class Data extends DataVendor
{

    /**
     * Check is allow wishlist module
     *
     * @return bool
     */
    public function isAllow()
    {
        // se esta logado e se isAllow é true
        return $this->_isCustomerLogIn() && parent::isAllow();
    }
}
