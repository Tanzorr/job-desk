<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="[
                 'Jobs' => route('jobs.index')
                ]"
    />
    <x-card class="p-4 mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search"
                                  value="{{ request('search') }}"
                                  placeholder="Search for any text"
                    />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary"
                                      value="{{ request('min_salary') }}"
                                      placeholder="From"
                        />
                        <x-text-input name="max_salary"
                                      value="{{ request('max_salary') }}"
                                      placeholder="To"
                        />
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <div>
                        <x-radio-group name="experience"
                                       :options="array_combine(
                            array_map('ucfirst', \App\Models\Job::$experience),
                            \App\Models\Job::$experience,
                        )"/>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <div>
                        <x-radio-group name="category"
                                       :options="\App\Models\Job::$categories"/>
                    </div>
                </div>
            </div>
            <button class="w-full">Filter</button>
        </form>
    </x-card>
    @foreach($jobs as $job)
        <x-job-card class="mb-4" :$job>
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>