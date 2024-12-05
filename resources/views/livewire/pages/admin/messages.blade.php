<div>
    <h1 class="mb-4 text-2xl font-bold">Messages</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        E-mail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Message
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $message['nama'] }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $message['email'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $message['telp'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $message['message'] }}
                    </td>
                    <td class="px-6 py-4">
                        <button wire:click="deleteMessage({{ $message['id'] }})" type="button" class="font-medium text-gray-900 hover:underline">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
