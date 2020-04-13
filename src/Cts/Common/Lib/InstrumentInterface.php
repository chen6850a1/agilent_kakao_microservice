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
     * 获取所有序列号,
     *
     * @return array
     * @example {
     *      status:true,
     *      data:["DE123456","DE123134341"]
     * ]
     */
    public function getAllSn(array $data): array;

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
}
