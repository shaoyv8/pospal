<?php


namespace shaoyv8\Pospal\Product;


use shaoyv8\Pospal\Api;

class Product extends Api
{
    //1. 分页查询全部商品分类
    const QUERY_PRODUCT_CATEGORY_PAGES_API = '/pospal-api2/openapi/v1/productOpenApi/queryProductCategoryPages';
    //2. 分页查询全部商品图片
    const QUERY_PRODUCT_IMAGE_PAGES_API = '/pospal-api2/openapi/v1/productOpenApi/queryProductImagePages';
    //3. 根据商品查询商品图片
    const QUERY_PRODUCT_IMAGES_BY_PRODUCT_UID_API = '/pospal-api2/openapi/v1/productOpenApi/queryProductImagesByProductUid'; 
    //4. 根据条形码查询商品信息
    const QUERY_PRODUCT_BY_BARCODE_API = '/pospal-api2/openapi/v1/productOpenApi/queryProductByBarcode';    
    //5. 分页查询全部商品信息
    const QUERY_PRODUCT_PAGES_API = '/pospal-api2/openapi/v1/productOpenApi/queryProductPages';      
    //6. 修改商品信息
    const UPDATE_PRODUCT_INFO_API = '/pospal-api2/openapi/v1/productOpenApi/updateProductInfo';      
    //7. 根据唯一标识查询商品信息
    const QUERY_PRODUCT_BY_UID_API = '/pospal-api2/openapi/v1/productOpenApi/queryProductByUid';      
    //8. 新增加商品信息
    const ADD_PRODUCT_INFO_API = '/pospal-api2/openapi/v1/productOpenApi/addProductInfo';        
    //9. 查询所有商品单位定义
    const QUERY_ALL_PRODUCT_UNIT_DEF_API = '/pospal-api2/openapi/v1/productOpenApi/queryAllProductUnitDef';         
    //10. 分页查询全部供应商信息
    const QUERY_SUPPLIER_PAGES_API = '/pospal-api2/openapi/v1/supplierOpenApi/querySupplierPages';           
    //11. 根据条形码批量查询商品信息
    const QUERY_PRODUCT_BY_BARCODES_API = '/pospal-api2/openapi/v1/productOpenApi/queryProductByBarcodes';

    /**
     * 分页查询全部商品分类
     * @return array
     * @throws \shaoyv8\Pospal\HttpException
     * @author: flynn
     * @Time: 2024/1/26
     */
    public function query_category()
    {
        $postBackParameter = [
            'parameterType' => '',
            'parameterValue' => '',
        ];
        return $this->request(self::QUERY_PRODUCT_CATEGORY_PAGES_API, ['postBackParameter' => $postBackParameter]);
    }

    /**
     * 分页查询全部商品信息
     * @param array $params
     * @return array
     */
    public function paginate()
    {
        $params = [];
        return $this->request(self::QUERY_PRODUCT_PAGES_API, $params);
    }
    
    /** 
     * 根据ID查询商品图片
     * @return array
     * @throws \shaoyv8\Pospal\HttpException
     * @author: flynn
     * @Time: 2024/1/31
     */
    public function product_images_by_product_uid()
    {
        $params = [
            'productUid' => '287518801523242326',
        ];
        return $this->request(self::QUERY_PRODUCT_IMAGES_BY_PRODUCT_UID_API, $params);
    }

    /**
     * 根据ID查询商品信息
     * @param $params
     * @return array
     * @throws \shaoyv8\Pospal\HttpException
     * @author: flynn
     * @Time: 2024/1/26
     */
    public function product_by_uid()
    {
        $params = [
            'productUid' => '287518801523242326',
        ];
        return $this->request(self::QUERY_PRODUCT_BY_UID_API, $params);
    }

    /**
     * 添加商品信息
     * @return array
     * @throws \shaoyv8\Pospal\HttpException
     * @author: flynn
     * @Time: 2024/1/31
     */
    public function add_product_info($params=[])
    {
        //$params = $this->goodsInfo();
        return $this->request(self::ADD_PRODUCT_INFO_API, $params);
    }

    /** 
     * 修改商品信息
     * @return array
     * @throws \shaoyv8\Pospal\HttpException
     * @author: flynn
     * @Time: 2024/1/31
     */
    public function update_product_info($params=[])
    {
        //$params = $this->goodsUpdateInfo();
        return $this->request(self::UPDATE_PRODUCT_INFO_API, $params);
    }




















    /**
     * @return array|bool|float|int|mixed|stdClass|string|null
     * @author: flynn
     * @Time: 2024/1/31
     */
   protected function goodsInfo(){
        $goods_json = '{"productInfo":{"name":"彪哥商品333","barcode":"bgtssp004","buyPrice":10,"sellPrice":15,"stock":100,"pinyin":"bgtssp","description":"openApi增加商品测试","isCustomerDiscount":1,"enable":1}}';
        $goods_info = json_decode($goods_json, true);
        return  $goods_info;
    }

    /**
     * @return array|bool|float|int|mixed|stdClass|string|null
     * @author: flynn
     * @Time: 2024/1/31
     */
    protected function goodsUpdateInfo(){
        $goods_json = '{"productInfo":{"uid":287518801523242326,"name":"彪哥33商品22","barcode":"bgtssp004","buyPrice":10,"sellPrice":15,"stock":100,"pinyin":"bgtssp","description":"openApi增加商品测试","isCustomerDiscount":1,"enable":1}}';
        $goods_info = json_decode($goods_json, true);
        return  $goods_info;
    }
}