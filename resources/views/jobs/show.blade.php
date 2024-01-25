<x-layout>
    <x-breadcrumbs class="mb-4"
                     :links="[
                 'Jobs' => route('jobs.index'),
                 $job->title => route('jobs.show', $job)
                ]"
    />
    <x-job-card :$job/>
</x-layout>
