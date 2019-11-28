<?php

namespace console\controllers;
use Yii;
use yii\base\InvalidRouteException;
use yii\console\Controller;
use yii\console\Exception;
class RbacController extends Controller
{
    public function actionInit()
    {
        // аналогично выоплнению в терминале 'php yii migrate --migrationPath=@yii/rbac/migrations'
        try {
            Yii::$app->runAction('migrate', ['migrationPath' => '@yii/rbac/migrations']);
        } catch (InvalidRouteException $e) {
        } catch (Exception $e) {
        }

        // компонент управления RBAC
        $auth = Yii::$app->authManager;

        /**
         *
         * Создание ролей пользователей
         *
         */
        // Пользователь
        $roleUser = $auth->createRole('user');
        $roleUser->description = 'Обычный пользователь сайта';

        try {
            $auth->add($roleUser);
        } catch (\Exception $e) {
        }

        // Менеджер
        $roleManager = $auth->createRole('manager');
        $roleManager->description = 'Менеджер сайта';

        try {
            $auth->add($roleManager);
        } catch (\Exception $e) {
        }
        try {
            $auth->addChild($roleManager, $roleUser);
        } catch (\yii\base\Exception $e) {
        } // Менеджер наследует права Пользователя

        // Администратор
        $roleAdmin = $auth->createRole('admin');
        $roleAdmin->description = 'Администратор сайта';

        try {
            $auth->add($roleAdmin);
        } catch (\Exception $e) {
        }
        try {
            $auth->addChild($roleAdmin, $roleManager);
        } catch (\yii\base\Exception $e) {
        } // Администратор наследует Менеджера (т.е. и Пользователя)

        /**
         *
         * Установка ролей на пользователей
         *
         */
        try {
            $auth->assign($roleAdmin, 1);
        } catch (\Exception $e) {
        }
        try {
            $auth->assign($roleManager, 2);
        } catch (\Exception $e) {
        }
        try {
            $auth->assign($roleUser, 3);
        } catch (\Exception $e) {
        }
    }
}