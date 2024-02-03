<?php


namespace shaoyv8\Pospal\Order;

use shaoyv8\Pospal\Api;

class Order extends Api
{
    //6.根据单号查询订单
    const QUERY_ORDER_BY_NO = '/pospal-api2/openapi/v1/orderOpenApi/queryOrderByNo';
    //7. 根据id查询订单
    const QUERY_ORDER_BY_ID = '/pospal-api2/openapi/v1/orderOpenApi/queryOrderById';
    //8.分页查询订单
    const QUERY_ORDER_PAGES = '/pospal-api2/openapi/v1/orderOpenApi/queryOrderPages';

    
    /**
     * 根据单号查询订单
     * @param array $params
     * @return array
     * @throws \shaoyv8\Pospal\HttpException
     * @author: flynn
     * @Time: 2024/1/30
     */
    public function queryOrderByNo($params = [])
    {
        return $this->request(self::QUERY_ORDER_BY_NO,$params);
    }
    
    /**  
     * 根据id查询订单
     * @param array $params
     * @return array
     * @throws \shaoyv8\Pospal\HttpException
     * @author: flynn
     * @Time: 2024/1/31
     */
    public function queryOrderById($params = [])
    {
        return $this->request(self::QUERY_ORDER_BY_ID,$params);
    }
    
    /**  
     * 分页查询订单
     * @param array $params
     * @return array
     * @throws \shaoyv8\Pospal\HttpException
     * @author: flynn
     * @Time: 2024/1/31
     */
    public function queryOrderPages($params = [])
    {
        return $this->request(self::QUERY_ORDER_PAGES,$params);
    }

    

    

}