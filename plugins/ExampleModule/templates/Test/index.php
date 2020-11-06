<?php
/**
 * @var \App\View\AppView $this
 * @var string $message
 */
?>

das ist privat: {{thisIsPrivate}}
<br>
<hr>

das ist public: {{thisIsPublic}}
<br>

Test 2 public: {{neuevariable}}
<br>
<input type="text" ng-model="thisIsPublic" ng-model-options="{debounce: 500}">
<button class="btn btn-primary" type="button" ng-click="addNote()">
    Neue notiz
</button>

<br>
<hr>


<div class="alert alert-danger" ng-show="thisIsPublic.length === 0">
    Achtung! Feld darf nicht leer sein
</div>

<div class="alert alert-info" ng-if="thisIsPublic.length === 0">
    das ist ganz weg!
</div>


<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    <?php echo __('Example Module'); ?>
                    <span class="fw-300"><i><?php echo __('Hello World'); ?></i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">

                    <!-- Output "Hello World (HTML)" that was set by the controller -->
                    <?= h($message); ?>

                    <table class="table table-striped m-0 table-bordered table-hover table-sm">
                        <thead>
                        <tr>
                            <th><?= __('Host name') ?></th>
                            <th><?= __('Note') ?></th>
                        </tr>
                        </thead>

                        <tbody>
                        <!-- Repeat this TR for each record in $scope.notes -->
                        <tr ng-repeat="note in notes">
                            <td>
                                <!-- Print the content of the variable -->
                                {{ note.host.name }}
                            </td>
                            <td>{{ note.notes }}</td>
                        </tr>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<input type="text" ng-model="neuevariable">
<button class="btn btn-primary" type="button" ng-click="addNote2()">
    Alternative notiz
</button>
<div class="alert alert-warning" ng-show="neuevariable.length === 0">
    Feld ist leer!
</div>


<div class="row">
    <div class="col-xl-12">
        <div id="panel-2" class="panel">


            <table class="table table-striped m-0 table-bordered table-hover table-sm">
                <thead>
                <tr>
                    <th><?= __('Host name test2') ?></th>
                    <th><?= __('Notiz 1') ?></th>
                    <th><?= __('Notiz 2') ?></th>
                </tr>
                </thead>

                <tbody>
                <!-- Repeat this TR for each record in $scope.notes -->
                <tr ng-repeat="neu in neueueue">
                    <td>{{ neu.notiz }}</td>
                    <td>{{ neu.notes1 }}</td>
                    <td>{{ neu.notes2 }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <!--mytest-->


        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item">
                <a ui-sref="DashboardsIndex">
                    <i class="fa fa-home"></i> <?php echo __('Home'); ?>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a ui-sref="CurrentstatereportsIndex">
                    <i class="fa fa-file-invoice"></i> <?php echo __('Current state report'); ?>
                </a>
            </li>
            <li class="breadcrumb-item">
                <i class="fa fa-edit"></i> <?php echo __('Test'); ?>
            </li>
        </ol>

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            <?php echo __('New test page'); ?>
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">


                            <div class="row">
                                <div class="col-12" style="background:red;">
                                    Volle länge statisch
                                </div>

                                <div class="col-6" style="background:green;">
                                    1/2
                                </div>

                                <div class="col-6" style="background:blue;">
                                    2/2
                                </div>

                                <div class="col-6" style="background:yellow;">
                                    3/2
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12" style="background:red;">
                                    Volle länge dynamisch
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-4" style="background:green;">
                                    1/2
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-4" style="background:blue;">
                                    2/2
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-4" style="background:yellow;">
                                    3/2
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4" ng-repeat="(key, value) in data.months" id="{{key}}"></div>

                            </div>


                            <div>
                                {{data.year}}
                                <div ng-repeat="(key, value) in data.months">
                                    KEY -> {{key}} + VALUE -> {{value}}

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



