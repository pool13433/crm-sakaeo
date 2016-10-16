<div ng-controller="BarcodeController as vm">

    <div class="ui stackable row">
        <button class="ui button green big fluid" ng-click="vm.openCamera()" ng-class="{ loading : vm.isLoading, fluid : vm.isLoading}">
            OpenCamera
        </button>
        <div class="ui column row" id="camera"> </div>
    </div>
</div>
