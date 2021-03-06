<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V6_8_0;

use Artisan;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        Artisan::call('upgrade:v6.8.0');

        $configs = [
            [
                'id'         => 188,
                'name'       => 'bjyblog.social_links.github',
                'value'      => '',
                'created_at' => '2019-12-22 23:55:00',
                'updated_at' => '2019-12-22 23:55:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 189,
                'name'       => 'bjyblog.social_links.gitee',
                'value'      => '',
                'created_at' => '2019-12-22 23:55:00',
                'updated_at' => '2019-12-22 23:55:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 190,
                'name'       => 'bjyblog.social_links.zhihu',
                'value'      => '',
                'created_at' => '2019-12-22 23:55:00',
                'updated_at' => '2019-12-22 23:55:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 191,
                'name'       => 'bjyblog.social_links.weibo',
                'value'      => '',
                'created_at' => '2019-12-22 23:55:00',
                'updated_at' => '2019-12-22 23:55:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 192,
                'name'       => 'bjyblog.social_links.upyun',
                'value'      => '',
                'created_at' => '2019-12-22 23:55:00',
                'updated_at' => '2019-12-22 23:55:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 193,
                'name'       => 'bjyblog.link_target',
                'value'      => '_blank',
                'created_at' => '2019-12-25 23:06:00',
                'updated_at' => '2019-12-25 23:06:00',
                'deleted_at' => null,
            ],
        ];

        foreach ($configs as $config) {
            static::assertDatabaseHas('configs', $config);
        }
    }
}
