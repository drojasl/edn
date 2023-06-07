<?php
@session_start();
unset($_SESSION['EmpresarioLogueado']);

header("Location: index");