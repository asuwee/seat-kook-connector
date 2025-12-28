<?php
/**
 * This file is part of SeAT Discord Connector.
 *
 * Copyright (C) 2019, 2020  Warlof Tutsimo <loic.leuilliot@gmail.com>
 *
 * SeAT Discord Connector  is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * SeAT Discord Connector is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace asuwee\Seat\Connector\Drivers\KOOK;

use Illuminate\Support\Facades\Event;
use Seat\Services\AbstractSeatPlugin;

/**
 * Class KOOKConnectorServiceProvider.
 *
 * @package asuwee\Seat\Connector\Drivers\KOOK
 */

class KOOKConnectorServiceProvider extends AbstractSeatPlugin {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(){
        $this -> addRoutes();
        $this -> addViews();
        $this -> addTranslations();
    }

    public function register(){
        $this->mergeConfigFrom(
            __DIR__ . '/Config/KOOK-connector.config.php', 'KOOK-connector.config');

        $this->mergeConfigFrom(
            __DIR__ . '/Config/seat-connector.config.php', 'seat-connector.drivers.KOOK');
    }

    private function addRoutes(){
        if (! $this->app->routesAreCached()) {
            include __DIR__ . '/Http/routes.php';
        }
    }

    private function addTranslations(){
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'seat-KOOK-connector');
    }

    public function addViews(){

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'seat-KOOK-connector');
    }

    public function getName(): string{
        return 'KOOK Connector';
    }

    /**
     * Return the plugin repository address.
     *
     * @example https://github.com/eveseat/web
     *
     * @return string
     */
    public function getPackageRepositoryUrl(): string{
        return 'https://github.com/asuwee/seat-KOOK-connector';
    }

    /**
     * Return the plugin technical name as published on package manager.
     *
     * @example web
     *
     * @return string
     */
    public function getPackagistPackageName(): string{
        return 'seat-KOOK-connector';
    }

    /**
     * Return the plugin vendor tag as published on package manager.
     *
     * @example eveseat
     *
     * @return string
     */
    public function getPackagistVendorName(): string{
        return 'asuwee';
    }
}