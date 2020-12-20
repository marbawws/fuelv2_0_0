var app = angular.module('app', []);

app.controller('BrandCRUDCtrl', ['$scope', 'BrandCRUDService', function ($scope, BrandCRUDService) {

    $scope.updateBrand = function (brand) {
        BrandCRUDService.updateBrand(brand)
            .then(function success(response) {
                    $scope.message = 'Brand data updated!';
                    $scope.errorMessage = '';
                    //rafrachir la liste
                    $scope.getAllBrands();
                },
                function error(response) {
                    $scope.errorMessage = 'Error updating brand!';
                    $scope.message = '';
                });
    }

    $scope.getBrand = function (id) {
        //var id = $scope.brand.id;
        BrandCRUDService.getBrand(id)
            .then(function success(response) {
                    $scope.brand = response.data.brand;
                    $scope.brand.id = id;
                    $scope.message = '';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.message = '';
                    if (response.status === 404) {
                        $scope.errorMessage = 'Brand not found!';
                    } else {
                        $scope.errorMessage = "Error getting brand!";
                    }
                });
    }

    $scope.addBrand = function () {
        if ($scope.brand != null && $scope.brand.name) {
            BrandCRUDService.addBrand($scope.brand.name)
                .then(function success(response) {
                        $scope.message = 'Brand added!';
                        $scope.errorMessage = '';

                        //rafrachir la liste
                        $scope.getAllBrands();
                    },
                    function error(response) {
                        $scope.errorMessage = 'Error adding brand!';
                        $scope.message = '';
                    });
        } else {
            $scope.errorMessage = 'Please enter a name!';
            $scope.message = '';
        }
    }

    $scope.deleteBrand = function () {
        BrandCRUDService.deleteBrand($scope.brand.id)
            .then(function success(response) {
                    $scope.message = 'Brand deleted!';
                    $scope.brand = null;
                    $scope.errorMessage = '';

                    //rafrachir la liste
                    $scope.getAllBrands();
                },
                function error(response) {
                    $scope.errorMessage = 'Error deleting brand!';
                    $scope.message = '';
                })
    }

    $scope.getAllBrands = function () {
        BrandCRUDService.getAllBrands()
            .then(function success(response) {
                    $scope.brands = response.data.brands;
                    $scope.message = '';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.message = '';
                    $scope.errorMessage = 'Error getting brands!';
                });
    }

}]);

app.service('BrandCRUDService', ['$http', function ($http) {

    this.getBrand = function getBrand(brandId) {
        return $http({
            method: 'GET',
            url: urlToRestApi + '/' + brandId,
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        });
    }

    this.addBrand = function addBrand(name) {
        return $http({
            method: 'POST',
            url: urlToRestApi,
            data: {name: name},
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        });
    }

    this.deleteBrand = function deleteBrand(id) {
        return $http({
            method: 'DELETE',
            url: urlToRestApi + '/' + id,
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        })
    }

    this.updateBrand = function updateBrand(brand) {
        return $http({
            method: 'PATCH',
            url: urlToRestApi + '/' + brand.id,
            data: {name: brand.name},
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        })
    }

    this.getAllBrands = function getAllBrands() {
        return $http({
            method: 'GET',
            url: urlToRestApi,
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        });
    }

}]);
