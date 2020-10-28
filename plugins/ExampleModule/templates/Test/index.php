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
