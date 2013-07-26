<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 24/7/13
 * Time: 3:45 PM
 * To change this template use File | Settings | File Templates.
 */
class MainController extends LibController{
    public function index(){
        //  echo 'hello';
        $data=array('name'=>'AAAA1234','email'=>'abc@pqr.com');
        $valid=new LibValidation($data,array('name'=>array('require','numeric','special:#'),'email'=>array('email','require')));
        if(!$valid->validate()){
            $data_to_render=array('error_field'=>$valid->error_field,'validation_errors'=>$valid->validation_errors);
            $this->render('userError',$data_to_render);
        }
        else{
            $this->render('new',$data);
        }
    }

    public function gotoOther(){
        $this->redirect('/error');
    }
}