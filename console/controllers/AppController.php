<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace console\controllers;

use common\models\User;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionAddUser($username, $password)
    {
        $security = \Yii::$app->security;
        $user = new User();
        $user->username = $username;
        $user->email = "$username@$username.com";
        $user->password_hash = $security->generatePasswordHash($password);
        $user->auth_key = $security->generateRandomString();

        if ($user->save()) {
            Console::output("User created OK");
        } else {
            var_dump($user->errors);
            Console::output("Not created");
        }

        return ExitCode::OK;
    }
}
