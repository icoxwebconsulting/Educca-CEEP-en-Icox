<?php
// auto-generated by sfSecurityConfigHandler
// date: 2018/09/18 20:30:28
$this->security = array (
  'index' => 
  array (
    'is_secure' => true,
    'credentials' => 
    array (
      0 => 
      array (
        0 => 'alumno',
        1 => 'profesor',
        2 => 'supervisor',
        3 => 'administrador',
      ),
    ),
  ),
  'all' => 
  array (
    'is_secure' => true,
    'credentials' => 
    array (
      0 => 
      array (
        0 => 'alumno',
        1 => 'profesor',
        2 => 'supervisor',
        3 => 'administrador',
      ),
    ),
  ),
  'nuevoLibro' => 
  array (
    'is_secure' => true,
    'credentials' => 'profesor',
  ),
  'eliminarLibro' => 
  array (
    'is_secure' => true,
    'credentials' => 'profesor',
  ),
  'modificarLibro' => 
  array (
    'is_secure' => true,
    'credentials' => 'profesor',
  ),
  'fichaCurso' => 
  array (
    'is_secure' => true,
    'credentials' => 
    array (
      0 => 
      array (
        0 => 'supervisor',
        1 => 'administrador',
      ),
    ),
  ),
  'modificarNormativa' => 
  array (
    'is_secure' => true,
    'credentials' => 'profesor',
  ),
);