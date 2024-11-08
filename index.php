<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="toastr.min.css">
    <script src="toastr.min.js"></script>
<style>
        .update-transaction-section {
        display: none; /* Hidden by default */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        align-items: center;
        justify-content: center;
        z-index: 1000; /* Ensure it appears above other content */
    }

    .update-transaction-content {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        width: 50%;
        max-width: 600px;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
        position: relative;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        cursor: pointer;
    }

    .update-transaction-group {
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .update-transaction-group label {
        width: 80px;
        font-size: 14px;
        color: black;
    }

    .update-transaction-input {
        flex: 1;
        padding: 10px;
        border: none;
        border-radius: 20px; /* Rounded corners */
        font-size: 14px;
        margin-left: 10px;
        box-sizing: border-box;
        border: 1px solid black;
    }

    .update-transaction-btn {
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        background-color: #6ec092;
        color: white;
        font-size: 14px;
        cursor: pointer;
        margin-left: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .update-transaction-btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .update-transaction-buttons {
        display: flex;
        justify-content: flex-start;
        gap: 10px; /* Close spacing between buttons */
    }
    .search-results-section{
        margin-left: 20px;
        margin-right:20px;
        margin-bottom:20px;
    }
    /* Overlay for background dimming */
    .reservation-dialog {
        display: none; /* Hidden by default */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .dialog-content {
        background: white;
        padding: 20px;
        border-radius: 8px;
        width: 400px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        position: relative;
    }

    .close-dialog {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        cursor: pointer;
        color: #333;
    }

    .dialog-title {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .input-reservation-details {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
        background-color: #fff;
        font-size: 16px;
        color: #333;
    }

    .input-reservation-details:focus {
        border-color: #6ec092;
        outline: none;
        box-shadow: 0 0 8px rgba(110, 192, 146, 0.3);
    }

    .btn-reservation-delete,
    .btn-reservation-update {
        padding: 12px 20px;
        width: 100%;
        font-size: 16px;
        background-color: #6ec092;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        color: white;
        transition: background-color 0.3s ease;
    }   

    .btn-reservation-delete:hover {
        background-color: #f76c6c;
    }

    .btn-reservation-update:hover {
        background-color: #4cae4c;
    }

    .reservation-buttons {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-top: 20px;
    }
    .card {
        background-color: #d3d3d3;
        border-radius: 20px;
        box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
        padding: 20px;
        width: 280px;
        text-align: center;
        position: relative;
    margin-top: 20px;
    margin-left: 20px;
    }

    .image-container {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        float: left;

    }

    .image-container img {
        width: 100%;
        height: 100%;
        border-radius: 20%;
        object-fit: cover;
        border: 2px solid white;
    }

    .info h2 {
        font-size: 24px;
        margin: 0;
        font-weight: normal;
    }

    .info p {
        font-size: 14px;
        color: gray;
        margin: 5px 0 20px;
        
    }

    .buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .buttons button {
        background-color: #90EE90;
        border: none;
        padding: 10px 20px;
        margin: 5px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
    }

    .buttons button:hover {
        background-color: #7ed57e;
    }

    #login-btn, #logout-btn {
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Card Styles */
    .card {
        border: 1px solid #ddd;
        padding: 10px;
        margin: 10px;
        border-radius: 8px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .card .info {
        margin-bottom: 10px;
    }

    .card .buttons {
        display: flex;
        justify-content: space-between;
    }

    /* Dialog Styles */
    .dialog {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 300px;
        background-color: white;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .dialog-content {
        padding: 20px;
    }

    .close-btn {
        float: right;
        font-size: 20px;
        cursor: pointer;
    }

    .page-section {
    display: none;
    padding: 20px;
    }

    .nav-link {
    text-decoration: none;
    color: #333;
    padding: 8px 16px;
    }

    .nav-link:hover {
    background-color: #f0f0f0;
    }

    /* Hide sections by default */
    .page-section:not(#userlog) {
    display: none;
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .print-btn {
        background-color: #6ec092;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .print-btn:hover {
        background-color: #5ba77d;
    }

    @media print {
        body * {
            visibility: hidden;
        }
        .print-content, .print-content * {
            visibility: visible;
        }
        .print-content {
            position: absolute;
            left: 0;
            top: 0;
        }
    }

</style>

</head>
<body>

<div class="navbar">
        <div class="logo">
            <img src="logo.png" alt="logo" height="30px" width="50px">
        </div>
        <nav>
        <ul>
   
    <li><a class="nav-link" href="#edit-transaction-section">Transactions</a></li>
    <li><a class="nav-link" href="#reservation-section">Reservation</a></li>
    <li><a class="nav-link" href="#userlog">User Log</a></li>
       </ul>

        </nav>
</div>

 

 <!-- transaction page start -->
 <section id="edit-transaction-section" class="page-section">
  <div class="transaction-form-section">
            <h3>New Transaction:</h3>
            <form id="transactionForm" action="transactions.php" method="POST">
                <div class="transaction-form-group">
                    <label for="transaction-id">ID:</label>
                    <input type="text" id="transaction-id" name="transaction_id" class="transaction-input-field" readonly>
                </div>
                <div class="transaction-form-group">
                    <label for="transaction-name">Name:</label>
                    <input type="text" id="transaction-name" name="transaction_name" class="transaction-input-field">
                </div>
                <div class="transaction-form-group">
                    <label for="transaction-amount">Amount:</label>
                    <input type="number" id="transaction-amount" name="transaction_amount" class="transaction-input-field" required>
                </div>
                <div class="transaction-form-group">
                    <label for="transaction-time">Time:</label>
                    <input type="time" id="transaction-time" name="transaction_time" class="transaction-input-field" required>
                </div>
                <div class="transaction-form-group">
                    <label for="transaction-date">Date:</label>
                    <input type="date" id="transaction-date" name="transaction_date" class="transaction-input-field" required>
                </div>
                <div class="transaction-form-buttons">
                    <button type="submit" class="transaction-btn disable-on-lock">Add</button>
                    <button type="reset" class="transaction-btn">Clear</button>
                </div>
            </form>
        </div>
   <div class="edit-transaction-section" id="edit-transaction-section">
    <form>
        <div class="edit-transaction-group">
            <label for="edit-transaction-id">Enter name:</label>
            <input type="text" id="edit-transaction-id" class="edit-transaction-input"required>
            <button type="button" class="edit-transaction-btn search-btn">Search</button>
        </div>
    </form>
  </div>

   <div class="search-results-section">
    <h3>Search Results</h3>
    <table class="transaction-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="search-results">
            <!-- Data will be populated by JavaScript -->
        </tbody>
    </table>
  </div>
   <!-- Form for Updating and Deleting Transactions -->
   <div class="update-transaction-section" id="update-transaction-section">
    <div class="update-transaction-content">
        <span class="close" id="close-btn">&times;</span>
        <h3>Update Transaction</h3>
        <form id="update-form" method="POST" action="update_delete_transaction.php">
            <div class="update-transaction-group">
                <label for="update-transaction-id">ID:</label>
                <input type="text" id="update-transaction-id" name="transaction_id" class="update-transaction-input" readonly>
            </div>
            <div class="update-transaction-group">
                <label for="update-transaction-name">Name:</label>
                <input type="text" id="update-transaction-name" name="transaction_name" class="update-transaction-input">
            </div>
            <div class="update-transaction-group">
                <label for="update-transaction-date">Date:</label>
                <input type="date" id="update-transaction-date" name="transaction_date" class="update-transaction-input">
            </div>
            <div class="update-transaction-group">
                <label for="update-transaction-time">Time:</label>
                <input type="time" id="update-transaction-time" name="transaction_time" class="update-transaction-input">
            </div>
            <div class="update-transaction-group">
                <label for="update-transaction-amount">Amount:</label>
                <input type="number" id="update-transaction-amount" name="transaction_amount" class="update-transaction-input">
            </div>
            <div class="update-transaction-buttons">
                <button type="submit" name="action" value="delete" class="update-transaction-btn delete-btn disable-on-lock" id="delete-btn">Delete</button>
                <button type="submit" name="action" value="update" class="update-transaction-btn update-btn disable-on-lock" id="update-btn">Update</button>
            </div>
        </form>
    </div>
  </div>

    <div class="transactions-today">
      <h3>Today Transactions</h3>
      <table class="transaction-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="today-transactions">
            <!-- Data will be populated by JavaScript -->
        </tbody>
      </table>
    </div>

    <div class="transactions-week">
    <h3>This Week Transactions</h3>
    <table class="transaction-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="week-transactions">
            <!-- Data will be populated by JavaScript -->
        </tbody>
    </table>
     </div>
</section>
 <!-- transaction page end -->

   <!-- reservation page start -->
<section id="reservation-section" class="page-section">

   <div class="reservation-section" name="reservation-section" id="reservation-section">
    <form>
        <h3 class="section-title">Enter Name:</h3>
        <div class="input-group">
            <input type="text" id="searchName" class="input-reservation" placeholder="Enter Name">
            <button type="button" id="searchBtn" class="btn-reservation-search">Search</button>
        </div>
    </form>
   </div>

   <div class="reservation-table-section">
    <h3>Search Results</h3>
    <table class="reservation-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>From Time</th>
                <th>To Time</th>
                <th>Table No</th>
                <th>Mobile No</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="searchResults">
            <!-- Search results data will be populated here -->
        </tbody>
    </table>
  </div>

  <div class="reservation-table-section">
    <div class="table-header">
        <h3>Today's Reservations</h3>
        <button onclick="printReservations('todayReservations')" class="print-btn">Print Today's Reservations</button>
    </div>
    <table class="reservation-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>From Time</th>
                <th>To Time</th>
                <th>Table No</th>
                <th>Mobile No</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="todayReservations">
            <!-- Today's reservation data will be populated here -->
        </tbody>
    </table>
  </div>

    <div class="reservation-table-section">
    <div class="table-header">
        <h3>Tomorrow's Reservations</h3>
        <button onclick="printReservations('tomorrowReservations')" class="print-btn">Print Tomorrow's Reservations</button>
    </div>
    <table class="reservation-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>From Time</th>
                <th>To Time</th>
                <th>Table No</th>
                <th>Mobile No</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tomorrowReservations">
            <!-- Tomorrow's reservation data will be populated here -->
        </tbody>
    </table>
   </div>

    <div class="reservation-dialog" id="reservation-dialog">
    <div class="dialog-content">
        <span class="close-dialog">&times;</span>
        <h2 class="dialog-title">Edit Reservation</h2>
        <input type="hidden" id="reservation-id">
        <div class="input-group">
            <label class="input-label">Name</label>
            <input type="text" id="edit-name" class="input-reservation-details">
        </div>
        <div class="input-group">
            <label class="input-label">Date</label>
            <input type="date" id="edit-date" class="input-reservation-details">
        </div>
        <div class="input-group">
            <label class="input-label">From Time</label>
            <input type="time" id="edit-from-time" class="input-reservation-details">
        </div>
        <div class="input-group">
            <label class="input-label">To Time</label>
            <input type="time" id="edit-to-time" class="input-reservation-details">
        </div>
        <div class="input-group">
            <label for="edit-table" class="input-label">Table No:</label>
            <select id="edit-table" class="input-reservation-details">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        <div class="input-group">
            <label class="input-label">Mobile No</label>
            <input type="text" id="edit-mobile-no" class="input-reservation-details">
        </div>
        <div class="reservation-buttons">
        <button class="btn-reservation-delete disable-on-lock">Delete</button>

            <button class="btn-reservation-update disable-on-lock">Update</button>
        </div>
    </div>
    </div>


</section>
 <!-- reservation page end --> 


<section id="userlog" class="page-section">
 <div id="employee-cards-container">
    <!-- Cards will be dynamically generated here -->
 </div>

 <!-- Login Dialog -->
 <div id="loginDialog" class="dialog">
    <div class="dialog-content">
        <span onclick="closeLoginDialog()" class="close-btn">&times;</span>
        <h3>Login</h3>
        <form id="loginForm">
            <label for="loginCode">Login Code:</label>
            <input type="password" id="loginCode" name="loginCode" placeholder="Enter your login code" required>
            <button type="button" onclick="loginEmployee()">Submit</button>
        </form>
    </div>
 </div>

</section>

<script src="chart.js"></script>
<script src="jquery-3.6.0.min.js"></script>
<script>
    
    document.addEventListener("DOMContentLoaded", function () {
        const sections = document.querySelectorAll(".page-section");
        const navLinks = document.querySelectorAll(".nav-link");

        // Function to show a specific section and hide others
        function showSection(sectionId) {
            console.log('Showing section:', sectionId); // Debug log

            // If not logged in, only show userlog section
            if (!sessionStorage.getItem('loggedIn')) {
                sections.forEach(section => {
                    if (section.id === 'userlog') {
                        section.style.display = "block";
                    } else {
                        section.style.display = "none";
                    }
                });

                // Hide other nav links except userlog and icon
                navLinks.forEach(link => {
                    const href = link.getAttribute("href");
                    if (href && href !== '#userlog' && !link.id.includes('login-link')) {
                        link.parentElement.style.display = 'none';
                    }
                });
                return;
            }

            // If logged in, show the selected section
            sections.forEach(section => {
                if (section.id === sectionId) {
                    section.style.display = "block";
                } else {
                    section.style.display = "none";
                }
            });

            // Show all nav links
            navLinks.forEach(link => {
                link.parentElement.style.display = 'block';
            });

            // Save current section to sessionStorage
            sessionStorage.setItem('currentSection', sectionId);
        }

        // Initial section display based on login status
        if (sessionStorage.getItem('loggedIn')) {
            // Get last active section or default to transaction section
            const lastSection = sessionStorage.getItem('currentSection') || 'edit-transaction-section';
            showSection(lastSection);
        } else {
            showSection('userlog');
        }

        // Add event listener for successful login
        document.addEventListener('loginSuccess', function() {
            showSection('edit-transaction-section');
        });

        // Add event listener for logout
        document.addEventListener('logout', function() {
            showSection('userlog');
        });

        // Set up navigation link click event handlers
        navLinks.forEach(link => {
            link.addEventListener("click", function (event) {
                if (this.getAttribute("href")) {
                    event.preventDefault();
                    const targetId = this.getAttribute("href").substring(1);
                    showSection(targetId);
                }
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        // Function to generate a unique transaction ID
        function generateTransactionId() {
            return 'TXN-' + Math.floor(Math.random() * 1000000);
        }

        var transactionIdInput = document.getElementById('transaction-id');
        
        // Generate and set a new transaction ID on page load
        transactionIdInput.value = generateTransactionId();

        // Set current date and time
        function setCurrentDateTime() {
            var now = new Date();
            var dateString = now.toISOString().split('T')[0]; // Format: YYYY-MM-DD
            var timeString = now.toTimeString().split(' ')[0].substring(0, 5); // Format: HH:MM

            document.getElementById('transaction-date').value = dateString;
            document.getElementById('transaction-time').value = timeString;
        }

        setCurrentDateTime();

        // Handle form submission
        document.getElementById('transactionForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this);

            fetch('transactions.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(data.message);
                    // Regenerate a new ID for the next transaction
                    transactionIdInput.value = generateTransactionId();
                    // Reset the form and set the date and time
                    document.getElementById('transactionForm').reset();
                    setCurrentDateTime();
                    // Set a new ID after form reset
                    transactionIdInput.value = generateTransactionId();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                alert('An error occurred: ' + error);
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        const updateSection = document.getElementById('update-transaction-section');
        const closeButton = document.getElementById('close-btn');
        const updateButton = document.getElementById('update-btn');
        const deleteButton = document.getElementById('delete-btn');
        const searchButton = document.querySelector('.search-btn');
        const searchInput = document.getElementById('edit-transaction-id');
        const searchResultsTable = document.getElementById('search-results');

        function setupEditButtons(tableId) {
            const editButtons = document.querySelectorAll(`#${tableId} .edit-btn`);
            
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const id = row.getAttribute('data-id');
                    const name = row.children[1].innerText;
                    const date = row.children[2].innerText;
                    const time = row.children[3].innerText;
                    const amount = row.children[4].innerText;
        
                    document.getElementById('update-transaction-id').value = id;
                    document.getElementById('update-transaction-name').value = name;
                    document.getElementById('update-transaction-date').value = date;
                    document.getElementById('update-transaction-time').value = time;
                    document.getElementById('update-transaction-amount').value = amount;
        
                    updateSection.style.display = 'flex'; // Show the dialog box
                });
            });
        }

        function setupDeleteButton() {
            deleteButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default form submission

                const id = document.getElementById('update-transaction-id').value;

                if (confirm('Are you sure you want to delete this transaction?')) {
                    fetch('update_delete_transaction.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            action: 'delete',
                            transaction_id: id
                        })
                    })
                    .then(response => response.text())
                    .then(result => {
                        if (result.includes('successfully')) {
                            alert('Deleted successfully!');
                            updateSection.style.display = 'none'; // Hide dialog box
                            loadTransactions('today', 'today-transactions');
                            loadTransactions('week', 'week-transactions');
                            searchTransactions(); // Refresh search results
                        } else {
                            alert('Delete failed: ' + result);
                        }
                    })
                    .catch(error => {
                        alert('Delete error: ' + error);
                    });
                }
            });
        }

        function loadTransactions(filter, tableId) {
            fetch(`fetch_transactions.php?filter=${filter}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById(tableId);
                    tableBody.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(transaction => {
                            const row = document.createElement('tr');
                            row.setAttribute('data-id', transaction.transaction_id);
                            row.innerHTML = `
                                <td>${transaction.transaction_id}</td>
                                <td>${transaction.transaction_name}</td>
                                <td>${transaction.transaction_date}</td>
                                <td>${transaction.transaction_time}</td>
                                <td>${transaction.transaction_amount}</td>
                                <td><button class='edit-btn'>Edit</button></td>
                            `;
                            tableBody.appendChild(row);
                        });
                    } else {
                        tableBody.innerHTML = '<tr><td colspan="6">No transactions found</td></tr>';
                    }
                    setupEditButtons(tableId);
                });
        }

        function searchTransactions() {
            const name = searchInput.value.trim();
            
            if (name === '') {
                // Clear the search results if input is empty
                searchResultsTable.innerHTML = '<tr><td colspan="6">Please enter a name to search.</td></tr>';
                return;
            }

            fetch(`fetch_transactions.php?name=${name}`)
                .then(response => response.json())
                .then(data => {
                    searchResultsTable.innerHTML = ''; // Clear previous results
                    if (data.length > 0) {
                        data.forEach(transaction => {
                            const row = document.createElement('tr');
                            row.setAttribute('data-id', transaction.transaction_id);
                            row.innerHTML = `
                                <td>${transaction.transaction_id}</td>
                                <td>${transaction.transaction_name}</td>
                                <td>${transaction.transaction_date}</td>
                                <td>${transaction.transaction_time}</td>
                                <td>${transaction.transaction_amount}</td>
                                <td><button class='edit-btn'>Edit</button></td>
                            `;
                            searchResultsTable.appendChild(row);
                        });
                    } else {
                        searchResultsTable.innerHTML = '<tr><td colspan="6">No transactions found</td></tr>';
                    }
                    setupEditButtons('search-results');
                })
                .catch(error => {
                    searchResultsTable.innerHTML = `<tr><td colspan="6">Error: ${error}</td></tr>`;
                });
        }

        // Load transactions when the page loads
        loadTransactions('today', 'today-transactions');
        loadTransactions('week', 'week-transactions');

        // Close button functionality
        closeButton.addEventListener('click', function() {
            updateSection.style.display = 'none'; // Hide the dialog box
        });

        // Update button functionality
        updateButton.addEventListener('click', function(event) {
            event.preventDefault();
            const id = document.getElementById('update-transaction-id').value;
            const name = document.getElementById('update-transaction-name').value;
            const date = document.getElementById('update-transaction-date').value;
            const time = document.getElementById('update-transaction-time').value;
            const amount = document.getElementById('update-transaction-amount').value;

            fetch('update_delete_transaction.php', { 
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'update',
                    transaction_id: id,
                    transaction_name: name,
                    transaction_date: date,
                    transaction_time: time,
                    transaction_amount: amount
                })
            })
            .then(response => response.text())
            .then(result => {
                if (result.includes('successfully')) {
                    alert('Updated successfully!');
                    loadTransactions('today', 'today-transactions');
                    loadTransactions('week', 'week-transactions');
                    updateSection.style.display = 'none'; // Hide the dialog box after update
                    searchTransactions(); // Refresh search results
                } else {
                    alert('Update failed: ' + result);
                }
            })
            .catch(error => {
                alert('Update error: ' + error);
            });
        });

        // Search button functionality
        searchButton.addEventListener('click', function() {
            searchTransactions();
        });

        // Set up delete button
        setupDeleteButton();
    });

    
    function searchReservationsByUsername() {
        const username = document.getElementById('searchName')?.value;
        if (!username) {
            console.error('Username input not found or is empty');
            return;
        }

        fetch(`CRUDreservation.php?action=searchReservationsByUsername&username=${encodeURIComponent(username)}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.status === 'success' && data.reservations.length > 0) {
                    const searchResults = document.getElementById('searchResults');
                    searchResults.innerHTML = ''; // Clear previous results
                    
                    data.reservations.forEach(reservation => {
                        const row = document.createElement('tr');

                        row.innerHTML = `
                            <td>${reservation.name}</td>
                            <td>${new Date(reservation.time_from).toLocaleDateString()}</td>
                            <td>${new Date(reservation.time_from).toLocaleTimeString()}</td>
                            <td>${new Date(reservation.time_to).toLocaleTimeString()}</td>
                            <td>${reservation.table_number}</td>
                            <td>${reservation.mobile}</td>
                        <td><button class="btn-edit" onclick="openEditDialog(${reservation.id})">Edit</button></td>
                        `;

                        searchResults.appendChild(row);
                    });
                } else {
                    console.log('No reservations found');
                    document.getElementById('searchResults').innerHTML = '<tr><td colspan="7">No results found</td></tr>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    document.getElementById('searchBtn').addEventListener('click', searchReservationsByUsername);

    // Fetch reservations for today and tomorrow
    function fetchReservations() {
        fetch('CRUDreservation.php?action=fetchReservations')
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    populateReservations('todayReservations', data.today);
                    populateReservations('tomorrowReservations', data.tomorrow);
                } else {
                    console.error('Error fetching reservations:', data.message);
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error fetching reservations:', error);
                alert('Error fetching reservation data.');
            });
    }

    // Function to populate reservation tables
    // Populate reservation tables
    function populateReservations(tableId, reservations) {
        const tbody = document.getElementById(tableId);
        tbody.innerHTML = ''; // Clear any previous data

        reservations.forEach(reservation => {
            const row = `<tr>
                <td>${reservation.name}</td>
                <td>${reservation.time_from.split(' ')[0]}</td>
                <td>${reservation.time_from.split(' ')[1].slice(0, 5)}</td>
                <td>${reservation.time_to.split(' ')[1].slice(0, 5)}</td>
                <td>${reservation.table_number}</td>
                <td>${reservation.mobile}</td>
                <td><button class="btn-edit" onclick="openEditDialog(${reservation.id})">Edit</button></td>
            </tr>`;
            tbody.innerHTML += row;
        });
    }
    function openEditDialog(reservationId) {
        // Fetch reservation details
        fetch(`CRUDreservation.php?action=fetchReservation&id=${reservationId}`)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('reservation-id').value = data.reservation.id;
                    document.getElementById('edit-name').value = data.reservation.name;
                    document.getElementById('edit-date').value = data.reservation.time_from.split(' ')[0];
                    document.getElementById('edit-from-time').value = data.reservation.time_from.split(' ')[1].slice(0, 5);
                    document.getElementById('edit-to-time').value = data.reservation.time_to.split(' ')[1].slice(0, 5);
                    document.getElementById('edit-mobile-no').value = data.reservation.mobile;
                    document.getElementById('edit-table').value = data.reservation.table_number;
                    document.getElementById('reservation-dialog').style.display = 'block';
                } else {
                    alert(data.message || 'Error fetching reservation details.');
                }
            })
            .catch(error => console.error('Error fetching reservation details:', error));
    }

    // Close the dialog when the 'X' is clicked
    document.querySelector('.close-dialog').addEventListener('click', () => {
        document.getElementById('reservation-dialog').style.display = 'none';
    });


    document.querySelector('.btn-reservation-update').addEventListener('click', updateReservation);

    // Function to update reservation
    function updateReservation() {
        const id = document.getElementById('reservation-id').value;
        const name = document.getElementById('edit-name').value;
        const date = document.getElementById('edit-date').value;
        const fromTime = document.getElementById('edit-from-time').value;
        const toTime = document.getElementById('edit-to-time').value;
        const tableNo = document.getElementById('edit-table').value;
        const mobileNo = document.getElementById('edit-mobile-no').value;

        // Basic validation checks (keeping your existing validation)
        const currentTime = new Date();
        const currentDate = currentTime.toISOString().split('T')[0];
        const currentTimeMinutes = currentTime.getHours() * 60 + currentTime.getMinutes();
        const reservationFromTime = timeToTimeMinutes(fromTime);
        const reservationToTime = timeToTimeMinutes(toTime);
        const earliestTime = 480;  // 8:00 AM
        const latestTime = 1320;   // 10:00 PM

        // Your existing validation checks...
        if (date < currentDate) {
            alert("You cannot reserve a table for a past date.");
            return;
        }

        if (reservationFromTime < earliestTime || reservationFromTime > latestTime || 
            reservationToTime < earliestTime || reservationToTime > latestTime) {
            alert("You can only reserve a table between 8:00 AM and 10:00 PM.");
            return;
        }

        if (date === currentDate && reservationFromTime < currentTimeMinutes) {
            alert("You cannot reserve a table in the past.");
            return;
        }

        if (reservationToTime <= reservationFromTime) {
            alert("The reservation end time must be after the start time.");
            return;
        }

        // Check for time conflicts with strict comparison
        fetch('CRUDreservation.php?action=checkConflict', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                id, // Include the current reservation ID to exclude it from conflict check
                table_no: tableNo,
                from_time: `${date} ${fromTime}:00`, // Add seconds for precise comparison
                to_time: `${date} ${toTime}:00`      // Add seconds for precise comparison
            })
        })
        .then(response => response.json())
        .then(conflictData => {
            if (conflictData.status === 'conflict') {
                const conflictDetails = conflictData.conflictDetails || {};
                alert(`This table is already reserved for the selected time slot.\n` +
                    `Existing reservation: ${conflictDetails.from_time} to ${conflictDetails.to_time}`);
                return;
            }

            // If no conflict, proceed with the update
            fetch('CRUDreservation.php?action=updateReservation', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    id,
                    name,
                    from_time: `${date} ${fromTime}:00`,
                    to_time: `${date} ${toTime}:00`,
                    table_no: tableNo,
                    mobile_no: mobileNo
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Reservation updated successfully!');
                    fetchReservations();
                    document.getElementById('reservation-dialog').style.display = 'none';
                } else {
                    alert('Error updating reservation: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error updating reservation:', error);
                alert('Error updating reservation data.');
            });
        })
        .catch(error => {
            console.error('Error checking reservation conflict:', error);
            alert('Error checking for reservation conflicts.');
        });
    }

    // Helper function to convert time to minutes since midnight (12-hour format to 24-hour format)
    function timeToTimeMinutes(timeString) {
        const [time, period] = timeString.split(' '); // Split the time and AM/PM part
        let [hours, minutes] = time.split(':').map(num => parseInt(num, 10));

        // Convert to 24-hour time based on AM/PM
        if (period === 'PM' && hours !== 12) {
            hours += 12;  // Convert PM hours to 24-hour format
        } else if (period === 'AM' && hours === 12) {
            hours = 0;  // Convert 12 AM to 00 (midnight)
        }

        return hours * 60 + minutes; // Return the time in minutes since midnight
    }

    // Event listener for edit button
    document.querySelectorAll('.btn-reservation-edit').forEach(button => {
        button.addEventListener('click', () => {
            const reservationId = button.getAttribute('data-id'); // Assuming data-id holds the reservation ID
            fetch(`CRUDreservation.php?action=fetchReservation&id=${reservationId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Populate fields in the edit dialog
                        document.getElementById('reservation-id').value = data.reservation.id;
                        document.getElementById('edit-name').value = data.reservation.name;
                        document.getElementById('edit-date').value = data.reservation.time_from.split(' ')[0]; // Date only
                        document.getElementById('edit-from-time').value = data.reservation.time_from.split(' ')[1]; // Time only
                        document.getElementById('edit-to-time').value = data.reservation.time_to.split(' ')[1]; // Time only
                        document.getElementById('edit-table').value = data.reservation.table_number;
                        document.getElementById('edit-mobile-no').value = data.reservation.mobile;
                        
                        document.getElementById('reservation-dialog').style.display = 'block'; // Show the edit dialog
                    } else {
                        alert('Error fetching reservation: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error fetching reservation:', error);
                    alert('Error fetching reservation data.');
                });
        });
    });

    document.querySelectorAll('.btn-reservation-delete').forEach(button => {
        button.addEventListener('click', function() {
            const id = document.getElementById('reservation-id').value; // Get the ID from hidden input

            // Confirmation dialog
            const isConfirmed = confirm('Are you sure you want to delete this reservation?');
            if (!isConfirmed) {
                return; // Exit if the user cancels
            }

            console.log('Sending deletion request for ID:', id);

            fetch(`CRUDreservation.php?action=deleteReservation`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id }) // Send the ID in the request body
            })
            .then(response => response.json()) // Parse the JSON response
            .then(data => {
                console.log('Response from server:', data); // Log the server response
                if (data.status === 'success') {
                    alert('Reservation deleted successfully!');
                    fetchReservations(); // Refresh the reservation lists
                    document.getElementById('reservation-dialog').style.display = 'none'; // Close the dialog after deletion
                } else {
                    alert('Error deleting reservation: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error deleting reservation:', error);
                alert('Error deleting reservation data.');
            });
        });
    });

    // Initial fetch of reservations
    fetchReservations();

    // Fetch employee data and populate cards
    function fetchEmployees() {
        fetch('FetchEmpOnCMS.php')
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('employee-cards-container');
                container.innerHTML = ''; // Clear existing cards

                data.forEach(employee => {
                    const card = document.createElement('div');
                    card.classList.add('card');
                    card.innerHTML = `
                        <div class="info">
                            <h2>${employee.name}</h2>
                            <p>${employee.post}</p>
                        </div>
                        <div class="buttons">
                            <button id="login-btn-${employee.id}" onclick="openLoginDialog(${employee.id}, '${employee.name}', '${employee.post}')">Log-in</button>
                            <button id="logout-btn-${employee.id}" style="display:none" onclick="logoutEmployee(${employee.id})">Log-out</button>
                        </div>
                    `;
                    container.appendChild(card);

                    // Check if this employee is logged in and update the button states
                    if (sessionStorage.getItem('loggedIn') === 'true' && sessionStorage.getItem('employeeId') == employee.id) {
                        document.getElementById(`login-btn-${employee.id}`).textContent = 'Logged In';
                        document.getElementById(`login-btn-${employee.id}`).disabled = true;
                        document.getElementById(`logout-btn-${employee.id}`).style.display = 'inline';
                    }
                });
            })
            .catch(error => console.error('Error fetching employee data:', error));
    }
    
    // Open login dialog
    let currentEmployeeId = null;
    let employeeName = null;
    let employeePost = null;

    function openLoginDialog(employeeId, name, post) {
        currentEmployeeId = employeeId;
        employeeName = name;
        employeePost = post;
        document.getElementById('loginDialog').style.display = 'block';
    }

    // Close login dialog
    function closeLoginDialog() {
        document.getElementById('loginDialog').style.display = 'none';
    }

    // Function to log in the employee
    function loginEmployee() {
        const loginCode = document.getElementById('loginCode').value;
        const loginTime = new Date().toISOString(); // Capture the login time

        // Check if an employee is already logged in
        if (sessionStorage.getItem('loggedIn') === 'true') {
            alert('Another employee is already logged in. Please log out first.');
            return; // Exit if another employee is logged in
        }

        const formData = new FormData();
        formData.append('action', 'login');
        formData.append('name', employeeName);
        formData.append('post', employeePost);
        formData.append('login_at', loginTime);
        formData.append('login_code', loginCode); // Add login code

        console.log("Login Data:", {
            action: 'login',
            name: employeeName,
            post: employeePost,
            login_at: loginTime,
            login_code: loginCode
        });

        fetch('AddEmpLogTime.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert('Logged in successfully');
                document.getElementById(`login-btn-${currentEmployeeId}`).textContent = 'Logged In';
                document.getElementById(`login-btn-${currentEmployeeId}`).disabled = true;
                document.getElementById(`logout-btn-${currentEmployeeId}`).style.display = 'inline';
                closeLoginDialog();

                // Store session and login time in sessionStorage
                sessionStorage.setItem('loggedIn', 'true');
                sessionStorage.setItem('employeeId', currentEmployeeId);
                sessionStorage.setItem('employeeName', employeeName); // Store employee name in session
                sessionStorage.setItem('employeePost', employeePost); // Store employee post in session
                sessionStorage.setItem('loginTime', loginTime);

                // Dispatch login success event
                document.dispatchEvent(new Event('loginSuccess'));
                
                // Add page refresh after a short delay
                setTimeout(() => {
                    window.location.reload();
                }, 500); // 500ms delay to ensure the alert is seen
            } else {
                alert('Invalid login code');
            }
        })
        .catch(error => console.error('Error during login:', error));
        handleLoginSuccess();
    }

    // Function to logout an employee (manual or auto)
    function logoutEmployee(employeeId = null) {
        const logoutTime = new Date().toISOString(); // Capture the logout time
        const storedEmployeeId = sessionStorage.getItem('employeeId');
        
        // Only proceed if we have stored employee data
        if (!sessionStorage.getItem('employeeName')) {
            return;
        }

        const formData = new FormData();
        formData.append('action', 'logout');
        formData.append('name', sessionStorage.getItem('employeeName'));
        formData.append('post', sessionStorage.getItem('employeePost'));
        formData.append('login_at', sessionStorage.getItem('loginTime'));
        formData.append('logout_at', logoutTime);

        fetch('AddEmpLogTime.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                // Only try to update UI if this was a manual logout (employeeId provided)
                if (employeeId) {
                    const loginBtn = document.getElementById(`login-btn-${employeeId}`);
                    const logoutBtn = document.getElementById(`logout-btn-${employeeId}`);
                    
                    if (loginBtn) {
                        loginBtn.textContent = 'Log-in';
                        loginBtn.disabled = false;
                    }
                    
                    if (logoutBtn) {
                        logoutBtn.style.display = 'none';
                    }
                    
                    alert('Logged out successfully');
                }

                // Clear session data
                sessionStorage.clear();

                // Dispatch logout event
                document.dispatchEvent(new Event('logout'));
                
                // Refresh the page only for manual logout
                if (employeeId) {
                    setTimeout(() => {
                        window.location.reload();
                    }, 500);
                }
            }
        })
        .catch(error => console.error('Error during logout:', error));
    }

    // Update the auto-logout timer setup
    function setupAutoLogout() {
        const LOGOUT_DELAY = 30 * 60 * 1000; // 30 minutes
        let logoutTimer;

        function resetLogoutTimer() {
            clearTimeout(logoutTimer);
            logoutTimer = setTimeout(() => {
                if (sessionStorage.getItem('loggedIn') === 'true') {
                    logoutEmployee(); // Auto logout without employeeId
                    window.location.reload(); // Refresh the page after auto-logout
                }
            }, LOGOUT_DELAY);
        }

        // Reset timer on user activity
        ['mousedown', 'mousemove', 'keypress', 'scroll', 'touchstart'].forEach(event => {
            document.addEventListener(event, resetLogoutTimer, false);
        });

        // Initial setup of timer
        resetLogoutTimer();
    }

    // Call setupAutoLogout when user logs in successfully
    function handleLoginSuccess() {
        setupAutoLogout();
    }

    // Remove the old timer-related functions
    // Remove: setLogoutCookie, checkLogoutCookie, setLogoutTimer

    // Initial fetch of reservations
    fetchReservations();

    // Fetch employee data and populate cards
    fetchEmployees();

    function checkLoginAndBlockSystem() {
        if (!sessionStorage.getItem('loggedIn') || sessionStorage.getItem('loggedIn') !== 'true') {
            alert('System is locked. Please log in to access the system.');
            // Disable or hide elements related to insertion, update, and deletion
            document.querySelectorAll('.disable-on-lock').forEach(el => el.style.display = 'none'); 
            // Optionally, redirect to a login section if you want
            window.location.hash = "#userlog"; // Redirect to login section
        }
    }

    // Call this function on page load
    window.onload = checkLoginAndBlockSystem;

    function printReservations(tableId) {
        // Get the table data
        const tbody = document.getElementById(tableId);
        const reservations = [];
        
        // Convert table rows to array of objects
        tbody.querySelectorAll('tr').forEach(row => {
            const cells = row.getElementsByTagName('td');
            if (cells.length) {
                reservations.push({
                    name: cells[0].textContent,
                    date: cells[1].textContent,
                    fromTime: cells[2].textContent,
                    toTime: cells[3].textContent,
                    tableNo: cells[4].textContent,
                    mobileNo: cells[5].textContent
                });
            }
        });

        // Create print window content
        const printWindow = window.open('', '_blank');
        const title = tableId === 'todayReservations' ? "Today's Reservations" : "Tomorrow's Reservations";
        
        printWindow.document.write(`
            <html>
            <head>
                <title>${title}</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .header { text-align: center; margin-bottom: 20px; }
                    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                    th, td { 
                        border: 1px solid #ddd; 
                        padding: 8px; 
                        text-align: left; 
                    }
                    th { background-color: #f2f2f2; }
                    .date-time { text-align: right; margin-bottom: 10px; }
                </style>
            </head>
            <body>
                <div class="header">
                    <h2>${title}</h2>
                </div>
                <div class="date-time">
                    Printed on: ${new Date().toLocaleString()}
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>From Time</th>
                            <th>To Time</th>
                            <th>Table No</th>
                            <th>Mobile No</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${reservations.map(res => `
                            <tr>
                                <td>${res.name}</td>
                                <td>${res.date}</td>
                                <td>${convertTo12Hour(res.fromTime)}</td>
                                <td>${convertTo12Hour(res.toTime)}</td>
                                <td>${res.tableNo}</td>
                                <td>${res.mobileNo}</td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
            </body>
            </html>
        `);
        
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    }

    function convertTo12Hour(time24) {
        const [hours, minutes] = time24.split(':');
        let period = 'AM';
        let hour = parseInt(hours);
        
        if (hour >= 12) {
            period = 'PM';
            if (hour > 12) hour -= 12;
        }
        if (hour === 0) hour = 12;
        
        return `${hour}:${minutes} ${period}`;
    }

</script>
</body>
</html>
