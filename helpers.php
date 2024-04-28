<?php 




function redirect($uri = null){
  return header("location: http://localhost/test/" . $uri);
}