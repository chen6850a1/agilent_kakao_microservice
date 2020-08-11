<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class ReservationInterface
 *
 * @since 2.0
 */
interface InstrumentInterface {

    /**
     * 获取suvery
     * @param array $data
     * @example:[
     *      image_data:base64 字符串
     * ]
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function ocr(array $data): array;


    /**
     * 获取suvery
     * @param array $data
     * @example:[
     *      sn:XXXXX
     * ]
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function addSn(array $data): array;

    /**
     * 获取suvery
     * @param array $data
     * @example:[
     *      image_data:base64 字符串
     * ]
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function delSn(array $data): array;

    /**
     * 获取序列号列表,我的仪器展示
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getSnList(array $data): array;

    /**
     * 获取suvery
     * @param array $data
     * @example:[
     *      image_data:base64 字符串
     * ]
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getSnDetail(array $data): array;


    /**
     * 更新备注
     * @param array $data
     * @example:[
     *      id:XXXX ,
     *      remark:XXXX
     * ]
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function updateSnRemark(array $data): array;

    /**
     * 获取我的仪器数数量
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function countMyInstrument(): array;


    /**
     * 创建仪器组
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function createInsGroup(array $data): array;

    /**
     * 编辑仪器组
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function editInsGroup(array $data): array;

    /**
     * 显示仪器组
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function showInsGroup(): array;

    /**
     * 带仪器数量显示仪器组
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function showInsGroupWithInsNum(): array;

    /**
     * 设置仪器进组
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function setInsGroup(array $data): array;


    /**
     * 创建仪器label
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function createInsLabel(array $data): array;

    /**
     * 编辑仪器label
     *
     * @return array
     * @example {
     *      status:true,
     * ]
     */
    public function editInsLabel(array $data): array;

    /**
     * 删除仪器label
     *
     * @return array
     * @example {
     *      status:true,
     * ]
     */
    public function delInsLabel(array $data): array;

    /**
     * 显示仪器标签
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function showInsLabel(): array;

    /**
     * 给仪器添加标签
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function setInsLabel(array $data): array;


    /**
     * 设置仪器的
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getRepairList():array;


}
