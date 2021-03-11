@extends('layouts.master')
@section('contentsatu')
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="pl-4">
                <h2 class="text-light">Film Banner</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 mt-5">
                    <div class="panel panel-primary">
                        <div class="anime__details__pic bg-light border border-info" data-setbg="{{asset('img/')}}">
                        <div class="panel-body">
                     
                          @if ($message = Session::get('success'))
                          <div class="alert alert-success alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                                  <strong>{{ $message }}</strong>
                          </div>
                          <img src="img/{{Session::get('foto')}}">
                          @endif
                          @if (count($errors) > 0)
                              <div class="alert alert-danger">
                                  <strong>Whoops!</strong> There were some problems with your input.
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                        </div>
                    </div>
                    <form action="{{route('post_film.store')}}" method="POST" enctype="multipart/form-data" class="pl-4">
                        @csrf
                       
                        <div class="row">
                            <div class="col-md-6 pt-5">
                                <input type="file" name="foto" class="form-control">
                            </div>
                            <div class="col-md-6 pt-5">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-lg-9 mt-5">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <form action="{{route('post_film.store')}}" method="POST">
                                @csrf
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" name="judul" id="title" placeholder="Title">
                                    @error('title')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="sinopsis" id="isi" cols="30" rows="10" placeholder="Your Review"></textarea>
                                    @error('isi')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="datetime" class="form-control" name="tahun" id="tahun" placeholder="Year Released"></input>
                                    @error('tahun')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</section>
@endsection