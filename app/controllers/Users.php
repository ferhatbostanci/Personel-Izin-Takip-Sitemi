<?php

class Users extends Controller{

    public function __construct(){
        $this->userModel = $this->model('User');
        $this->mailModel = $this->model('Mail');
    }

    /*
     * Pages
     */

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if(!isset($_POST['email'], $_POST['password'])){
                $sweet = ['type' => 'warning', 'title' => 'Dikkat', 'text' => 'Eksik bilgi gönderildi!'];
                exit;
            }elseif($this->userModel->findUserByEMail($_POST['email'])){
                $loggedInUser = $this->userModel->login($_POST['email'], $_POST['password']);
                if($loggedInUser){
                    $sweet = ['type' => 'success', 'title' => 'Giriş Yapıldı!', 'text' => 'Başarıyla giriş yaptınız'];
                }else{
                    $sweet = ['type' => 'error', 'title' => 'Hata', 'text' => 'Parola yanlış girildi!'];
                }
            }else{
                $sweet = ['type' => 'error', 'title' => 'Hata', 'text' => 'E-Posta sisteme kayıtlı değil!'];
            }

        }

        $data = [
            'title' => SITENAME . ' - Giriş Yap',
            'js' => array('/js/plugins/sweetalert2/sweetalert2.all.min.js')
        ];

        if(isset($sweet)){
            $data['sweet'] = $sweet;
        }

        $this->view('users/login', $data);
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if(!isset($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password'], $_POST['passwordconfirm'])){
                $sweet = ['type' => 'warning', 'title' => 'Dikkat', 'text' => 'Eksik bilgi gönderildi!'];
                exit;
            }elseif($this->userModel->findUserByEMail($_POST['email'])){
                $sweet = ['type' => 'error', 'title' => 'Hata', 'text' => 'E-Posta adresiniz zaten sisteme kayıtlı!'];
            }else{
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $activationcode = md5(uniqid(mt_rand(), true));

                $addUser = $this->userModel->addUser($_POST['name'], $_POST['surname'], $_POST['email'], $password, $activationcode);
                $sendActivationMail = $this->mailModel->sendActivationMail($_POST['email'], $activationcode);

                if($addUser && $sendActivationMail){
                    $sweet = ['type' => 'success', 'title' => 'Kayıt Tamamlandı!', 'text' => 'E-Posta adresinize gönderilen aktivasyon linkinden hesabınızı aktif edebilirsiniz'];
                }
            }

        }

        $data = [
            'title' => SITENAME . ' - Kayıt Ol',
            'js' => array('/js/plugins/sweetalert2/sweetalert2.all.min.js'),
        ];

        if(isset($sweet)){
            $data['sweet'] = $sweet;
        }

        $this->view('users/register', $data);

    }

}