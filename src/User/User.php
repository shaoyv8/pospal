<?php


namespace shaoyv8\Pospal\User;


use Carbon\Carbon;
use shaoyv8\Pospal\Api;

class User extends Api
{
    
    const QUERY_USER_PAGES_API = '/pospal-api2/openapi/v1/userOpenApi/queryAllUser';
    
    /**
     * 根据单据序列号查询
     *
     * @param $sn
     * @return array
     */
    public function query()
    {
         $postBackParameter = [
             'parameterType' => '',
             'parameterValue' => '',
         ];
        return $this->request(self::QUERY_USER_PAGES_API, ['postBackParameter' => $postBackParameter]);
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