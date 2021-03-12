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
                        <div class="product__item__pic set-bg bg-light border border-info" data-setbg="{{asset($post->getImage())}}">
                        <div class="panel-body">
                     
                          @if ($message = Session::get('success'))
                          <div class="alert alert-success alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                                  <strong>{{ $message }}</strong>
                          </div>
                          <img src="{{asset($post->getImage())}}}">
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
                    </div>
                </div>
                <div class="col-lg-9 mt-5">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <input type="file" name="gambar" class="form-control" value="">
                                    @error('foto')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="judul" id="title" placeholder="Title" value="{{ $post->judul}}">
                                    @error('title')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select id="genre" name="genre[]" class="form-control" multiple="multiple">
                                        @foreach ($post->genres as $g)
                                            <option value="{{$g->nama}}" selected="selected">{{$g->nama}}</option>                                            
                                        @endforeach
                                        @foreach ($genre as $g)
                                            <option value="{{$g->nama}}">{{$g->nama}}</option>                                            
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select id="pemain" name="pemain[]" class="form-control" multiple="multiple">
                                        @foreach ($post->pemains as $p)
                                            <option value="{{$g->nama}}" selected="selected">{{$p->nama}}</option>                                            
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="sinopsis" id="isi" cols="30" rows="10" placeholder="sinopsis"
                                    >{{$post->sinopsis}}</textarea>
                                    @error('isi')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="datetime" class="form-control" name="tahun" id="tahun" placeholder="Year Released" value="{{$post->tahun}}"></input>
                                    @error('tahun')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
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