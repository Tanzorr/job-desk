<x-layout>
    <x-card>
        <form action="{{ route('employers.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="company_name" :required="true">Company Name</x-label>
                <x-text-input
                    type="text"
                    name="company_name"
                    placeholder="Your company_name"
                    id="company_name"
                    :value="old('company_name')"
                    required/>
            </div>
            <x-button class="w-full">Create</x-button>
        </form>
    </x-card>
</x-layout>
