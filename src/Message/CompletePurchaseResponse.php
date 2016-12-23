<?php

namespace Omnipay\WechatPay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\WechatPay\Helper;

/**
 * Class CompletePurchaseResponse
 * @package Omnipay\WechatPay\Message
 * @link    https://pay.weixin.qq.com/wiki/doc/api/app.php?chapter=9_1
 *
 */
class CompletePurchaseResponse extends AbstractResponse
{

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return $this->isPaid();
    }


    public function isPaid()
    {
        $data = $this->getData();

        return $data['paid'];
    }


    public function isSignMatch()
    {
        $data = $this->getData();

        return $data['sign_match'];
    }


    public function getRequestData()
    {
        return $this->request->getData();
    }

    public function successResponse()
    {
        $successResponse = array(
            'return_code' => 'SUCCESS',
            'return_msg' => 'OK',
            );

        return Helper::array2xml($successResponse);

    }

    public function failedResponse()
    {
        $failedResponse = array(
            'return_code' => 'FAIL',
            'return_msg' => 'Failed to handle notification.',
            );

        return Helper::array2xml($failedResponse);
    }

}
