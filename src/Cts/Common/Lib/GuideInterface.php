<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class GuideInterface
 *
 * @since 2.0
 */
interface GuideInterface {

    /**
     * @param array $params
     * @example:{
     *      page:string|int,
     *      pageSize:string|int,
     *      parent_id:int,
     *      keyword:string,
     *      orderBy:string,
     *      direction:string eg.asc|desc
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getCategoryList(array $params): array;

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
     * @example:{
     *      name:string,
     *      parent_id:int,
     *      icon:string
     * }
     *
     * @return array
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
     * @example:{
     *      name:string,
     *      icon:string
     * }
     *
     * @return array
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
     * @param array $params
     * @example:{
     *      page:string|int,
     *      pageSize:string|int,
     *      category_id:int,
     *      keyword:string,
     *      orderBy:string,
     *      direction:string eg.asc|desc
     * }
     *
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getArticleList(array $params): array;

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
     * @param array $params
     * @example:{
     *      name:string,
     *      content:string,
     *      category_id:int,
     *      hot_spot:int 0|1,
     *      sort:int 1-10,
     *      type:int 0|1
     * }
     *
     * @return array
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
     * @example:{
     *      name:string,
     *      content:string,
     *      category_id:int,
     *      hot_spot:int 0|1,
     *      sort:int 0-10,
     *      type:int 0|1
     * }
     *
     * @return array
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
}
