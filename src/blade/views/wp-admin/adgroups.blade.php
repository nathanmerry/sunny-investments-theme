<!-- Include Tailwind CSS -->

<div class="p-6">
  <div class="flex space-x-4">
    <div class="flex-1">
      <div class="flex items-center justify-between">
        <div>
          <h2 class="mb-4 text-2xl">Adgroup Settings</h2>
          <h3 class="mb-4 text-lg"><span id="adgroups-total"></span> Total</h3>
        </div>
        <div class="">
          <div class="flex items-center mb-5 space-x-8">
            <input type="text" id="searchInput" placeholder="Search">
            <div class="flex items-center space-x-2">
              <span class="text-sm font-medium text-gray-700">Show Uploaded Today</span>
              <input type="checkbox" id="showTodayToggle">
            </div>
          </div>
        </div>
      </div>

      <table id="adgroups-table" class="min-w-full divide-y divide-gray-200">
        <tbody class="bg-white divide-y divide-gray-200">
          <thead>
            <tr>
              <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                Adgroup
              </th>
              <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">Page
              </th>
              <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                Offer
              </th>
              <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">Date
                Added
              </th>
              <th class="w-5 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
              </th>
            </tr>
          </thead>
        <tbody id="adgroups-body" class="bg-white divide-y divide-gray-200">
        </tbody>
        </tbody>
      </table>

      <!-- Pagination -->
      <div id="pagination" class="flex items-center justify-between mt-4">
        <button id="prevPageBtn" class="px-4 py-2 mr-2 bg-gray-200">Previous</button>
        <div class="flex items-center">
          <span id="currentPage" class="mr-5">Page 1 of 1</span>
          <select name="pageSizeSelect" id="pageSizeSelect">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="-1">All</option>
          </select>
        </div>
        <button id="nextPageBtn" class="px-4 py-2 bg-gray-200">Next</button>
      </div>
    </div>
    <div class="w-2/12 pl-4 border-l border-gray-400">
      <h3 class="mb-3 text-xl">Upload Adgroups</h3>
      <div class="relative items-center mb-5">
        <div class="relative mb-3">
          <input type="text" id="fileName"
            class="w-full h-10 px-4 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            readonly placeholder="No file chosen">

          <input type="file" id="fileInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        </div>
        <button for="fileInput" id="uploadAdgroupsButton"
          class="flex items-center justify-center flex-1 w-full py-3 text-white bg-[#1e1e1e] rounded-md cursor-pointer">
          <svg class="w-5 mr-2 fill-white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            fill="#000000" version="1.1" id="Capa_1" viewBox="0 0 490.955 490.955" xml:space="preserve">
            <path id="XMLID_448_"
              d="M445.767,308.42l-53.374-76.49v-20.656v-11.366V97.241c0-6.669-2.604-12.94-7.318-17.645L312.787,7.301  C308.073,2.588,301.796,0,295.149,0H77.597C54.161,0,35.103,19.066,35.103,42.494V425.68c0,23.427,19.059,42.494,42.494,42.494  h159.307h39.714c1.902,2.54,3.915,5,6.232,7.205c10.033,9.593,23.547,15.576,38.501,15.576c26.935,0-1.247,0,34.363,0  c14.936,0,28.483-5.982,38.517-15.576c11.693-11.159,17.348-25.825,17.348-40.29v-40.06c16.216-3.418,30.114-13.866,37.91-28.811  C459.151,347.704,457.731,325.554,445.767,308.42z M170.095,414.872H87.422V53.302h175.681v46.752  c0,16.655,13.547,30.209,30.209,30.209h46.76v66.377h-0.255v0.039c-17.685-0.415-35.529,7.285-46.934,23.46l-61.586,88.28  c-11.965,17.134-13.387,39.284-3.722,57.799c7.795,14.945,21.692,25.393,37.91,28.811v19.842h-10.29H170.095z M410.316,345.771  c-2.03,3.866-5.99,6.271-10.337,6.271h-0.016h-32.575v83.048c0,6.437-5.239,11.662-11.659,11.662h-0.017H321.35h-0.017  c-6.423,0-11.662-5.225-11.662-11.662v-83.048h-32.574h-0.016c-4.346,0-8.308-2.405-10.336-6.271  c-2.012-3.866-1.725-8.49,0.783-12.07l61.424-88.064c2.189-3.123,5.769-4.984,9.57-4.984h0.017c3.802,0,7.38,1.861,9.568,4.984  l61.427,88.064C412.04,337.28,412.328,341.905,410.316,345.771z" />
          </svg>
          Upload
        </button>
      </div>
      <hr class="pb-4">
      <button id="updateAdgroupsButton"
        class="flex items-center justify-center flex-1 w-full py-3 text-white bg-blue-600 rounded-md cursor-pointer hover:bg-blue-700">Update</button>
    </div>
  </div>
</div>

<script>
  const ADGROUPS = @php echo json_encode($adgroups); @endphp;

  let updatedAdgroups = ADGROUPS;
  let filteredAdgroups = updatedAdgroups;
  let paginated = []

  var pageSize = 5;
  var currentPage = 0;

  const chunk = (arr, size) => {
    return Array.from({
        length: Math.ceil(arr.length / size)
      }, (v, i) =>
      arr.slice(i * size, i * size + size)
    );
  }

  function updateAdgroupsTotal() {
    document.getElementById('adgroups-total').innerHTML = `Total: ${filteredAdgroups.length}`;
  }

  function renderPage(page) {
    updatePagination()
    renderTable(page)
    updateAdgroupsTotal()
  }

  function renderTable() {
    const tableBody = document.getElementById('adgroups-body');
    tableBody.innerHTML = '';
    const startIndex = (currentPage - 1) * pageSize;
    const endIndex = Math.min(startIndex + pageSize, paginated.length);

    const currentAdgroups = paginated[currentPage]

    if (!currentAdgroups) return;

    const pageSizeLength = (i) => pageSize ? i < pageSize && i <= currentAdgroups.length - 1 : i <= currentAdgroups
      .length - 1;

    for (var i = 0; pageSizeLength(i); i++) {
      const adgroup = currentAdgroups[i];

      const row = document.createElement('tr');

      row.innerHTML = `
        <td class="px-6 py-4 whitespace-nowrap">${adgroup?.adgroup}</td>
        <td class="px-6 py-4 whitespace-nowrap">${adgroup?.pageTitle}</td>
        <td class="px-6 py-4 whitespace-nowrap">${adgroup?.offerTitle}</td>
        <td class="px-6 py-4 whitespace-nowrap">${formatUnixTimestamp(adgroup?.insertionDate)}</td>
        <div class="px-6 py-4 whitespace-nowrap">
          <button class="deleteBtn" data-adgroup="${adgroup?.adgroup}">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" version="1.1" id="Capa_1" width="800px" height="800px" viewBox="0 0 408.483 408.483" xml:space="preserve"<g><g><path d="M87.748,388.784c0.461,11.01,9.521,19.699,20.539,19.699h191.911c11.018,0,20.078-8.689,20.539-19.699l13.705-289.316    H74.043L87.748,388.784z M247.655,171.329c0-4.61,3.738-8.349,8.35-8.349h13.355c4.609,0,8.35,3.738,8.35,8.349v165.293    c0,4.611-3.738,8.349-8.35,8.349h-13.355c-4.61,0-8.35-3.736-8.35-8.349V171.329z M189.216,171.329    c0-4.61,3.738-8.349,8.349-8.349h13.355c4.609,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.737,8.349-8.349,8.349h-13.355    c-4.61,0-8.349-3.736-8.349-8.349V171.329L189.216,171.329z M130.775,171.329c0-4.61,3.738-8.349,8.349-8.349h13.356    c4.61,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.738,8.349-8.349,8.349h-13.356c-4.61,0-8.349-3.736-8.349-8.349V171.329z"/><path d="M343.567,21.043h-88.535V4.305c0-2.377-1.927-4.305-4.305-4.305h-92.971c-2.377,0-4.304,1.928-4.304,4.305v16.737H64.916    c-7.125,0-12.9,5.776-12.9,12.901V74.47h304.451V33.944C356.467,26.819,350.692,21.043,343.567,21.043z"/></g></g></svg>
          </button
        </div>
    `;
      tableBody.appendChild(row);
    }

    document.querySelectorAll('.deleteBtn').forEach(btn => btn.addEventListener('click', () => {
      const updated = updatedAdgroups.filter(a => a.adgroup !== btn.dataset.adgroup)

      updatedAdgroups = updated
      filteredAdgroups = updated
      renderPage()
    }))
  }

  function updatePagination() {
    paginated = pageSize ? chunk(filteredAdgroups, pageSize) : [filteredAdgroups]

    var totalPages = paginated.length;
    var prevPageBtn = document.getElementById('prevPageBtn');
    var nextPageBtn = document.getElementById('nextPageBtn');
    var currentPageDisplay = document.getElementById('currentPage');

    prevPageBtn = currentPage <= 1;
    nextPageBtn = currentPage >= totalPages;

    currentPageDisplay.textContent = 'Page ' + (currentPage + 1) + ' of ' + (totalPages);
  }

  function goToPrevPage() {
    if (currentPage >= 1) {
      currentPage--;

      renderPage(currentPage)
    }
  }

  function goToNextPage() {
    var totalPages = Math.ceil(paginated.length) - 1;

    if (currentPage < totalPages) {
      currentPage++;

      renderPage()
    }
  }

  function searchAdgroups(e) {
    currentPage = 0

    const value = e.target.value.trim()

    if (!!value) {
      filteredAdgroups = updatedAdgroups.filter(a => {
        return (
          a.adgroup.toString().includes(value) ||
          a.offerTitle.toString().includes(value) ||
          a.pageTitle.toString().includes(value)
        )
      })
    } else {
      filteredAdgroups = updatedAdgroups
    }

    renderPage()
  }

  function updatePageSize() {
    var selectElement = document.getElementById('pageSizeSelect');

    if (selectElement.value === '-1') {
      pageSize = null
    } else {
      pageSize = parseInt(selectElement.value);
    }

    renderPage()
  }

  function updateShowTodayOnly(e) {
    document.getElementById('searchInput').value = '';

    if (e.target.checked) {
      function isToday(timestamp) {
        const today = new Date();
        const date = new Date(timestamp * 1000);
        return (
          date.getDate() === today.getDate() &&
          date.getMonth() === today.getMonth() &&
          date.getFullYear() === today.getFullYear()
        );
      }

      filteredAdgroups = updatedAdgroups.filter(a => isToday(a.insertionDate))
    } else {
      filteredAdgroups = updatedAdgroups
    }
    renderPage()
  }

  function formatUnixTimestamp(timestamp) {
    var date = new Date(timestamp * 1000);

    var year = date.getFullYear();
    var month = ('0' + (date.getMonth() + 1)).slice(-2); // Adding 1 because January is 0
    var day = ('0' + date.getDate()).slice(-2);

    var formattedDate = year + '-' + month + '-' + day;

    return formattedDate;
  }

  document.getElementById('prevPageBtn').addEventListener('click', goToPrevPage)
  document.getElementById('nextPageBtn').addEventListener('click', goToNextPage)
  document.getElementById('searchInput').addEventListener('input', searchAdgroups)
  document.getElementById('pageSizeSelect').addEventListener('change', updatePageSize)
  document.getElementById('showTodayToggle').addEventListener('change', updateShowTodayOnly)

  renderPage()

  const fileInput = document.getElementById('fileInput');
  const fileNameDisplay = document.getElementById('fileName');

  let newAdgroups = []

  function parseCSVtoJson(csv) {
    var rows = csv.split('\n');

    rows = rows.filter(row => row.trim() !== '');
    var headers = rows[0].split(',');
    var jsonData = [];

    for (var i = 1; i < rows.length; i++) {
      var row = rows[i].split(',');
      var jsonRow = {};

      for (var j = 0; j < headers.length; j++) {
        jsonRow[headers[j]] = row[j];
      }

      jsonData.push(jsonRow);
    }

    return jsonData;
  }

  fileInput.addEventListener('change', function(event) {
    var file = event.target.files[0];

    if (file) {
      fileNameDisplay.value = file.name;

      var reader = new FileReader();

      reader.onload = function(event) {
        var csv = event.target.result;
        var jsonData = parseCSVtoJson(csv);
        newAdgroups = jsonData
      };

      reader.readAsText(file);
    } else {
      fileNameDisplay.value = '';
    }
  });

  document.getElementById('uploadAdgroupsButton').addEventListener('click', () => {
    // Define the URL of the WordPress REST API endpoint
    const endpoint = '/wp-json/v1/upload-adgroups-v2';

    // Make the POST request using fetch
    fetch(endpoint, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(newAdgroups)
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Failed to upload adgroups');
        }
        return response.json();
      })
      .then(data => {
        window.location.reload()
        console.log('Adgroups uploaded successfully:', data);
      })
      .catch(error => {
        console.error('Error uploading adgroups:', error);
      });

  })

  document.getElementById('updateAdgroupsButton').addEventListener('click', () => {
    // Define the URL of the WordPress REST API endpoint
    const endpoint = '/wp-json/v1/update-adgroups';

    // Make the POST request using fetch
    fetch(endpoint, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(updatedAdgroups)
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Failed to upload adgroups');
        }
        return response.json();
      })
      .then(data => {
        // window.location.reload()
        console.log('Adgroups uploaded successfully:', data);
      })
      .catch(error => {
        console.error('Error uploading adgroups:', error);
      });

  })
</script>
