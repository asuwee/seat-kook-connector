<?php

/**
 * This file is part of SeAT QQ Connector.
 *
 * Copyright (C) 2019, 2020  FeiBam Tutsimo <feibam19690104@gmail.com>
 *
 * SeAT QQ Connector  is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * SeAT QQ Connector is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

return [
    'name'     => 'KOOK',
    'icon'     => 'fab fa-qq',
    'client'   => \FeiBam\Seat\Connector\Drivers\KOOK\Driver\KOOKClient::class,
    'settings' => [
       [
        'name' => 'allow_modification_bind_infomation',
        'label' => 'seat-kook-connector::seat.allow_modification_bind_infomation',
        'type' => 'checkbox'
       ]
    ]
];