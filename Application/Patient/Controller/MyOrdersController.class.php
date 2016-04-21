<?php
namespace Patient\Controller;
use Think\Controller;
class MyOrdersController extends Controller {
  public function index() {
      $this->display('index');
  }
}
