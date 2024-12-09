<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="">
                    <div class="w-full max-w-6xl">
                        <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 xl:grid-cols-5 gap-6 mb-6">
                            <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
                                <div class="bg-purple-500 text-white p-3 rounded-full mr-4">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold">Providers</h2>
                                    <p class="text-gray-500">2 Payments</p>
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
                                <div class="bg-green-500 text-white p-3 rounded-full mr-4">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold">Payment Method</h2>
                                    <p class="text-gray-500">43 Items</p>
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
                                <div class="bg-yellow-500 text-white p-3 rounded-full mr-4">
                                    <i class="fas fa-blog"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold">Transaction Success</h2>
                                    <p class="text-gray-500">70 Active</p>
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
                                <div class="bg-red-500 text-white p-3 rounded-full mr-4">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold">Transaction Pending</h2>
                                    <p class="text-gray-500">90 Approved</p>
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
                                <div class="bg-red-500 text-white p-3 rounded-full mr-4">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold">Transaction Cancel</h2>
                                    <p class="text-gray-500">90 Approved</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="bg-white p-6 rounded-lg shadow-md">
                                <h2 class="text-xl font-bold mb-4">Browser Stats</h2>
                                <ul>
                                    <li class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <img alt="Google Chrome logo" class="mr-2" height="24"
                                                src="https://storage.googleapis.com/a1aa/image/FwSzVrRgAabFM5JkkOOuUvVYumfYzqQLkEM4QV7ZfSjBqG5TA.jpg"
                                                width="24" />
                                            <span>Google Chrome</span>
                                        </div>
                                        <span>72%</span>
                                    </li>
                                    <li class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <img alt="Firefox logo" class="mr-2" height="24"
                                                src="https://storage.googleapis.com/a1aa/image/6Jf9CCebh1m2W0vdrDZ5kOhOIPb2mJCBf0qKvXNInfZCoakPB.jpg"
                                                width="24" />
                                            <span>Firefox</span>
                                        </div>
                                        <span>5%</span>
                                    </li>
                                    <li class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <img alt="Internet Explorer logo" class="mr-2" height="24"
                                                src="https://storage.googleapis.com/a1aa/image/TtS3eWRKqmRMcC3f0tlMdeddBFaWiMBfVwxFo2ehLQ48P1IfE.jpg"
                                                width="24" />
                                            <span>Internet Explorer</span>
                                        </div>
                                        <span>59%</span>
                                    </li>
                                    <li class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <img alt="Safari logo" class="mr-2" height="24"
                                                src="https://storage.googleapis.com/a1aa/image/eS7jfuA6ReTXLIKAzm1hQNqWfk2r6kl50Xm4qjeyybRcQ1IfE.jpg"
                                                width="24" />
                                            <span>Safari</span>
                                        </div>
                                        <span>28%</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="bg-white p-6 rounded-lg shadow-md">
                                <h2 class="text-xl font-bold mb-4">Recent Sales</h2>
                                <table class="w-full text-left">
                                    <thead>
                                        <tr>
                                            <th class="pb-2">Product</th>
                                            <th class="pb-2">Price</th>
                                            <th class="pb-2">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-t">
                                            <td class="py-2 flex items-center">
                                                <span
                                                    class="bg-green-500 h-3 w-3 rounded-full inline-block mr-2"></span>
                                                Lightning To USB-C Adapter Lightning.
                                            </td>
                                            <td class="py-2">$15</td>
                                            <td class="py-2">27 Minutes Ago</td>
                                        </tr>
                                        <tr class="border-t">
                                            <td class="py-2 flex items-center">
                                                <span
                                                    class="bg-yellow-500 h-3 w-3 rounded-full inline-block mr-2"></span>
                                                Apple IPhone 8.
                                            </td>
                                            <td class="py-2">$96</td>
                                            <td class="py-2">1 Minutes Ago</td>
                                        </tr>
                                        <tr class="border-t">
                                            <td class="py-2 flex items-center">
                                                <span
                                                    class="bg-green-500 h-3 w-3 rounded-full inline-block mr-2"></span>
                                                Apple MacBook Pro.
                                            </td>
                                            <td class="py-2">$46</td>
                                            <td class="py-2">46 Minutes Ago</td>
                                        </tr>
                                        <tr class="border-t">
                                            <td class="py-2 flex items-center">
                                                <span class="bg-red-500 h-3 w-3 rounded-full inline-block mr-2"></span>
                                                Samsung Galaxy S9.
                                            </td>
                                            <td class="py-2">$4</td>
                                            <td class="py-2">96 Minutes Ago</td>
                                        </tr>
                                        <tr class="border-t">
                                            <td class="py-2 flex items-center">
                                                <span
                                                    class="bg-yellow-500 h-3 w-3 rounded-full inline-block mr-2"></span>
                                                Samsung Galaxy S8 256GB.
                                            </td>
                                            <td class="py-2">$14</td>
                                            <td class="py-2">89 Minutes Ago</td>
                                        </tr>
                                        <tr class="border-t">
                                            <td class="py-2 flex items-center">
                                                <span
                                                    class="bg-green-500 h-3 w-3 rounded-full inline-block mr-2"></span>
                                                Apple Watch.
                                            </td>
                                            <td class="py-2">$38</td>
                                            <td class="py-2">15 Minutes Ago</td>
                                        </tr>
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
