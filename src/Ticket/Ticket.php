<?php


namespace shaoyv8\Pospal\Ticket;


use Carbon\Carbon;
use shaoyv8\Pospal\Api;

class Ticket extends Api
{
    //1. 查询支付方式代码
    const QUERY_ALL_PAY_METHOD_API = '/pospal-api2/openapi/v1/ticketOpenApi/queryAllPayMethod';
    //2. 根据单据序列号查询
    const QUERY_TICKET_BY_SN_API = '/pospal-api2/openapi/v1/ticketOpenApi/queryTicketBySn';
    //4. 分页查询所有单据
    const QUERY_TICKET_PAGES_API = '/pospal-api2/openapi/v1/ticketOpenApi/queryTicketPages';

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
    public function queryTicketBySn($sn)
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
        $params['startTime'] = $params['startTime'] ?? Carbon::today()->toDateTimeString();
        $params['endTime'] = $params['endTime'] ?? Carbon::today()->endOfDay()->toDateTimeString();
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