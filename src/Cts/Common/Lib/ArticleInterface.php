<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class ArticleInterface
 *
 * @since 2.0
 */
interface ArticleInterface {

    /**
     * @param array $params
     *
     * @return array
     */
    public function getArticleList(array $params): array;

    /**
     * @param int $id
     *
     * @return array
     */
    public function getArticle(int $id): array;

    /**
     * @param array $params
     *
     * @return array
     */
    public function postArticle(array $params): array;

    /**
     * @param int $id
     * @param array $params
     *
     * @return array
     */
    public function updateArticle(int $id, array $params): array;


    /**
     * @param int $id
     *
     * @return array
     */
    public function deleteArticle(int $id): array;


    /**
     * @param array $params
     *
     * @return array
     */
    public function getCategoryList(array $params): array;

    /**
     * @param int $id
     *
     * @return array
     */
    public function getCategory(int $id): array;

    /**
     * @param array $params
     *
     * @return array
     */
    public function postCategory(array $params): array;

    /**
     * @param int $id
     * @param array $params
     *
     * @return array
     */
    public function updateCategory(int $id, array $params): array;



    /**
     * @param int $id
     *
     * @return array
     */
    public function deleteCategory(int $id): array;
}
