@extends('template')
@section('content')
    <section class="main-section">
        <div class="content">
            <h1>Tambah tb_pembelian</h1>
            <hr>
            @if($errors->any())
                <div class="alert-danger">
                @foreach($errors->all() as $error)
                    <li><strong>{{ $error }}</strong></li>
                @endforeach
                </div>
            @endif 

            <form action="{{ route('tb_pembelian.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">id:</label>
                    <input type="text" class="form-control" id="id" name="id">
                </div>
                <div class="form-group">
                    <label for="nama">kd_barang:</label>
                    <input type="text" class="form-control" id="kd_barang" name="kd_barang">
                </div>
                <div class="form-group">
                    <label for="nama">jml:</label>
                    <input type="text" class="form-control" id="jml" name="jml">
                </div>
                <div class="form-group">
                    <label for="nama">total_harga:</label>
                    <input type="text" class="form-control" id="total_harga" name="total_harga">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancle</button>
                </div>
            </form>
        </div>
    </section>
@endsection