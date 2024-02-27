<!DOCTYPE html>

<html class="no-js" {!! language_attributes() !!}>

<head>

  <meta charset="{{ bloginfo('charset') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  {!! wp_head() !!}

</head>

<body {!! body_class() !!}>
  <style>
    .bg-green {
      background-color: #fb9417 !important
    }
  </style>
  <header>
    @include('partials.nav-primary')
  </header>