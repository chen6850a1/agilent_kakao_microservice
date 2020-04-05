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
     * 获取suvery
     *
     * @return array
     * @example {
     *      status:true,
     *      data:XXXX
     * ]
     */
    public function getSnList(): array;

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
}
