<?php
  $_SESSION = array();

  unset($_COOKIE);

  session_destroy();

  header("Location: ..");
