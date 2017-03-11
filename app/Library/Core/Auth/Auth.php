<?php 

/**
 * core
 * 
 * @version 1.0
 * @package Flow
 * 
 */

namespace Core\Auth;

use Core\Auth\Models\User as ModelUser;
use Core\Auth\Exception\AuthException;
use Core\Frame\Traits\Factory;

/**
 * Auth
 * 
 * @usage
 * 
 * login new Auth()->login($username, $password);
 * logout new Auth($session_id)->logout();
 * 
 * 
 */
class Auth
{
    use Factory;
    
    private $user;
    
    private $session;
    
    private $role;
    
    public function __construct($session_id = null) {
        $this->session = new \Core\Auth\Session($session_id);
        self::$obj = $this;
    }
    
    /**
     * 获取登录用户信息
     */
    public function user(){
        if(empty($this->user)){
            $user = $this->session->info();
            $this->user = ModelUser::find($user['id']);
        }
        return $this->user;
    }
    
    /**
     * 获取用户组
     */
    public function role(){
        return $this->role;
    }
    
    /**
     * 选择用户组
     */
    public function selectRole($role){
        $this->role = $role;
    }
    
    /**
     * 登录
     * @param username (name mobile email)
     */
    public function login($username, $password) {
        // 如果是数字则查询手机号
        if(is_numeric($username)){
            $user = ModelUser::where('mobile', $username)->first();
        }
        
        // 如果是邮箱则取邮箱
        if(strpos($username, '@') !== false){
            $user = ModelUser::where('email', $username)->first();
        } 

        // 如果邮箱手机号都没有取到，则取账户名
        if(!$user){
            $user = ModelUser::where('name', $username)->first();
        }
        
        // 如果都不存在则返回错误提示
        if(!$user){
            throw new AuthException('帐号不存在');
        }
        
        $this->user = $user;
        
        // 校验密码是否正确
        if(!$this->checkPass($password)){
            throw new AuthException('密码错误');
        }
        
        // 创建session
        $this->session->create($user);
        return $this->session->session_id;
    }
    
    /**
     * 登出
     */
    public function logout(){
        return $this->session->destrory();
    }
    
    /**
     * 加密密码
     */
    public function encryptPass($password){
        return sha1($password);
    }
    
    /**
     * 校验输入的密码是否正确
     */
    public function checkPass($password){
        $after_crypt_password = $this->encryptPass($password);
        if($user->password === $after_crypt_password){
            return true;
        }
        return false;
    }
    
}
