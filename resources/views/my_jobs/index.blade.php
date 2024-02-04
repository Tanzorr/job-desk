<x-layout>
    <x-breadcrumbs :links="['My Jobs' => '#', 'Create' => '#']"  class="mb-4"/>
    <div class="mb-8 text-right">
        <x-link-button href="{{ route('my-jobs.create') }}">Create</x-link-button>
    </div>
    @forelse($jobs as $job)
        <x-job-card :$job>
            @forelse($job->jobApplications as $jobApplication)
               <div class="mb-4 flex items-center justify-between">
                     <div>
                          <div class="font-bold">{{ $jobApplication->user->name }}</div>
                         <div>
                             Applied on {{ $jobApplication->created_at->diffForHumans() }}
                         </div>
                          <div>Download Sv</div>
                     </div>
                     <div>
                         ${{ $jobApplication->expected_salary }}
                     </div>
               </div>
            @empty
                <div class="rounded-md border border-dashed border-state-300 p-8">
                   <div class="text-center font-medium">
                          No applications yet
                   </div>
                    <div class="text-center">
                        Post your first job now
                        <a class="text-indigo-600 hover:underline" href="{{ route('my-jobs.create') }}">Here!</a>
                    </div>
                </div>
            @endforelse
            <div class="flex space-x-2">
                <x-link-button :href="route('my-jobs.edit', $job)">
                    Edit
                </x-link-button>
                <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button type="submit">Delete</x-button>
                </form>
            </div>
        </x-job-card>
    @empty
        No Jobs found
    @endforelse
</x-layout>
