<?php
session_start();
if (isset($_SESSION['autenticado'])) {
    echo "Hola";
}
