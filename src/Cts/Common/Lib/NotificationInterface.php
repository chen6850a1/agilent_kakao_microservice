<?php

declare(strict_types=1);

namespace Cts\Common\Lib;

/**
 * Class AdminUserInterface
 *
 * @since 2.0
 */
interface NotificationInterface {

    /**
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function getMailConfig(): array;

    /**
     * 
     * @param array $param
     * @example:{
     *      installation:string,
     *      pm:string,
     *      oq:string,
     *      fill_info:string,
     *      survey_ZWECHAT_PTS_SURVEY:string,
     *      survey_ZWECHATSRQ_SURVEY1:string,
     *      survey_ZWECHATOSO_SURVEY:string,
     *      survey_full_marks:string
     * }
     * 
     * @return array
     * @example {
     *      status:true|false,
     *      data:string,
     *      error:string
     * }
     */
    public function setMailConfig(array $param): array;


    /**
     * 获取离线消息的参数id
     * @param string $key
     * @return array
     */
    public function getOfflineMessageUrl(string $key): array;

    /**
     * 获取短信短地址里的原始随机数
     * @param string $key
     * @return array
     */
    public function getOfflineMessageSmsRandomStrByCode(string $key): array;
}
