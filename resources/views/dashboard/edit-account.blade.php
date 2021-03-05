@extends('layouts.dashboard')
@section('breadcrumb')
<nav aria-label="breadcrumb" >
  <div class="container">
  <ol class="breadcrumb mt-4" style="background:#fff;max-width:400px;">
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page">{{Auth::user()->role->role}} Account</li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</div>
</nav>

@endsection

@section('content')
  <section class="container my-4">
    <x-flash-messages />
  </section>

  <section class="container my-4">
    <x-edit-account-form />
  </section>

  <section class="container my-4">
    <x-edit-account-credentials />
  </section>
@endsection