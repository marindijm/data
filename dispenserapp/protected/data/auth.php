<?php
return array (
  'reader' => 
  array (
    'type' => 2,
    'description' => 'Only view dispenserapp',
    'bizRule' => '',
    'data' => '',
  ),
  'writer' => 
  array (
    'type' => 2,
    'description' => 'Create and edit',
    'bizRule' => '',
    'data' => '',
    'children' => 
    array (
      0 => 'reader',
    ),
  ),
  'admin' => 
  array (
    'type' => 2,
    'description' => 'Admin',
    'bizRule' => '',
    'data' => '',
    'children' => 
    array (
      0 => 'reader',
      1 => 'writer',
    ),
    'assignments' => 
    array (
      1000 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      1558 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      2188 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      2000 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      131 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
);
