<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-300 shadow sm:rounded-lg">
                <div class="">
                    <div class="w-full max-w-6xl">
                        <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 xl:grid-cols-5 gap-6 mb-6">
                            <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
                                <div class="bg-purple-500 text-white p-3 rounded-full mr-4">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold">Providers</h2>
                                    <p class="text-gray-500">{{ $providerCount }} items</p>
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
                                <div class="bg-green-500 text-white p-3 rounded-full mr-4">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold">Payment Method</h2>
                                    <p class="text-gray-500">{{ $paymentCount }} Items</p>
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
                                <div class="bg-green-500 text-white p-3 rounded-full mr-4">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold">Transaction Success</h2>
                                    <p class="text-gray-500">{{ $transactionSuccess }} items</p>
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
                                <div class="bg-yellow-500 text-white p-3 rounded-full mr-4">
                                    <i class="fa fa-pause"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold">Transaction Pending</h2>
                                    <p class="text-gray-500">{{ $transactionPending }} items</p>
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
                                <div class="bg-red-500 text-white p-3 rounded-full mr-4">
                                    <i class="fa fa-times"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold">Transaction Cancel/Failed</h2>
                                    <p class="text-gray-500">{{ $transactionFail }} items</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-6">

                            <div class="bg-white p-6 rounded-lg shadow-md">
                                <h2 class="text-xl font-bold mb-4">10 Recent Transaction</h2>
                                <table class="w-full text-left">
                                    <thead>
                                        <tr>
                                            <th class="pb-2">No</th>
                                            <th class="pb-2">ID</th>
                                            <th class="pb-2">Provider</th>
                                            <th class="pb-2">Rate</th>
                                            <th class="pb-2">Phone</th>
                                            <th class="pb-2">Pulse Amount</th>
                                            <th class="pb-2">Claim Amount</th>
                                            <th class="pb-2">Payment</th>
                                            <th class="pb-2">Account Number</th>
                                            <th class="pb-2">Account Name</th>
                                            <th class="pb-2">Date</th>
                                            <th class="pb-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($transactionData as $valueTr)
                                            <tr class="border-t">
                                                <td class="py-2">
                                                    {{ $no++ }}
                                                </td>
                                                <td class="py-2">{{ $valueTr->transaction_number }}</td>
                                                <td class="py-2">{{ $valueTr->transactionToProvider->provider_name }}
                                                </td>
                                                <td class="py-2">{{ $valueTr->rate }}</td>
                                                <td class="py-2">{{ $valueTr->phone_number }}</td>
                                                <td class="py-2">{{ $valueTr->pulse_amount }}</td>
                                                <td class="py-2">{{ $valueTr->total_pulse }}</td>
                                                <td class="py-2">{{ $valueTr->transactionToPayment->name }}</td>
                                                <td class="py-2">{{ $valueTr->payment_name }}</td>
                                                <td class="py-2">{{ $valueTr->account_name }}</td>
                                                <td class="py-2">{{ $valueTr->transaction_date }}</td>
                                                @if ($valueTr->status_transaction == 1)
                                                    @php
                                                        $status = 'success';
                                                    @endphp
                                                @elseif ($valueTr->status_transaction == 2)
                                                    @php
                                                        $status = 'cancel';
                                                    @endphp
                                                @else
                                                    @php
                                                        $status = 'pending';
                                                    @endphp
                                                @endif
                                                <td class="py-2">{{ $status }}</td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
