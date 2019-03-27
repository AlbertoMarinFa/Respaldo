
// Creación del módulo
var app = angular.module("mainController", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "EquiposRespaldo/index.php"
    })
    .when("/Componentes", {
        templateUrl : "InsertaComponentes/index.html"
    })
    .when("/Componentes/Equipo/KIT", {
        templateUrl : "InsertaComponentes/KIT/index.php"
    })
    .when("/Componentes/Equipo/Modelo", {
        templateUrl : "InsertaComponentes/Modelo/index_modelo.php"
    })
    .when("/Componentes/Equipo/Cuenta", {
        templateUrl : "InsertaComponentes/cuenta/index_Cuenta.php"
    })
    .when("/Componentes/Equipo/Documento", {
        templateUrl : "InsertaComponentes/Documento/index_Documento.php"
    })
    .when("/Componentes/AES/Cobertura", {
        templateUrl : "InsertaComponentes/Cobertura/index_Cobertura.php"
    })
    .when("/Componentes/AES/AES", {
        templateUrl : "InsertaComponentes/AES/index_AES.php"
    })
    .when("/Caso", {
        templateUrl : "Caso/Index_Caso.php"
    });
});
