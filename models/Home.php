<?php
  switch($this->action) {
      case "default":
          $this->model  = [
              'title' => $this->className
          ];
          break;
      case "someaction":
          $this->model  = [
              'title' => $this->className
          ];
          break;
  }
