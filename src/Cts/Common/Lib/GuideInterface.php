<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class GuideInterface
 *
 * @since 2.0
 */
interface GuideInterface
{

    /**
     *
     * @param array $params
     * @return array
     * @example:{
     *      page:string|int,
     *      pageSize:string|int,
     *      type:int 0-自主服务 1-场地准备 2-现场培训教材 3-视频集锦,
     *      id:int,
     *      keyword:string,
     *      orderBy:string,
     *      direction:string eg.asc|desc
     * }
     *
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getGuideList(array $params): array;

    /**
     *
     * @param int $type
     * @param int $categoryId
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getChildrenCategory(int $type, int $categoryId): array;

    /**
     * @param int $id
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getCategory(int $id): array;

    /**
     * @param array $params
     * @return array
     * @example:{
     *      type:int 0-自主服务 1-场地准备 2-现场培训教材 3-视频集锦,
     *      name:string,
     *      parent_id:int,
     *      icon:string
     * }
     *
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function createCategory(array $params): array;

    /**
     * @param int $id
     * @param array $params
     * @return array
     * @example:{
     *      name:string,
     *      icon:string
     * }
     *
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function updateCategory(int $id, array $params): array;

    /**
     * @param int $id
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function deleteCategory(int $id): array;

    /**
     * @param int $id
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getArticle(int $id): array;

    /**
     * @param int $id
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getArticleDgg(int $id, int $type): array;

    /**
     * @param array $params
     * @return array
     * @example:{
     *      name:string,
     *      content:string,
     *      category_id:int,
     *      hot_spot:int 0|1,
     *      sort:int 1-10,
     *      type:int 0|1,
     *      video_no:string,
     *      video_size:string
     * }
     *
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function createArticle(array $params): array;

    /**
     * @param int $id
     * @param array $params
     * @return array
     * @example:{
     *      name:string,
     *      content:string,
     *      category_id:int,
     *      hot_spot:int 0|1,
     *      sort:int 0-10,
     *      type:int 0|1,
     *      video_no:string,
     *      video_size:string
     * }
     *
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function updateArticle(int $id, array $params): array;

    /**
     * @param int $id
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function deleteArticle(int $id): array;

    /**
     *
     * @param array $excelData
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function import(array $excelData): array;

    /**
     *
     * @param int $type
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function export(int $type = 0): array;

    /**
     *
     * @param int $type
     * @param string $categoryPath eg.1_2_3
     * @param int $id
     * @param int $channelId
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getTree(int $type = 0, string $categoryPath = '', int $id = 0, int $channelId = 0): array;

    /**
     *
     * @param int $type
     * @param int $categoryId
     * @param string $keyword
     * @param int $channelId
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function search(int $type = 0, int $categoryId = 0, string $keyword = '', int $channelId = 0): array;

    /**
     * @param int $type
     * @return array
     */
    public function getCateDgg(int $type): array;

    /**
     * @param int $id
     * @param array $params
     * @return array
     * @example:{
     *      is_published:int 0/1
     * }
     *
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function articlePublish(int $id, array $params): array;

    /**
     * @param array $data
     * @return array
     */
    public function sendEmail(array $data): array;

    /**
     *
     * @param int $id
     * @param array $params
     * @return array
     * @example {
     *      sort:string|int,
     *      operator:string eg. +|-
     * }
     *
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function updateOrder(int $id, array $params): array;

    /**
     * 获取渠道
     * @return array
     */
    public function getChannel(): array;

    /**
     * 创建渠道
     * @param array $params
     * @return array
     */
    public function createChannel(array $params): array;

    /**
     * 更新渠道
     * @param int $id
     * @param array $params
     * @return array
     */
    public function updateChannel(int $id, array $params): array;

    /**
     * 删除渠道
     * @param $id
     * @return array
     */
    public function deleteChannel($id): array;
}
