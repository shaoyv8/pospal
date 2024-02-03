<?php


namespace shaoyv8\Pospal\StockFlow;


use Carbon\Carbon;
use shaoyv8\Pospal\Api;

class StockFlow extends Api
{
//    2.分页查询所有订货单(所有门店创建的订货单)
//    3.根据Id查询订货单
//    4.分页查询所有货单（调货\进货\退货）（所有门店创建的贷流单）
//    5.根据订货单id查询所有单（调货\进货\退货）
//    6. 根据货单id查询货单
//    7. 创建货流单
//    8. 确认出货
//    9. 确认进货
//    10. 拒绝出货
//    11. 拒绝进货
//    12. 分页查询采购单
    //获取门店所有收银员
    const QUERY_ALL_PAY_METHOD_API = '/pospal-api2/openapi/v1/stockFlowOpenApi/queryProductRequestPages';

    /**
     * 查询支付方式代码
     *
     * @return array
     */
    public function allPayMethod()
    {
        return $this->request(self::QUERY_ALL_PAY_METHOD_API);
    }

    /**
     * 根据单据序列号查询
     *
     * @param $sn
     * @return array
     */
    public function query($sn)
    {
        return $this->request(self::QUERY_TICKET_BY_SN_API, ['sn' => $sn]);
    }

    /**
     * 分页查询所有单据
     *
     * @param $params
     * @return array
     * @throws \shaoyv8\Pospal\HttpException
     */
    public function paginate($params = [])
    {
        $params['startTime'] = $params['startTime'] ?? Carbon::yesterday()->toDateTimeString();
        $params['endTime'] = $params['endTime'] ?? Carbon::yesterday()->endOfDay()->toDateTimeString();

        return $this->request(self::QUERY_TICKET_PAGES_API, $params);
    }

    /**
     * 获取全部订单
     *
     * @param array $params
     * @param \Closure $callback
     * @return void
     * @throws \shaoyv8\Pospal\HttpException
     */
    public function all($params = [], \Closure $callback)
    {
        $params['postBackParameter'] = null;

        while (true) {
            $tickets = $this->paginate($params);

            $callback($tickets['data']['result']);

            if ($tickets['status'] === 'success' && count($tickets['data']['result']) === $tickets['data']['pageSize']) {

                $params['postBackParameter'] = ($tickets['data']['postBackParameter']);

            } else {
                return;
            }
        }
    }

}