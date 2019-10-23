@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-xs-12">
<div class="box">
    <div class="box-header">
        @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            <p>{{\Session::get('success')}}</p>
        @endif
        </div>
      <div class="col-sm-4 invoice-col">
      <form role="form" method="get" action="{{ route('product.search') }}">
          {{csrf_field()}} 
          <div class="form-group">
            <label>Search ID:</label>

            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Cari id...">
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Export">
          </div>
      </form>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID Produk</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Katogori</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach($product as $item)
          <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->harga }}</td>
              <td>{{ $item->category }}</td>
              <td>{{ $item->status }}</td>
              <td>
                  <form class="" action="{{ route('product.destroy', $item) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                  <a class="btn btn-success" href="{{ route('product.edit', $item) }}">
                      Edit
                  </a>
                  <a class="btn btn-primary" href="{{ route('product.detail', $item) }}">
                        Detail
                    </a>
                  </form>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
  @endsection