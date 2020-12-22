var app = angular.module('app', []);
// Construction de l'url vars l'api Rest de Users
var urlToRestApiUsers = urlToRestApi.substring(0, urlToRestApi.lastIndexOf('/') + 1) + 'users';

app.controller('BrandCRUDJwtCtrl', ['$scope', 'BrandCrudJwtService', function ($scope, BrandCrudJwtService) {

    $scope.updateBrand = function () {
        BrandCrudJwtService.updateBrand($scope.brand.id, $scope.brand.name)
            .then(function success(response) {
                    $scope.message = 'Brand data updated!';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.errorMessage = 'Error updating brand!';
                    $scope.message = '';
                });
    }

    $scope.getBrand = function () {
        var id = $scope.brand.id;
        BrandCrudJwtService.getBrand($scope.brand.id)
            .then(function success(response) {
                    $scope.brand = response.data.brand;
//                        $scope.brand.id = id;
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
            BrandCrudJwtService.addBrand($scope.brand.name)
                .then(function success(response) {
                        $scope.message = 'Brand added!';
                        $scope.errorMessage = '';
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
        BrandCrudJwtService.deleteBrand($scope.brand.id)
            .then(function success(response) {
                    $scope.message = 'Brand deleted!';
                    $scope.brand = null;
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.errorMessage = 'Error deleting brand!';
                    $scope.message = '';
                })
    }

    $scope.getAllBrands = function () {
        BrandCrudJwtService.getAllBrands()
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
    $scope.login = function () {
        if ($scope.user != null && $scope.user.username) {
            BrandCrudJwtService.login($scope.user)
                .then(function success(response) {
                        $scope.message = $scope.user.username + ' en session!';
                        $scope.errorMessage = '';
                        localStorage.setItem('token', response.data.data.token);
                        localStorage.setItem('user_id', response.data.data.id);
                    },
                    function error(response) {
                        $scope.errorMessage = 'Nom d\'utilisateur ou mot de passe invalide...';
                        $scope.message = '';
                    });
        } else {
            $scope.errorMessage = 'Entrez un nom d\'utilisateur s.v.p.';
            $scope.message = '';
        }

    }
    $scope.logout = function () {
        localStorage.setItem('token', "no token");
        localStorage.setItem('user', "no user");
        $scope.message = '';
        $scope.errorMessage = 'Utilisateur déconnecté!';
    }
    $scope.changePassword = function () {
        BrandCrudJwtService.changePassword($scope.user.password)
            .then(function success(response) {
                    $scope.message = 'Mot de passe mis à jour!';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.errorMessage = 'Mot de passe inchangé!';
                    $scope.message = '';
                });
    }
}]);

app.service('BrandCrudJwtService', ['$http', function ($http) {

    this.getBrand = function getBrand(brandId) {
        return $http({
            method: 'GET',
            url: urlToRestApi + '/' + brandId,
            headers: {'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")}
        });
    }

    this.addBrand = function addBrand(name) {
        return $http({
            method: 'POST',
            url: urlToRestApi,
            data: {name: name},
            headers: {'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            }
        });
    }

    this.deleteBrand = function deleteBrand(id) {
        return $http({
            method: 'DELETE',
            url: urlToRestApi + '/' + id,
            headers: {'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            }
        })
    }

    this.updateBrand = function updateBrand(id, name) {
        return $http({
            method: 'PATCH',
            url: urlToRestApi + '/' + id,
            data: {name: name},
            headers: {'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            }
        })
    }

    this.getAllBrands = function getAllBrands() {
        return $http({
            method: 'GET',
            url: urlToRestApi,
            headers: {'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'}
        });
    }

    this.login = function login(user) {
        return $http({
            method: 'POST',
            url: urlToRestApiUsers + '/token',
            data: {username: user.username, password: user.password, email: user.email},
            headers: {'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'}
        });
    }
    this.changePassword = function changePassword(password) {
        return $http({
            method: 'PATCH',
            url: urlToRestApiUsers + '/' + localStorage.getItem("user_id"),
            data: {password: password},
            headers: {'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            }
        })
    }
}]);
