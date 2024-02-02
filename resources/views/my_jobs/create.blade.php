<x-layout>
    <x-breadcrumbs :links="['My Jobs'=>route('my-jobs.index'), 'Create'=>'#' ]" class="mb-4"/>
    <x-card class="mb-8">
        <form action="{{ route('my-jobs.store') }}" method="POST">
            @csrf

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input
                        type="text"
                        name="title"
                        placeholder="Job title"
                        id="title"
                        :value="old('title')"
                        required
                    />
                </div>

                <div>
                    <x-label for="location" :required="true">Job Location</x-label>
                    <x-text-input
                        type="text"
                        name="location"
                        placeholder="Job location"
                        id="title"
                        :value="old('location')"
                        required
                    />
                </div>

                <div class="col-span-2">
                    <x-label for="salary" :required="true">Job Salary</x-label>
                    <x-text-input
                        type="number"
                        name="salary"
                        placeholder="Job salary"
                        id="title"
                        :value="old('salary')"
                        required
                    />
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">Job description</x-label>
                    <x-text-input
                        type="textarea"
                        name="description"
                        placeholder="Job description"
                        id="title"
                        :value="old('description')"
                        required
                    />
                </div>
                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group name="experience"
                                   :value="old('experience')"
                                   :all-option="false"
                                   :options="array_combine(
                            array_map('ucfirst', \App\Models\Job::$experience),
                            \App\Models\Job::$experience,
                        )"/>
                </div>
                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group name="category"
                                   :value="old('category')"
                                   :all-option="false"
                                   :options="\App\Models\Job::$categories"
                    />
                </div>
            </div>
            <x-button class="w-full">Create Job</x-button>
        </form>
    </x-card>
</x-layout>
