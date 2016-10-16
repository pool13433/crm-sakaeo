<div ng-controller="BarcodeController as vm">
    <button class="ui button green big" ng-click="vm.openCamera()" ng-class="{ loading : vm.isLoading}">
        OpenCamera
    </button>
    AAAA :: {{ vm.result }}
    <div id="camera" style="max-height: 400px;max-width: 700px;"></div>
</div>
