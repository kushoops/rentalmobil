<div>
    <h1 class="mb-4 text-2xl font-bold">Dashboard</h1>
    <div class="grid grid-cols-3 gap-4 mb-4">
        <div class="shadow flex flex-col items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <span class="text-2xl font-thin text-black/80">{{ count($car) }}</span>
            <span>Cars</span>
        </div>
        <div class="shadow flex flex-col items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <span class="text-2xl font-thin text-black/80">{{ count($booking) }}</span>
            <span>Bookings</span>
        </div>
        <div class="shadow flex flex-col items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <span class="text-2xl font-thin text-black/80">{{ count($message) }}</span>
            <span>Messages</span>
        </div>
    </div>
</div>
