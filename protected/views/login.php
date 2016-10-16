<div class="ui three column centered grid stackable" style="margin-top: 150px;" ng-controller="MemberController as vm">
    <div class="column">
        <h5 class="ui top attached header">
            CRM Login  {{ vm.name}}
        </h5>
        <div class="ui attached segment"> <!-- ui active inverted dimmer"> -->
            <div class="ui inverted dimmer"  ng-class="{ active : vm.loading}">
                <div class="ui large text loader">Loading</div>
            </div>
            <form class="ui form" ng-submit="vm.signIn()">
                <div class="ui message" ng-show="vm.messageVisible"
                     ng-class="{success : vm.messageClass,negative : !vm.messageClass }">
                    <i class="close icon"></i>
                    <div class="header">
                        {{ vm.title}}
                    </div>
                    <p> {{ vm.message}}</p>
                </div>
                <div class="field">
                    <label>Username/รหัสบัตรประชาชน</label>
                    <input ng-model="vm.username" placeholder="กรอก รหัสลูกค้า หรือ รหัสพนักงาน" type="text">
                </div>
                <div class="field">
                    <label>Password/รหัสสมาชิก</label>
                    <input ng-model="vm.password" placeholder="กรอกรหัสผ่าน" type="password">
                </div>
                <div class="field">
                    <label>เข้าแบบ พนักงาน/เจ้าหน้าที่</label>
                    <input type="checkbox" ng-model="vm.type" value="1"/>
                </div>                
                <button class="ui button green" type="submit"><i class="check icon"></i>ยืนยัน</button>
            </form>
        </div>
    </div>
</div>