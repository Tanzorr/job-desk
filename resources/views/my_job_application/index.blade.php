<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="[
                    'My Job Applications' => '#'
                ]"/>
    @forelse($applications as $app )
        <x-job-card :job="$app->job">
            <div class="flex items-center justify-between text-xs text-slate-500">
                <div>
                    <div>
                        Applied {{ $app->created_at->diffForHumans() }}
                    </div>
                    <div>
                        Other {{ Str::plural('applicant', $app->job->job_applications_count - 1) }}
                        {{ $app->job->job_applications_count - 1 }}
                    </div>
                    <div>
                        Your asking salary: ${{ number_format($app->expected_salary) }}
                    </div>
                    <div>
                        Average asking salary
                        ${{ number_format($app->job->job_applications_avg_expected_salary) }}
                    </div>
                </div>
                <div>
                    <form action="{{route('my.applications.destroy', $app) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button class="w-full">Delete</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="text-center text-sm font-medium text-slate-500">
            You have not applied for any jobs yet.
            Go find some jobs
            <a href="{{ route('jobs.index') }}" class="text-indigo-600 hover:underline">
                here
            </a>
        </div>
    @endforelse
</x-layout>
