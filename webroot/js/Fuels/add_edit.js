// $(document).ready(function () {
//     // The path to action from CakePHP is in urlToLinkedListFilter
//     $('#brand-id').on('change', function () {
//         var brandId = $(this).val();
//         if (brandId) {
//             $.ajax({
//                 url: urlToLinkedListFilter,
//                 data: 'brand_id=' + brandId,
//                 success: function (fuelingStations) {
//                     $select = $('#fueling-station-id');
//                     $select.find('option').remove();
//                     $.each(fuelingStations, function (key, value)
//                     {
//                         $.each(value, function (childKey, childValue) {
//                             $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
//                         });
//                     });
//                 }
//             });
//         } else {
//             $('#fueling-station-id').html('<option value="">Select brand first</option>');
//         }
//     });
// });
var app = angular.module('linkedlists', []);

app.controller('brandsController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.brands = response.data.brands;
    });
});
