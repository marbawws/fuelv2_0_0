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
<!-- salt =
<?php
use Cake\Utility\Security;
echo Security::salt();
?>
-->
<div  ng-app="app" ng-controller="BrandCRUDJwtCtrl">
    <table>
        <tr>
            <td width="200">Utilisateur (username):</td>
            <td><input type="text" id="username" ng-model="user.username" /></td>
        </tr>
        <tr>
            <td width="200">Mot de passe (password):</td>
            <td><input type="text" id="password" ng-model="user.password" /></td>
        </tr>
        <tr>
            <td width="200">Email (email):</td>
            <td><input type="text" id="email" ng-model="user.email" /></td>
        </tr>
        <tr>
            <a ng-click="login(user)">[Connexion] </a>
            <a ng-click="logout()">[Déconnexion] </a>
            <a ng-click="changePassword(user.password)">[Changer le mot de passe]</a>
        </tr>
    </table>
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <table>
        <tr>
            <td width="150">ID:</td>
            <td><input type="text" id="id" ng-model="brand.id" /></td>
        </tr>
        <tr>
            <td width="150">Name:</td>
            <td>
                <input type="text" id="name" ng-model="brand.name" />
            </td>
        </tr>
        <tr>
            <a ng-click="getBrand(brand.id)">[Get Brand] </a>
            <a ng-click="updateBrand(brand.id, brand.name)">[Update Brand] </a>
            <a ng-click="addBrand(brand.name)">[Add Brand] </a>
            <a ng-click="deleteBrand(brand.id)">[Delete Brand]</a>
        </tr>
    </table>
    <a ng-click="getAllBrands()">[Get all Brands]</a><br />
    <br /> <br />
    <div ng-repeat="brand in brands">
        {{brand.id}} {{brand.name}}
    </div>
    <!-- pre ng-show='brands'>{{brands | json }}</pre-->
</div>
