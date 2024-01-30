<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">
        Sign in to your account
    </h1>
    <x-card class="py-8 px-16">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="mb-8">
                <label for="email"
                       class="block mb-1 font-medium text-sm text-slate-900"
                >Email</label>
                <x-text-input id="email" name="email" type="email" required autofocus/>
            </div>
            <div class="mb-8">
                <label for="password"
                       class="block mb-1 font-medium text-sm text-slate-900"
                >Password</label>
                <x-text-input id="password" name="password" type="password" required/>
            </div>
            <div class="mb-8 flex justify-between text-sm font-medium">
                <div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox"
                               class="rounded-sm border border-slate-400"
                                 name="remember"
                                    id="remember"
                                    {{ old('remember') ? 'checked' : '' }}
                        />
                        <label for="remember" class="ml-1 text-slate-900">Remember me</label>
                    </div>
                </div>
                <div>
                    <a href="#" class="text-indigo-600 hover:underline">
                        Forgot your password?
                    </a>
                </div>
            </div>
            <x-button class="w-full bg-green-50">Sign in</x-button>
        </form>
    </x-card>
</x-layout>
