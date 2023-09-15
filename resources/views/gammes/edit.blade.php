@extends ('layouts.app')

@section('title')
    Modifier la gamme - Tylte Concept Store
@endsection

@section('content')
    <main class="container">

        <h1 class="text-center">Modification de la gamme</h1>
        <div class="row">

            <div class="col-md-12 mt-5 mb-5">
                <div class="row">
                    <div class="col-10 offset-1 text-center">
                        <form class="col-12 mx-auto p-5 border border-dark-subtle rounded"
                            action="{{ route('gammes.update', $gamme) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input required type="text" class="form-control" name="nom"
                                    value="{{ $gamme->nom }}" id="nom">
                            </div>

                            <button type="submit" class="btn btn-full">Modifier</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endsection
