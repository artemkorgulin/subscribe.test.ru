<?php
namespace frontend\models;
use yii\base\Model;
use common\models\User;
use common\models\UserProfile;

/**
 * Class Registration
 * Форма регистрации
 *
 * @package frontend\models
 */
class Registration extends Model
{
    /**
     * Созданная учетная запись пользователя
     * @var null|User
     */
    private $_createdUserData = null;

    /**
     * Сгенерированный пароь пользователя для отправки в регистрационном письме
     * @var null
     */
    private $_createdUserPassword = null;

    /**
     * Создает учетную запись для входа в кабинет
     * @return boolean;
     */
    private function _createUser()
    {
        $this->_createdUserData = $user = new User();
        $user->email = $this->email;
        $user->status = User::STATUS_ACTIVE;
        $this->_createdUserPassword = \Yii::$app->security->generateRandomString(8);
        $user->setPassword($this->_createdUserPassword);
        $user->generateAuthKey();

        $user->token_fgtest   = \Yii::$app->security->generateRandomString(16);
        $user->token_btest    = \Yii::$app->security->generateRandomString(16);
        $user->token_proftest = \Yii::$app->security->generateRandomString(16);

        if ($user->save()) {
            return true;
        }
        return false;
    }

    /**
     * Созданный профиль пользователя
     * @var null|UserProfile
     */
    private $_createdProfileData = null;

    /**
     * Создает профиль пользователя
     * @return boolean;
     */
    private function _createProfile()
    {
        $this->_createdProfileData = $profile = new UserProfile();

        $profile->user_id    = $this->_createdUserData->id;
        $profile->name_l     = $this->name_l;
        $profile->name_f     = $this->name_f;
        $profile->name_m     = $this->name_m;
        $profile->phone      = $this->phone;
        $profile->school_id  = $this->school_id;
        $profile->class_id   = $this->class_id;
        $profile->b_date     = $this->b_date;
        $profile->gender_id  = $this->gender_id;

        if ($profile->save()) {
            return true;
        }
        return false;
    }

    /**
     * Массив ошибок при создании учетной записи
     * @var null
     */
    private $_errorSummary = null;

    /**
     * Выполнение регистрации пользователя
     *
     * @return null
     */
    public function save()
    {
        if (!$this->validate()) return null;
        $transaction = \Yii::$app->db->beginTransaction();

        $success1 = $this->_createUser();
        $success2 = $this->_createProfile();

        $success = ($success1 && $success2);

        if ($success) {

            \Yii::$app->mailer->compose(
                ['html' => 'registration-html', 'text' => 'registration-text'],
                [
                    'user'     => $this->_createdUserData,
                    'profile'  => $this->_createdProfileData,
                    'password' => $this->_createdUserPassword,
                ]
            )
            ->setFrom([\Yii::$app->params['robotEmail'] => 'Testing robot'])
            ->setTo($this->_createdUserData->email)
            ->setSubject('Поздравляем с регистрацией в testing.subscribe.test.ru')
            ->send();

            if (\Yii::$app->user->login($this->_createdUserData)) {
                $transaction->commit();
                return $this->_createdUserData;
            }
        }

        $errorsUser = $this->_createdUserData->getErrors();
        if (!is_array($errorsUser)) $errorsUser = [];
        $errorsProfile = $this->_createdProfileData->getErrors();
        if (!is_array($errorsProfile)) $errorsProfile = [];
        $this->_errorSummary = array_merge($errorsUser, $errorsProfile);

        $transaction->rollBack();
        return null;
    }

    public function getErrorsSummary()
    {
        return $this->_errorSummary;
    }


    public function saveOld()
    {
        $transaction = \Yii::$app->db->beginTransaction();

        $user = new User();
        $user->email = $this->email;
        $user->status = User::STATUS_ACTIVE;

        //$user->token_fgtest   = \Yii::$app->security->generateRandomString(16);
        //$user->token_btest    = \Yii::$app->security->generateRandomString(16);
        //$user->token_proftest = \Yii::$app->security->generateRandomString(16);

        // $user->setPassword(\Yii::$app->security->generateRandomString(16));
        $user->password_hash = 'N/A';
        $user->generateAuthKey();
        $user->password_reset_token = \Yii::$app->security->generateRandomString(16);

        $profile = new UserProfile();
        $profile->user_id    = 0;
        $profile->name_l     = $this->name_l;
        $profile->name_f     = $this->name_f;
        $profile->name_m     = $this->name_m;
        $profile->phone      = $this->phone;
        $profile->b_date     = $this->b_date;
        $profile->gender_id  = $this->gender_id;


        if ($profile->validate() && $user->validate()) {
            if ($user->save()) {
                $profile->user_id = $user->id;
                $profile->save();

            } else {
                //print_r($user->getErrors());
                //die;
            }
        } else {
            //print_r($user->getErrors());
            //print_r($profile->getErrors());
            //die;
        }

        $this->_errors = [
            'form' => $this->getErrors(),
            'user' => $user->getErrors(),
            'profile' => $profile->getErrors()
        ];

        $transaction->rollBack();
        return false;
    }


    // ================================================ NOT REFACTORED YET ===========================================

    public $region_id = 1;

    public $school_id = null;

    public $class_id  = null;

    public $name_l, $name_f, $name_m, $b_date, $gender_id;

    public $email;

    public $phone;

    public $password;

    public $agree;

    public $source = 'default';

    public function setRegion($region)
    {
        $this->region_id = $region;
    }

    public function getGenders()
    {
        return [
            '1' => 'Мужской',
            '2' => 'Женский'
        ];
    }

    public function setSchool($school)
    {
        $this->school_id = $school;
    }

    public function setClass($class)
    {
        $this->class_id = $class;
    }

    public function rules()
    {
        return [
            [['name_l', 'name_f', 'name_m', 'source'], 'string', 'max'=>255],
            [['region_id', 'school_id', 'class_id'], 'integer'],
            ['school_id', 'required', 'message' => 'Необходимо выбрать адрес учебного заведения'],
            ['class_id', 'required', 'message' => 'Необходимо выбрать класс (курс)'],
            ['gender_id', 'required', 'message' => 'Необходимо выбрать пол'],
            [['name_l', 'name_f', 'b_date', 'phone','gender_id', 'email', 'agree'], 'required'],
            [['agree'], 'required', 'requiredValue'=>true, 'message' => 'Для регистрации в системе необходимо согласиться с политикой конфиденциальности'],
            [['email'], 'validateEmail'],
            [['email'], 'email'],

        ];
    }

    private $_errors = [];

    public function getErrorSummary($showAllErrors)
    {
        return $this->_errors;
    }

    public function validateEmail($attribute, $params)
    {
        if (User::findByUsername($this->email)) {
            $this->addError($attribute, 'Введенный e-mail уже используется');
        }
    }

    public function attributeLabels()
    {
        return [
            'name_l'    => 'Фамилия',
            'name_f'    => 'Имя',
            'name_m'    => 'Отчество',
            'b_date'    => 'Дата рождения',
            'gender_id' => 'Пол',
            'phone'     => 'Телефон',
            'email'     => 'E-mail (будет именем пользователя для входа в личный кабинет)',
            'password'  => 'Пароль для входа в личный кабинет',
            'password_verify'  => 'Подтверждение пароля',
        ];
    }

}