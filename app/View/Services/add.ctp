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
            <i class="fa fa-cog fa-fw "></i>
            <?php echo __('Services'); ?>
            <span>>
                <?php echo __('Add'); ?>
            </span>
        </h1>
    </div>
</div>
<div id="error_msg"></div>

<div class="jarviswidget" id="wid-id-0">
    <header>
        <span class="widget-icon"> <i class="fa fa-cog"></i> </span>
        <h2><?php echo __('Create new service'); ?></h2>
        <div class="widget-toolbar" role="menu">
            <?php if ($this->Acl->hasPermission('index', 'services')): ?>
                <a back-button fallback-state='ServicesIndex' class="btn btn-default btn-xs">
                    <i class="glyphicon glyphicon-white glyphicon-arrow-left"></i> <?php echo __('Back to list'); ?>
                </a>
            <?php endif; ?>
        </div>
    </header>
    <div>
        <div class="widget-body">
            <form ng-submit="submit();" class="form-horizontal"
                  ng-init="successMessage=
            {objectName : '<?php echo __('Service'); ?>' , message: '<?php echo __('created successfully'); ?>'}">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="jarviswidget">
                            <header>
                                <span class="widget-icon">
                                    <i class="fa fa-magic"></i>
                                </span>
                                <h2><?php echo __('Basic configuration'); ?></h2>
                            </header>
                            <div>
                                <div class="widget-body">
                                    <div class="row">
                                        <div class="form-group required" ng-class="{'has-error': errors.host_id}">
                                            <label class="col-xs-12 col-lg-2 control-label">
                                                <?php echo __('Host'); ?>
                                            </label>
                                            <div class="col-xs-12 col-lg-10">
                                                <select
                                                        id="ServiceHosts"
                                                        data-placeholder="<?php echo __('Please choose'); ?>"
                                                        class="form-control"
                                                        chosen="hosts"
                                                        callback="loadHosts"
                                                        ng-options="host.key as host.value for host in hosts"
                                                        ng-model="post.Service.host_id">
                                                </select>
                                                <div ng-show="post.Service.host_id < 1" class="warning-glow">
                                                    <?php echo __('Please select a host.'); ?>
                                                </div>
                                                <div ng-repeat="error in errors.host_id">
                                                    <div class="help-block text-danger">{{ error }}</div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group required"
                                             ng-class="{'has-error': errors.servicetemplate_id}">
                                            <label class="col-xs-12 col-lg-2 control-label">
                                                <?php echo __('Service template'); ?>
                                            </label>
                                            <div class="col-xs-12 col-lg-10">
                                                <select
                                                        id="ServiceServicetemplateSelect"
                                                        data-placeholder="<?php echo __('Please choose'); ?>"
                                                        class="form-control"
                                                        chosen="servicetemplates"
                                                        ng-options="servicetemplate.key as servicetemplate.value for servicetemplate in servicetemplates"
                                                        ng-model="post.Service.servicetemplate_id">
                                                </select>
                                                <div ng-show="post.Service.host_id > 0 && post.Service.servicetemplate_id < 1"
                                                     class="warning-glow">
                                                    <?php echo __('Please select a service template.'); ?>
                                                </div>
                                                <div ng-repeat="error in errors.servicetemplate_id">
                                                    <div class="help-block text-danger">{{ error }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group required" ng-class="{'has-error': errors.name}">
                                            <label class="col-xs-12 col-lg-2 control-label">
                                                <?php echo __('Service name'); ?>
                                            </label>
                                            <div class="col-xs-12 col-lg-10">
                                                <input
                                                        id="ServiceName"
                                                        class="form-control"
                                                        type="text"
                                                        ng-model="post.Service.name">
                                                <div ng-repeat="error in errors.name">
                                                    <div class="help-block text-danger">{{ error }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div ng-show="post.Service.servicetemplate_id">

                                            <div class="form-group" ng-class="{'has-error': errors.description}">
                                                <label class="col-xs-12 col-lg-2 control-label">
                                                    <?php echo __('Description'); ?>
                                                </label>
                                                <div class="col-xs-12 col-lg-10">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input
                                                                class="form-control"
                                                                type="text"
                                                                ng-model="post.Service.description">

                                                        <template-diff ng-show="post.Service.servicetemplate_id"
                                                                       value="post.Service.description"
                                                                       template-value="servicetemplate.Servicetemplate.description"></template-diff>
                                                    </div>
                                                    <div ng-repeat="error in errors.description">
                                                        <div class="help-block text-danger">{{ error }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group"
                                                 ng-class="{'has-error': errors.servicegroups}">
                                                <label class="col-xs-12 col-lg-2 control-label">
                                                    <?php echo __('Service groups'); ?>
                                                </label>
                                                <div class="col-xs-12 col-lg-10">
                                                    <div class="input-group" style="width: 100%;">
                                                        <select
                                                                id="ServicegroupsSelect"
                                                                data-placeholder="<?php echo __('Please choose'); ?>"
                                                                class="form-control"
                                                                chosen="servicegroups"
                                                                multiple
                                                                ng-options="servicegroup.key as servicegroup.value for servicegroup in servicegroups"
                                                                ng-model="post.Service.servicegroups._ids">
                                                        </select>
                                                        <template-diff ng-show="post.Service.servicetemplate_id"
                                                                       value="post.Service.servicegroups._ids"
                                                                       template-value="servicetemplate.Servicetemplate.servicegroups._ids"></template-diff>
                                                    </div>
                                                    <div ng-repeat="error in errors.servicegroups">
                                                        <div class="help-block text-danger">{{ error }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group" ng-class="{'has-error': errors.tags}">
                                                <label class="col-xs-12 col-lg-2 control-label">
                                                    <?php echo __('Tags'); ?>
                                                </label>
                                                <div class="col-xs-12 col-lg-10">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input
                                                                id="ServiceTagsInput"
                                                                class="form-control tagsinput"
                                                                type="text"
                                                                ng-model="post.Service.tags">
                                                        <template-diff ng-show="post.Service.servicetemplate_id"
                                                                       value="post.Service.tags"
                                                                       template-value="servicetemplate.Servicetemplate.tags"
                                                                       callback="restoreTemplateTags"></template-diff>
                                                    </div>
                                                    <div ng-repeat="error in errors.tags">
                                                        <div class="help-block text-danger">{{ error }}</div>
                                                    </div>
                                                    <div class="help-block">
                                                        <?php echo __('Press return to separate tags'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group" ng-class="{'has-error': errors.priority}">
                                                <label class="col-xs-12 col-lg-2 control-label">
                                                    <?php echo __('Priority'); ?>
                                                </label>
                                                <div class="col-xs-12 col-lg-2">
                                                    <priority-directive priority="post.Service.priority"
                                                                        callback="setPriority"></priority-directive>
                                                    <template-diff-button ng-show="post.Service.servicetemplate_id"
                                                                          value="post.Service.priority"
                                                                          template-value="servicetemplate.Servicetemplate.priority">
                                                    </template-diff-button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" ng-show="post.Service.servicetemplate_id">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="jarviswidget">
                            <header>
                                <span class="widget-icon">
                                    <i class="fa fa-terminal"></i>
                                </span>
                                <h2><?php echo __('Check configuration'); ?></h2>
                            </header>
                            <div>
                                <div class="widget-body">

                                    <div class="form-group required"
                                         ng-class="{'has-error': errors.check_period_id}">
                                        <label class="col-xs-12 col-lg-2 control-label">
                                            <?php echo __('Check period'); ?>
                                        </label>
                                        <div class="col-xs-12 col-lg-10">
                                            <div class="input-group" style="width: 100%;">
                                                <select
                                                        id="CheckPeriodSelect"
                                                        data-placeholder="<?php echo __('Please choose'); ?>"
                                                        class="form-control"
                                                        chosen="checkperiods"
                                                        ng-options="checkperiod.key as checkperiod.value for checkperiod in checkperiods"
                                                        ng-model="post.Service.check_period_id">
                                                </select>
                                                <template-diff ng-show="post.Service.servicetemplate_id"
                                                               value="post.Service.check_period_id"
                                                               template-value="servicetemplate.Servicetemplate.check_period_id"></template-diff>
                                            </div>
                                            <div ng-repeat="error in errors.check_period_id">
                                                <div class="help-block text-danger">{{ error }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         ng-class="{'has-error': errors.active_checks_enabled}">
                                        <label class="col-xs-12 col-lg-2 control-label" for="activeChecksEnabled">
                                            <?php echo __('Enable active checks'); ?>
                                        </label>

                                        <div class="col-xs-12 col-lg-1 smart-form">
                                            <label class="checkbox no-required no-padding no-margin label-default-off">
                                                <input type="checkbox" name="checkbox"
                                                       id="activeChecksEnabled"
                                                       ng-true-value="1"
                                                       ng-false-value="0"
                                                       ng-model="post.Service.active_checks_enabled">
                                                <i class="checkbox-primary"></i>
                                            </label>
                                            <div class="padding-left-20">
                                                <template-diff-button ng-show="post.Service.servicetemplate_id"
                                                                      value="post.Service.active_checks_enabled"
                                                                      template-value="servicetemplate.Servicetemplate.active_checks_enabled">
                                                </template-diff-button>
                                            </div>
                                        </div>
                                        <div class="col col-xs-12 col-md-offset-2 help-block">
                                            <?php echo __('If disabled the check command won\'t be executed. This is useful if an external program sends state data to openITCOCKPIT.'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group"
                                         ng-class="{'has-error': errors.freshness_checks_enabled}"
                                         ng-show="post.Service.active_checks_enabled == 0">
                                        <label class="col-xs-12 col-lg-2 control-label" for="freshnessChecksEnabled">
                                            <?php echo __('Enable freshness check'); ?>
                                        </label>


                                        <div class="col-xs-12 col-lg-10 smart-form">
                                            <label class="checkbox small-checkbox-label no-required">
                                                <input type="checkbox" name="checkbox"
                                                       id="freshnessChecksEnabled"
                                                       ng-true-value="1"
                                                       ng-false-value="0"
                                                       ng-model="post.Service.freshness_checks_enabled">
                                                <i class="checkbox-primary"></i>
                                            </label>
                                            <div class="padding-left-20">
                                                <template-diff-button ng-show="post.Service.servicetemplate_id"
                                                                      value="post.Service.freshness_checks_enabled"
                                                                      template-value="servicetemplate.Servicetemplate.freshness_checks_enabled">
                                                </template-diff-button>
                                            </div>
                                            <div class="help-block">
                                                <?php echo __('If enabled the system will check that passive checks for this service will be received as frequently as defined.'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group required"
                                         ng-class="{'has-error': errors.freshness_threshold}"
                                         ng-show="post.Service.active_checks_enabled == 0 && post.Service.freshness_checks_enabled == 1">
                                        <label class="col-xs-12 col-lg-2 control-label">
                                            <?php echo __('Freshness threshold'); ?>
                                        </label>
                                        <interval-input-with-differ-directive
                                                template-id="post.Service.servicetemplate_id"
                                                interval="post.Service.freshness_threshold"
                                                template-value="servicetemplate.Servicetemplate.freshness_threshold"></interval-input-with-differ-directive>
                                        <div class="col-xs-12 col-lg-offset-2">
                                            <div ng-repeat="error in errors.freshness_threshold">
                                                <div class="help-block text-danger">{{ error }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group required"
                                         ng-class="{'has-error': errors.command_id}">
                                        <label class="col-xs-12 col-lg-2 control-label">
                                            <?php echo __('Check command'); ?>
                                        </label>
                                        <div class="col-xs-12 col-lg-10">
                                            <div class="input-group" style="width: 100%;">
                                                <select
                                                        id="ServiceCheckCommandSelect"
                                                        data-placeholder="<?php echo __('Please choose'); ?>"
                                                        class="form-control"
                                                        chosen="commands"
                                                        ng-options="command.key as command.value for command in commands"
                                                        ng-model="post.Service.command_id">
                                                </select>
                                                <template-diff ng-show="post.Service.servicetemplate_id"
                                                               value="post.Service.command_id"
                                                               template-value="servicetemplate.Servicetemplate.command_id"></template-diff>
                                            </div>
                                            <div class="help-block" ng-hide="post.Service.active_checks_enabled">
                                                <?php echo __('Due to active checking is disabled, this command will only be used as freshness check command.'); ?>
                                            </div>
                                            <div ng-repeat="error in errors.command_id">
                                                <div class="help-block text-danger">{{ error }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"
                                         ng-class="{'has-error': errors.servicecommandargumentvalues}"
                                         ng-repeat="servicecommandargumentvalue in post.Service.servicecommandargumentvalues">
                                        <label class="col-xs-12 col-lg-offset-2 col-lg-2 control-label text-primary">
                                            {{servicecommandargumentvalue.commandargument.human_name}}
                                        </label>
                                        <div class="col-xs-12 col-lg-8">
                                            <div class="input-group">
                                                <input
                                                        class="form-control"
                                                        type="text"
                                                        ng-model="servicecommandargumentvalue.value">
                                                <template-diff
                                                        value="servicecommandargumentvalue.value"
                                                        template-value="servicetemplate.Servicetemplate.servicetemplatecommandargumentvalues[$index].value"></template-diff>
                                            </div>
                                            <div ng-repeat="error in errors.servicecommandargumentvalues">
                                                <div class="help-block text-danger">{{ error }}</div>
                                            </div>
                                            <div class="help-block">
                                                {{servicecommandargumentvalue.commandargument.name}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"
                                         ng-show="post.Service.command_id > 0 && post.Service.servicecommandargumentvalues.length == 0">
                                        <div class="col-xs-12 col-lg-offset-2 text-info">
                                            <i class="fa fa-info-circle"></i>
                                            <?php echo __('This command does not have any parameters.'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group required" ng-class="{'has-error': errors.check_interval}">
                                        <label class="col-xs-12 col-lg-2 control-label">
                                            <?php echo __('Check interval'); ?>
                                        </label>
                                        <interval-input-with-differ-directive
                                                template-id="post.Service.servicetemplate_id"
                                                interval="post.Service.check_interval"
                                                template-value="servicetemplate.Servicetemplate.check_interval"></interval-input-with-differ-directive>
                                        <div class="col-xs-12 col-lg-offset-2">
                                            <div ng-repeat="error in errors.check_interval">
                                                <div class="help-block text-danger">{{ error }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group required" ng-class="{'has-error': errors.retry_interval}">
                                        <label class="col-xs-12 col-lg-2 control-label">
                                            <?php echo __('Retry interval'); ?>
                                        </label>
                                        <interval-input-with-differ-directive
                                                template-id="post.Service.servicetemplate_id"
                                                interval="post.Service.retry_interval"
                                                template-value="servicetemplate.Servicetemplate.retry_interval"></interval-input-with-differ-directive>

                                        <div class="col-xs-12 col-lg-offset-2">
                                            <div ng-repeat="error in errors.retry_interval">
                                                <div class="help-block text-danger">{{ error }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group required"
                                         ng-class="{'has-error': errors.max_check_attempts}">
                                        <label class="col-xs-12 col-lg-2 control-label">
                                            <?php echo __('Max. number of check attempts'); ?>
                                        </label>
                                        <div class="col-xs-12 col-lg-7">
                                            <div class="btn-group">
                                                <?php for ($i = 1; $i <= 10; $i++): ?>
                                                    <button
                                                            type="button"
                                                            class="btn btn-default"
                                                            ng-click="post.Service.max_check_attempts = <?php echo h($i) ?>"
                                                            ng-class="{'active': post.Service.max_check_attempts == <?php echo h($i); ?>}">
                                                        <?php echo h($i); ?>
                                                    </button>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg-3">
                                            <div class="input-group" style="width: 100%;">
                                                <input
                                                        class="form-control"
                                                        type="number"
                                                        min="0"
                                                        ng-model="post.Service.max_check_attempts">
                                                <template-diff ng-show="post.Service.servicetemplate_id"
                                                               value="post.Service.max_check_attempts"
                                                               template-value="servicetemplate.Servicetemplate.max_check_attempts"></template-diff>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg-offset-2 col-lg-12">
                                            <div class="help-block">
                                                <?php echo __('Number of failed attempts before the service will switch into hard state.'); ?>
                                            </div>
                                            <div class="help-block">
                                                <?php echo __('Worst case time delay until notification command gets executed after state hits a non ok state: '); ?>
                                                <human-time-directive
                                                        seconds="(post.Service.check_interval + (post.Service.max_check_attempts -1) * post.Service.retry_interval)"></human-time-directive>
                                            </div>
                                            <div ng-repeat="error in errors.max_check_attempts">
                                                <div class="help-block text-danger">{{ error }}</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" ng-show="post.Service.servicetemplate_id">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="jarviswidget">
                            <header>
                                <span class="widget-icon">
                                    <i class="fa fa-envelope-open-o"></i>
                                </span>
                                <h2><?php echo __('Notification configuration'); ?></h2>
                            </header>
                            <div>
                                <div class="widget-body">
                                    <div class="form-group required"
                                         ng-class="{'has-error': errors.notify_period_id}">
                                        <label class="col-xs-12 col-lg-2 control-label">
                                            <?php echo __('Notification period'); ?>
                                        </label>
                                        <div class="col-xs-12 col-lg-10">
                                            <div class="input-group" style="width: 100%;">
                                                <select
                                                        id="NotifyPeriodSelect"
                                                        data-placeholder="<?php echo __('Please choose'); ?>"
                                                        class="form-control"
                                                        chosen="timeperiods"
                                                        ng-options="timeperiod.key as timeperiod.value for timeperiod in timeperiods"
                                                        ng-model="post.Service.notify_period_id">
                                                </select>
                                                <template-diff ng-show="post.Service.servicetemplate_id"
                                                               value="post.Service.notify_period_id"
                                                               template-value="servicetemplate.Servicetemplate.notify_period_id"></template-diff>
                                            </div>
                                            <div ng-repeat="error in errors.notify_period_id">
                                                <div class="help-block text-danger">{{ error }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group required"
                                         ng-class="{'has-error': errors.notification_interval}">
                                        <label class="col-xs-12 col-lg-2 control-label">
                                            <?php echo __('Notification interval'); ?>
                                        </label>
                                        <interval-input-with-differ-directive
                                                template-id="post.Service.servicetemplate_id"
                                                interval="post.Service.notification_interval"
                                                template-value="servicetemplate.Servicetemplate.notification_interval"></interval-input-with-differ-directive>
                                        <div class="col-xs-12 col-lg-offset-2">
                                            <div ng-repeat="error in errors.notification_interval">
                                                <div class="help-block text-danger">{{ error }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"
                                         ng-class="{'has-error': errors.contacts}">
                                        <label class="col-xs-12 col-lg-2 control-label">
                                            <?php echo __('Contacts'); ?>
                                        </label>
                                        <div class="col-xs-12 col-lg-10">
                                            <div class="input-group" style="width: 100%">
                                                <select
                                                        id="ContactsPeriodSelect"
                                                        data-placeholder="<?php echo __('Please choose'); ?>"
                                                        class="form-control"
                                                        chosen="contacts"
                                                        multiple
                                                        ng-options="contact.key as contact.value for contact in contacts"
                                                        ng-model="post.Service.contacts._ids">
                                                </select>
                                                <template-diff ng-show="post.Service.servicetemplate_id"
                                                               value="post.Service.contacts._ids"
                                                               template-value="servicetemplate.Servicetemplate.contacts._ids"></template-diff>
                                            </div>
                                        </div>
                                        <div ng-repeat="error in errors.contacts">
                                            <div class="help-block text-danger">{{ error }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group"
                                     ng-class="{'has-error': errors.contactgroups}">
                                    <label class="col-xs-12 col-lg-2 control-label">
                                        <?php echo __('Contact groups'); ?>
                                    </label>
                                    <div class="col-xs-12 col-lg-10">
                                        <div class="input-group" style="width: 100%;">
                                            <select
                                                    id="ContactgroupsSelect"
                                                    data-placeholder="<?php echo __('Please choose'); ?>"
                                                    class="form-control"
                                                    chosen="contactgroups"
                                                    multiple
                                                    ng-options="contactgroup.key as contactgroup.value for contactgroup in contactgroups"
                                                    ng-model="post.Service.contactgroups._ids">
                                            </select>
                                            <template-diff ng-show="post.Service.servicetemplate_id"
                                                           value="post.Service.contactgroups._ids"
                                                           template-value="servicetemplate.Servicetemplate.contactgroups._ids"></template-diff>
                                        </div>
                                        <div ng-repeat="error in errors.contactgroups">
                                            <div class="help-block text-danger">{{ error }}</div>
                                        </div>
                                    </div>
                                </div>


                                <?php
                                $serviceOptions = [
                                    [
                                        'field' => 'notify_on_recovery',
                                        'class' => 'success',
                                        'text'  => __('Recovery')
                                    ],
                                    [
                                        'field' => 'notify_on_warning',
                                        'class' => 'warning',
                                        'text'  => __('Warning')
                                    ],
                                    [
                                        'field' => 'notify_on_critical',
                                        'class' => 'danger',
                                        'text'  => __('Critical')
                                    ],
                                    [
                                        'field' => 'notify_on_unknown',
                                        'class' => 'default',
                                        'text'  => __('Unknown')
                                    ],
                                    [
                                        'field' => 'notify_on_flapping',
                                        'class' => 'primary',
                                        'text'  => __('Flapping')
                                    ],
                                    [
                                        'field' => 'notify_on_downtime',
                                        'class' => 'primary',
                                        'text'  => __('Downtime')
                                    ],
                                ];
                                ?>
                                <fieldset>
                                    <legend class="font-sm"
                                            ng-class="{'has-error-no-form': errors.notify_on_recovery}">
                                        <div class="required">
                                            <label>
                                                <?php echo __('Service notification options'); ?>
                                            </label>

                                            <div ng-repeat="error in errors.notify_on_recovery">
                                                <div class="text-danger">{{ error }}</div>
                                            </div>
                                        </div>
                                    </legend>
                                    <ul class="config-flex-inner">
                                        <?php foreach ($serviceOptions as $serviceOption): ?>
                                            <li>
                                                <div class="margin-bottom-0"
                                                     ng-class="{'has-error': errors.<?php echo $serviceOption['field']; ?>}">
                                                    <label for="<?php echo $serviceOption['field']; ?>"
                                                           class="col col-md-7 control-label padding-top-0">
                                                        <span class="label label-<?php echo $serviceOption['class']; ?> notify-label-small">
                                                            <?php echo $serviceOption['text']; ?>
                                                        </span>
                                                    </label>
                                                    <div class="col-md-2 smart-form">
                                                        <label class="checkbox small-checkbox-label no-required">
                                                            <input type="checkbox" name="checkbox"
                                                                   ng-true-value="1"
                                                                   ng-false-value="0"
                                                                   id="<?php echo $serviceOption['field']; ?>"
                                                                   ng-model="post.Service.<?php echo $serviceOption['field']; ?>">
                                                            <i class="checkbox-<?php echo $serviceOption['class']; ?>"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <template-diff-button ng-show="post.Service.servicetemplate_id"
                                                                      value="post.Service.<?php echo $serviceOption['field']; ?>"
                                                                      template-value="servicetemplate.Servicetemplate.<?php echo $serviceOption['field']; ?>">
                                                </template-diff-button>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" ng-show="post.Service.servicetemplate_id">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="jarviswidget">
                            <header>
                                <span class="widget-icon">
                                    <i class="fa fa-wrench"></i>
                                </span>
                                <h2><?php echo __('Misc. configuration'); ?></h2>
                            </header>
                            <div>
                                <div class="widget-body">

                                    <div class="form-group" ng-class="{'has-error': errors.service_url}">
                                        <label class="col-xs-12 col-lg-2 control-label">
                                            <?php echo __('Service URL'); ?>
                                        </label>
                                        <div class="col-xs-12 col-lg-10">
                                            <div class="input-group" style="width: 100%;">
                                                <input
                                                        class="form-control"
                                                        placeholder="https://issues.example.org?host=$HOSTNAME$&service=$SERVICEDESC$"
                                                        type="text"
                                                        ng-model="post.Service.service_url">
                                                <template-diff ng-show="post.Service.servicetemplate_id"
                                                               value="post.Service.service_url"
                                                               template-value="servicetemplate.Servicetemplate.service_url"></template-diff>
                                            </div>
                                            <div ng-repeat="error in errors.service_url">
                                                <div class="help-block text-danger">{{ error }}</div>
                                            </div>
                                            <div class="help-block">
                                                <?php echo __('The macros $HOSTNAME$, $HOSTDISPLAYNAME$, $HOSTADDRESS$, $SERVICEDESC$, $SERVICEDISPLAYNAME$ will be replaced'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" ng-class="{'has-error': errors.notes}">
                                        <label class="col-xs-12 col-lg-2 control-label">
                                            <?php echo __('Notes'); ?>
                                        </label>
                                        <div class="col-xs-12 col-lg-10">
                                            <div class="input-group" style="width: 100%;">
                                                <input
                                                        class="form-control"
                                                        type="text"
                                                        ng-model="post.Service.notes">
                                                <template-diff ng-show="post.Service.servicetemplate_id"
                                                               value="post.Service.notes"
                                                               template-value="servicetemplate.Servicetemplate.notes"></template-diff>
                                            </div>
                                            <div ng-repeat="error in errors.notes">
                                                <div class="help-block text-danger">{{ error }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $serviceFlapOptions = [
                                        [
                                            'field' => 'flap_detection_on_ok',
                                            'class' => 'success',
                                            'text'  => __('Recovery')
                                        ],
                                        [
                                            'field' => 'flap_detection_on_warning',
                                            'class' => 'warning',
                                            'text'  => __('Warning')
                                        ],
                                        [
                                            'field' => 'flap_detection_on_critical',
                                            'class' => 'danger',
                                            'text'  => __('Critical')
                                        ],
                                        [
                                            'field' => 'flap_detection_on_unknown',
                                            'class' => 'default',
                                            'text'  => __('Unknown')
                                        ]
                                    ];
                                    ?>

                                    <div class="form-group"
                                         ng-class="{'has-error': errors.flap_detection_enabled}">
                                        <label class="col-xs-12 col-lg-2 control-label" for="flapDetectionEnabled">
                                            <?php echo __('Flap detection enabled'); ?>
                                        </label>

                                        <div class="col-xs-12 col-lg-1 smart-form">
                                            <label class="checkbox no-required no-padding no-margin label-default-off">
                                                <input type="checkbox" name="checkbox"
                                                       id="flapDetectionEnabled"
                                                       ng-true-value="1"
                                                       ng-false-value="0"
                                                       ng-model="post.Service.flap_detection_enabled">
                                                <i class="checkbox-primary"></i>
                                            </label>
                                            <div class="padding-left-20">
                                                <template-diff-button ng-show="post.Service.servicetemplate_id"
                                                                      value="post.Service.flap_detection_enabled"
                                                                      template-value="servicetemplate.Servicetemplate.flap_detection_enabled">
                                                </template-diff-button>
                                            </div>
                                        </div>
                                    </div>
                                    <fieldset ng-show="post.Service.flap_detection_enabled">
                                        <legend class="font-sm"
                                                ng-class="{'has-error-no-form': errors.flap_detection_on_up}">
                                            <div ng-class="{'required':post.Service.flap_detection_enabled}">
                                                <label>
                                                    <?php echo __('Flap detection options'); ?>
                                                </label>

                                                <div ng-repeat="error in errors.flap_detection_on_up">
                                                    <div class="text-danger">{{ error }}</div>
                                                </div>
                                            </div>
                                        </legend>
                                        <ul class="config-flex-inner">
                                            <?php foreach ($serviceFlapOptions as $serviceFalpOption): ?>
                                                <li>
                                                    <div class="margin-bottom-0"
                                                         ng-class="{'has-error': errors.<?php echo $serviceFalpOption['field']; ?>}">

                                                        <label for="<?php echo $serviceFalpOption['field']; ?>"
                                                               class="col col-md-7 control-label padding-top-0">
                                                                <span class="label label-<?php echo $serviceFalpOption['class']; ?> notify-label-small">
                                                                    <?php echo $serviceFalpOption['text']; ?>
                                                                </span>
                                                        </label>

                                                        <div class="col-md-2 smart-form">
                                                            <label class="checkbox small-checkbox-label no-required">
                                                                <input type="checkbox" name="checkbox"
                                                                       ng-true-value="1"
                                                                       ng-false-value="0"
                                                                       ng-disabled="!post.Service.flap_detection_enabled"
                                                                       id="<?php echo $serviceFalpOption['field']; ?>"
                                                                       ng-model="post.Service.<?php echo $serviceFalpOption['field']; ?>">
                                                                <i class="checkbox-<?php echo $serviceFalpOption['class']; ?>"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <template-diff-button ng-show="post.Service.servicetemplate_id"
                                                                          value="post.Service.<?php echo $serviceFalpOption['field']; ?>"
                                                                          template-value="servicetemplate.Servicetemplate.<?php echo $serviceFalpOption['field']; ?>">
                                                    </template-diff-button>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </fieldset>

                                    <div class="form-group"
                                         ng-class="{'has-error': errors.is_volatile}">
                                        <label class="col-xs-12 col-lg-2 control-label" for="isVolatile">
                                            <?php echo __('Status volatile'); ?>
                                        </label>

                                        <div class="col-xs-12 col-lg-1 smart-form">
                                            <label class="checkbox no-required no-padding no-margin label-default-off">
                                                <input type="checkbox" name="checkbox"
                                                       id="isVolatile"
                                                       ng-true-value="1"
                                                       ng-false-value="0"
                                                       ng-model="post.Service.is_volatile">
                                                <i class="checkbox-primary"></i>
                                            </label>
                                            <div class="padding-left-20">
                                                <template-diff-button ng-show="post.Service.servicetemplate_id"
                                                                      value="post.Service.is_volatile"
                                                                      template-value="servicetemplate.Servicetemplate.is_volatile">
                                                </template-diff-button>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-offset-2 col-lg-12">
                                            <div class="help-block">
                                                <?php echo __('Will force the monitoring engine to send a notification on each Non-Ok check result that will occur.'); ?>
                                                <a href="https://www.naemon.org/documentation/usersguide/volatileservices.html"
                                                   target="_blank">
                                                    <i class="fa fa-external-link-square"></i>
                                                    <?php echo __('Online documentation'); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row" ng-show="post.Service.servicetemplate_id">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="jarviswidget">
                            <header>
                                <span class="widget-icon">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                                <h2><?php echo __('Event Handler configuration'); ?></h2>
                            </header>
                            <div>
                                <div class="widget-body">
                                    <div class="form-group"
                                         ng-class="{'has-error': errors.eventhandler_command_id}">
                                        <label class="col-xs-12 col-lg-2 control-label">
                                            <?php echo __('Event Handler'); ?>
                                        </label>
                                        <div class="col-xs-12 col-lg-10">
                                            <div class="input-group" style="width: 100%;">
                                                <select
                                                        id="ServiceEventHandlerSelect"
                                                        data-placeholder="<?php echo __('Please choose'); ?>"
                                                        class="form-control"
                                                        chosen="eventhandlerCommands"
                                                        ng-options="eventhandler.key as eventhandler.value for eventhandler in eventhandlerCommands"
                                                        ng-model="post.Service.eventhandler_command_id">
                                                </select>
                                                <template-diff ng-show="post.Service.servicetemplate_id"
                                                               value="post.Service.eventhandler_command_id"
                                                               template-value="servicetemplate.Servicetemplate.eventhandler_command_id"></template-diff>
                                            </div>
                                            <div ng-repeat="error in errors.eventhandler_command_id">
                                                <div class="help-block text-danger">{{ error }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"
                                         ng-class="{'has-error': errors.serviceeventcommandargumentvalues}"
                                         ng-repeat="serviceeventcommandargumentvalue in post.Service.serviceeventcommandargumentvalues">
                                        <label class="col-xs-12 col-lg-offset-2 col-lg-2 control-label text-primary">
                                            {{serviceeventcommandargumentvalue.commandargument.human_name}}
                                        </label>
                                        <div class="col-xs-12 col-lg-8">
                                            <div class="input-group">
                                                <input
                                                        class="form-control"
                                                        type="text"
                                                        ng-model="serviceeventcommandargumentvalue.value">
                                                <template-diff
                                                        value="serviceeventcommandargumentvalue.value"
                                                        template-value="servicetemplate.Servicetemplate.servicetemplateeventcommandargumentvalues[$index].value"></template-diff>
                                            </div>
                                            <div ng-repeat="error in errors.serviceeventcommandargumentvalue">
                                                <div class="help-block text-danger">{{ error }}</div>
                                            </div>
                                            <div class="help-block">
                                                {{serviceeventcommandargumentvalue.commandargument.name}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"
                                         ng-show="post.Service.eventhandler_command_id > 0 && post.Service.serviceeventcommandargumentvalues.length == 0">
                                        <div class="col-xs-12 col-lg-offset-2 text-info">
                                            <i class="fa fa-info-circle"></i>
                                            <?php echo __('This Event Handler command does not have any parameters.'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" ng-show="post.Service.servicetemplate_id">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="jarviswidget">
                            <header>
                                <span class="widget-icon">
                                    <i class="fa fa-usd"></i>
                                </span>
                                <h2><?php echo __('Service macro configuration'); ?></h2>
                            </header>
                            <div>
                                <div class="widget-body"
                                     ng-class="{'has-error-no-form': errors.customvariables_unique}">

                                    <div class="row">
                                        <div ng-repeat="error in errors.customvariables_unique">
                                            <div class=" col-xs-12 text-danger">{{ error }}</div>
                                        </div>
                                    </div>

                                    <div class="row"
                                         ng-repeat="customvariable in post.Service.customvariables">
                                        <macros-directive macro="customvariable"
                                                          macro-name="'<?php echo __('HOST'); ?>'"
                                                          index="$index"
                                                          callback="deleteMacroCallback"
                                                          errors="getMacroErrors($index)"
                                        ></macros-directive>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-2 padding-top-10 text-right">
                                            <button type="button" class="btn btn-success btn-sm"
                                                    ng-click="addMacro()">
                                                <i class="fa fa-plus"></i>
                                                <?php echo __('Add new macro'); ?>
                                            </button>
                                        </div>

                                        <div class="col-xs-12 padding-top-10 text-info"
                                             ng-show="post.Service.customvariables.length > 0">
                                            <i class="fa fa-info-circle"></i>
                                            <?php echo __('Macros in green color are inherited from the service template.'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 margin-top-10 margin-bottom-10">
                    <div class="well formactions ">
                        <div class="pull-right">

                            <label>
                                <input type="checkbox" ng-model="data.createAnother">
                                <?php echo _('Create another'); ?>
                            </label>


                            <button type="submit" class="btn btn-primary">
                                <?php echo __('Create service'); ?>
                            </button>


                            <a back-button fallback-state='ServicesIndex'
                               class="btn btn-default"><?php echo __('Cancel'); ?></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

