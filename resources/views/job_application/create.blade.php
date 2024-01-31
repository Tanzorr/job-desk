<x-layout>
    <x-breadcrumbs class="mb-4"
                  :links="[
    'Jobs'=>route('jobs.index'),
     $job->title => route('jobs.show', $job),
     'Apply' => '#'
     ]"/>
    <x-job-card :$job/>
    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Your Job Application
        </h2>
        <form action="{{ route('jobs.applications.store', $job) }}"
              method="POST"
              enctype="multipart/form-data"
        >
            @csrf
            <div class="mb-4">
                <label for="expected_salary"
                       class="block mb-1 font-medium text-sm text-slate-900">
                    Expected Salary
                </label>
                <x-text-input
                    type="number"
                    name="expected_salary"
                    placeholder="Your expected_salary"
                    id="expected_salary"
                    :value="old('expected_salary')"
                    required/>
            </div>
            <div class="mb-4">
                <label for="cv"
                       class="block mb-1 font-medium text-sm text-slate-900">
                    Upload CV
                </label>
                <x-text-input type="file" name="cv"/>
            </div>
            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>
