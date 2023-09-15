@extends ('layouts.app')

@section('title')
    Modifier l'article - Tylte Concept Store
@endsection

@section('content')
    <main class="container">

        <h1 class="text-center">Modification de l'article</h1>
        <div class="row">

            <div class="col-md-12 mt-5 mb-5">
                <div class="row">
                    <div class="col-10 offset-1 text-center">
                        <form class="col-12 mx-auto p-5 border border-dark-subtle rounded"
                            action="{{ route('articles.update', $article) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input required type="text" class="form-control" name="nom"
                                    value="{{ $article->nom }}" id="nom">
                            </div>

                            <input type="hidden" name="description_courte" value="{{ $article->description_courte }}"
                                id="description_courte">
                            <div class="form-group">
                                <label for="description_courte">Description courte</label>
                                <input required type="text" class="form-control" name="description_courte"
                                    value="{{ $article->description_courte }}" id="description_courte">
                            </div>

                            <input type="hidden" name="description_longue" value="{{ $article->description_longue }}"
                                id="description_longue">
                            <div class="form-group">
                                <label for="description_longue">Description longue</label>
                                <textarea required type="text" class="form-control" name="description_longue" id="description_longue">{{ $article->description_longue }}</textarea>
                            </div>

                            <div class="form-group mt-4">
                                <label class="label">Prix</label>
                                <div class="control">
                                    <input id="number" class="form-control text-center" type="number" name="prix" step="0.01"
                                        value="{{ $article->prix }}">
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{_('Image')}}</label>
                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <label class="label">Stock</label>
                                <div class="control">
                                    <input class="form-control text-center" type="text" name="stock"
                                        value="{{ $article->stock }}">
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <label for="gamme_id">Gamme</label>
                                <select name="gamme_id" id="gamme_id">
                                    <option value="">--Choisissez une gamme--</option>
                                    @foreach ($gammes as $gamme)
                                        <option value="{{ $gamme->id }}">{{ $gamme->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="gamme_id" value="{{$article->gamme_id}}">

                            <button type="submit" class="btn btn-full">Modifier</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endsection
