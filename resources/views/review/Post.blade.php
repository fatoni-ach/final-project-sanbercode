@extends('layouts.master')
@section('contentsatu')
<section class="normal-breadcrumb set-bg" data-setbg="{{ asset('/anime/img/Movie.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Make New Post!</h2>
                    <p>Hello, Start creating new review</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('contentdua')
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
                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="pl-4">
                        @csrf
                       
                        <div class="row">
                            {{-- <div class="col-md-6 pt-5">
                                <input type="file" name="foto" class="form-control">
                            </div> --}}
                            {{-- <div class="col-md-6 pt-5">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div> --}}
                        </div>
                    {{-- </form> --}}
                    </div>
                </div>
                <div class="col-lg-9 mt-5">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="file" name="foto" class="form-control">
                                    @error('foto')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="judul" id="title" placeholder="Title">
                                    @error('title')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select id="genre" name="genre[]" class="form-control" multiple="multiple">
                                        @foreach ($genre as $g)
                                        <option value="{{$g->nama}}">{{$g->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select id="pemain" name="pemain[]" class="form-control" multiple="multiple">
                                        @foreach ($pemain as $p)
                                        <option value="{{$p->nama}}">{{$p->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="sinopsis" id="isi" cols="30" rows="10" placeholder="sinopsis"></textarea>
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

@push('script')
<script src="{{ asset('sweetalert/dist/sweetalert2.all.min.js') }}"></script>
@if (Session::has('sukses'))
    <script>
        Swal.fire(
        'Succes!',
        'Postingan Berhasil dibuat',
        'success'
        )
    </script>
@endif
<script>
    $(document).ready(function () {
        $("#genre").select2({
            placeholder: 'Genre',
            tags: true,
            tokenSeparators: [',']
        });
        $("#pemain").select2({
            placeholder: 'pemain',
            tags: true,
            tokenSeparators: [',']
        });
    });
</script>
@endpush