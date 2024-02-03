<?php


namespace shaoyv8\Pospal\StockTaking;

use shaoyv8\Pospal\Api;

class StockTaking extends Api
{
    //1. 查询历史盘点记录
    const QUERY_ALL_PAY_METHOD_API = '/pospal-api2/openapi/v1/stockTakingOpenApi/queryStockTakingHistories';
    //2. 查询某一盘点记录明细
    const QUERY_TICKET_BY_SN_API = '/pospal-api2/openapi/v1/stockTakingOpenApi/queryStockTakingItems';
    //3. 查询某一盘点详情
    const QUERY_STOCK_TAKING_DETAILS_BY_ID_API =  '/pospal-api2/openapi/v1/stockTakingOpenApi/queryStockTakingDetailsById';

    /** 
     * 查询历史盘点记录
     * @param array $params
     * @return array
     * @throws \shaoyv8\Pospal\HttpException
     * @author: flynn
     * @Time: 2024/1/30
     */
    public function queryStockTakingHistories($params = [])
    {
        return $this->request(self::QUERY_ALL_PAY_METHOD_API,$params);
    }

    /**   
     * 查询某一盘点记录明细
     * @param array $params
     * @return array
     * @throws \shaoyv8\Pospal\HttpException
     * @author: flynn
     * @Time: 2024/1/30
     */
    public function queryStockTakingItems($params = [])
    {
        return $this->request(self::QUERY_TICKET_BY_SN_API,$params);
    }

    /** 
     * 查询某一盘点详情
     * @param array $params
     * @return array
     * @throws \shaoyv8\Pospal\HttpException
     * @author: flynn
     * @Time: 2024/1/30
     */
    public function queryStockTakingDetailsById($params = [])
    {
        return $this->request(self::QUERY_STOCK_TAKING_DETAILS_BY_ID_API,$params);
    }

}