<x-mail::message>
# Nova vaga

<x-mail::panel>
{{ $listing->company_name }}<br/>
# {{ $listing->title }}
Local: {{ $listing->location }}<br/>
{{ $listing::CONTRACT_TYPES[$listing->contract_type] }} {{ $listing->salary ? ' - ' . $listing->salary : '' }}<br/>
</x-mail::panel>

<x-mail::button :url="route('post-job.click', [
    'listing' => $listing,
    'subscriber' => $subscriber,
])">
Ver detalhes da vaga
</x-mail::button>

</x-mail::message>
