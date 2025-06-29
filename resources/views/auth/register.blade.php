<x-default>
    <main class="mt-5">
        <div class="max-w-md mx-auto py-10 px-4 text-brown">
            @if(session()->has("Sukces"))
                <div class="bg-green px-4 py-2 rounded text-white mb-4 text-center">
                    {{ session()->get("Sukces") }}
                </div>
            @endif
            @if(session()->has("Blad"))
                <div class="bg-red-500 px-4 py-2 rounded text-white mb-4 text-center">
                    {{ session()->get("Blad") }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <h3 class="bg-primary text-white text-center py-4 font-semibold">Rejestracja</h3>
                <div class="p-6">
                    <form method="POST" action="{{route('register.post')}}" class="space-y-4">
                        @csrf

                        <div>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                placeholder="Imię"
                                autofocus
                                class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                            >
                            @if ($errors->has('name'))
                                <span class="text-red-400 text-sm">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div>
                            <input
                                type="text"
                                name="email"
                                id="email"
                                placeholder="Email"
                                class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                            >
                            @if ($errors->has('email'))
                                <span class="text-red-400 text-sm">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                placeholder="Hasło"
                                class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                            >
                            @if ($errors->has('password'))
                                <span class="text-red-400 text-sm">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <button
                            type="submit"
                            class="w-full px-4 py-2 bg-primary hover:bg-accent text-white font-semibold rounded transition-colors"
                        >
                            Zarejestruj
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-default>
