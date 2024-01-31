<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="[
                    'My Job Applications' => '#'
                ]"/>
    @foreach($applications as $app )
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
                <div>Right</div>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
