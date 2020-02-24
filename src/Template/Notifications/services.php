<?php
// Copyright (C) <2015>  <it-novum GmbH>
//
// This file is dual licensed
//
// 1.
//	This program is free software: you can redistribute it and/or modify
//	it under the terms of the GNU General Public License as published by
//	the Free Software Foundation, version 3 of the License.
//
//	This program is distributed in the hope that it will be useful,
//	but WITHOUT ANY WARRANTY; without even the implied warranty of
//	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//	GNU General Public License for more details.
//
//	You should have received a copy of the GNU General Public License
//	along with this program.  If not, see <http://www.gnu.org/licenses/>.
//

// 2.
//	If you purchased an openITCOCKPIT Enterprise Edition you can use this file
//	under the terms of the openITCOCKPIT Enterprise Edition license agreement.
//	License agreement and license key will be shipped with the order
//	confirmation.

?>
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-envelope fa-fw "></i>
            <?php echo __('Notifications'); ?>
            <span>>
                <?php echo __('Services'); ?>
            </span>
            <div class="third_level">> <?php echo __('Overview'); ?></div>
        </h1>
    </div>
</div>

<section id="widget-grid" class="">

    <div class="row">

        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">

                <header>
                    <div class="widget-toolbar" role="menu">
                        <button type="button" class="btn btn-xs btn-default" ng-click="load()">
                            <i class="fa fa-refresh"></i>
                            <?php echo __('Refresh'); ?>
                        </button>

                        <button type="button" class="btn btn-xs btn-primary" ng-click="triggerFilter()">
                            <i class="fa fa-filter"></i>
                            <?php echo __('Filter'); ?>
                        </button>

                    </div>

                    <div class="jarviswidget-ctrls" role="menu"></div>
                    <span class="widget-icon"> <i class="fa fa-history"></i> </span>
                    <h2><?php echo __('Notifications'); ?> </h2>
                    <ul class="nav nav-tabs pull-right" id="widget-tab-1">
                        <?php if ($this->Acl->hasPermission('index', 'notifications')): ?>
                            <li class="">
                                <a ui-sref="NotificationsIndex">
                                    <i class="fa fa-desktop"></i>
                                    <span class="hidden-mobile hidden-tablet"> <?php echo __('Host notifications'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($this->Acl->hasPermission('services', 'notifications')): ?>
                            <li class="active">
                                <a ui-sref="NotificationsServices">
                                    <i class="fa fa-cog"></i>
                                    <span class="hidden-mobile hidden-tablet"> <?php echo __('Service notifications'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </header>

                <div>
                    <div class="widget-body no-padding">

                        <div class="list-filter well" ng-show="showFilter">
                            <h3><i class="fa fa-filter"></i> <?php echo __('Filter'); ?></h3>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group smart-form">
                                        <label class="input"> <i class="icon-prepend"
                                                                 style="padding-right:14px;"><?php echo __('From'); ?></i>
                                            <input type="text" class="input-sm" style="padding-left:50px;"
                                                   placeholder="<?php echo __('From date'); ?>"
                                                   ng-model="filter.from"
                                                   ng-model-options="{debounce: 500}">
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group smart-form">
                                        <label class="input"> <i class="icon-prepend fa fa-filter"></i>
                                            <input type="text" class="input-sm"
                                                   placeholder="<?php echo __('Filter by output'); ?>"
                                                   ng-model="filter.NotificationServices.output"
                                                   ng-model-options="{debounce: 500}">
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group smart-form">
                                        <label class="input"> <i class="icon-prepend"
                                                                 style="padding-right:14px;"><?php echo __('To'); ?></i>
                                            <input type="text" class="input-sm" style="padding-left:50px;"
                                                   placeholder="<?php echo __('To date'); ?>"
                                                   ng-model="filter.to"
                                                   ng-model-options="{debounce: 500}">
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group smart-form">
                                        <label class="input"> <i class="icon-prepend fa fa-terminal"></i>
                                            <input type="text" class="input-sm"
                                                   placeholder="<?php echo __('Filter by notification method'); ?>"
                                                   ng-model="filter.Commands.name"
                                                   ng-model-options="{debounce: 500}">
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group smart-form">
                                        <label class="input"> <i class="icon-prepend fa fa-desktop"></i>
                                            <input type="text" class="input-sm"
                                                   placeholder="<?php echo __('Filter by host name'); ?>"
                                                   ng-model="filter.Hosts.name"
                                                   ng-model-options="{debounce: 500}">
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group smart-form">
                                        <label class="input"> <i class="icon-prepend fa fa-cog"></i>
                                            <input type="text" class="input-sm"
                                                   placeholder="<?php echo __('Filter by service name'); ?>"
                                                   ng-model="filter.servicename"
                                                   ng-model-options="{debounce: 500}">
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group smart-form">
                                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                            <input type="text" class="input-sm"
                                                   placeholder="<?php echo __('Filter by contact name'); ?>"
                                                   ng-model="filter.Contacts.name"
                                                   ng-model-options="{debounce: 500}">
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-xs-12 col-md-3">
                                    <fieldset>
                                        <legend><?php echo __('States'); ?></legend>
                                        <div class="form-group smart-form">
                                            <label class="checkbox small-checkbox-label">
                                                <input type="checkbox" name="checkbox" checked="checked"
                                                       ng-model="filter.NotificationServices.state.ok"
                                                       ng-model-options="{debounce: 500}">
                                                <i class="checkbox-success"></i>
                                                <?php echo __('Ok'); ?>
                                            </label>

                                            <label class="checkbox small-checkbox-label">
                                                <input type="checkbox" name="checkbox" checked="checked"
                                                       ng-model="filter.NotificationServices.state.warning"
                                                       ng-model-options="{debounce: 500}">
                                                <i class="checkbox-warning"></i>
                                                <?php echo __('Warning'); ?>
                                            </label>

                                            <label class="checkbox small-checkbox-label">
                                                <input type="checkbox" name="checkbox" checked="checked"
                                                       ng-model="filter.NotificationServices.state.critical"
                                                       ng-model-options="{debounce: 500}">
                                                <i class="checkbox-danger"></i>
                                                <?php echo __('Critical'); ?>
                                            </label>

                                            <label class="checkbox small-checkbox-label">
                                                <input type="checkbox" name="checkbox" checked="checked"
                                                       ng-model="filter.NotificationServices.state.unknown"
                                                       ng-model-options="{debounce: 500}">
                                                <i class="checkbox-default"></i>
                                                <?php echo __('Unknown'); ?>
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="pull-right margin-top-10">
                                        <button type="button" ng-click="resetFilter()"
                                                class="btn btn-xs btn-danger">
                                            <?php echo __('Reset Filter'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mobile_table">

                            <table id="notification_list"
                                   class="table table-striped table-hover table-bordered smart-form"
                                   style="">
                                <thead>
                                <tr>
                                    <th class="no-sort" ng-click="orderBy('NotificationServices.state')">
                                        <i class="fa" ng-class="getSortClass('NotificationServices.state')"></i>
                                        <?php echo __('State'); ?>
                                    </th>
                                    <th class="no-sort" ng-click="orderBy('Hosts.name')">
                                        <i class="fa" ng-class="getSortClass('Hosts.name')"></i>
                                        <?php echo __('Host'); ?>
                                    </th>
                                    <th class="no-sort" ng-click="orderBy('servicename')">
                                        <i class="fa" ng-class="getSortClass('servicename')"></i>
                                        <?php echo __('Service'); ?>
                                    </th>
                                    <th class="no-sort" ng-click="orderBy('NotificationServices.start_time')">
                                        <i class="fa" ng-class="getSortClass('NotificationServices.start_time')"></i>
                                        <?php echo __('Date'); ?>
                                    </th>
                                    <th class="no-sort" ng-click="orderBy('Contacts.name')">
                                        <i class="fa" ng-class="getSortClass('Contacts.name')"></i>
                                        <?php echo __('Contact'); ?>
                                    </th>
                                    <th class="no-sort" ng-click="orderBy('Commands.name')">
                                        <i class="fa" ng-class="getSortClass('Commands.name')"></i>
                                        <?php echo __('Notification Method'); ?>
                                    </th>
                                    <th class="no-sort" ng-click="orderBy('NotificationServices.output')">
                                        <i class="fa" ng-class="getSortClass('NotificationServices.output')"></i>
                                        <?php echo __('Output'); ?>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr ng-repeat="Notification in notifications">

                                    <td class="text-center">
                                        <servicestatusicon
                                                state="Notification.NotificationService.state"></servicestatusicon>
                                    </td>
                                    <td>
                                        <?php if ($this->Acl->hasPermission('browser', 'hosts')): ?>
                                            <a ui-sref="HostsBrowser({id:Notification.Host.id})">{{
                                                Notification.Host.name }}
                                            </a>
                                        <?php else: ?>
                                            {{ Notification.Host.name }}
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($this->Acl->hasPermission('browser', 'services')): ?>
                                            <a ui-sref="ServicesBrowser({id:Notification.Service.id})">{{
                                                Notification.Service.servicename }}
                                            </a>
                                        <?php else: ?>
                                            {{ Notification.Service.servicename }}
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        {{ Notification.NotificationService.start_time }}
                                    </td>
                                    <td>
                                        <?php if ($this->Acl->hasPermission('edit', 'contacts')): ?>
                                            <a ui-sref="ContactsEdit({id: Notification.Contact.id})">{{
                                                Notification.Contact.name }}
                                            </a>
                                        <?php else: ?>
                                            {{ Notification.Contact.name }}
                                        <?php endif; ?>

                                    </td>
                                    <td>
                                        <?php if ($this->Acl->hasPermission('edit', 'commands')): ?>
                                            <a ui-sref="CommandsEdit({id:Notification.Command.id})">{{
                                                Notification.Command.name }}
                                            </a>
                                        <?php else: ?>
                                            {{ Notification.Command.name }}
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        {{ Notification.NotificationService.output }}
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                        </div>

                        <div class="row margin-top-10 margin-bottom-10">
                            <div class="row margin-top-10 margin-bottom-10" ng-show="notifications.length == 0">
                                <div class="col-xs-12 text-center txt-color-red italic">
                                    <?php echo __('No entries match the selection'); ?>
                                </div>
                            </div>
                        </div>

                        <scroll scroll="scroll" click-action="changepage" ng-if="scroll"></scroll>
                        <paginator paging="paging" click-action="changepage" ng-if="paging"></paginator>
                        <?php echo $this->element('paginator_or_scroll'); ?>

                    </div>
                </div>
            </div>
    </div>
</section>