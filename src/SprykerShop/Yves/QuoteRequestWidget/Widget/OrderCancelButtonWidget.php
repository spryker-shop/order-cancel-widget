<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\OrderCancelWidget\Widget;

use Generated\Shared\Transfer\OrderTransfer;
use Spryker\Yves\Kernel\Widget\AbstractWidget;

/**
 * @method \SprykerShop\Yves\OrderCancelWidget\OrderCancelWidgetFactory getFactory()
 */
class OrderCancelButtonWidget extends AbstractWidget
{
    protected const PARAMETER_IS_VISIBLE = 'isVisible';
    protected const PARAMETER_FORM = 'form';
    protected const PARAMETER_ORDER = 'order';

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     */
    public function __construct(OrderTransfer $orderTransfer)
    {
        $this->addIsVisibleParameter($orderTransfer);
        $this->addOrderParameter($orderTransfer);
        $this->addFormParameter();
    }

    /**
     * @return string
     */
    public static function getName(): string
    {
        return 'OrderCancelButtonWidget';
    }

    /**
     * @return string
     */
    public static function getTemplate(): string
    {
        return '@OrderCancelWidget/views/order-cancel-button/order-cancel-button.twig';
    }

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return void
     */
    protected function addIsVisibleParameter(OrderTransfer $orderTransfer): void
    {
        $this->addParameter(static::PARAMETER_IS_VISIBLE, $orderTransfer->getIsCancellable());
    }

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return void
     */
    protected function addOrderParameter(OrderTransfer $orderTransfer): void
    {
        $this->addParameter(static::PARAMETER_ORDER, $orderTransfer);
    }

    /**
     * @return void
     */
    protected function addFormParameter(): void
    {
        $this->addParameter(static::PARAMETER_FORM, $this->getFactory()->getOrderCancelForm()->createView());
    }
}
