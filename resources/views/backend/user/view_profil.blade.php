@extends('admin.admin_master')


@section('admin')

<div class="content">
    <h2 class="content-heading">Inline</h2>
    <div class="row">
      <div class="col-lg-4">
        <p class="text-muted">
          Using an inline layout can come really handy for small forms
        </p>
      </div>
      <div class="col-lg-8 space-y-2">
        <!-- Form Inline - Default Style -->
        <form class="row row-cols-lg-auto g-3 align-items-center" action="be_forms_layouts.html" method="POST" onsubmit="return false;">
          <div class="col-12">
            <label class="visually-hidden" for="example-if-email">Email</label>
            <input type="email" class="form-control" id="example-if-email" name="example-if-email" placeholder="Email">
          </div>
          <div class="col-12">
            <label class="visually-hidden" for="example-if-password">Password</label>
            <input type="password" class="form-control" id="example-if-password" name="example-if-password" placeholder="Password">
          </div>
          <div>
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
        <!-- END Form Inline - Default Style -->

        <!-- Form Inline - Alternative Style -->
        <form class="row row-cols-lg-auto g-3 align-items-center" action="be_forms_layouts.html" method="POST" onsubmit="return false;">
          <div class="col-12">
            <label class="visually-hidden" for="example-if-email2">Email</label>
            <input type="email" class="form-control form-control-alt" id="example-if-email2" name="example-if-email2" placeholder="Email">
          </div>
          <div class="col-12">
            <label class="visually-hidden" for="example-if-password2">Password</label>
            <input type="password" class="form-control form-control-alt" id="example-if-password2" name="example-if-password2" placeholder="Password">
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-secondary">Login</button>
          </div>
        </form>
        <!-- END Form Inline  ds- Alternative Style -->
      </div>
    </div>
</div>
@endsection
