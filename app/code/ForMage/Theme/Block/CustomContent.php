<?php

namespace ForMage\Theme\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Api\ProductRepositoryInterface;

class CustomContent extends Template
{

    private $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        Template\Context $context,
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        parent::__construct($context, $data);
    }

    public function getProductName($sku)
    {
        $product = $this->productRepository->get($sku);
        return $product->getName();
    }

    /**
     * array
     */
    public function  getAll($sku)
    {
        $product = $this->productRepository->get($sku);

        return [
            'id'    => $product->getId(),
            'sku' => $product->getSku(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'attribute_id' => $product->getAttributeSetId(),
            'status' => $product->getStatus(),
            'visibility' => $product->getVisibility(),
            'type_id' => $product->getTypeId(),
            'created_at' => $product->getCreatedAt(),
            'update_at' => $product->getUpdatedAt(),
            'weight' => $product->getWeight(),
            'option' => $product->getOptions()
        ];
    }

    public function myFirstCustomMethod()
    {
        return "Primeiro Method";
    }

    public function mySecondCustomMethod()
    {
        return "Segundo Method";
    }

}
