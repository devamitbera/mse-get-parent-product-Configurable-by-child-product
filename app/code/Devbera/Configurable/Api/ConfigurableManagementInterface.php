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

namespace Devbera\Configurable\Api;


interface ConfigurableManagementInterface
{

    /**
     *  GET for parent Product by Child id api
     * @param int $childId
     * @throws \Magento\Framework\Exception\LocalizedException
     * @return \Magento\Catalog\Api\Data\ProductInterface[]
     */
    public function getParentIdsByChild($childId);

    /**
     * GET for parent Product by Child Sku
     * @param string childSku
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     * @return \Magento\Catalog\Api\Data\ProductInterface[]
     */
    public function getParentIdsByChildSku($childSku);
}
