<x-default>
    <main class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    @if(session()->has("Sukces"))
                        <div class="alert alert-success">
                            {{session()->get("Sukces")}}
                        </div>
                    @endif
                        @if(session()->has("Blad"))
                            <div class="alert alert-danger">
                                {{session()->get("Blad")}}
                            </div>
                        @endif
                    <div class="card">
                        <h3 class="card-header text-center">Rejestracja</h3>
                        <div class="card-body">
                            <form method="POST" action="{{route("register.post")}}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Imie" id="name" class="form-control" name="name"  autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email"  autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Hasło" id="password" class="form-control" name="password" >
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Zarejestruj</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-default>
