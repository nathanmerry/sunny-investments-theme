<div class="flex items-center space-x-4">
  <div class="relative">
    <label for="day" class="block text-sm font-medium text-gray-700">Day</label>
    <select id="day" name="day"
      class="block w-24 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      <option value="">Select Day</option>
      <!-- You can generate options dynamically using JavaScript -->
      @for ($i = 1; $i <= 31; $i++)
        <option value="{{ $i }}">{{ $i }}</option>
      @endfor
    </select>
  </div>

  <div class="relative">
    <label for="month" class="block text-sm font-medium text-gray-700">Month</label>
    <select id="month" name="month"
      class="block w-32 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      <option value="">Select Month</option>
      <!-- You can generate options dynamically using JavaScript -->
      @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
        <option value="{{ $month }}">{{ $month }}</option>
      @endforeach
    </select>
  </div>

  <div class="relative">
    <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
    <select id="year" name="year"
      class="block w-32 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      <option value="">Select Year</option>
      <!-- You can generate options dynamically using JavaScript -->
      @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
        <option value="{{ $i }}">{{ $i }}</option>
      @endfor
    </select>
  </div>
</div>
