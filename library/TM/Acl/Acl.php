<?php

class TM_Acl_Acl extends Zend_Acl {
    
    public function  __construct() {

        //Добавляем роли
        $this->addRole('guest');
        $this->addRole('admin', 'guest');

        //Добавляем ресурсы
        // РЕСУРСЫ ГОСТЯ !
        $this->addResource(new Zend_Acl_Resource('guest_allow'));
        $this->addResource(new Zend_Acl_Resource('login'), 'guest_allow');
        $this->addResource(new Zend_Acl_Resource('login/index'), 'guest_allow');
        //...

        /*
        // РЕСУРСЫ ПОЛЬЗОВАТЕЛЯ !
        $this->addResource(new Zend_Acl_Resource('user_allow'));
        $this->addResource(new Zend_Acl_Resource('user/index'), 'user_allow');
        // ...
        */

        // РЕСУРСЫ АДМИНА !
        $this->addResource(new Zend_Acl_Resource('admin_allow'), 'guest_allow');
        $this->addResource(new Zend_Acl_Resource('login/logout'), 'admin_allow');

        $this->addResource(new Zend_Acl_Resource('index/index'), 'admin_allow');

        $this->addResource(new Zend_Acl_Resource('user/index'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('user/add'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('user/edit'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('user/delete'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('user/addRole'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('user/editRole'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('user/deleteRole'), 'admin_allow');

        $this->addResource(new Zend_Acl_Resource('city/index'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('city/add'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('city/edit'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('city/delete'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('city/addAttributeType'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('city/editAttributeType'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('city/deleteAttributeType'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('city/addAttributeHash'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('city/editAttributeHash'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('city/deleteAttributeHash'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('city/deleteLinkToDoc'), 'admin_allow');

        $this->addResource(new Zend_Acl_Resource('catalog/index'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('catalog/add'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('catalog/edit'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('catalog/delete'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('catalog/addFolder'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('catalog/editFolder'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('catalog/addAttributeType'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('catalog/editAttributeType'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('catalog/deleteAttributeType'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('catalog/addAttributeHash'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('catalog/editAttributeHash'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('catalog/deleteAttributeHash'), 'admin_allow');

        $this->addResource(new Zend_Acl_Resource('company/index'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('company/add'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('company/edit'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('company/delete'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('company/viewAddress'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('company/addAddress'), 'admin_allow');
        $this->addResource(new Zend_Acl_Resource('company/editAddress'), 'admin_allow');
         $this->addResource(new Zend_Acl_Resource('company/deleteAddress'), 'admin_allow');


        $this->addResource(new Zend_Acl_Resource('files/'), 'admin_allow');

        //...

        /*
        //Выставляем права, по-умолчанию всё запрещено
        $this->deny(null, null, null);
        $this->allow('guest', 'guest_allow', 'show');
        $this->allow('user', 'user_allow', 'show');
        $this->allow('admin','admin_allow', 'show');
        */

        $this->deny(null, null, null);
        $this->allow('guest', 'guest_allow', 'show');
        $this->allow('admin', 'admin_allow', array('show', 'read', 'write', 'delete'));
        $this->allow('admin', null, array('show', 'read', 'write', 'delete'));



    }

    public function can($privilege = 'show'){
        //Инициируем ресурс
        $request = Zend_Controller_Front::getInstance()->getRequest();
        $resource = $request->getControllerName() . '/' . $request->getActionName();

        //StdLib_Log::logMsg(' resource ' . $resource . ' priv ' . $privilege);

        //Если ресурс не найден закрываем доступ
        if (!$this->has($resource)) {
            return false;
        }

        //Инициируем роль
        $storage_data = Zend_Auth::getInstance()->getStorage()->read();
        $role = array_key_exists('role', $storage_data)?$storage_data->role : 'guest';

        //StdLib_Log::logMsg('role ' . $role . ' resource ' . $resource . ' priv ' . $privilege);

        return $this->isAllowed($role, $resource, $privilege);
    }
}

?>