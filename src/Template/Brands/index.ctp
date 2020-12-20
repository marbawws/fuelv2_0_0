<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js'
], ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build([
    'prefix' => 'api',
    'controller' => 'Brands'], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Brands/index', ['block' => 'scriptBottom']);
?>

<div  ng-app="app" ng-controller="BrandCRUDCtrl">
    <input type="hidden" id="id" ng-model="brand.id">
    <table>
        <tr>
            <td width="150">Name:</td>
            <td>
                <input type="text" id="name" ng-model="brand.name" />
            </td>
        </tr>
    </table>
    <button ng-click="updateBrand(brand)">Update Brand</button>
    <button ng-click="addBrand(brand.name)">Add Brand</button>

    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <table class="hoverable bordered">
        <thead>
            <tr>
                <th class="text-align-center" ng-init="getAllBrands()">ID</th>
                <th class="width-30-pot">Name</th>
                <th class="text-align-center">Actions</th>
            </tr>
        </thead>
        <tbody ng-init="getAllBrands()">

            <tr ng-repeat="brand in brands| filter:search">
                <td class="text-align-center">
                    {{brand.id}}
                </td>
                <td>
                    {{brand.name}}
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" ng-click="getBrand(brand.id)">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="deleteBrand(brand.id)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
<!--    <br />-->
<!--    <br />-->
<!--    <a ng-click="getAllBrands()">Get all Brands</a><br />-->
<!--    <br /> <br />-->
<!--    <div ng-repeat="brand in brands">-->
<!--        {{brand.id}} {{brand.name}}-->
<!--    </div>-->
    <!-- pre ng-show='brands'>{{brands | json }}</pre-->
</div>
