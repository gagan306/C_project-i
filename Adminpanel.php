<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminp.css">
    <title>adminpanel</title>
<style>
    .form-container {
    margin-top: 15px;
    background-color: white;
    padding: 20px;
    border-radius: 15px;
    width: 800px;
    margin-left: 15px;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
 }

 .form-group {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
 }
 .form-group label{
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    margin-right:20px;
 }
 label {
    width: 50px;
    font-size: 14px;
    margin-right: 10px;
 }

 .input-field {
    flex: 1;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: white;
    color: black;
    font-size: 14px;
    border: 1px solid black;
    width: 80px;
 }

  .check-btn, .add-btn {
    padding: 10px 10px;
    border: none;
    border-radius: 5px;
    background-color: #6ec092;
    color: black;
    font-size: 14px;
    cursor: pointer;
    margin-left: 10px;
    align-items: center;
 }



 .add-btn {
    width: 200px;
    background-color: #6ec092;
   
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease; 
 }
 .add-btn:hover {
    transform: translateY(-5px); 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
 }
        .search-results-section{
    margin-left: 20px;
    margin-right:20px;
    margin-bottom:20px;
   }
       .transaction-table {
    width: 100%;
    border-collapse: collapse;
    background-color: #f9f9f9; 
    border-radius: 5px;
    overflow: hidden;
    
 }

 .transaction-table thead {
    background-color: #808c73;
 }

 .transaction-table th,
 .transaction-table td {
    padding: 10px;
    text-align: left;
    font-size: 14px;
    color: black;
 }

 .transaction-table tbody tr {
    border-bottom: 1px solid #ddd;
 }

 .transaction-table tbody tr:last-child {
    border-bottom: none;
 } 
 .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6); /* Darker background for better contrast */
 }

 .modal-content {
    background-color: #fff;
    margin: 5% auto; /* Reduced margin for better centering */
    padding: 30px; /* Increased padding for better spacing */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); /* Soft shadow for depth */
    width: 50%; /* Adjusted width for a more compact look */
    height:75%;
 }

 .close-btn {
    float: right;
    cursor: pointer;
    font-size: 1.5em; /* Larger close button */
    color: #333; /* Darker color for visibility */
 }

 h3 {
    color: #333; /* Consistent color for the heading */
    margin-bottom: 20px; /* Space below heading */
 }

 label {
    display: block; /* Labels on separate lines */
    margin-top: 10px; /* Space above labels */
    font-weight: bold; /* Bold labels for emphasis */
 }

 input[type="text"],
 input[type="date"] {
    width: calc(100% - 20px); /* Full-width inputs with padding */
    padding: 10px; /* Inner padding for comfort */
    border: 1px solid #ccc; /* Light border */
    border-radius: 5px; /* Rounded edges */
    margin-top: 5px; /* Space above inputs */
 }

 button {
    background-color: #28a745; /* Green background for update */
    color: white; /* White text */
    border: none;
    border-radius: 5px; /* Rounded button edges */
    padding: 10px 15px; /* Button padding */
    cursor: pointer;
    margin-top: 15px; /* Space above buttons */
    transition: background-color 0.3s; /* Smooth hover effect */
 }

 button:hover {
    background-color: #218838; /* Darker green on hover */
 }

 button:nth-of-type(2) {
    background-color: #dc3545; /* Red background for delete */
 }

 button:nth-of-type(2):hover {
    background-color: #c82333; /* Darker red on hover */
 }
 
 /* Container Styling */
   .table-container {
  width: 90%;  /* Table takes 80% of the screen width */
  margin: 20px auto;  /* Centered horizontally with margin on top/bottom */
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for the div */
  border-radius: 10px; /* Rounded corners */
 }

 /* Table Styling */
 .user-info-table {
  width: 100%;
  border-collapse: collapse;
  font-family: 'Arial', sans-serif;
  text-align: left;
  color: #333;  /* Normal text color */
 }

 /* Header Styling */
 .user-info-table th {
  padding: 12px;
  background-color: #808c73; /* Green background */
  color: black;
  font-size: 14px;
  
  border-bottom: 1px solid #ddd;
 }

 /* Body Styling */
 .user-info-table td {
  padding: 10px 15px;
  border-bottom: 1px solid #ddd;
  font-size: 13px;
 }

 /* Zebra Striping for Rows */
 .user-info-table tbody tr:nth-child(odd) {
  background-color: #f9f9f9;
 }

 /* Hover Effect on Rows */
 .user-info-table tbody tr:hover {
  background-color: #f1f1f1;
 }

 /* Action Buttons Styling */
.user-info-table .action-btn {
  padding: 6px 12px;
  font-size: 12px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  margin: 0 5px;
  transition: background-color 0.3s ease;
}

.user-info-table .action-btn.delete {
  background-color: #f44336; /* Red */
  color: white;
}

.user-info-table .action-btn.delete:hover {
  background-color: #e53935;
}

/* Other existing styles */



 /* Responsive Design */
 @media (max-width: 768px) {
  .table-container {
    width: 95%;  /* Increase width to 95% on smaller screens */
    padding: 10px;
  }

  .user-info-table th, .user-info-table td {
    font-size: 12px;
    padding: 8px;
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
                <li><a  class="nav-link" href="#main-section">Actions</a></li>
                <li><a class="nav-link" href="#edit-Employee-section">Empolyees</a></li>
                <li><a class="nav-link"  href="#users-section">Users</a></li>
                <li><a class="nav-link"  href="#container">Charts</a></li>
            </ul>
        </nav>
</div>
<section id="main-section" class="page-section">
 <div class="search-results-section">
    <h3>Actions</h3>
    <table class="transaction-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>post</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
            
           
        </thead>
        <tbody id="search-resul">
            <!-- Data will be populated by JavaScript -->
        </tbody>
    </table>
  </div>
</section>

<section id="edit-Employee-section" class="page-section">
    <div class="form-container">
        <form id="reservationForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="input-field" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="mobile_no">Mobile No:</label>
                <input type="text" id="mobile_no" name="mobile_no" class="input-field" placeholder="Enter mobile number" required>
            </div>
            <div class="form-group">
                <label for="Post">Post:</label>
                <select id="Post" name="Post" class="input-field" required>
                    <option value="" disabled selected>Select a position</option>
                    <option value="Manager">Manager</option>
                    <option value="Cook">Cook</option>
                    <option value="Reception">Reception</option>
                    <option value="Waiter">Waiter</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="input-field" placeholder="Enter password" required>
            </div>
            <div class="form-group">
                <label for="date">Joined-Date:</label>
                <input type="date" id="date" name="date" class="input-field" required>
            </div>
            <div class="form-group">
                <label for="login_code">Login Code:</label>
                <input type="password" id="login_code" name="login_code" class="input-field" placeholder="Enter login code" required>
            </div>
            
            <div class="form-group">
                <button type="submit" id="addReservation" class="add-btn">Add</button>
            </div>
        </form>
    </div>


    <div class="search-results-section">
    <h3>Employees</h3>
    <table class="transaction-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile No</th>
                <th>Post</th>
                <th>Password</th>
                <th>Joined Date</th>
                <th>Login Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="search-results">
            <!-- Data will be populated by JavaScript -->
        </tbody>
    </table>
 </div>

 <div id="editDialog" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-btn" onclick="closeEditDialog()">×</span>
        <h3>Edit Employee</h3>
        <form id="editForm">
            <input type="hidden" id="edit-id">
            <label for="edit-name">Name:</label>
            <input type="text" id="edit-name" name="name" required><br>
            <label for="edit-mobile_no">Mobile No:</label>
            <input type="text" id="edit-mobile_no" name="mobile_no" required><br>
            <label for="edit-post">Post:</label>
            <input type="text" id="edit-post" name="post" required><br>
            <label for="edit-password">Password:</label>
            <input type="text" id="edit-password" name="password" required><br>
            <label for="edit-joined_date">Joined Date:</label>
            <input type="date" id="edit-joined_date" name="joined_date" required><br>
            <label for="edit-login_code">Login Code:</label>
            <input type="text" id="edit-login_code" name="login_code" required><br>
            <button type="button" onclick="updateEmployee()">Update</button>
            <button type="button" onclick="deleteEmployee()">Delete</button>
        </form>
    </div>
 </div>




</section>
<section id="users-section" class="page-section">
<div class="table-container">
  <table class="user-info-table">
    <thead>
      <tr>
        <th>Username</th>
        <th>User Email</th>
        <th>Account Created</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <!-- Rows will be added dynamically -->
    </tbody>
  </table>
</div>



</section>
<section id="container" class="page-section">
 <table>
    <tr>
        <td>
 <div class="total-box">
        <h3>Total</h3>
        <div>
            <label for="total-revenue">Revenue:</label>
            <textarea id="total-revenue" readonly></textarea>
        </div>
        <div>
            <label for="total-clients">Clients:</label>
            <textarea id="total-clients" readonly></textarea>
        </div>
    </div>
 </td>


    <td>
    <div class="today-layout">
        <div class="today-box">
            <h3>Today</h3>
            <div>
                <label for="today-revenue">Revenue:</label>
                <textarea id="today-revenue" readonly></textarea>
            </div>
            <div>
                <label for="today-clients">Clients:</label>
                <textarea id="today-clients" readonly></textarea>
            </div>
        </div>
    </div>
 </td>
 </td>
 </table>
  <div class="container" id="container" name="container" >
    <div class="chart" id="chart1">
        <div class="heading">No of People Visited Yearly</div>
        <canvas id="barChart1"></canvas>
    </div>
    <div class="chart" id="chart2">
        <div class="heading">Total Monthly Cash Flow</div>
        <canvas id="barChart2"></canvas>
    </div>
    <div class="chart" id="chart3">
        <div class="heading">Total Yearly Cash Flow</div>
        <canvas id="barChart3"></canvas>
    </div>
  </div>
</section>

</body>

<script src="chart.js"></script>
<script src="jquery-3.6.0.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll(".page-section");
    const navLinks = document.querySelectorAll(".navbar a");

    // Function to show a specific section and save its ID to localStorage
    function showSection(sectionId) {
        sections.forEach(section => {
            if (section.id === sectionId) {
                section.style.display = "block";
            } else {
                section.style.display = "none";
            }
        });

        // Save the current section ID to localStorage
        localStorage.setItem("currentSection", sectionId);
    }

    // Set up navigation link click event handlers
    navLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            const targetId = this.getAttribute("href").substring(1);
            showSection(targetId);
        });
    });

    // Retrieve and display the saved section when the page is loaded
    const savedSection = localStorage.getItem("currentSection");
    if (savedSection) {
        showSection(savedSection);
    } else {
        // Default to showing the first section if no saved section
        if (sections.length > 0) {
            showSection(sections[0].id);
        }
    }
});

document.addEventListener('DOMContentLoaded', function () {
    fetch('fetch_data.php')
        .then(response => response.json())
        .then(data => {
            // Monthly cash flow chart
            const ctx2 = document.getElementById('barChart2').getContext('2d');
            const barChart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Total Monthly Cash Flow',
                        data: data.monthly,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Yearly cash flow chart
            const ctx3 = document.getElementById('barChart3').getContext('2d');
            const years = Object.keys(data.yearly);
            const yearlyData = years.map(year => data.yearly[year]);

            const barChart3 = new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: years,
                    datasets: [{
                        label: 'Total Yearly Cash Flow',
                        data: yearlyData,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Number of people visited yearly chart
            const ctx1 = document.getElementById('barChart1').getContext('2d');
            const visitsChart = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Number of People Visited Yearly',
                        data: data.visits,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});
document.addEventListener('DOMContentLoaded', function() {
    fetchTotals();
    fetchTodayData();

    function fetchTotals() {
        fetch('fetch_totals.php')
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('total-revenue').value = `$${data.total_revenue}`;
                    document.getElementById('total-clients').value = data.total_clients;
                } else {
                    console.error(data.message);
                }
            })
            .catch(error => console.error('Error fetching totals:', error));
    }

    function fetchTodayData() {
        const today = new Date().toISOString().split('T')[0];
        fetch(`fetch_totals.php?date=${today}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('today-revenue').value = `$${data.total_revenue}`;
                    document.getElementById('today-clients').value = data.total_clients;
                } else {
                    console.error(data.message);
                }
            })
            .catch(error => console.error('Error fetching today data:', error));
    }
});
document.getElementById('reservationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(this);

    fetch('AddEmployee.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Employee added successfully!');
            // Optionally, reset the form
            document.getElementById('reservationForm').reset();
        } else {
            alert('Error adding employee: ' + (data.error || 'Unknown error'));
        }
    })
    .catch(error => {
        alert('Error: ' + error);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    fetchEmployees();
});

function fetchEmployees() {
    fetch('FetchEmpData.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('search-results');
            tableBody.innerHTML = ''; // Clear previous results

            data.forEach(employee => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${employee.id}</td>
                    <td>${employee.name}</td>
                    <td>${employee.mobile_no}</td>
                    <td>${employee.post}</td>
                    <td>${employee.password}</td>
                    <td>${employee.joined_date}</td>
                    <td>${employee.login_code}</td>
                    <td><button onclick="openEditDialog(${employee.id})">Edit</button></td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching employee data:', error));
  }

  function openEditDialog(id) {
    fetch(`FetchEmpData.php?id=${id}`)
        .then(response => response.json())
        .then(employee => {
            document.getElementById('edit-id').value = employee.id;
            document.getElementById('edit-name').value = employee.name;
            document.getElementById('edit-mobile_no').value = employee.mobile_no;
            document.getElementById('edit-post').value = employee.post;
            document.getElementById('edit-password').value = employee.password;
            document.getElementById('edit-joined_date').value = employee.joined_date;
            document.getElementById('edit-login_code').value = employee.login_code;

            document.getElementById('editDialog').style.display = 'flex';
        })
        .catch(error => console.error('Error fetching employee details:', error));
 }

 function closeEditDialog() {
    document.getElementById('editDialog').style.display = 'none';
 }

 function updateEmployee() {
    const formData = new FormData(document.getElementById('editForm'));
    formData.append('id', document.getElementById('edit-id').value);
    formData.append('action', 'update');

    fetch('updateemployee.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert('Employee updated successfully');
                fetchEmployees();
                closeEditDialog();
            } else {
                alert('Update failed');
            }
        })
        .catch(error => console.error('Error updating employee:', error));
 }

 function deleteEmployee() {
    const id = document.getElementById('edit-id').value;

    if (!confirm('Are you sure you want to delete this employee?')) return;

    fetch('updateemployee.php', {
        method: 'POST',
        body: new URLSearchParams({
            'id': id,
            'action': 'delete'
        })
    })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert('Employee deleted successfully');
                fetchEmployees();
                closeEditDialog();
            } else {
                alert('Delete failed');
            }
        })
        .catch(error => console.error('Error deleting employee:', error));
 }

 
 window.onload = function() {
    fetchEmployees();
}
function fetchEmployeeActions() {
    fetch('EmpActions.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const tableBody = document.getElementById('search-resul');
                tableBody.innerHTML = ''; // Clear existing rows

                data.actions.forEach(action => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${new Date(action.action_time).toLocaleDateString()}</td>
                        <td>${action.name}</td>
                        <td>${action.post}</td>
                        <td>${new Date(action.action_time).toLocaleTimeString()}</td>
                        <td>${action.action}</td>
                    `;
                    tableBody.appendChild(row);
                });
            } else {
                console.error('Error fetching actions:', data.message);
            }
        })
        .catch(error => console.error('Error fetching employee actions:', error));
}
fetchEmployeeActions();

document.addEventListener('DOMContentLoaded', function() {
    // Function to fetch and display users
    function fetchUsers() {
        fetch('fetchdeleteusers.php')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('.user-info-table tbody');
                tableBody.innerHTML = ''; // Clear existing rows

                data.forEach(user => {
                    const row = document.createElement('tr');

                    const usernameCell = document.createElement('td');
                    usernameCell.textContent = user.username;

                    const emailCell = document.createElement('td');
                    emailCell.textContent = user.email;

                    const createdAtCell = document.createElement('td');
                    createdAtCell.textContent = user.created_at;

                    const actionsCell = document.createElement('td');
                    const deleteBtn = document.createElement('button');
                    deleteBtn.classList.add('action-btn', 'delete');
                    deleteBtn.textContent = 'Delete';
                    deleteBtn.addEventListener('click', function() {
                        deleteUser(user.id);
                    });

                    actionsCell.appendChild(deleteBtn);
                    row.appendChild(usernameCell);
                    row.appendChild(emailCell);
                    row.appendChild(createdAtCell);
                    row.appendChild(actionsCell);

                    tableBody.appendChild(row);
                });
            })
            .catch(error => console.error('Error fetching users:', error));
    }

    // Function to delete a user
    function deleteUser(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            fetch('fetchdeleteusers.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `action=delete&user_id=${userId}`
            })
            .then(response => response.text())
            .then(data => {
                alert(data); // Show success or error message
                fetchUsers(); // Re-fetch users after deletion
            })
            .catch(error => console.error('Error deleting user:', error));
        }
    }

    // Initial fetch of users
    fetchUsers();
});


</script>
</html>