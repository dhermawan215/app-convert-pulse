@section('custom_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Rate Pricing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="breadcrumbs text-sm text-black">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a>Rate Pricing</a></li>
                    <li><a>Edit Rate Pricing</a></li>
                </ul>
            </div>
            <div class="p-4 sm:p-8 bg-white sm:rounded-lg">
                <div class="p-1 m-1">
                    <a href="{{ route('rate_pricing') }}" id="btn-add"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Back</a>
                </div>

                <hr class="mt-2 border">
                <form class="w-full p-2 mt-2" method="post" id="form-edit-rate" action="javascript:;">
                    @csrf
                    <input type="hidden" name="dsx" value="{{ $id }}">
                    <div class="mb-5">
                        <label for="provider" class="block mb-2 text-sm font-medium text-black">Providers</label>
                        <select id="provider" name="provider"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Choose a provider</option>
                            @foreach ($provider as $value)
                                @if ($data->provider_id == $value->id)
                                    <option selected value="{{ $data->provider_id }}">
                                        {{ $data->rateToProvider->provider_name }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->provider_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="rate-value" class="block mb-2 text-sm font-medium text-black">Your
                            password</label>
                        <input type="number" step="0.01" id="rate-value" name="rate"
                            value="{{ $data->rate_value }}"
                            class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>
        </div>
    </div>
    @push('custom_js')
        <script>
            var url = '{{ url('') }}';
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('dist/admin/rate/edit.min.js?xc=') . time() }}"></script>
    @endpush
</x-app-layout>
