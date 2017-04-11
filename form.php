<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 10.04.17
 */

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/app.php';

//echo Form::open(['url' => 'foo/bar', 'method' => 'put']);
//
//{{ Form::open(array('url' => 'action.php')) }
////        echo Form::label('email', 'E-Mail Address');
//{{ Form::text('name', @$name) }}
//
//{{ Form::password('password') }}

//{{ Form::submit('Send') }}
//
//{{ Form::close() }}

{!! Form::open([]) !!}

{!! Form::text('name', @$name) !!}

{!! Form::password('password') !!}

{!! Form::submit('Send') !!}

{!! Form::close() !!}