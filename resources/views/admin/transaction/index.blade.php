@section('custom_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/js/dataTables.tailwindcss.js">
    <link rel="stylesheet" href="{{ asset('vendor/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/responsive.dataTables.min.css') }}">
    <style>
        /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            margin-bottom: 20px;
            color: #ffffff;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #f3f3f3;
            /*border-gray-200*/
            background-color: #c7c6c6b8;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #5a5a5a;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        table tbody {
            background-color: #e2e8f0
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }

        .btn-edits {
            background-color: #2f9df1;
            border: none;
            color: white;
            padding: 7px 7px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
        }
    </style>
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="breadcrumbs text-sm text-black">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a>Transaction</a></li>
                </ul>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-300 shadow sm:rounded-lg">
                <div class="p-1 m-1">
                    <button id="btn-refresh"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-500 focus:outline-none dark:focus:ring-green-800"><i
                            class="fa fa-retweet" aria-hidden="true"></i> Refresh</button>
                    <table id="tbl-transaction"
                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-cyan-700 dark:bg-blue-400 dark:text-white-400">
                            <tr>
                                <th scope="" style="width: 10px">
                                    No
                                </th>
                                <th scope="col" class="">
                                    ID
                                </th>
                                <th scope="col" class="">
                                    Provider
                                </th>
                                <th scope="" style="width: 10px">
                                    Rate
                                </th>
                                <th scope="col" class="">
                                    Pulse Amount
                                </th>
                                <th scope="col" class="">
                                    Claim
                                </th>
                                <th scope="col" class="">
                                    Payment
                                </th>
                                <th scope="col" class="">
                                    Account Number
                                </th>
                                <th scope="col" class="">
                                    Account Name
                                </th>
                                <th scope="col" class="">
                                    Date
                                </th>
                                <th scope="col" class="">
                                    Status
                                </th>
                                <th scope="col" class="">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <dialog id="modal_change" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold">Modal change status</h3>
            <form action="javascript:;" id="form-add-payment" class="max-w-sm mx-auto">
                @csrf

                <div class="flex items-center mt-4">
                    <input checked id="default-radio-1" type="radio" value="1" name="status_transaction"
                        class="custom-radios w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Success</label>
                </div>
                <div class="flex items-center">
                    <input checked id="default-radio-2" type="radio" value="2" name="status_transaction"
                        class="custom-radios w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cancel</label>
                </div>
                <div class="flex items-center">
                    <input checked id="default-radio-3" type="radio" value="0" name="status_transaction"
                        class="custom-radios w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pending</label>
                </div>
            </form>
        </div>
    </dialog>
    @push('custom_js')
        <script>
            var url = '{{ url('') }}';
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('vendor/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('dist/admin/transaction/view.min.js?xc=') . time() }}"></script>
    @endpush
</x-app-layout>
