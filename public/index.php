<?php
session_start();
set_include_path(dirname(__FILE__) . '/../');

$route = explode("?", $_SERVER["REQUEST_URI"])[0];
$method = strtolower($_SERVER["REQUEST_METHOD"]);

require_once 'libraries/auth.php';
require_once 'controllers/userManagement.php';
require_once 'controllers/tapahtumaManagement.php';
require_once 'controllers/profiiliController.php';

switch($route) {
    case "/":
        viewTapahtumatController();
    break;

    case "/register":
        registerController();
    break;

    case "/login":
        loginController();
    break;

    case "/logout":
        logoutController();
    break;

    case "/add_tapahtuma":
      if(isLoggedIn()){
        addTapahtumaController();
      } else {
        loginController();
      }
    break;

    case "/delete_tapahtuma":
      if(isLoggedIn()){
        deleteTapahtumaController();
      } else {
        loginController();
      }
    break;

    case "/update_tapahtuma":
      if(isLoggedIn()){
        if($method == "get"){
          editTapahtumaController();  
        } else {
          updateTapahtumaController();
        }
      } else {
        loginController();
      }
    break;

    case "/ilmoittaudu":
      ilmoittautuminenController();
    break;

    case "/profiili":
      if(isLoggedIn()){
      $userId = $_SESSION['userid'];
      showProfile($userId);
      } else {
        loginController();
      }
    break;

    default:
      echo "404";
  }
