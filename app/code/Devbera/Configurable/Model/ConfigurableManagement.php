<?php
/**
 * A Magento 2 module named Devbera/Configurable
 * Copyright (C) 2019 amitbera.com
 *
 * This file included in Devbera/Configurable is licensed under OSL 3.0
 *
 * http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * Please see LICENSE.txt for the full text of the OSL 3.0 license
 */

namespace Devbera\Configurable\Model;

use Magento\ConfigurableProduct\Model\Product\Type\Configurable;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ConfigurableManagement implements \Devbera\Configurable\Api\ConfigurableManagementInterface
{
    /**
     * @var \Magento\ConfigurableProduct\Model\Product\Type\Configurable
     */
    private $configurable;
    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var \Magento\Catalog\Api\Data\ProductInterfaceFactory
     */
    private $productFactory;

    public function __construct(
       Configurable $configurable,
       \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
       \Magento\Catalog\Api\Data\ProductInterfaceFactory $productFactory
    ) {
        $this->configurable = $configurable;
        $this->productRepository = $productRepository;
        $this->productFactory = $productFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getParentIdsByChild($childId)
    {
        $parentIds = $this->configurable->getParentIdsByChild($childId);

        $parentList = [];
        if (!empty($parentIds)) {
            foreach ($parentIds as $parentId) {
                $parentList[] = $this->productRepository->getById($parentId);
            }
        }

        return $parentList;
    }

    /**
     * {@inheritdoc}
     */
    public function getParentIdsByChildSku($childSku)
    {
        $child = $this->productRepository->get($childSku);

        if ($child->getTypeId() != \Magento\ConfigurableProduct\Model\Product\Type\Configurable::TYPE_CODE) {
            return [];
        }
        return $this->getParentIdsByChild($child->getId());
    }
}
