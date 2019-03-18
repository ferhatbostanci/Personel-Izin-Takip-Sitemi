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
                if($this->userModel->isUserActive($_POST['email'])){
                    $loggedInUser = $this->userModel->login($_POST['email'], $_POST['password']);
                    if($loggedInUser){
                        $sweet = ['type' => 'success', 'title' => 'Giriş Yapıldı!', 'text' => 'Başarıyla giriş yaptınız'];
                    }else{
                        $sweet = ['type' => 'error', 'title' => 'Hata', 'text' => 'Parola yanlış girildi!'];
                    }
                }else{
                    $sweet = ['type' => 'warning', 'title' => 'Dikkat', 'text' => 'Hesabınız aktif edilmemiştir. Lütfen E-Posta adresinizi kontrol ediniz!'];
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

                if($addUser){
                    if($sendActivationMail){
                        $sweet = ['type' => 'success', 'title' => 'Kayıt Tamamlandı!', 'text' => 'E-Posta adresinize gönderilen aktivasyon linkinden hesabınızı aktif edebilirsiniz'];
                    }else{
                        $sweet = ['type' => 'error', 'title' => 'Hata', 'text' => 'Mail göndermede hata oluştu! Lütfen sistem yöneticilerine başvurunuz.'];
                    }
                }else{
                    $sweet = ['type' => 'error', 'title' => 'Hata', 'text' => 'Hesap oluşturmada hata oluştu! Lütfen sistem yöneticilerine başvurunuz.'];
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

    public function activation(){
        if(!isset($_GET['email'], $_GET['code'])){
            if(!isset($_SERVER['HTTP_ORIGIN'])){
                $this->view('404', ['title' => 'Ooops!']);
                exit;
            }
        }

        if($this->userModel->findUserByEMail($_GET['email'])){
            if(!$this->userModel->isUserActive($_GET['email'])){
                if($this->userModel->isUserCodeEquals($_GET['email'], $_GET['code'])){
                    if($this->userModel->userActivation($_GET['email'])){
                        echo 'Hespa aktif edildi';
                    }else{
                        echo 'Hesap aktif edilemedi';
                    }
                }else{
                    echo 'Kodlar eslesmiyor';
                }
            }else{
                echo 'Hesap aktif';
            }
        }else{
            echo 'email yok';
        }

    }

}